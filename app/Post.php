<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'category_id',
        'title',
        'body',
        'photo_id',

    ];
    public  function user(){
        return $this->belongsTo('App\User') ; // return role object
    }
//    public  function category(){
//        return $this->belongsTo('App\Category') ; // return role object
//    }
    public  function photo(){
        return $this->belongsTo('App\Photo') ; // return role object
    }

}
