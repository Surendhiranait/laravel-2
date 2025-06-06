<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'state',
        'country',
    ];
    public function civilEmployees()
    {
        return $this->hasMany(CivilEmployee::class, 'location', 'city');
    }
}
