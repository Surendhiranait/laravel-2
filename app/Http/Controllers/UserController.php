<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('tableRelations.users', compact('users'));
    }

    public function allPosts($id)
    {
        $user = $this->userRepository->getAllPosts($id);
        return view('tableRelations.user-posts', compact('user'));
    }

    public function latestPost($id)
    {
        $user = $this->userRepository->getLatestPost($id);
        return view('tableRelations.user-latest-post', compact('user'));
    }
}
