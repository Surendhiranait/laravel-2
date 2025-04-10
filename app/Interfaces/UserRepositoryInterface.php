<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();

    public function getAllPosts($id);

    public function getLatestPost($id);
}