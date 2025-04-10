<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CivilInternService;
use App\DTOs\CivilInternDTO;

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
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'mobile'  => 'required|numeric',
            'age'     => 'required|numeric',
            'city'    => 'required',
            'state'   => 'required',
            'country' => 'required',
        ]);

        $dto = new CivilInternDTO($validated);

        $this->civilInternService->storeIntern($dto);

        return back()->withSuccess('Intern Added!');
    }

    public function edit($id)
    {
        $civilintern = $this->civilInternService->getOneInterns($id);
        return view('civilIntern.edit', compact('civilintern'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'mobile'  => 'required|numeric',
            'age'     => 'required|numeric',
            'city'    => 'required',
            'state'   => 'required',
            'country' => 'required',
        ]);
    
        $dto = new CivilInternDTO($validated);
    
        $this->civilInternService->updateIntern($dto, $id);
    
        return redirect()->route('civilIntern.home')->with('success', 'Intern updated successfully!');
    
    }
    public function delete($id)
    {
        $this->civilInternService->deleteIntern($id);
        return redirect()->route('civilIntern.home')->with('success', 'Intern deleted successfully!');
    }

}



