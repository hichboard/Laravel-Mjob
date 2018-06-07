<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_employer extends Authenticatable
{

    use Notifiable;
    //protected $guard='employer';

    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','company_name','company_sector','company_logo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'remember_token',
    ];




    public function user(){ //this one user has many  (One To Many relationship)
        return $this->hasOne('App\User');
    }

}
