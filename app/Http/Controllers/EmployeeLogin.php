<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLogin extends Controller
{
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $employee = Employee::where('email', $request->email)->first();

        if ($employee && $employee->password === $request->password) {
            Auth::login($employee);

            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


}
