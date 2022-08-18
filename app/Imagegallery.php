<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagegallery extends Model
{
    protected $fillable=[
      'image',
      'title',
      'title_ar',
      'des',
      'des_ar',
    ];

    public function gettitle(){
      return app()->getLocale()=='ar'?$this->title_ar:$this->title;
    }

    public function getdes(){
      return app()->getLocale()=='ar'?$this->des_ar:$this->des;
    }

    public function date(){
      $created = \Carbon\Carbon::parse($this->created_at);
      return $created->format('M d, Y');
    }

}
