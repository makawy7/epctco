@extends('ui.layout.layout')


@section('content')

 <!-- BANNER -->
 <div class="section banner-page" data-background="{{url('des/ui')}}/images/header.jpg">
   <div class="content-wrap pos-relative">
     <div class="d-flex justify-content-center bd-highlight mb-3">
       <div class="title-page {{app()->getLocale()=='en'?'banEdi':''}}">{{__('ui.contactus.contactus')}}</div>
     </div>
     <div class="d-flex justify-content-center bd-highlight mb-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb ">
           <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('ui.contactus.home')}}</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{__('ui.contactus.contactus')}}</li>
         </ol>
       </nav>
       </div>
   </div>
 </div>

 <!-- CONTACT -->
 <div class="section">
   <div class="content-wrap">
     <div class="container">


       <div class="row mb-5">
         <div class="col-sm-12 col-md-12">

           <h2 class="section-heading text-primary text-center no-after mb-4">
             {{__('ui.contactus.contact',['name'=>setting()->getsitename()])}}
           </h2>
           <p class="subheading text-center mb-4">{{__('ui.contactus.stay',['name'=>setting()->getsitename()])}}</p>
         </div>
       </div>

       <div class="row">

         <div class="col-sm-12 col-md-12 col-lg-8">

           <div class="p-4 shadow">
             <form action="#" class="form-contact" id="contactForm" data-toggle="validator" novalidate="true" style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">

               <div class="form-group">
                 <label for="p_name">{{__('ui.contactus.name')}}</label>
                 <input type="text" class="form-control" id="p_name" placeholder="" required="">
                 <div class="help-block with-errors"></div>
               </div>


               <div class="form-group">
                 <label for="p_email">{{__('ui.contactus.email')}}</label>
                 <input type="email" class="form-control" id="p_email" placeholder="" required="">
                 <div class="help-block with-errors"></div>
               </div>


               <div class="form-group">
                 <label for="p_subject">{{__('ui.contactus.subject')}}</label>
                 <input type="text" class="form-control" id="p_subject" placeholder="">
                 <div class="help-block with-errors"></div>
               </div>


               <div class="form-group">
                 <label for="p_phone">{{__('ui.contactus.phone')}}</label>
                 <input type="text" class="form-control" id="p_phone" placeholder="">
                 <div class="help-block with-errors"></div>
               </div>


               <div class="form-group">
                 <label for="p_message">{{__('ui.contactus.message')}}</label>
                  <textarea id="p_message" class="form-control" rows="6" placeholder=""></textarea>
                 <div class="help-block with-errors"></div>
               </div>
               <div class="form-group">

                 <div id="success"></div>
                 <button type="submit" class="btn btn-primary disabled">{{__('ui.contactus.send')}}</button>

               </div>
             </form>
           </div>

         </div>
         <div class="col-sm-12 col-md-12 col-lg-4">
                       <div class="box-widget shadow bgi-cover-center mb-5 gradasi-primary">
                           <h3>{{__('ui.contactus.admin')}}</h3>
                           <ul class="list-info">
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-map-marker fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->adminofficeaddress())!!}</div>
                               </li>
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-envelope fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->adminoffice_email)!!}</div>
                               </li>
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-phone fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->adminoffice_phone)!!}</div>
                               </li>
                           </ul>
                       </div>

                       <div class="box-widget shadow bgi-cover-center mb-5 gradasi-primary">
                           <h3>{{__('ui.contactus.store')}}</h3>
                           <ul class="list-info">
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-map-marker fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->mainstoreaddress())!!}</div>
                               </li>
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-envelope fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->mainstore_email)!!}</div>
                               </li>
                               <li>
                                   <div class="info-icon">
                                       <span class="fa fa-phone fa-2x"></span>
                                   </div>
                                   <div class="info-text">{!!nl2br(setting()->mainstore_phone)!!}</div>
                               </li>
                           </ul>
                       </div>

         </div>

       </div>
     </div>
   </div>
 </div>

 <!-- MAPS -->
 <div class="maps-wraper">
   <div id="cd-zoom-in"></div>
   <div id="cd-zoom-out"></div>
   <div id="maps" class="maps" data-lat="-7.452278" data-lng="112.708992" data-marker="images/cd-icon-location.png">
   </div>
 </div>



@endsection


@push('scripts')
<!-- GOOGLEMAP -->
<script type="text/javascript">


  var myLat = '{{setting()->lat}}',
myLng = '{{setting()->lng}}',
myMarkerx = '{{url('des/ui')}}/images/cd-icon-location.png';


</script>
<script src="{{url('des/ui')}}/js/googlemap-setting.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap"> </script>


@endpush
