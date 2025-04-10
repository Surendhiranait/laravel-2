<?php

namespace App\DTOs;

class UserDTO
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public int $country_id;
    public string $role;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->country_id = $data['country_id'];
        $this->role = $data['role'];
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'password'   => $this->password,
            'country_id' => $this->country_id,
            'role'       => $this->role,
        ];
    }
}
