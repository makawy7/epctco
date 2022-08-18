<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title)?setting()->getsitename().' - '.$title:'EPCTCO - Egyptian Perfumery & Cosmetics Trading Co.'}}</title>
      <meta name="author" content="Everest BS.">

	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="{{url('des/ui')}}/images/favicon.ico">
	<link rel="apple-touch-icon" href="{{url('des/ui')}}/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{{url('des/ui')}}/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{{url('des/ui')}}/images/apple-touch-icon-114x114.png">

	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/vendor/animate.min.css">

	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	@if(app()->getLocale()=='en')
    <link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/style.css" />
  @else
    <link rel="stylesheet" type="text/css" href="{{url('des/ui')}}/css/style-ar.css" />
    <link href="https://fonts.googleapis.com/css?family=Tajawal:500&display=swap" rel="stylesheet">
  @endif

    <script src="{{url('des/ui')}}/js/vendor/modernizr.min.js"></script>

</head>

<body>

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>

	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
    <div class="header header-1">



      		<!-- NAVBAR SECTION -->
      		<div class="navbar-main">
      			<div class="container">
      			    <nav id="navbar-example" class="navbar navbar-expand-lg">
      			        <a class="navbar-brand" href="{{route('index')}}">
      						<img src="{{url('des/ui')}}/images/logo.png" alt="" />
      					</a>
      			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      			            <span class="navbar-toggler-icon"></span>
      			        </button>
      			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
      			            <ul class="navbar-nav ml-auto">
      			            	<li class="nav-item {{url()->current()==route('index')?'active':''}}">
      			                    <a href="{{route('index')}}" class="nav-link">
      						          <i class="fa fa-home"></i> {{__('ui.index.home')}}
      						        </a>
      			                </li>

                                  <li class="nav-item {{url()->current()==route('about')?'active':''}}">
                                      <a href="{{route('about')}}" class="nav-link">
                                        <i class="fa fa-info-circle"></i> {{__('ui.index.about')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('servicespage')?'active':''}}">
                                      <a href="{{route('servicespage')}}" class="nav-link">
                                          <i class="fa fa-list"></i> {{__('ui.index.services')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('productspage')?'active':''}}">
                                      <a href="{{route('productspage')}}" class="nav-link">
                                          <i class="fa fa-shopping-cart"></i> {{__('ui.index.products')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('agentspage')?'active':''}}">
                                      <a href="{{route('agentspage')}}" class="nav-link">
                                          <i class="fa fa-users"></i> {{__('ui.index.agents')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('pospage')?'active':''}}">
                                      <a href="{{route('pospage')}}" class="nav-link">
                                          <i class="fa fa-map-marker"></i> {{__('ui.index.pos')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('gallerypage')?'active':''}}">
                                      <a href="{{route('gallerypage')}}" class="nav-link">
                                          <i class="fa fa-image"></i> {{__('ui.index.gallery')}}
                                      </a>
                                  </li>

                                  <li class="nav-item {{url()->current()==route('contactpage')?'active':''}}">
                                      <a href="{{route('contactpage')}}" class="nav-link">
                                          <i class="fa fa-envelope"></i> {{__('ui.index.contact')}}
                                      </a>
                                  </li>
      			            </ul>
      			            <div class="sosmed-icon no-bg-hover float-right d-inline-flex">
                                @if(app()->getLocale()=='en')
                                    <a href="{{route('lang','ar')}}"><img src="{{url('des/ui')}}/images/egy.png" width="25" /></a>
                                @else
                                    <a href="{{route('lang','en')}}"><img src="{{url('des/ui')}}/images/ukd.png" width="25" /></a>
                                @endif
      						</div>
      			        </div>
      			    </nav> <!-- -->

      			</div>
      		</div>

          </div>
