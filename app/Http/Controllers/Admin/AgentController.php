<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use Image;
use Validator;
use Storage;

class AgentController extends Controller
{

  public function agents(){
    $agents=Agent::all();
    return view('admin.pages.agents',compact('agents'));
  }


  public function addagent(Request $request){

    $rules = [
          'image'            =>'required|image|mimes:jpeg,png,jpg,gif,svg',
          'name'             =>'required',
          'name_ar'          =>'required',
          'location'         =>'required',
          'location_ar'      =>'required',
          'details'          =>'required',
          'details_ar'       =>'required',
            ];

    $messages = [
      'image.required'          =>'Please choose an image',
      'image.image'             =>'Please choose correct image type',
      'name.required'           =>'Please enter agent name in English',
      'name_ar.required'        =>'Please enter agent name in Arabic',
      'location.required'       =>'Please enter agent location in English',
      'location_ar.required'    =>'Please enter agent location in Arabic',
      'details.required'        =>'Please enter agent details in English',
      'details_ar.required'     =>'Please enter agent details in Arabic',
              ];

    Validator::make(request()->all(),$rules,$messages)->validate();

    //Store Image
    $img = Image::make($request->image);
    $image_name="agent".time().'.png';
    $path = public_path('storage/images/agents/'.$image_name);
    $img->save($path);

    Agent::create([
      'image'=>$image_name,
      'name'=>$request->name,
      'name_ar'=>$request->name_ar,
      'location'=>$request->location,
      'location_ar'=>$request->location_ar,
      'details'=>$request->details,
      'details_ar'=>$request->details_ar,
    ]);

    session()->flash('success','Agent has been added successfully');
    return redirect()->route('agents');

  }


  public function updateagent($id,Request $request){

      $rules = [
            'image'            =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name'             =>'required',
            'name_ar'          =>'required',
            'location'         =>'required',
            'location_ar'      =>'required',
            'details'          =>'required',
            'details_ar'       =>'required',
              ];

      $messages = [
        'image.image'             =>'Please choose correct image type',
        'name.required'           =>'Please enter agent name in English',
        'name_ar.required'        =>'Please enter agent name in Arabic',
        'location.required'       =>'Please enter agent location in English',
        'location_ar.required'    =>'Please enter agent location in Arabic',
        'details.required'        =>'Please enter agent details in English',
        'details_ar.required'     =>'Please enter agent details in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      $agent=Agent::find($id);

      if($request->image){
        //Store Image
        $img = Image::make($request->image);
        $image_name="agent".time().'.png';
        $path = public_path('storage/images/agents/'.$image_name);
        $img->save($path);
        //Delete Old
        Storage::delete('public/images/agents/'.$agent->image);

        $agent->update([
          'image'=>$image_name,
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
          'location'=>$request->location,
          'location_ar'=>$request->location_ar,
          'details'=>$request->details,
          'details_ar'=>$request->details_ar,
        ]);
      }else {
        $agent->update([
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
          'location'=>$request->location,
          'location_ar'=>$request->location_ar,
          'details'=>$request->details,
          'details_ar'=>$request->details_ar,
        ]);
      }

      session()->flash('success','Agent has been updated successfully');
      return redirect()->route('agents');
  }

  public function deleteagent($id){
    $agent=Agent::find($id);
    //Delete Old
    Storage::delete('public/images/agents/'.$agent->image);
    $agent->delete();

    session()->flash('success','Agent has been deleted successfully');
    return redirect()->route('agents');
  }
}
