@extends('ui.layout.layout')


@section('content')



 <!-- BANNER -->
 <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
   <div class="content-wrap pos-relative">
     <div class="d-flex justify-content-center bd-highlight mb-3">
       <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.agents.agents')}}</div>
     </div>
     <div class="d-flex justify-content-center bd-highlight mb-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb ">
           <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.agents.home')}}</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{__('ui.agents.agents')}}</li>
         </ol>
       </nav>
       </div>
   </div>
 </div>

 <!-- OUR ARTICLES -->
 <div class="">
   <div class="content-wrap">
     <div class="container">

       <div class="row mt-4">

         @foreach($agents as $agent)
           <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-5">
               <div class="rs-news-1 h-100">
                   <div class="media">
                       <a href="">
                           <img src="{{url('storage/images/agents/'.$agent->image)}}" alt="" class="img-fluid">
                       </a>
                   </div>
                   <div class="body">
                       <div class="title"><a href="agents.html">{{$agent->getname()}}</a></div>
                       <div class="meta-date"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{$agent->getlocation()}}</div>
                       <p>
                             {!!nl2br($agent->getdetails())!!}
                       </p>
                   </div>
               </div>
           </div>
         @endforeach
       </div>


     </div>
   </div>
 </div>
 
@include('ui.layout.cta')
@endsection
