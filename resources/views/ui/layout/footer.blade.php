


	<!-- FOOTER SECTION -->
	<div class="footer">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-6">
						<div class="footer-item">
							<img src="{{url('des/ui')}}/images/logo.png" alt="logo bottom" class="logo-bottom">
							<div class="spacer-20"></div>
                            <p>
                              {!!nl2br(setting()->aboutcontent())!!}
                            </p>
							<div class="spacer-20"></div>
							<div class="sosmed-icon bg-round d-inline-flex">
								@if(setting()->facebook)
									<a href="{{setting()->facebook}}"><i class="fa fa-facebook"></i></a>
								@endif
								@if(setting()->twitter)
									<a href="{{setting()->twitter}}"><i class="fa fa-twitter"></i></a>
								@endif
								@if(setting()->instagram)
									<a href="{{setting()->instagram}}"><i class="fa fa-instagram"></i></a>
								@endif
								@if(setting()->pinterest)
									<a href="{{setting()->pinterest}}"><i class="fa fa-pinterest"></i></a>
								@endif
								@if(setting()->linkedin)
									<a href="{{setting()->linkedin}}"><i class="fa fa-linkedin"></i></a>
								@endif
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-4 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								{{__('ui.contactinfo')}}
							</div>
							<p>{!!nl2br(setting()->contactinfodes())!!}</p>
							<ul class="list-info">
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text">{!!nl2br(setting()->contactinfoaddress())!!}</div>
								</li>
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text">{{setting()->contactinfo_phone}}</div>
								</li>
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text">{{setting()->contactinfo_email}}</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-sm-12 col-md-4 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								{{__('ui.usefullink')}}
							</div>
							<ul class="list">
								<li><a href="{{route('about')}}">{{__('ui.index.about')}}</a></li>
                                <li><a href="{{route('servicespage')}}">{{__('ui.index.services')}}</a></li>
								<li><a href="{{route('productspage')}}">{{__('ui.index.products')}}</a></li>
                                <li><a href="{{route('agentspage')}}">{{__('ui.index.agents')}}</a></li>
								<li><a href="{{route('contactpage')}}">{{__('ui.index.contact')}}</a></li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="ftex">&copy; 2019 <span class="text-primary">EPCTCO</span>. All Rights Reserved. Developed By <span class="text-primary"><a href="http://everestbs.com" target="_blank">EverestBS</a></span></p>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- JS VENDOR -->
	<script src="{{url('des/ui')}}/js/vendor/jquery.min.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/bootstrap.min.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/owl.carousel.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/jquery.magnific-popup.min.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/isotope.pkgd.min.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/imagesloaded.pkgd.min.js"></script>

	<!-- SENDMAIL -->
	<script src="{{url('des/ui')}}/js/vendor/validator.min.js"></script>
	<script src="{{url('des/ui')}}/js/vendor/form-scripts.js"></script>
	@stack('scripts')

	<script src="{{url('des/ui')}}/js/script.js"></script>
</body>
</html>
