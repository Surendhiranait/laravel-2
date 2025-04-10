<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function getAllPosts($id)
    {
        return User::with('posts')->findOrFail($id);
    }

    public function getLatestPost($id)
    {
        return User::with('latestPost')->findOrFail($id);
    }
}
