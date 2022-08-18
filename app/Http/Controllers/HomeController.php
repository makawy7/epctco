<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Agent;
use App\Member;
use App\Service;
use App\Category;
use App\Point;
use App\Videogallery;
use App\Imagegallery;

class HomeController extends Controller
{

  public function index(){
    $sliders=Slider::all();
    $products=Product::take(6)->get();
    $agents=Agent::take(3)->get();
    return view('ui.index',compact('sliders','products','agents'));
  }

  public function about(){
    $members=Member::all();
    $title=app()->getLocale()=='ar'?'عن الشركة':'About Us';
    return view('ui.pages.about',compact('members','title'));
  }

  public function services(){
    $services=Service::all();
    $title=app()->getLocale()=='ar'?'الخدمات':'Our Services';
    return view('ui.pages.services',compact('services','title'));
  }

  public function products(){
    $categories=Category::all();
    $title=app()->getLocale()=='ar'?'المنتجات':'Our Products';
    return view('ui.pages.products',compact('categories','title'));
  }

  public function agents(){
    $agents=Agent::all();
    $title=app()->getLocale()=='ar'?'الوكلاء':'Our Agents';
    return view('ui.pages.agents',compact('agents','title'));
  }

  public function pos(){
    $points=Point::all();
    $title=app()->getLocale()=='ar'?'نقاط البيع':'POS';
    return view('ui.pages.pos',compact('points','title'));
  }

  public function gallery(){
    $videos=Videogallery::all();
    $images=Imagegallery::all();
    $title=app()->getLocale()=='ar'?'المعرض':'Gallery';
    return view('ui.pages.gallery',compact('videos','images','title'));

  }

  public function contact(){
    $title=app()->getLocale()=='ar'?'تواصل معنا':'Contact Us';
    return view('ui.pages.contact',compact('title'));
  }
}
