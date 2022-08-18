@extends('ui.layout.layout')


@section('content')

 <!-- BANNER -->
 <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
   <div class="content-wrap pos-relative">
     <div class="d-flex justify-content-center bd-highlight mb-3">
       <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.services.services')}}</div>
     </div>
     <div class="d-flex justify-content-center bd-highlight mb-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb ">
           <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.services.home')}}</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{__('ui.services.services')}}</li>
         </ol>
       </nav>
       </div>
   </div>
 </div>

@php $counter=1; @endphp
@foreach($services as $service)

<div class="section {{$counter%2?'bg-gray-light':''}}">
  <div class="content-wrap">

    <div class="container">
      <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-6" style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">
          <h2 class="section-heading text-primary no-after mb-5">
                          {{$service->gettitle()}}
          </h2>
          <p>
                          {!!nl2br($service->getdetails())!!}
          </p>
          <div class="spacer-10"></div>
          <a href="{{route('productspage')}}" class="btn btn-primary">{{__('ui.services.viewproducts')}}</a>
          <div class="spacer-10"></div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <img src="{{url('storage/images/services/',$service->image)}}" alt="" class="shadow img-fluid">
        </div>

      </div>
    </div>
  </div>
</div>

@php $counter++; @endphp
@endforeach

@include('ui.layout.cta')
@endsection
