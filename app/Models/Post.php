<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    /*public function user()  //One to Many (Inverse) / Belongs To 
    {
        return $this->belongsTo(User::class);
    }*/
    public function user() //Has One Through 
    {
        return $this->belongsTo(User::class);
    }
}
