<?php

namespace App\Interfaces;
use App\DTOs\UserDTO;

interface UserRepositoryInterface
{
    public function getAll();

    public function getAllPosts($id);

    public function getLatestPost($id);
}