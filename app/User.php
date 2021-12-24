<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','role_id','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function role(){
        return $this->belongsTo('App\Role') ; // return role object
    }

    public  function photo(){
        return $this->belongsTo('App\Photo') ; // return role object
    }
    public function isAdmin(){
        if($this->role->name=='admin'){
            return true ;
        }
       else{
           return  false ;
       }
    }
    public  function posts(){
        return $this->hasMany('App\Post') ; // return role object
    }

}
