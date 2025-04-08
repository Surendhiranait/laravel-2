<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CivilEmployee;
use App\Interfaces\EmployeeReadInterface;
use App\Interfaces\EmployeeWriteInterface;

class CivilEmployeeController implements EmployeeReadInterface,EmployeeWriteInterface
{
    public function show()
    {
        $civilemployees = CivilEmployee::all();
        return view('civil.home', compact('civilemployees'));
    }

    public function create() {
        return view('civil.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required|numeric',
            'age'=>'required|numeric',
        ]);


        $civil=new CivilEmployee();
        $civil->name = $request->name;
        $civil->email = $request->email;
        $civil->mobile = $request->mobile;
        $civil->age = $request->age;
        $civil->save();
        return back()->withSuccess('Employee Added!');
    }

    public function shows($id) {
        $civilemployee= CivilEmployee::where('id',$id) -> first();
        return view('civil.show',['civilemployee'=>$civilemployee]);
    }

    public function destroy($id) {
        $civilemployee= CivilEmployee::where('id',$id) -> first();
        $civilemployee->delete();
        return back()->withSuccess('Employee deleted!');
    }


}
