<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['type','post_id','user_id' , 'post_user_id' , 'seen'];

    public function post(){
        return $this->hasOne(Post::class , 'id' , 'post_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
