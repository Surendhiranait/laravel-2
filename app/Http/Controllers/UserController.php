<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function allPosts($id)
    {
        $user = User::with('posts')->findOrFail($id);
        return view('user-posts', compact('user'));
    }

    public function latestPost($id)
    {
        $user = User::with('latestPost')->findOrFail($id);
        return view('user-latest-post', compact('user'));
    }
}
