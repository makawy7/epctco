@extends('ui.layout.layout')


@section('content')


 <!-- BANNER -->
   <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
       <div class="content-wrap pos-relative">
           <div class="d-flex justify-content-center bd-highlight mb-3">
               <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.gallery.gallery')}}</div>
           </div>
           <div class="d-flex justify-content-center bd-highlight mb-3">
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb ">
                       <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.gallery.home')}}</a></li>
                       <li class="breadcrumb-item active" aria-current="page">{{__('ui.gallery.gallery')}}</li>
                   </ol>
               </nav>
           </div>
       </div>
   </div>

 <!-- OUR ARTICLES -->
 <div class="">
   <div class="content-wrap">

           <!--Images Gallery-->
     <div class="container">

               <h1 style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">{{__('ui.gallery.imagesgallery')}}</h1>
               <hr />
               <br />

       <div class="row mt-4">


        @foreach($images as $image)
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-5">
            <div class="rs-news-1 h-100">
              <div class="media">
                <a href="">
                  <img src="{{url('storage/images/galleryimages/'.$image->image)}}" alt="" class="img-fluid">
                </a>
              </div>
              <div class="body">
                <div class="title"><a href="">{{$image->gettitle()}}</a></div>
                <div class="meta-date">{{$image->date()}}</div>
                <p>{!!nl2br($image->getdes())!!}</p>
              </div>
            </div>
          </div>
        @endforeach


       </div>

     </div>

           <br />
           <br />

           <!--Videos Gallery-->
           <div class="container">

               <h1 style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">{{__('ui.gallery.videosgallery')}}</h1>
               <hr />
               <br />

               <div class="row mt-4">
                 @foreach($videos as $video)
                   <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-5">
                       <video width="100%" controls>
                           <source src="{{url('storage/videos/'.$video->video)}}" type="video/mp4">
                           <source src="{{url('storage/videos/'.$video->video)}}" type="video/ogg">
                           Your browser does not support the video tag.
                       </video>
                   </div>
                 @endforeach



               </div>

           </div>
   </div>
 </div>

@include('ui.layout.cta')
@endsection
