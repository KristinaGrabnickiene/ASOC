<?php

namespace App;
use App\ProfileDocument;
use App\Document;
use App\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileDocument extends Model
{
    protected $table = "profile_documents";

    public function document() {
    	return $this->hasOne('App\Document', 'id', 'document_id');
    } 
}
