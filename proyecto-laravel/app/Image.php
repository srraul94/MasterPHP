<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';


    //relacion one to many 
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    //one to many
    public function likes(){
        return $this->hasMany('App\Like');
    }

    //many to one
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
