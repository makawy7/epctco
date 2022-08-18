<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
      'image',
      'category_id',
      'title',
      'title_ar',
    ];

    public function category(){
      return $this->belongsTo(Category::class,'category_id');
    }
    public function gettitle(){
      return app()->getLocale()=='ar'?$this->title_ar:$this->title; 
    }
}
