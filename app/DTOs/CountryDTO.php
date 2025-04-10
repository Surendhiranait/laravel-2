<?php

namespace App\DTOs;

class CountryDTO
{
    public string $name;
    public ?string $code;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->code = $data['code'] ?? null;
    }

    public static function fromRequest($request): self
    {
        return new self([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
    }
}
