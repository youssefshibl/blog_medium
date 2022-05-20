<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Image ;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password' , 'address', 'phone'];
    protected $hidden = ['password', 'remember_token'];

    public function image(){
        return $this->morphOne(Image::class , 'imageable');
    }
}
