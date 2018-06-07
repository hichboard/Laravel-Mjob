<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulated_offer extends Model
{

    public function user(){ //this  many has one (One To Many inverse relationship)
        return $this->belongsTo('App\User');
    }

   /* public function users_employers(){ //this  many has one (One To Many inverse relationship)
        return $this->belongsTo('App\Users_employer');
    }
    public function users_candidats(){ //this  many has one (One To Many inverse relationship)
        return $this->belongsTo('App\Users_candidat');
    }
    */
    public function offers_employer(){ //this  many has one (One To Many inverse relationship)
        return $this->belongsTo('App\Offers_employer');
    }



}
