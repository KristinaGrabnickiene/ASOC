<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Profile;
use Session;
use Validator;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $loggeduser =  Auth::user()->id;
        $userbyid = User::find($loggeduser);

        return view("home", [ 
        "getuserbyid"=>$userbyid,
         "getloggeduser" => $loggeduser
         ] );
       
    }
    
    public function search(Request $request){
  
    // return $request->input('name'); - kaip atrodo patikrinimas 
    $name= $request->input('name');
    $surname= $request->input('surname');
    $profileResults = Profile::where('name', 'LIKE', $name)->where('surname', 'LIKE', $surname)->get(); // negera uzklausa, nes spausdina viska, ir ismeta erora kai paspaudi daug kartu ant puslapio

    //return $profileResult; - kaip atrodo patikrinimas ka gaunu
    return view("search", [
        'profileResults'=>$profileResults,
    ]);
    exit();
}
}