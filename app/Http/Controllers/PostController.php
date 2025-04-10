<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
        return view('tableRelations.posts', compact('posts')); // Blade file path updated
    }
}
