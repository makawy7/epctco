<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login - Horizon Service Co.</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('des/cp')}}/favicon.ico">
		<link rel="icon" href="{{url('des/cp')}}/favicon.ico" type="image/x-icon">

		<!-- Toggles CSS -->
		<link href="{{url('des/cp')}}/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
		<link href="{{url('des/cp')}}/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

		<!-- Custom CSS -->
		<link href="{{url('des/cp')}}/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader-it">
			<div class="loader-pendulums"></div>
		</div>
		<!-- /Preloader -->

		<!-- HK Wrapper -->
		<div class="hk-wrapper">

			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="#">
										<img class="brand-img" src="{{url('des/cp')}}/dist/img/logo-light.png" alt="brand"/>
									</a>
									<form action="{{ route('login') }}" method="post">
                    @csrf
										<h1 class="display-4 text-center mb-10">Welcome Back</h1>
										<p class="text-center mb-30">Login now and start Manage Horizon website.</p>
										<div class="form-group">
											<input class="form-control" name="username" placeholder="User Name" type="text">
                      @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" name="password" placeholder="Password" type="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										<div class="custom-control custom-checkbox mb-25">
											<input class="custom-control-input" name="remember" id="same-address"  {{ old('remember') ? 'checked' : '' }} type="checkbox" checked>
											<label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
										</div>
										<button class="btn btn-primary btn-block" type="submit">Login</button>
                                        <br />
                                        <!-- <center><a href="http://www.trustq8.com/contact.html" target="_blank" style="color:black;" class="font-14 text-center mt-15">Having trouble logging in?</a></center> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->

		</div>
		<!-- /HK Wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="{{url('des/cp')}}/vendors/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="{{url('des/cp')}}/vendors/popper.js/dist/umd/popper.min.js"></script>
		<script src="{{url('des/cp')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="{{url('des/cp')}}/dist/js/jquery.slimscroll.js"></script>

		<!-- Fancy Dropdown JS -->
		<script src="{{url('des/cp')}}/dist/js/dropdown-bootstrap-extended.js"></script>

		<!-- FeatherIcons JavaScript -->
		<script src="{{url('des/cp')}}/dist/js/feather.min.js"></script>

		<!-- Init JavaScript -->
		<script src="{{url('des/cp')}}/dist/js/init.js"></script>
	</body>
</html>
