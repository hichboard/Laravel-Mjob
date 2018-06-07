<?php

namespace App\Http\Controllers;

use App\Http\Requests\employerRequest;
use App\Http\Requests\Offeremployer;
use App\Offers_employer;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_mjob.Mjob_pages.employer');
    }








        public function employerLogin(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|E-Mail',
            'password' => 'required|min:6|max:8',
        ]);
        $credentials =['password'=>$request->password,'company_email'=>$request->email, ];


           // $errors=$e->valodator->errors()->getMessages();

        if (Auth::guard('employer')->attempt($credentials,$request->remember)) {
            // Authentication passed...
   //          return redirect()->intended('employer');
            return redirect('employer');
        }
        //return view('view_mjob.Mjob_pages.index');
        return  redirect()->back()->withInput($request->only('email','remember'));
    }








    //
}
