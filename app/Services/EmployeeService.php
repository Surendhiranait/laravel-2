<?php

namespace App\Services;

use App\Interfaces\EmployeeWriteInterface;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class EmployeeService implements EmployeeWriteInterface
{

    use ImageUploadTrait;

    protected $employee;

    /*public function __construct(EmployeeWriteInterface $employee)
    {
        $this->employee = $employee;
    }*/

    public function getEmployeeDetails($name)
    {
        return $this->employee->loadDetails($name);
    }

    public function create()
    {

    }

    public function store(Request $request, $model)
    {
        $fields = ['name', 'email', 'mobile', 'age'];

        if (in_array('location', (new $model)->getFillable())) {
            $fields[] = 'location';
        }

        $data = $request->only($fields);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->file('image'));
        }

        return $model::create($data);
    
    /*$data = $request->only(['name', 'email', 'mobile', 'age', 'location']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->file('image'));
        }

        return $model::create($data);*/
    }

    public function destroy($id)
    {

    }
}