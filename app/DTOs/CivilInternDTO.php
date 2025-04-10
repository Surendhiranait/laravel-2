<?php 

namespace App\DTOs;

use Illuminate\Http\Request;

class CivilInternDTO
{
    public string $name;
    public string $email;
    public string $mobile;
    public int $age;
    public string $city;
    public string $state;
    public string $country;

    public function __construct(array $data)
    {
        $this->name    = $data['name'];
        $this->email   = $data['email'];
        $this->mobile  = $data['mobile'];
        $this->age     = $data['age'];
        $this->city    = $data['city'];
        $this->state   = $data['state'];
        $this->country = $data['country'];
    }

    public static function fromRequest(Request $request): self
    {
        return new self($request->only([
            'name', 'email', 'mobile', 'age', 'city', 'state', 'country'
        ]));
    }
}