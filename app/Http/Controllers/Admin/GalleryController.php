<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imagegallery;
use App\Videogallery;
use Image;
use Validator;
use Storage;

class GalleryController extends Controller
{
    public function gallery(){
      $images=Imagegallery::all();
      $videos=Videogallery::all();
      return view('admin.pages.gallery',compact('images','videos'));
    }

    public function addimage(Request $request){
      $rules = [
            'image'             =>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title'             =>'required',
            'title_ar'          =>'required',
            'des'               =>'required',
            'des_ar'            =>'required',
              ];

      $messages = [
        'image.required'          =>'Please choose an image',
        'image.image'             =>'Please choose correct image type',
        'title.required'          =>'Please enter title in English',
        'title_ar.required'       =>'Please enter title in Arabic',
        'des.required'            =>'Please enter description English',
        'des_ar.required'         =>'Please enter description Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      //Store Image
      $img = Image::make($request->image);
      $image_name="image".time().'.png';
      $path = public_path('storage/images/galleryimages/'.$image_name);
      $img->save($path);

      Imagegallery::create([
        'image'=>$image_name,
        'title'=>$request->title,
        'title_ar'=>$request->title_ar,
        'des'=>$request->des,
        'des_ar'=>$request->des_ar,
      ]);

      session()->flash('success','Image has been added successfully');
      return redirect()->route('gallery');
    }

    public function updateimage($id,Request $request){
      $rules = [
            'image'             =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'title'             =>'required',
            'title_ar'          =>'required',
            'des'               =>'required',
            'des_ar'            =>'required',
              ];

      $messages = [
        'image.image'             =>'Please choose correct image type',
        'title.required'          =>'Please enter title in English',
        'title_ar.required'       =>'Please enter title in Arabic',
        'des.required'            =>'Please enter description English',
        'des_ar.required'         =>'Please enter description Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      $image=Imagegallery::find($id);

      if($request->image){
        //Store Image
        $img = Image::make($request->image);
        $image_name="image".time().'.png';
        $path = public_path('storage/images/galleryimages/'.$image_name);
        $img->save($path);
        //Delete Old
        Storage::delete('public/images/galleryimages/'.$image->image);

        $image->update([
          'image'=>$image_name,
          'title'=>$request->title,
          'title_ar'=>$request->title_ar,
          'des'=>$request->des,
          'des_ar'=>$request->des_ar,
        ]);
      }else {
        $image->update([
          'title'=>$request->title,
          'title_ar'=>$request->title_ar,
          'des'=>$request->des,
          'des_ar'=>$request->des_ar,
        ]);
      }

      session()->flash('success','Image has been updated successfully');
      return redirect()->route('gallery');
    }

    public function deleteimage($id){
      $image=Imagegallery::find($id);
      //Delete Old
      Storage::delete('public/images/galleryimages/'.$image->image);
      $image->delete();

      session()->flash('success','Image has been deleted successfully');
      return redirect()->route('gallery');
    }




//////////////////////////////////VIDEOS///////////////////////////////////////////////////////////////

    public function addvideo(Request $request){
      $rules = [
          'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'
              ];

      $messages = [
        'video.required'          =>'Please choose a video',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      //Store Video
      $file = $request->video;
      $filename = "video".time()."_".$file->getClientOriginalName();
      $path = public_path('storage/videos/');
      $file->move($path, $filename);

      Videogallery::create([
        'video'=>$filename,
      ]);

      session()->flash('success','Video has been added successfully');
      return redirect()->route('gallery');
    }


    public function updatevideo($id,Request $request){
      $rules = [
          'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|sometimes|nullable'
              ];

      Validator::make(request()->all(),$rules)->validate();



      $video=Videogallery::find($id);

      if($request->video){
        //Store Video
        $file = $request->video;
        $filename = "video".time()."_".$file->getClientOriginalName();
        $path = public_path('storage/videos/');
        $file->move($path, $filename);
        //Delete Old
        Storage::delete('public/videos/'.$video->video);

        $video->update([
          'video'=>$filename,
        ]);

        session()->flash('success','Video has been updated successfully');
      }

      return redirect()->route('gallery');
    }

    public function deletevideo($id){
      $video=Videogallery::find($id);
      //Delete Old
      Storage::delete('public/videos/'.$video->video);
      $video->delete();
      
      session()->flash('success','Video has been deleted successfully');
      return redirect()->route('gallery');
    }

}
