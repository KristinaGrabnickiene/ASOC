<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Profile;
use App\Document;


class Profile extends Model
{
    protected $table = "profile";

    public function user() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    } 
 
    public function documents(){
        return $this->belongsToMany('App\Document', 'profile_documents', 'profile_id', 'document_id');
}
}
