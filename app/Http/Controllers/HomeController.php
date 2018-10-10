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
    


    public function searchPost(Request $request) {
        $name= $request->input('name');
        $surname= $request->input('surname');
        if(isset($name) || isset($surname)){
        $profileResults = Profile::where('name', 'LIKE', '%' . $name . '%');
        if($surname != "") {
            $profileResults = $profileResults->Where('surname', 'LIKE', '%' . $surname . '%');
          
        }
        $profileResults = $profileResults->get();
    } else{
        $profileResults =[];
    }

    
       
        
        return view("search", [
            'name' => $name,
            'surname' => $surname,
            'profileResults'=>$profileResults,
        ]);
    }

}