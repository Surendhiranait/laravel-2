<?php 
namespace App\Interfaces;

use Illuminate\Http\Request;

interface CivilInternInterface
{
    public function show();

    public function create();

    public function add(Request $request);

}
