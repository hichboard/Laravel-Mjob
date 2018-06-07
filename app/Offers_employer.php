<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers_employer extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = [
       'user_id','offer_title','offer_contract_type','offer_required_training','offer_qualities',
        'offer_missions','offer_languages','offer_salary','offer_pic','offer_sector','offer_city',
    ];


    public function user(){ //this  many has one (One To Many inverse relationship)
        return $this->belongsTo('App\User');
    }



}
