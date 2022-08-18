@extends('ui.layout.layout')


@section('content')

@include('ui.layout.slider')






	<!-- WHO WE ARE -->
	<div class="section bg-gray-light">
		<div class="content-wrap pt-0 pb-0">
			<div class="sideright-img bgi-cover-center" data-background="{{url('storage/images/'.setting()->home_image)}}">
				<img src="{{url('des/ui')}}/images/about.png" alt="" class="img-fluid">
			</div>
			<div class="container">
				<div class="row align-items-center">

					<div class="col-sm-12 col-md-12 col-lg-6" style="{{app()->getLocale()=='ar'?'text-align:right;':''}}">
						<div class="spacer-content"></div>
						<h2 class="section-heading text-primary no-after mb-4">
							{{setting()->getsitename()}}
						</h2>
						<p class="subheading mb-4"><em>	{{setting()->getsitetitle()}}</em></p>
						<p>
              {!!nl2br(setting()->homecontent())!!}
            </p>
						<div class="spacer-30"></div>
						<a href="about.html" class="btn btn-primary">{{__('ui.index.moreaboutus')}}</a>
						<div class="spacer-content"></div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- PRODUCTS -->
	<div id="projects">
		<div class="content-wrap">
			<div class="container">

				<div class="row mb-5">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-center text-primary no-after mb-5">
							{{__('ui.lastestproducts')}}
						</h2>
						<p class="subheading text-center">{{__('ui.lastestproducts_')}}</p>
					</div>
				</div>

				<div class="row popup-gallery gutter-5">
					@foreach($products as $product)
						<div class="col-12 col-sm-6 col-md-4">
							<div class="box-gallery">
								<a href="images/products/product.jpg" title="{{$product->gettitle()}}">
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
				</div>
				<div class="text-center mt-5">
					<a href="{{route('productspage')}}" class="btn btn-primary">{{__('ui.viewallproducts')}}</a>
				</div>

			</div>
		</div>
	</div>


    <!-- AGENTS -->
    <div id="projects">
        <div class="content-wrap">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading text-center text-primary no-after mb-5">
                            {{__('ui.lastestagents')}}
                        </h2>
                        <p class="subheading text-center">{{__('ui.lastestagents_',['name'=>setting()->coname()])}}</p>
                    </div>
                </div>

                <div class="row mb-5">


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
