<?php

namespace App\Http\Controllers;

use App\Models\MechanicalEmployee;
use Illuminate\Http\Request;
use App\Interfaces\EmployeeReadInterface;
use App\Interfaces\EmployeeWriteInterface;

class MechanicalEmployeeController implements EmployeeReadInterface,EmployeeWriteInterface
{
    public function show()
    {
        $mechanicalemployees = MechanicalEmployee::all();
        return view('mechanical.home', compact('mechanicalemployees'));
    }

    public function create() {
        return view('mechanical.create');
    }

    public function store(Request $request) {
        //dd($request);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required|numeric',
            'age'=>'required|numeric',
        ]);


        $mechanical=new MechanicalEmployee();
        $mechanical->name = $request->name;
        $mechanical->email = $request->email;
        $mechanical->mobile = $request->mobile;
        $mechanical->age = $request->age;
        $mechanical->save();
        return back()->withSuccess('Employee Added!');

    }

    public function shows($id) {
        $mechanicalemployee= MechanicalEmployee::where('id',$id) -> first();
        return view('mechanical.show',['mechanicalemployee'=>$mechanicalemployee]);
    }

    public function destroy($id) {
        $mechanicalemployee= MechanicalEmployee::where('id',$id) -> first();
        $mechanicalemployee->delete();
        return back()->withSuccess('Employee deleted!');
    }
}
