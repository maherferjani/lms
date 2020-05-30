<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    public function formation(){
        return $this->belongsTo('App\Formation');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'cours_user');
    }

    public function commentaires(){
        return $this->hasMany('App\Comment');
    }
}
