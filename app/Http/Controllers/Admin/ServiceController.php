<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Image;
use Validator;
use Storage;

class ServiceController extends Controller
{
  public function services(){
    $services=Service::all();
    return view('admin.pages.services',compact('services'));
  }

  public function addservice(Request $request){
    $rules = [
          'image'       =>'required|image|mimes:jpeg,png,jpg,gif,svg',
          'title'        =>'required',
          'title_ar'     =>'required',
          'details'        =>'required',
          'details_ar'     =>'required'
            ];

    $messages = [
      'image.required'          =>'Please choose an image',
      'image.image'             =>'Please choose correct image type',
      'title.required'          =>'Please enter service title in English',
      'title_ar.required'       =>'Please enter service title in Arabic',
      'details.required'        =>'Please enter service details in English',
      'details_ar.required'     =>'Please enter service details in Arabic',
              ];

    Validator::make(request()->all(),$rules,$messages)->validate();

    //Store Image
    $img = Image::make($request->image);
    $image_name="service".time().'.png';
    $path = public_path('storage/images/services/'.$image_name);
    $img->save($path);

    Service::create([
      'image'=>$image_name,
      'title'=>$request->title,
      'title_ar'=>$request->title_ar,
      'details'=>$request->details,
      'details_ar'=>$request->details_ar,
    ]);

    session()->flash('success','Service has been added successfully');
    return redirect()->route('services');

  }

  public function updateservice($id,Request $request){

    $rules = [
          'image'       =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
          'title'        =>'required',
          'title_ar'     =>'required',
          'details'        =>'required',
          'details_ar'     =>'required'
            ];

    $messages = [
      'image.image'             =>'Please choose correct image type',
      'title.required'          =>'Please enter service title in English',
      'title_ar.required'       =>'Please enter service title in Arabic',
      'details.required'        =>'Please enter service details in English',
      'details_ar.required'     =>'Please enter service details in Arabic',
              ];

    Validator::make(request()->all(),$rules,$messages)->validate();

    $service=Service::find($id);
    if($request->image){
    //Store Image
    $img = Image::make($request->image);
    $image_name="service".time().'.png';
    $path = public_path('storage/images/services/'.$image_name);
    $img->save($path);
    //Delete Old
    Storage::delete('public/images/services/'.$service->image);

    $service->update([
      'image'=>$image_name,
      'title'=>$request->title,
      'title_ar'=>$request->title_ar,
      'details'=>$request->details,
      'details_ar'=>$request->details_ar,
    ]);

  }else {
    $service->update([
      'title'=>$request->title,
      'title_ar'=>$request->title_ar,
      'details'=>$request->details,
      'details_ar'=>$request->details_ar,
    ]);
  }
    session()->flash('success','Service has been updated successfully');
    return redirect()->route('services');

  }

  public function deleteservice($id){
    $service=Service::find($id);
    //Delete Old
    Storage::delete('public/images/services/'.$service->image);
    $service->delete();

    session()->flash('success','Service has been deleted successfully');
    return redirect()->route('services');
  }
}
