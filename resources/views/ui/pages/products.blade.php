@extends('ui.layout.layout')


@section('content')


 <!-- BANNER -->
 <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
   <div class="content-wrap pos-relative">
     <div class="d-flex justify-content-center bd-highlight mb-3">
       <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.products.products')}}</div>
     </div>
     <div class="d-flex justify-content-center bd-highlight mb-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb ">
           <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.products.home')}}</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{__('ui.products.products')}}</li>
         </ol>
       </nav>
       </div>
   </div>
 </div>

 <!-- PORTFOLIO -->
 <div class="section">
   <div class="content-wrap">
     <div class="container">

       <div class="row">
         <div class="col-sm-12 col-md-12">
           <nav class="navfilter">
             <ul class="portfolio_filter">
               <li><a href="" class="active" data-filter="*">{{__('ui.products.all')}}</a></li>
               @foreach($categories as $category)
               <li><a href="" data-filter=".cat_{{$category->id}}">{{$category->getname()}}</a></li>
               @endforeach
             </ul>
           </nav>
         </div>
       </div>

       <div class="row popup-gallery gutter-5 grid-v1">
         <div class="grid-sizer-v1"></div>
         <div class="gutter-sizer-v1"></div>
         @foreach($categories as $category)
          @foreach($category->products as $product)
            <div class="col-sm-6 col-md-4 grid-item-v1 cat_{{$category->id}}">
              <div class="box-gallery">
                <a href="{{url('storage/images/products/'.$product->image)}}" title="{{$product->gettitle()}}">
                  <img src="{{url('storage/images/products/'.$product->image)}}" alt="" class="img-fluid">
                  <div class="project-info">
                    <div class="project-icon">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
         @endforeach
       </div>

     </div>
   </div>
 </div>
@include('ui.layout.cta')
@endsection
