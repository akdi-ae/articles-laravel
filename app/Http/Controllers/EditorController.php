<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:editor|reviewer');
    }

    public function profile()
    {
        $user = Auth::user();

        // Все статьи для редактора, рецензента и админа
        $editorials = \App\Models\Editorial::all();

        return view('profiles', compact('user', 'editorials'));
    }
}
