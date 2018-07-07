<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


use App\Offers_employer;
use App\User;
use App\Users_employer;


Route::get('/', function () {
    $offers=Offers_employer::orderBy('created_at','desc')->limit(3)->get();
    return  view('view_mjob.Mjob_pages.index',compact('offers' ));
});

Route::get('/contact_us', function () {return view('view_mjob.Mjob_pages.contact_us');});

Route::get('/all_offers', function () {
    $offers=Offers_employer::orderBy('created_at','desc')->get();
    $loffers=Offers_employer::orderBy('created_at','desc')->limit(3)->get();
    return view('view_mjob.Mjob_pages.all_offers',compact('offers','loffers' ));});

Route::get('/about_us', function () {return view('view_mjob.Mjob_pages.about_us');});


Route::get('/show_offer/{id}', function ($id) {

    $offer=Offers_employer::find($id);

    return view('view_mjob.Mjob_pages.show_offer',compact('offer'));});

Route::get('/list_company', function () {return view('view_mjob.Mjob_pages.list_company');});
Route::get('/adoffer', function () {return view('view_mjob.Mjob_pages.adoffer');});
Route::get('/mj_register', 'mjobController@index');

Route::get('/mj_login', 'mjobController@index');

Route::get('/employer', 'mjobController@index');

Route::get('/candidat', 'mjobController@index');
Route::get('/admin_jb', 'mjobController@index');


Auth::routes();
Route::resource('/mjobs','mjobController');


Route::post('/empl', 'mjobController@emplRegister');
Route::post('/cand', 'mjobController@candRegister');

Route::post('/search', 'SearchController@searchOffer');
Route::get('/city_search/{key}', 'SearchController@searchCity');
Route::get('/sector_sr/{key}', 'SearchController@searchSector');

//------------add--offer------

Route::get('getOffer/{id}','mjobController@getOffer');
Route::post('addOffer','mjobController@addOffer');
Route::put('updateOffer','mjobController@updateOffer');
Route::delete('deleteOffer/{id}','mjobController@deleteOffer');

//-----------update  settings-employer-----

Route::get('getSetting/{id}','mjobController@getSetting');
Route::put('updateSetting','mjobController@updateSetting');

Route::post('svOffer','mjobController@svOffer');

//-----------update  settings-candidate-----

Route::get('getSettc/{id}','mjobController@getSettc');
Route::put('updateSettc','mjobController@updateSettc');

//-----------update  summary-----

Route::get('getResume/{id}','mjobController@getResume');
Route::put('updateResume','mjobController@updateResume');

//------------experience-----

Route::get('getExper/{id}','mjobController@getExper');
Route::post('addExper','mjobController@addExper');
Route::put('updateExper','mjobController@updateExper');
Route::delete('deleteExper/{id}','mjobController@deleteExper');

//------------education-----

Route::get('getEduc/{id}','mjobController@getEduc');
Route::post('addEduc','mjobController@addEduc');
Route::put('updateEduc','mjobController@updateEduc');
Route::delete('deleteEduc/{id}','mjobController@deleteEduc');

//------------competence-----

Route::get('getCompet/{id}','mjobController@getCompet');
Route::post('addCompet','mjobController@addCompet');
Route::put('updateCompet','mjobController@updateCompet');
Route::delete('deleteCompet/{id}','mjobController@deleteCompet');

//------------language-----

Route::get('getLang/{id}','mjobController@getLang');
Route::post('addLang','mjobController@addLang');
Route::put('updateLang','mjobController@updateLang');
Route::delete('deleteLang/{id}','mjobController@deleteLang');

//------------Hobbies-----

Route::get('getHobbie/{id}','mjobController@getHobbie');
Route::post('addHobbie','mjobController@addHobbie');
Route::put('updateHobbie','mjobController@updateHobbie');
Route::delete('deleteHobbie/{id}','mjobController@deleteHobbie');
