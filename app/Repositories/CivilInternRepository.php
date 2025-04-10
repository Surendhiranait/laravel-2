<?php 
namespace App\Repositories;

use App\Models\CivilIntern;
use App\Interfaces\CivilInternInterface;
use Illuminate\Http\Request;
use App\DTOs\CivilInternDTO;


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

    public function store(CivilInternDTO $dto)
    {
        $intern = new CivilIntern();
        $intern->name    = $dto->name;
        $intern->email   = $dto->email;
        $intern->mobile  = $dto->mobile;
        $intern->age     = $dto->age;
        $intern->city    = $dto->city;
        $intern->state   = $dto->state;
        $intern->country = $dto->country;
        $intern->save();

        return $intern;
    }

    public function update(CivilInternDTO $dto, $id)
    {
        $intern = CivilIntern::findOrFail($id);

        $intern->update([
            'name'    => $dto->name,
            'email'   => $dto->email,
            'mobile'  => $dto->mobile,
            'age'     => $dto->age,
            'city'    => $dto->city,
            'state'   => $dto->state,
            'country' => $dto->country,
        ]);

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
