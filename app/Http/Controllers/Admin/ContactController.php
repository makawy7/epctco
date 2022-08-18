<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Validator;

class ContactController extends Controller
{
    public function contact(){
      return view('admin.pages.contact');
    }


    public function updateadministrative(Request $request){
      $rules = [
            'address'             =>'required',
            'address_ar'          =>'required',
            'emails'              =>'required',
            'phones'              =>'required',
              ];

      $messages = [
        'address.required'           =>'Please enter address in English',
        'address_ar.required'        =>'Please enter address in Arabic',
        'emails.required'            =>'Please enter emails',
        'phones.required'            =>'Please enter phones',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      Setting::find(1)->update([
        'adminoffice_address'=>$request->address,
        'adminoffice_address_ar'=>$request->address_ar,
        'adminoffice_phone'=>$request->phones,
        'adminoffice_email'=>$request->emails,
      ]);

      session()->flash('success','Administrative office data have been updated successfully');
      return redirect()->route('contact');
    }


    public function updatemainstore(Request $request){
        $rules = [
              'address'             =>'required',
              'address_ar'          =>'required',
              'emails'              =>'required',
              'phones'              =>'required',
                ];

        $messages = [
          'address.required'           =>'Please enter address in English',
          'address_ar.required'        =>'Please enter address in Arabic',
          'emails.required'            =>'Please enter emails',
          'phones.required'            =>'Please enter phones',
                  ];

        Validator::make(request()->all(),$rules,$messages)->validate();

        Setting::find(1)->update([
          'mainstore_address'=>$request->address,
          'mainstore_address_ar'=>$request->address_ar,
          'mainstore_phone'=>$request->phones,
          'mainstore_email'=>$request->emails,
        ]);

        session()->flash('success','Main store data have been updated successfully');
        return redirect()->route('contact');
    }
}
