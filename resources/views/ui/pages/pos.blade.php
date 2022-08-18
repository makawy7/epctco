@extends('ui.layout.layout')


@section('content')

<!-- BANNER -->
  <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
      <div class="content-wrap pos-relative">
          <div class="d-flex justify-content-center bd-highlight mb-3">
              <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.pos.pos')}}</div>
          </div>
          <div class="d-flex justify-content-center bd-highlight mb-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                      <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.pos.home')}}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('ui.pos.pos_')}}</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>

<!-- MEET OREN TEAM -->
<div class="section">
  <div class="content-wrap">
    <div class="container">

      <div class="row">

        @foreach($points as $point)
          <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="rs-team-1 hiring">
                  <div class="desc">
                      <h3>{{$point->getname()}}</h3><br />

                      <a href="tel:{{$point->phone}}" style="background-color:white; padding:15px; border-radius:5px;">
                          <i class="fa fa-phone"></i> {{$point->phone}}
                      </a>

                      <div class="spacer-50"></div>

                      <a href="{{$point->url}}" class="btn btn-light">{{__('ui.pos.location')}}</a>
                  </div>
                  <div class="media shadow"><img src="{{url('des/ui')}}/images/pos.jpg" alt="" class="img-fluid"></div>

              </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</div>

@include('ui.layout.cta')
@endsection
