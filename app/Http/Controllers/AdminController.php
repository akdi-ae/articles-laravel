<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Editorial;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
   public function index()
    {

       $editorialsCount = Editorial::count();
         $staffCount =  User::count();
        return view('admin.dashboard', compact('staffCount', 'editorialsCount'));
    }
    public function stats()
    {
        return view('admin.stats');
    }
    public function settings()
    {
        return view('settings');
    }
     public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function staff()
{
    $users = User::with('roles')->get();
    $roles = Role::all();
    return view('admin.staff', compact('users', 'roles'));
}
public function updateRole(Request $request, $userId)
{
    $request->validate([
        'role' => 'required|exists:roles,name',
    ]);

    $user = User::findOrFail($userId);


    $user->syncRoles([$request->role]);

    return redirect()->route('admin.staff')->with('success', 'Роль успешно обновлена!');
}
public function editorials()
{
    $editorials = Editorial::where('status', 'editor_approved')->latest()->get();
    return view('editorials.admin', compact('editorials'));
}

}
