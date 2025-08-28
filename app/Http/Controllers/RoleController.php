<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('roles.index', compact('users', 'roles'));
    }

    public function assign(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $role = $request->role;

        $user->syncRoles([$role]);

        return redirect()->back()->with('success', 'Роль успешно назначена!');
    }
}
