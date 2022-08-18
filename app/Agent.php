<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable=[
      'image',
      'name',
      'name_ar',
      'location',
      'location_ar',
      'details',
      'details_ar',
    ];

    public function getname(){
      return app()->getLocale()=='ar'?$this->name_ar:$this->name;
    }
    public function getlocation(){
      return app()->getLocale()=='ar'?$this->location_ar:$this->location;
    }
    public function getdetails(){
      return app()->getLocale()=='ar'?$this->details_ar:$this->details;
    }
    
}
