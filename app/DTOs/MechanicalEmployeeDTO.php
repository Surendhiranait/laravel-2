<?php

namespace App\DTOs;
use Illuminate\Http\UploadedFile;

class MechanicalEmployeeDTO
{
    public string $name;
    public string $email;
    public string $mobile;
    public int $age;
    public ?UploadedFile $image;

    public function __construct(array $data)
    {
        $this->name     = $data['name'];
        $this->email    = $data['email'];
        $this->mobile   = $data['mobile'];
        $this->age      = $data['age'];
        $this->image    = $data['image'] ?? null; // this is the raw file
    }

    public function toArray(): array
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'age'      => $this->age,
        ];
    }

    
}
