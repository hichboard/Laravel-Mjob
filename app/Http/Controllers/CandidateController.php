<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:candidate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_mjob.Mjob_pages.candidat');
    }






    //
}
