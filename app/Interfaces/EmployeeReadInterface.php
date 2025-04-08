<?php 

namespace App\Interfaces;

use Illuminate\Http\Request;

interface EmployeeReadInterface
{
    public function show(); 

    public function shows($id);
 
}