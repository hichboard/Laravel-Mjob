<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_candidat extends Authenticatable
{

    use Notifiable;
   // protected $guard='candidate';
    //protected $primaryKey = 'cand_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','birthday', 'pic_profile',
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
