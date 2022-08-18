<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
      'image',
      'name',
      'name_ar',
      'role',
      'role_ar',
      'des',
      'des_ar',
      'facebook',
      'instagram',
      'linkedin',
    ];

    public function getname(){
      return app()->getLocale()=='ar'?$this->name_ar:$this->name;
    }
    public function getrole(){
      return app()->getLocale()=='ar'?$this->role_ar:$this->role;
    }
    public function getdes(){
      return app()->getLocale()=='ar'?$this->des_ar:$this->des;
    }

}
