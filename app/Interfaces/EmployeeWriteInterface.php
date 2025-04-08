<?php 

namespace App\Interfaces;

use Illuminate\Http\Request;
interface EmployeeWriteInterface
{

    public function create(); 

    public function store(Request $request); 

    public function destroy($id);
 
}