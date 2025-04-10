<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CivilInternService;

class CivilInternsController extends Controller
{
    protected $civilInternService;

    public function __construct(CivilInternService $civilInternService)
    {
        $this->civilInternService = $civilInternService;
    }

    public function getAll()
    {
        $civilinterns = $this->civilInternService->getAllInterns();
        return view('civilIntern.home', compact('civilinterns'));
    }

    public function getOne($id)
    {
        $civilinterns= $this->civilInternService->getOneInterns($id);
        return view('civilIntern.show',['civilintern'=>$civilinterns]);
    }

    public function create()
    {
        // If needed, you can use: $this->civilInternService->createInternForm();
        return view('civilIntern.create');
    }

    public function store(Request $request)
    {
        $this->civilInternService->storeIntern($request);
        return back()->withSuccess('Intern Added!');
    }

    public function edit($id)
    {
        $civilintern = $this->civilInternService->getOneInterns($id);
        return view('civilIntern.edit', compact('civilintern'));
    }

    public function update(Request $request, $id)
    {
        $this->civilInternService->updateIntern($request, $id);
        return redirect()->route('civilIntern.home')->with('success', 'Intern updated successfully!');
    }
    public function delete($id)
    {
        $this->civilInternService->deleteIntern($id);
        return redirect()->route('civilIntern.home')->with('success', 'Intern deleted successfully!');
    }

}


/*namespace App\Http\Controllers;

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
