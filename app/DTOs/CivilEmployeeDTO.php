<?php

namespace App\DTOs;
use Illuminate\Http\UploadedFile;

class CivilEmployeeDTO
{
    public string $name;
    public string $email;
    public string $mobile;
    public int $age;
    public string $location;
    public ?UploadedFile $image;

    public function __construct(array $data)
    {
        $this->name     = $data['name'];
        $this->email    = $data['email'];
        $this->mobile   = $data['mobile'];
        $this->age      = $data['age'];
        $this->location = $data['location'];
        $this->image    = $data['image'] ?? null; // this is the raw file
    }

    public function toArray(): array
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'age'      => $this->age,
            'location' => $this->location,
        ];
    }

    public static function fromModel(CivilEmployee $data): self
    {
        return new self($data);
    }
    
}
