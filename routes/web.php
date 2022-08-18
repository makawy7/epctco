<?php

//Locale change
Route::get('lang/{lang}',function($lang){
  if(!empty($lang)){
    ((session()->has('lang'))?session()->forget('lang'):'');
    (($lang=='ar')?session()->put('lang','ar'):session()->put('lang','en'));
  }
  return back();
})->name('lang');


Auth::routes();
Route::get('/','HomeController@index')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/services','HomeController@services')->name('servicespage');
Route::get('/products','HomeController@products')->name('productspage');
Route::get('/agents','HomeController@agents')->name('agentspage');
Route::get('/pos','HomeController@pos')->name('pospage');
Route::get('/gallery','HomeController@gallery')->name('gallerypage');
Route::get('/contact','HomeController@contact')->name('contactpage');

Route::get('/register',function(){
  return redirect()->route('login');
})->name('register');
