<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
      'image',
      'title',
      'title_ar',
      'details',
      'details_ar',
    ];

    public function gettitle(){
      return app()->getLocale()=='ar'?$this->title_ar:$this->title;
    }
    public function getdetails(){
      return app()->getLocale()=='ar'?$this->details_ar:$this->details;
    }


}
