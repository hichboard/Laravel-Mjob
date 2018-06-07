<?php

namespace App\Http\Controllers;

use App\Offers_employer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{




    public function searchOffer(Request $request){

        if ($request->valid_search =='search'){
            $offers=Offers_employer::orderBy('created_at','desc')->limit(3)->get();
            $soffers= Offers_employer::where('offer_title','like','%'.$request->input('s_key').'%')
            ->orWhere('offer_city','like',$request->input('s_city'))
            ->orWhere('offer_sector','like',$request->input('s_sector'))
            ->orderBy('created_at','desc')->get();
//            return  view('view_mjob.Mjob_pages.all_offer',compact('soffers','loffers'));
            return  view('view_mjob.Mjob_pages.index',compact('soffers','offers'));

        }
        return  redirect('index');

    }


    public function searchCity($city){

        if (!empty($city)){
            $key=$city;
            $offers=Offers_employer::orderBy('created_at','desc')->limit(3)->get();
            $sroffers= Offers_employer::where('offer_city', $city)->orderBy('created_at','desc')->get();
          if ($sroffers){
              return  view('view_mjob.Mjob_pages.index',compact('sroffers','offers','key'));
          }


        }
        return  redirect('index');

    }
    public function searchSector($sector){

        if (!empty($sector)){
            $key=$sector;
            $offers=Offers_employer::orderBy('created_at','desc')->limit(3)->get();
            $sroffers= Offers_employer::where('offer_sector', $sector)->orderBy('created_at','desc')->get();
          if ($sroffers){
              return  view('view_mjob.Mjob_pages.index',compact('sroffers','offers','key'));
          }


        }
        return  redirect('index');

    }






}
