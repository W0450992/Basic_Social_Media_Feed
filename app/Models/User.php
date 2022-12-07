<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

//    protected $fillable = ['name', 'email', 'password'];

    //function
    function posts(){
        return $this->hasMany(Post::class);// one to many parent
    }
    function roles(){
        return $this->belongsToMany(Role::class);//many to many
    }


    function isUserAdmin(){
        foreach($this->roles as $role){
            if($role->id == 1){
                return true;
            }
        }
        return false;
    }

    function isThemeManager(){
        foreach($this->roles as $role){
            if($role->id == 3){ // 3 = theme manager
                return true;
            }
        }
        return false;
    }


    function createdThemes(){
        return $this->hasMany(Theme::class, 'created_by');
    }

    function updatedThemes(){
        return $this->hasMany(Theme::class, 'updated_by');
    }

//    function isModerator(){
//        foreach($this->roles as $role){
//            if($role->id == 2){
//                return true;
//            }
//        }
//        return false;
//    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
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
}
