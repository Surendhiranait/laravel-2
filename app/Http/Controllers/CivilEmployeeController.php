<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CivilEmployeeController extends Controller
{
    public function show()
    {
        return view('civil.home');
    }
}
