<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable=[
      'name',
      'name_ar',
      'phone',
      'url',
    ];

    public function getname(){
      return app()->getLocale()=='ar'?$this->name_ar:$this->name;
    }
}
