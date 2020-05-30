<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function formateur(){
        return $this->belongsTo('App\User', 'formateur_id');
    }

    public function categorie(){
        return $this->belongsTo('App\Categeory', 'category_id');
    }

    public function cours(){
        return $this->hasMany('App\Cour');
    }

    public function qcm(){
        return $this->hasMany('App\Qcm');
    }

    public function apprenants(){
        return $this->belongsToMany('App\User', 'formation_user');
    }

    public function commentaires(){
        return $this->hasMany('App\Comment');
    }
}
