<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRegistration extends Controller
{
    public function create() {
        return view('employee.create');
    }

    public function register(Request $request) {

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            
        ]);

        try {

            $employee=new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = $request->password;
            $employee->save();
            return back()->withSuccess('Employee Details Added!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to add employee. Please try again.']);
        }
    }

}

