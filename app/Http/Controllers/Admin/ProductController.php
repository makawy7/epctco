<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Image;
use Validator;
use Storage;

class ProductController extends Controller
{
    public function products(){
      $products=Product::all();
      $categories=Category::all();
      return view('admin.pages.products',compact('products','categories'));
    }

    public function addcategory(Request $request){

      $rules = [
            'name'        =>'required',
            'name_ar'     =>'required',
              ];

      $messages = [
        'name.required'          =>'Please enter category name in English',
        'name_ar.required'       =>'Please enter category name in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      Category::create([
        'name'=>$request->name,
        'name_ar'=>$request->name_ar,
      ]);

      session()->flash('success','Category has been added successfully');
      return redirect()->route('products');

    }


    public function updatecategory($id,Request $request){

        $rules = [
              'name'        =>'required',
              'name_ar'     =>'required',
                ];

        $messages = [
          'name.required'          =>'Please enter category name in English',
          'name_ar.required'       =>'Please enter category name in Arabic',
                  ];

        Validator::make(request()->all(),$rules,$messages)->validate();
        $category=Category::find($id);

        $category->update([
          'name'=>$request->name,
          'name_ar'=>$request->name_ar,
        ]);

        session()->flash('success','Category has been updated successfully');
        return redirect()->route('products');

    }
    public function deletecategory($id){

      $category=Category::find($id);
      $category->delete();

      session()->flash('success','Category has been deleted successfully');
      return redirect()->route('products');
    }


    public function addproduct(Request $request){

      $rules = [
            'image'              =>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id'        =>'required',
            'title'              =>'required',
            'title_ar'           =>'required',
              ];

      $messages = [
        'image.required'                =>'Please choose an image',
        'image.image'                   =>'Please choose correct image type',
        'category_id.required'          =>'Please choose the product category',
        'title.required'                =>'Please enter the product title in English',
        'title_ar.required'             =>'Please enter the product title in Arabic',
                ];

      Validator::make(request()->all(),$rules,$messages)->validate();

      //Store Image
      $img = Image::make($request->image);
      $image_name="product".time().'.png';
      $path = public_path('storage/images/products/'.$image_name);
      $img->save($path);

      Product::create([
        'image'=>$image_name,
        'category_id'=>$request->category_id,
        'title'=>$request->title,
        'title_ar'=>$request->title_ar,
      ]);

      session()->flash('success','Product has been added successfully');
      return redirect()->route('products');

    }

    public function updateproduct($id,Request $request){
        $rules = [
              'image'              =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
              'category_id'        =>'required',
              'title'              =>'required',
              'title_ar'           =>'required',
                ];

        $messages = [
          'image.required'                =>'Please choose an image',
          'image.image'                   =>'Please choose correct image type',
          'category_id.required'          =>'Please choose the product category',
          'title.required'                =>'Please enter the product title in English',
          'title_ar.required'             =>'Please enter the product title in Arabic',
                  ];

        Validator::make(request()->all(),$rules,$messages)->validate();

        $product=Product::find($id);

        if($request->image){
          //Store Image
          $img = Image::make($request->image);
          $image_name="product".time().'.png';
          $path = public_path('storage/images/products/'.$image_name);
          $img->save($path);
          //Delete Old
          Storage::delete('public/images/products/'.$product->image);

          $product->update([
            'image'=>$image_name,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
          ]);
        }else {
          $product->update([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
          ]);
        }

        session()->flash('success','Product has been updated successfully');
        return redirect()->route('products');
    }

    public function deleteproduct($id){

      $product=Product::find($id);
      Storage::delete('public/images/products/'.$product->image);
      $product->delete();

      session()->flash('success','Product has been deleted successfully');
      return redirect()->route('products');
    }

}
