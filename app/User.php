<?php

namespace produccion;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
    //'name', 'email', 'password',
      'Nom',
      'Ap',
      'username',
      //'Pass',
      'Dpto',
      'Puesto',
      'Rol'
    ];
          
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
        //'password', 'remember_token',
    ];
}
