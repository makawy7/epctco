<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Hash;
use App\Setting;

class MainController extends Controller
{
  public function maindata(){
    return view('admin.pages.maindata');
  }

  public function updatefooter(Request $request){
    $rules = [
          'des'                 =>'required',
          'des_ar'              =>'required',
          'address'             =>'required',
          'address_ar'          =>'required',
          'email'               =>'required',
          'phone'               =>'required',
            ];

    $messages = [
      'des.required'               =>'Please enter description in English',
      'des_ar.required'            =>'Please enter description in Arabic',
      'address.required'           =>'Please enter address in English',
      'address_ar.required'        =>'Please enter address in Arabic',
      'email.required'             =>'Please enter email',
      'phone.required'             =>'Please enter phone',
              ];

    Validator::make(request()->all(),$rules,$messages)->validate();

    Setting::find(1)->update([
      'contactinfo_des'=>$request->des,
      'contactinfo_des_ar'=>$request->des_ar,
      'contactinfo_address'=>$request->address,
      'contactinfo_address_ar'=>$request->address_ar,
      'contactinfo_phone'=>$request->phone,
      'contactinfo_email'=>$request->email,
    ]);

    session()->flash('success','Footer data have been updated successfully');
    return redirect()->route('maindata');
  }

  public function updatesocial(Request $request){

    Setting::find(1)->update([
      'facebook'=>$request->facebook,
      'twitter'=>$request->twitter,
      'instagram'=>$request->instagram,
      'pinterest'=>$request->pinterest,
      'linkedin'=>$request->linkedin,
    ]);

    session()->flash('success','Social links have been updated successfully');
    return redirect()->route('maindata');
  }

  public function updatelocation(Request $request){
    $rules = [
          'lat'                 =>'required',
          'lng'                 =>'required',
            ];

    Validator::make(request()->all(),$rules)->validate();

    Setting::find(1)->update([
      'lat'=>$request->lat,
      'lng'=>$request->lng,
    ]);

    session()->flash('success','Location has been updated successfully');
    return redirect()->route('maindata');
  }


///////////////////////////////////////////CHANGE PASSWORD////////////////////////////////////

public function changepassword(){
  return view('admin.pages.changepassword');
}

public function change_password(Request $request){


    $this->validate($request, [
      'old_password'  => 'required',
      'password'      => 'confirmed|different:old_password',
    ]);

    if(Hash::check($request->old_password, auth()->user()->password)) {
         auth()->user()->update([
          'password' => Hash::make($request->password)
          ]);

       $request->session()->flash('success', 'Password has been changed successfully');
    }else {
        $request->session()->flash('error', 'Old password is incorrects');
    }

    return redirect()->route('changepassword');

}

}
