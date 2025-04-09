<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CivilEmployee;
use App\Interfaces\EmployeeReadInterface;
use App\Interfaces\EmployeeWriteInterface;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Gate;

class CivilEmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function show()
    {
        if (!Gate::any(['access-admin', 'access-civil'])) {
            abort(403); // Forbidden
        }
    
        $civilemployees = CivilEmployee::all();
        return view('civil.home', compact('civilemployees'));
        /*if (!Gate::allows('access-civil')) {
            abort(403); // Forbidden
        }

        $civilemployees = CivilEmployee::all();
        return view('civil.home', compact('civilemployees'));*/
    }

    public function create() {

        if (!Gate::any(['access-admin', 'access-civil'])) {
            abort(403); // Forbidden
        }

        return view('civil.create');
    }

    /*public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required|numeric',
            'age'=>'required|numeric',
            'location'=>'required',
        ]);


        $civil=new CivilEmployee();
        $civil->name = $request->name;
        $civil->email = $request->email;
        $civil->mobile = $request->mobile;
        $civil->age = $request->age;
        $civil->location = $request->location;
        $civil->save();
        return back()->withSuccess('Employee Added!');
    }*/

    public function store(Request $request)
    {
        if (!Gate::any(['access-admin', 'access-civil'])) {
            abort(403); // Forbidden
        }

        $this->employeeService->store($request, CivilEmployee::class);
        return redirect()->route('civil.home')->with('success', 'Civil employee added.');
    }

    public function shows($id) {
        
        if (!Gate::any(['access-admin', 'access-civil'])) {
            abort(403); // Forbidden
        }
        $civilemployee= CivilEmployee::where('id',$id) -> first();
        return view('civil.show',['civilemployee'=>$civilemployee]);
    }

    public function destroy($id) {
        $civilemployee = CivilEmployee::findOrFail($id);

        $this->authorize('delete', $civilemployee);
        //$civilemployee= CivilEmployee::where('id',$id) -> first();
        $civilemployee->delete();
        return back()->withSuccess('Employee deleted!');
    }
}
