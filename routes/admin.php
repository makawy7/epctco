<?php



Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){


  //Home Page
  //Sliders
  Route::get('/','HomeController@index')->name('admin.index');
  Route::post('/addslider','HomeController@addslider')->name('addslider');
  Route::put('/editslider/{id}','HomeController@editslider')->name('editslider');
  Route::delete('/destroyslider/{id}','HomeController@destroyslider')->name('destroyslider');
  //About Section
  Route::post('/updateabout','HomeController@updateabout')->name('updateabout');


  //About Page
  Route::get('/aboutpage','AboutPageController@index')->name('aboutpage.index');
  //Add Member
  Route::post('/addmember','AboutPageController@addmember')->name('addmember');
  Route::put('/updatemember/{id}','AboutPageController@updatemember')->name('updatemember');
  Route::delete('/deletemember/{id}','AboutPageController@deletemember')->name('deletemember');
  //Update About Page Content
  Route::post('/updateabout','AboutPageController@updateabout')->name('updateabout');


  //Services Page
  Route::get('/services','ServiceController@services')->name('services');
  Route::post('/addservice','ServiceController@addservice')->name('addservice');
  Route::put('/updateservice/{id}','ServiceController@updateservice')->name('updateservice');
  Route::delete('/deleteservice/{id}','ServiceController@deleteservice')->name('deleteservice');

  //Products Page
  Route::get('/products','ProductController@products')->name('products');
  //Categories
  Route::post('/addcategory','ProductController@addcategory')->name('addcategory');
  Route::put('/updatecategory/{id}','ProductController@updatecategory')->name('updatecategory');
  Route::delete('/deletecategory/{id}','ProductController@deletecategory')->name('deletecategory');
  //Products
  Route::post('/addproduct','ProductController@addproduct')->name('addproduct');
  Route::put('/updateproduct/{id}','ProductController@updateproduct')->name('updateproduct');
  Route::delete('/deleteproduct/{id}','ProductController@deleteproduct')->name('deleteproduct');


  //Agents Page
  Route::get('/agents','AgentController@agents')->name('agents');
  Route::post('/addagent','AgentController@addagent')->name('addagent');
  Route::put('/updateagent/{id}','AgentController@updateagent')->name('updateagent');
  Route::delete('/deleteagent/{id}','AgentController@deleteagent')->name('deleteagent');

  //POS
  Route::get('/pos','POSController@pos')->name('pos');
  Route::post('/addpos','POSController@addpos')->name('addpos');
  Route::put('/updatepos/{id}','POSController@updatepos')->name('updatepos');
  Route::delete('/deletepos/{id}','POSController@deletepos')->name('deletepos');

  //Gallery
  Route::get('/gallery','GalleryController@gallery')->name('gallery');
  //Images
  Route::post('/addimage','GalleryController@addimage')->name('addimage');
  Route::put('/updateimage/{id}','GalleryController@updateimage')->name('updateimage');
  Route::delete('/deleteimage/{id}','GalleryController@deleteimage')->name('deleteimage');
  //Videos
  Route::post('/addvideo','GalleryController@addvideo')->name('addvideo');
  Route::put('/updatevideo/{id}','GalleryController@updatevideo')->name('updatevideo');
  Route::delete('/deletevideo/{id}','GalleryController@deletevideo')->name('deletevideo');

  //Contact
  Route::get('/contact','ContactController@contact')->name('contact');
  Route::post('/updateadministrative','ContactController@updateadministrative')->name('updateadministrative');
  Route::post('/updatemainstore','ContactController@updatemainstore')->name('updatemainstore');

  //Main Data
  Route::get('/maindata','MainController@maindata')->name('maindata');
  Route::post('/updatefooter','MainController@updatefooter')->name('updatefooter');
  Route::post('/updatesocial','MainController@updatesocial')->name('updatesocial');
  Route::post('/updatelocation','MainController@updatelocation')->name('updatelocation');

  //Change Password
  Route::get('/changepassword','MainController@changepassword')->name('changepassword');
  Route::post('/changepassword','MainController@change_password')->name('change_password');
});
