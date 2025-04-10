<?php

namespace App\Interfaces;

interface CountryRepositoryInterface
{
    public function getCountryWithSinglePost($id);
    public function getCountryWithAllPosts($id);
}
