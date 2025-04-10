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

    public function store($dto, $model)
    {
        $data = $dto->toArray();

        // Use the trait here
        if ($dto->image) {
            $data['image_path'] = $this->uploadImage($dto->image);
        }

        return $model::create($data);
    }

    public function destroy($id)
    {

    }
}