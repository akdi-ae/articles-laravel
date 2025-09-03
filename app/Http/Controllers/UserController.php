<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.staff', compact('users', 'roles'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role'  => 'required|exists:roles,name',
        ]);

        $password = str()->random(10);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole($request->role);


        Mail::to($user->email)->send(new UserCreatedMail($user, $password));

        return redirect()->route('admin.staff')->with('success', 'Пользователь создан и письмо отправлено');
    }


    public function assignRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'Роль успешно изменена');
    }

public function person()
{
    $users = User::role('author')->with('editorials')->get();
    return view('person', compact('users'));
}

public function authorsIndex(Request $request)
{
    $search = $request->input('search');

    $users = User::role('author')
        ->when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhereHas('editorials', function ($query) use ($search) {
                  $query->where('status', 'published')
                        ->where('title_kk', 'like', "%{$search}%");
              });
        })
        ->with(['editorials' => function ($query) {
            $query->where('status', 'published');
        }])
        ->get();

    return view('person', compact('users', 'search'));
}


}
