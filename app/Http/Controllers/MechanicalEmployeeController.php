<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MechanicalEmployeeController extends Controller
{
    public function show()
    {
        return view('mechanical.home');
    }
}
