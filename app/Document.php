<?php

namespace App;
use App\Document;
use App\Profile;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "documents";

    public function profile()
    {
        return $this->belongsToMany('App\Profile', 'profile_documents', 'document_id', 'profile_id');
}
}
