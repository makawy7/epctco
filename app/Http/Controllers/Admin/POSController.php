<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Point;
use Image;
use Validator;
use Storage;

class POSController extends Controller
{
    public function pos(){
      $points=Point::all();
      return view('admin.pages.pos',compact('points'));
    }


    public function addpos(Request $request){

      $rules = [
            'name'           =>'required',
            'name_ar'        =>'required',
            'phone'          =>'required',
            'url'            =>'required'
              ];

      $messages = [
        'name.required'           =>'Please enter POS name in English',
        'name_ar.required'        =>'Please enter POS name in Arabic',
        'phone.required'         =>'Please enter POS phone in English',
        'url.required'           =>'Please enter POS URL',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      Point::create([
        'name'=>$request->name,
        'name_ar'=>$request->name_ar,
        'phone'=>$request->phone,
        'url'=>$request->url,
      ]);

      session()->flash('success','POS has been added successfully');
      return redirect()->route('pos');
    }


    public function updatepos($id,Request $request){

        $rules = [
              'name'           =>'required',
              'name_ar'        =>'required',
              'phone'          =>'required',
              'url'            =>'required'
                ];

        $messages = [
          'name.required'           =>'Please enter POS name in English',
          'name_ar.required'        =>'Please enter POS name in Arabic',
          'phone.required'         =>'Please enter POS phone in English',
          'url.required'           =>'Please enter POS URL',
                  ];

        Validator::make(request()->all(),$rules,$messages)->validate();

        Point::find($id)->update([
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
          'phone'=>$request->phone,
          'url'=>$request->url,
        ]);

        session()->flash('success','POS has been updated successfully');
        return redirect()->route('pos');
    }


    public function deletepos($id){
      
        Point::find($id)->delete();
        session()->flash('success','POS has been deleted successfully');
        return redirect()->route('pos');
    }
}
