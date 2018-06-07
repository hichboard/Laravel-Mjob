<?php

namespace App;

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
    protected $fillable = [
        'first_name','last_name', 'email', 'password','gender','city','address','phone',
        'user_type','is_valid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function users_employer(){ //this one user has one  (One To one relationship)
        return $this->hasOne('App\Users_employer');
    }
    public function employer_msg(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Employer_msg');
    }
    public function offers_employer(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Offers_employer');
    }

    public function users_candidat(){ //this one user has one  (One To one relationship)
        return $this->hasOne('App\Users_candidat');
    }

    public function postulated_offer(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Postulated_offer');
    }
    public function candidat_msg(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Candidat_msg');
    }
    public function summary_candidat(){ //this one user has one (One To one relationship)
        return $this->hasOne('App\Summary_candidat');
    }
    public function experience(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Experience');
    }
    public function education(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Education');
    }
    public function competence(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Competence');
    }
    public function language(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Language');
    }
    public function hobbie(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Hobbie');
    }
    public function files_candidat(){ //this one user has many  (One To Many relationship)
        return $this->hasOne('App\Files_candidat');
    }

    public function admin_msg(){ //this one user has many  (One To Many relationship)
        return $this->hasMany('App\Admin_msg');
    }




}
