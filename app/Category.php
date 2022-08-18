<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
      'name',
      'name_ar',
    ];

    public function getname(){
      return app()->getLocale()=='ar'?$this->name_ar:$this->name;
    }

    public function products(){
      return $this->hasMany(Product::class,'category_id');
    }
}
