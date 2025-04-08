<?php 
namespace App\Repositories;

use App\Models\CivilIntern;
use App\Interfaces\CivilInternInterface;
use Illuminate\Http\Request;

class CivilInternRepository implements CivilInternInterface
{
    public function show()
    {
        return CivilIntern::all();
    }

    public function create()
    {
        return 'Create new intern.';
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'age' => 'required|numeric',
        ]);

        $intern = new CivilIntern();
        $intern->name = $validatedData['name'];
        $intern->email = $validatedData['email'];
        $intern->mobile = $validatedData['mobile'];
        $intern->age = $validatedData['age'];
        $intern->save();

        return $intern;  
    }
}
