<?php

namespace App\Http\Controllers;

use App\Models\MechanicalEmployee;
use Illuminate\Http\Request;
use App\Interfaces\EmployeeReadInterface;
use App\Interfaces\EmployeeWriteInterface;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Gate;

class MechanicalEmployeeController extends Controller
{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    
    public function show()
    {
        if (!Gate::any(['access-admin', 'access-mechanical'])) {
            abort(403); // Forbidden
        }

        $mechanicalemployees = MechanicalEmployee::all();
        return view('mechanical.home', compact('mechanicalemployees'));
    }

    public function create() {

        if (!Gate::any(['access-admin', 'access-mechanical'])) {
            abort(403); // Forbidden
        }

        return view('mechanical.create');
    }

    public function store(Request $request)
    {
        if (!Gate::any(['access-admin', 'access-mechanical'])) {
            abort(403); // Forbidden
        }

        $this->employeeService->store($request, MechanicalEmployee::class);
        return redirect()->route('mechanical.home')->with('success', 'Mechanical employee added.');
    }

    /*public function store(Request $request) {
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

    }*/

    public function shows($id) {
        if (!Gate::any(['access-admin', 'access-mechanical'])) {
            abort(403); // Forbidden
        }
        $mechanicalemployee= MechanicalEmployee::where('id',$id) -> first();
        return view('mechanical.show',['mechanicalemployee'=>$mechanicalemployee]);
    }

    public function destroy($id) {
        $mechanicalemployee= MechanicalEmployee::where('id',$id) -> first();

        $this->authorize('delete', $mechanicalemployee);

        $mechanicalemployee->delete();
        return back()->withSuccess('Employee deleted!');
    }
}
