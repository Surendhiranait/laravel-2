<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function latestPost()
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }
    public function oldestPost()
    {
        return $this->hasOne(Post::class)->oldestOfMany();
    }
}
