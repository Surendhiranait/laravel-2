<?php

namespace App\Repositories;

use App\Models\Country;
use App\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function getCountryWithSinglePost($id)
    {
        return Country::with('post')->findOrFail($id);
    }

    public function getCountryWithAllPosts($id)
    {
        return Country::with('posts')->findOrFail($id);
    }
}
