<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CivilIntern;
use App\Interfaces\CivilInternInterface;


class CivilInternsController extends Controller
{
    protected $civilInternRepository;

    public function __construct(CivilInternInterface $civilInternRepository)
    {
        $this->civilInternRepository = $civilInternRepository;
    }
    
    public function show()
    {
        $civilinterns = CivilIntern::all();
        return view('civilIntern.home', compact('civilinterns'));
    }

    public function create() {
        return view('civilIntern.create');
    }

    public function add(Request $request) {
        $request->validate([
            'name'=>'required',
            'age'=>'required|numeric',
            'mobile'=>'required|numeric',
            'email'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
        ]);

        $civil=new CivilIntern();
        $civil->name = $request->name;
        $civil->age = $request->age;
        $civil->mobile = $request->mobile;
        $civil->email = $request->email;
        $civil->city = $request->city;
        $civil->state = $request->state;
        $civil->country = $request->country;
        $civil->save();
        return back()->withSuccess('Intern Added!');

    }
}
