<?php


if(!function_exists('styledir')){
  function styledir(){
    return app()->getLocale()=='ar'?'rtl':'ltr';
  }
}

if(!function_exists('setting')){
  function setting(){
    return App\Setting::find(1);
  }
}
