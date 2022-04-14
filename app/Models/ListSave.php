<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSave extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'posts_in_save'
    ];

    public function postsinsave(){
                 return $this->BelongsToMany('App\Models\Post' , 'users_posts_saves' , 'save_list_id' , 'post_id' , 'id' , 'id');

    }
    

}
