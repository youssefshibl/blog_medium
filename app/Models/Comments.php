<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
        'likes',
        'dislikes',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
