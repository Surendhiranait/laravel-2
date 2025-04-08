<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function singlePost($id)
    {
        $country = \App\Models\Country::with('post')->findOrFail($id);
        return view('country-post', compact('country'));
    }
    
    public function allPosts($id)
    {
        $country = Country::with('posts')->findOrFail($id);
        return view('country-all-posts', compact('country'));
    }
}
