<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    // public $timestamps = true;

    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
