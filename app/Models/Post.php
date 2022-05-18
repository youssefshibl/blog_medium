<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comments ;

class Post extends Model
{
    use HasFactory;
    // to change teh table name
      protected $table = 'posts';
    // primary key
     public $primarykey = 'id';
     // timestamp
     public $timestamps = true;  // --> if it false it dont pass time of post in timstamp colum
     protected $fillable = [
        'title',
        'body',
        'user_id'
    ];



     public function user(){
         //return $this->belongsTo('App\Models\User');
         return $this->hasOne('App\Models\User' , 'id' , 'user_id');
     }

     public function image(){
        return $this->morphOne(Image::class , 'imageable');

    }

    public function comments(){
        return $this->hasMany('App\Models\Comments' , 'post_id' , 'id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag' , 'posts_tages' , 'post_id' , 'tag_id');
    }



}


