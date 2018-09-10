<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use App\User;
Use App\Profile;
use Session;
use Validator;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( request()->has("expirationDate")){
          
            $profile = Profile::where("expirationDate", request("expirationDate"))->paginate(10)->appends("expirationDate", request("expirationDate"));
  
          } else if ( request()->has("sort")){
              $profile = Profile::orderBy("surname", request("sort"))->paginate(10)->appends("sort", request("sort"));
          
          } else{
              $profile = Profile::paginate(10);
          }

        $user = User::all();
        
        return view("profile.index", [
        "profile"=>$profile,
        "user"=> $user
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile= Profile::all();

       return view ("profile.create", [ 
           "profile"=> $profile
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'surname.required' => 'Neįrašyta nario pavardė',
            'name.required' => 'Neįrašytas nario vardas',
            'phone.required' => 'Telefonas turi būti įvestas',
            'birthday.required' => 'Gimtadienis turi būti įvestas',
            'address.required' => 'Adresas turi būti įvestas'
        ];
    // Patikriname uzklausos duomenis
    $validatedProfile = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], $messages);

    $profile= new Profile;

    $profile->name = $request ->name;
    $profile->surname = $request ->surname;
    $profile->birthday = $request ->birthday;
    $profile->phone = $request ->phone;
    $profile->address = $request ->address;
    $profile->expirationDate = '1770-07-07';
    
    $profile->save();

    Session::flash( 'status', 'Anketa sėkmingai užpildyta' );
    return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile= Profile::find($id);

       return view ("profile.edit", [ 
           "profile"=> $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'surname.required' => 'Neįrašyta nario pavardė',
            'name.required' => 'Neįrašytas nario vardas',
            'phone.required' => 'Telefonas turi būti įvestas',
            'birthday.required' => 'Gimtadienis turi būti įvestas',
            'address.required' => 'Adresas turi būti įvestas'
        ];
    // Patikriname uzklausos duomenis
    $validatedProfile = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], $messages);

    $profile= Profile::find($id);

    $profile->name = $request ->name;
    $profile->surname = $request ->surname;
    $profile->birthday = $request ->birthday;
    $profile->phone = $request ->phone;
    $profile->address = $request ->address;
        
    $profile->save();

    Session::flash( 'status', 'Anketa sėkmingai atnaujinta' );
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        // Susikuriu sesijos pranesima
		Session::flash( 'status', 'Nario anketa sėkmingai ištrinta ' );
        return redirect()->back();
    }

    public function userCreate($id)
    {
       
        $userbyid = User::find($id);

        $messages = [
            'surname.required' => 'Neįrašyta nario pavardė',
            'name.required' => 'Neįrašytas nario vardas',
            'phone.required' => 'Telefonas turi būti įvestas',
            'birthday.required' => 'Gimtadienis turi būti įvestas',
            'address.required' => 'Adresas turi būti įvestas'
        ];
    // Patikriname uzklausos duomenis
    $validatedProfile = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], $messages);

    $profile= new Profile;

    $profile->name = $request ->name;
    $profile->surname = $request ->surname;
    $profile->birthday = $request ->birthday;
    $profile->phone = $request ->phone;
    $profile->user_id = $userbyid;
    $profile->address = $request ->address;
    $profile->expirationDate = '1770-07-07';
    
    $profile->save();

    Session::flash( 'status', 'Anketa sėkmingai užpildyta' );
    return redirect()->back();
    }
}
