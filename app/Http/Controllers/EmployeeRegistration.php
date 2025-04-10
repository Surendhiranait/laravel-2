<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\DTOs\UserDTO;
use App\Repositories\UserRepository;

class EmployeeRegistration extends Controller
{
    public function create() {
        return view('employee.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $dto = UserDTO::fromRequest($request);
        $this->userRepository->store($dto);

        return back()->withSuccess('User Added!');
    }

}

