<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilEmployee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile', 'age', 'location', 'image_path'];

    public function location()
    {
       return $this->belongsTo(Location::class, 'location', 'city');
    }
}
