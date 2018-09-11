<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Profile;


class Profile extends Model
{
    protected $table = "profile";

    public function user() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    } 
    
}
