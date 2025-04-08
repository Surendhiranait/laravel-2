<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function post()
    {
        return $this->hasOneThrough(
            \App\Models\Post::class,  
            \App\Models\User::class,  
            'country_id',             
            'user_id',               
            'id',                
            'id'                  
        );
    }

    public function posts()
    {
        return $this->hasManyThrough(
            \App\Models\Post::class,  
            \App\Models\User::class,  
            'country_id',           
            'user_id',             
            'id',               
            'id'                 
        );
    }
}
