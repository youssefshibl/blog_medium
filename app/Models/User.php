<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Image ;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'premium',
        'verified',
        'phone',
        'address',
        'lange',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function Verifiedes()
    {
        return $this->hasOne('App\Models\Verified', 'user_id', 'id');
    }

    // get your image profile from database
    public function image(){
        return $this->morphOne(Image::class , 'imageable');
        //return "what";
    }
    // get you lists
    public function lists(){
        return $this->hasMany('App\Models\UserList' , 'user_id' , 'id');
    }

    // get your saved posts
    // public function post_save(){
    //     // return $this->BelongsToMany('App\Models\Post' , 'users_posts_saves' , 'user_id' , 'post_id' , 'id' , 'id');
    // }

    // get save lists
    public function list_save(){
        return $this->hasMany('App\Models\ListSave' , 'user_id' , 'id');
    }

    // get all posts which user make like in it
    public function likes(){
        return $this->BelongsToMany('App\Models\Post' , 'likes' , 'user_id' , 'post_id' , 'id' , 'id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comments' , 'user_id' , 'id');
    }

    // get following
    public function following(){
        return $this->BelongsToMany('App\Models\User' , 'followers' , 'user_id_one' , 'user_id_two' , 'id' , 'id');
    }


    public function follower(){
        return $this->BelongsToMany('App\Models\User' , 'followers' , 'user_id_two' , 'user_id_one' , 'id' , 'id');
    }

}
