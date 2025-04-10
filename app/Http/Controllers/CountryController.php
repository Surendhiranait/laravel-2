<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CountryRepositoryInterface;

class CountryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function singlePost($id)
    {
        $country = $this->countryRepository->getCountryWithSinglePost($id);
        return view('tableRelations.country-post', compact('country'));
    }

    public function allPosts($id)
    {
        $country = $this->countryRepository->getCountryWithAllPosts($id);
        return view('tableRelations.country-all-posts', compact('country'));
    }
}
