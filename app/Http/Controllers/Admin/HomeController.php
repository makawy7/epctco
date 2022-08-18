<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Setting;
use Image;
use Validator;
use Storage;

class HomeController extends Controller
{

      public function index(){
        $sliders=Slider::all();
        return view('admin.index',compact('sliders'));
      }

//////////////////////////////////////SLIDERS///////////////////////////////////////////
    public function addslider(Request $request){
        $rules = [
              'slider'    =>'required|image|mimes:jpeg,png,jpg,gif,svg'
                ];

        $messages = [
          'slider.required'   =>'Please choose an image',
          'slider.image'      =>'Please choose correct image type',
                  ];

        Validator::make(request()->all(),$rules,$messages)->validate();


        //Store Image
        $img = Image::make($request->slider);
        $image_name="slider".time().'.png';
        $path = public_path('storage/images/sliders/'.$image_name);
        $img->save($path);

        $slider=Slider::create([
          'image'=>$image_name,
        ]);

        if($slider){
          session()->flash('success','Slider has been added successfully');
          return redirect()->route('admin.index');
        }


    }

    public function editslider($id,Request $request){

      $rules = [
            'slider'    =>'required|image|mimes:jpeg,png,jpg,gif,svg'
              ];

      $messages = [
        'slider.required'   =>'Please choose an image',
        'slider.image'      =>'Please choose correct image type',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      $slider=Slider::find($id);

      //Store Image
      $img = Image::make($request->slider);
      $image_name="slider".time().'.png';
      $path = public_path('storage/images/sliders/'.$image_name);
      $img->save($path);
      //Delete Old Slider
      Storage::delete('public/images/sliders/'.$slider->image);

      $update=$slider->update([
        'image'=>$image_name,
      ]);

      if($update){
        session()->flash('success','Slider image has been updated successfully');
        return redirect()->route('admin.index');
      }

    }

    public function destroyslider($id){

      $slider=Slider::find($id);
      Storage::delete('public/images/sliders/'.$slider->image);
      $delete=$slider->delete();
      if($slider){
        session()->flash('success','Slider has been deleted successfully');
        return redirect()->route('admin.index');
      }

    }


//////////////////////////////////////ABOUT SECTION///////////////////////////////////////////

  public function updateabout(Request $request){

    $rules = [
          'Image'    =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
          'content'    =>'required',
          'content_ar'    =>'required'
            ];

    $messages = [
      'slider.image'      =>'Please choose correct image type',
      'content.required'   =>'Please enter the content in english',
      'content_ar.required'   =>'Please enter the content in arabic',
              ];

    Validator::make(request()->all(),$rules,$messages)->validate();

    $setting=Setting::find(1);

    if($request->image){

      //Store Image
      $img = Image::make($request->image);
      $image_name="home".time().'.png';
      $path = public_path('storage/images/'.$image_name);
      $img->save($path);
      //Delete Old Slider
      Storage::delete('public/images/'.$setting->home_image);

      $setting->update([
        'home_image'=>$image_name,
        'home_content'=>$request->content,
        'home_content_ar'=>$request->content_ar
      ]);

    }else {
      $setting->update([
        'home_content'=>$request->content,
        'home_content_ar'=>$request->content_ar
      ]);
    }

    session()->flash('success','About Section has been updated successfully');
    return redirect()->route('admin.index');

  }


}
