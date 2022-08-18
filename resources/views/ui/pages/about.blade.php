@extends('ui.layout.layout')


@section('content')


 <!-- BANNER -->
 <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
   <div class="content-wrap pos-relative">
     <div class="d-flex justify-content-center bd-highlight mb-3">
       <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.about.about_us')}}</div>
     </div>
     <div class="d-flex justify-content-center bd-highlight mb-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb ">
           <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.about.home')}}</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{__('ui.about.about_us')}}</li>
         </ol>
       </nav>
       </div>
   </div>
 </div>


 <!-- WHAT WE DO -->
 <div class="section">
   <div class="content-wrap pb-0">

     <div class="container">
       <div class="row">

         <div class="col-sm-12 col-md-12 col-lg-5">
           <img src="{{url('storage/images/'.setting()->about_image)}}" alt="" class="img-fluid">
         </div>
         <div class="col-sm-12 col-md-12 col-lg-7" style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">

           <h2 class="section-heading text-primary no-after mb-4">
             {{__('ui.about.about',['name'=>setting()->coname()])}}
           </h2>
           <p class="subheading mb-4">{{setting()->getsitetitle()}} </p>
                       <p>
                          {!!nl2br(setting()->aboutcontent())!!}
                       </p>

           <div class="row mt-5 mb-5">
             <div class="col-sm-12 col-md-12">
               <div class="accordion rs-accordion" id="accordionExample">
                  <!-- Item 1 -->
                  <div class="card">
                     <div class="card-header" id="headingOne">
                        <h3 class="title">
                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           {{__('ui.about.vision')}}
                           </button>
                        </h3>
                     </div>
                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            {!!nl2br(setting()->vision())!!}
                        </div>
                     </div>
                  </div>
                  <!-- Item 2 -->
                  <div class="card">
                     <div class="card-header" id="headingTwo">
                        <h3 class="title">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              {{__('ui.about.mission')}}
                           </button>
                        </h3>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            {!!nl2br(setting()->mission())!!}
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end accordion -->

             </div>
           </div>

         </div>

       </div>
     </div>
   </div>
 </div>

 <!-- MEET OREN TEAM -->
 <div id="doctor">
   <div class="content-wrap">
     <div class="container">

       <div class="row mb-5">
         <div class="col-sm-12 col-md-12">
           <h2 class="section-heading text-center no-after text-primary mb-5">
                           {{__('ui.about.directors')}}
           </h2>
           <p class="subheading text-center">{{__('ui.about.leaders',['name'=>setting()->coname()])}}</p>
         </div>
       </div>

       <div class="row">

         @php $counter=0; @endphp
         @foreach($members as $member)
          @if($counter < 2)
            <!-- Item 1 -->
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="rs-team-1">
                <div class="desc">
                  <p>
                      {{$member->getdes()}}
                  </p>
                </div>
                <div class="media shadow"><img src="{{url('storage/images/members/'.$member->image)}}" alt="" class="img-fluid"></div>
                <div class="body">
                  <div class="title">{{$member->getname()}}</div>
                  <div class="position">{{$member->getrole()}}</div>
                  <ul class="social-icon">
                    @if($member->facebook)
                      <li><a href="{{$member->facebook}}"><span class="fa fa-facebook"></span></a></li>
                    @endif
                    @if($member->instagram)
                      <li><a href="{{$member->instagram}}"><span class="fa fa-instagram"></span></a></li>
                    @endif
                    @if($member->linkedin)
                      <li><a href="{{$member->linkedin}}"><span class="fa fa-linkedin"></span></a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          @else
            <!-- Item 3 -->
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="rs-team-1">
                <div class="desc">
                            <p>
                                {{$member->getdes()}}
                            </p>
                </div>
                <div class="media shadow"><img src="{{url('storage/images/members/'.$member->image)}}" alt="" class="img-fluid"></div>
                <div class="body">
                  <div class="title">{{$member->getname()}}</div>
                  <div class="position">{{$member->getrole()}}</div>
                  <ul class="social-icon">
                    @if($member->facebook)
                      <li><a href="{{$member->facebook}}"><span class="fa fa-facebook"></span></a></li>
                    @endif
                    @if($member->instagram)
                      <li><a href="{{$member->instagram}}"><span class="fa fa-instagram"></span></a></li>
                    @endif
                    @if($member->linkedin)
                      <li><a href="{{$member->linkedin}}"><span class="fa fa-linkedin"></span></a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          @endif
          @php $counter++; @endphp
         @endforeach
       </div>
     </div>
   </div>
 </div>


@include('ui.layout.cta')

@endsection
