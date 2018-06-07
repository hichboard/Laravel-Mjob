<?php

namespace App\Http\Controllers;

use App\Http\Requests\candidatRequest;
use App\Http\Requests\employerRequest;
use App\Http\Requests\Offeremployer;
use App\Offers_employer;
use App\Users_candidat;
use App\Users_employer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class mjobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

            if (Auth::User()->user_type =='admin'){
                $usera=Auth::user();
                return  view('view_mjob.Mjob_pages.admin_jb',compact('usera'));
            }
            //---------------------------------------------------CANDIDATE-----------
            elseif (Auth::User()->user_type =='candidat'){
                    $userc=Auth::user();
                    $cands=Auth::user()->users_candidat;
                    $ids= Users_candidat::where('user_id',Auth::id())->get();
                foreach ($ids as $id) {
                    $user_id= $id->user_id;

                    if ( $user_id ){
                        return  view('view_mjob.Mjob_pages.candidat',compact('cands','userc'));
                    }
                }
                return  view('view_mjob.Mjob_pages.cand_next');

            }
            //---------------------------------------------------EMPLOYER--------
            elseif (Auth::User()->user_type =='employer'){
                $empls=Auth::user()->users_employer;
                $msgse=Auth::user()->employer_msg;
                $usere=Auth::user();
                $ids= Users_employer::where('user_id',Auth::id())->get();
                foreach ($ids as $id) {
                    $user_id= $id->user_id;

                if ( $user_id ){
                    return  view('view_mjob.Mjob_pages.employer',compact('empls',
                        'usere','msgse'));
                }
                }
                return  view('view_mjob.Mjob_pages.empl_next');
            }
        return  redirect('/');
    }




    public function emplRegister(employerRequest $request){

        if (Auth::User()->user_type =='employer'){
                 $empl=new Users_employer();
                 $empl->company_name= $request->input('company_name');
                 $empl->user_id= Auth::id();
                 $empl->company_sector= $request->input('company_sector');

                 if($request->hasFile('company_logo')){
                     $empl->company_logo=$request->file('company_logo')->store('images');
                 }
                 $empl->save();
                 session()->flash('success','Votre inscription a bien été enregistrée!');
                 //}
                 if ($empl->save()){
                     return redirect('employer');
                 }
            return  redirect('empl_next');

            }
        return  redirect('register');

     }


    public function candRegister(candidatRequest $request){
        if (Auth::User()->user_type =='candidat'){
            $cand=new Users_candidat();
            $cand->user_id= Auth::id();
            $cand->birthday= $request->input('birthday');

            if($request->hasFile('pic_profile')){
                $cand->pic_profile=$request->file('pic_profile')->store('images');
            }
            $cand->save();
            session()->flash('success','Votre inscription a bien été enregistrée!');
            //}
            if ($cand->save()){
                return redirect('candidat');
            }
            return  redirect('cand_next');
        }

        return  redirect('register');
    }


//---------------------------------offers----
    public function getOffer($id){

     return   $offers=  Offers_employer::where('user_id',Auth::id())->orderBy('created_at','desc')->get();

    }

    public function addOffer(Offeremployer $request){

        $offer=new Offers_employer();
        $offer->user_id= Auth::id();
        $offer->offer_title= $request->input('offer_title');
        $offer->offer_contract_type= $request->input('offer_contract_type');
        $offer->offer_required_training= $request->input('offer_required_training');
        $offer->offer_qualities= $request->input('offer_qualities');
        $offer->offer_missions= $request->input('offer_missions');
        $offer->offer_languages= $request->input('offer_languages');
        $offer->offer_salary= $request->input('offer_salary');
        $offer->offer_sector= $request->input('offer_sector');
        $offer->offer_city= $request->input('offer_city');

        $expo= explode(',', $request->offer_pic);
        $decode= base64_decode($expo[1]);
        if (str_contains($expo[0],'jpg')){
            $exten='jpg';
        }elseif (str_contains($expo[0],'png')){
            $exten='png';
        }elseif (str_contains($expo[0],'jpeg')){
            $exten='jpeg';
        }
        $filename=str_random().'.'.$exten;
        $path=public_path()."/img/".$filename;
        file_put_contents($path, $decode);
        $offer->offer_pic=$filename;



        $offer->save();

        return Response()->json(['etat'=>true, 'id'=> $offer->id]) ;
    }

    public function updateOffer(Offeremployer $request){
        if(!is_null($request->id)){
              
               $offer = Offers_employer::find($request->id);
    
       // $offer->user_id= Auth::id();
        $offer->offer_title= $request->input('offer_title');
        $offer->offer_contract_type= $request->input('offer_contract_type');
        $offer->offer_required_training= $request->input('offer_required_training');
        $offer->offer_qualities= $request->input('offer_qualities');
        $offer->offer_missions= $request->input('offer_missions');
        $offer->offer_languages= $request->input('offer_languages');
        $offer->offer_salary= $request->input('offer_salary');
        $offer->offer_sector= $request->input('offer_sector');
        $offer->offer_city= $request->input('offer_city');

        if ($request->offer_pic){

            $expo= explode(',', $request->offer_pic);
            $decode= base64_decode($expo[1]);
            if (str_contains($expo[0],'jpg')){
                $exten='jpg';
            }elseif (str_contains($expo[0],'png')){
                $exten='png';
            }elseif (str_contains($expo[0],'jpeg')){
                $exten='jpeg';
            }
            $filename=str_random().'.'.$exten;
            $path=public_path()."/img/".$filename;
            file_put_contents($path, $decode);
            $offer->offer_pic=$filename;
        }



            $offer->save();
            return Response()->json(['etat'=>true ]) ;
        }
        
        return Response()->json(['etat'=>false ]) ;
    }

    public function deleteOffer($id){

        $offer=Offers_employer::find($id);
        $offer->delete();

        return Response()->json(['etat'=>true ]) ;
    }

//-----------------------------------------update-setting---employer---
    public function getSetting(){
        $empls=Auth::user()->users_employer;
          $usere=Auth::user();
          return [$usere,$empls];

    }

    public function updateSetting(Request $request){

        $validator = Validator::make($request->all(), [
            'company_name' => 'required|min:4',
            'company_sector' => 'required',
        ]);
        if (  ($request->input('password')) !== '' && !$validator->fails())
        {
            $usere=Auth::user();
            $empl= new Users_employer();
            $usere->first_name= $request->input('first_name');
            $usere->last_name= $request->input('last_name');
            $usere->email= $request->input('email');
            $usere->gender= $request->input('gender');
            $usere->phone= $request->input('phone');
            $usere->address= $request->input('address');
            $usere->city= $request->input('city');

            $usere->password = Hash::make($request->input('password'));

            $usere->save();
            $empl->where('user_id',Auth::id())->update(['company_name'=> $request->input('company_name'),
                'company_sector'=> $request->input('company_sector')
                ]);
            return Response()->json( ['etat'=>true ,'empl'=> $empl ]) ;
            }
        return Response()->json( ['etat'=>false ]) ;
    }


    //-----------------------------------------update-setting-- candidate---
    public function getSettc(){
        $cand=  Auth::user()->users_candidat;
          $userc=Auth::user();
          return [$userc,$cand];

    }

    public function updateSettc(Request $request){


        if (  ($request->input('password')) !== '')
        {
            $userc=Auth::user();
            $cand= new Users_candidat();
            $userc->first_name= $request->input('first_name');
            $userc->last_name= $request->input('last_name');
            $userc->email= $request->input('email');
            $userc->gender= $request->input('gender');
            $userc->phone= $request->input('phone');
            $userc->address= $request->input('address');
            $userc->city= $request->input('city');

            $userc->password = Hash::make($request->input('password'));

            $userc->save();
            $cand->where('user_id',Auth::id())->update(['birthday'=> $request->input('birthday') ]);
            return Response()->json( ['etat'=>true ]) ;
            }
        return Response()->json( ['etat'=>false ]) ;
    }



    public function store(){

    }
    public function create(){

    }
    public function edit(){

    }
    public function update(){

    }

    public function show(){


    }

    public function destroy(){

    }



}//end class
