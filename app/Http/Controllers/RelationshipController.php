<?php

namespace App\Http\Controllers;
use App\Models\CivilEmployee;

use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index()
{
    $civilEmployees = CivilEmployee::with('location')->get();

    return view('relationoperation', compact('civilEmployees'));
}
}
