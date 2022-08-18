<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Setting;
use Validator;
use Image;
use Storage;

class AboutPageController extends Controller
{

    public function index()
    {
        $members=Member::all();
        return view('admin.pages.aboutpage',compact('members'));
    }

    public function addmember(Request $request){
      $rules = [
            'image'       =>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name'        =>'required',
            'name_ar'     =>'required',
            'role'        =>'required',
            'role_ar'     =>'required'
              ];

      $messages = [
        'image.required'      =>'Please choose an image',
        'image.image'         =>'Please choose correct image type',
        'name.required'       =>'Please enter memebr name in English',
        'name_ar.required'    =>'Please enter memebr name in Arabic',
        'role.required'       =>'Please enter memebr role in English',
        'role_ar.required'    =>'Please enter memebr role in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();


      //Store Image
      $img = Image::make($request->image);
      $image_name="member".time().'.png';
      $path = public_path('storage/images/members/'.$image_name);
      $img->save($path);

      Member::create([
        'image'=>$image_name,
        'name'=>$request->name,
        'name_ar'=>$request->name_ar,
        'role'=>$request->role,
        'role_ar'=>$request->role_ar,
        'des'=>$request->des,
        'des_ar'=>$request->des_ar,
        'facebook'=>$request->facebook,
        'instagram'=>$request->instagram,
        'linkedin'=>$request->linkedin,
      ]);

      session()->flash('success','Member has been added successfully');
      return redirect()->route('aboutpage.index');
    }


    public function updatemember($id,Request $request){
      $rules = [
            'image'       =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name'        =>'required',
            'name_ar'     =>'required',
            'role'        =>'required',
            'role_ar'     =>'required'
              ];

      $messages = [
        'image.required'      =>'Please choose an image',
        'image.image'         =>'Please choose correct image type',
        'name.required'       =>'Please enter memebr name in English',
        'name_ar.required'    =>'Please enter memebr name in Arabic',
        'role.required'       =>'Please enter memebr role in English',
        'role_ar.required'    =>'Please enter memebr role in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      $member=Member::find($id);

      if($request->image){
        //Store Image
        $img = Image::make($request->image);
        $image_name="member".time().'.png';
        $path = public_path('storage/images/members/'.$image_name);
        $img->save($path);
        //Delete Old
        Storage::delete('public/images/members/'.$member->image);

        $member->update([
          'image'=>$image_name,
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
          'role'=>$request->role,
          'role_ar'=>$request->role_ar,
          'des'=>$request->des,
          'des_ar'=>$request->des_ar,
          'facebook'=>$request->facebook,
          'instagram'=>$request->instagram,
          'linkedin'=>$request->linkedin,
        ]);

      } else {
        $member->update([
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
          'role'=>$request->role,
          'role_ar'=>$request->role_ar,
          'des'=>$request->des,
          'des_ar'=>$request->des_ar,
          'facebook'=>$request->facebook,
          'instagram'=>$request->instagram,
          'linkedin'=>$request->linkedin,
        ]);
      }

      session()->flash('success','Member has been updated successfully');
      return redirect()->route('aboutpage.index');
    }

    public function deletemember($id){

      $member=Member::find($id);
      //Delete Member Image
      Storage::delete('public/images/members/'.$member->image);
      $member->delete();

      session()->flash('success','Member has been deleted successfully');
      return redirect()->route('aboutpage.index');

    }


    public function updateabout(Request $request){
      $rules = [
            'image'       =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'about'        =>'required',
            'about_ar'     =>'required',
            'vision'        =>'required',
            'vision_ar'     =>'required',
            'mission'        =>'required',
            'mission_ar'     =>'required',
              ];

      $messages = [
        'image.required'        =>'Please choose an image',
        'image.image'           =>'Please choose correct image type',
        'about.required'        =>'Please enter about content in English',
        'about_ar.required'     =>'Please enter about content in Arabic',
        'vision.required'       =>'Please enter vision in English',
        'vision_ar.required'    =>'Please enter vision in Arabic',
        'mission.required'      =>'Please enter mission in English',
        'mission_ar.required'   =>'Please enter mission in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      $setting=Setting::find(1);

      if($request->image){
        //Store Image
        $img = Image::make($request->image);
        $image_name="about".time().'.png';
        $path = public_path('storage/images/'.$image_name);
        $img->save($path);
        //Delete Old
        Storage::delete('public/images/'.$setting->about_image);

        $setting->update([
          'about_image'=>$image_name,
          'about_content'=>$request->about,
          'about_content_ar'=>$request->about_ar,
          'about_vision'=>$request->vision,
          'about_vision_ar'=>$request->vision_ar,
          'about_mission'=>$request->mission,
          'about_mission_ar'=>$request->mission_ar,
        ]);

      } else {
        $setting->update([
          'about_content'=>$request->about,
          'about_content_ar'=>$request->about_ar,
          'about_vision'=>$request->vision,
          'about_vision_ar'=>$request->vision_ar,
          'about_mission'=>$request->mission,
          'about_mission_ar'=>$request->mission_ar,
        ]);
      }

      session()->flash('success','About page content has been updated successfully');
      return redirect()->route('aboutpage.index');
    }

}
