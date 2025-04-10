<?php 
namespace App\Repositories;

use App\Models\CivilIntern;
use App\Interfaces\CivilInternInterface;
use Illuminate\Http\Request;

class CivilInternRepository implements CivilInternInterface
{
    public function getAll()
    {
        return CivilIntern::all();
    }

    public function getOne($id)
    {
        return CivilIntern::findOrFail($id);
    }

    public function create()
    {
        return 'Create new intern.';
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'age' => 'required|numeric',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $intern = new CivilIntern();
        $intern->name = $validatedData['name'];
        $intern->email = $validatedData['email'];
        $intern->mobile = $validatedData['mobile'];
        $intern->age = $validatedData['age'];
        $intern->city = $validatedData['city'];
        $intern->state = $validatedData['state'];
        $intern->country = $validatedData['country'];
        $intern->save();

        return $intern;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'age' => 'required|numeric',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $intern = CivilIntern::findOrFail($id);
        $intern->update($validatedData);

        return $intern;
    }

    public function delete($id)
    {
        $intern = CivilIntern::findOrFail($id);
        return $intern->delete();
    }
    /*public function add(Request $request)
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
    }*/
}
