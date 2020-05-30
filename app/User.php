<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function formations()
    {
        return $this->hasMany('App\Formation', 'formateur_id');
    }
    public function test(){
        return $this->hasMany('App\Test');
    }
    public function formation(){
        return $this->belongsToMany('App\Formation', 'formation_user')->withPivot('progression');
    }

    public function cours(){
        return $this->belongsToMany('App\Cour', 'cours_user');
    }

    public function commentaires(){
        return $this->hasMany('App\Comment');
    }

    public function roles(){
      return $this->belongsToMany(Role::class);
    }
    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    public function hasRole($role){
      return null !== $this->roles()->where('name', $role)->first();
    }
    public function assignRole($role){
        $this->roles()->attach($role);
    }
}
