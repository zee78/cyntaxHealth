@extends('layouts.master2')
@section('css')
@endsection
@section('content')
		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row text-center pl-0 pr-0 ml-0 mr-0">
				<div class="col-lg-3 d-block mx-auto">
					<div class="text-center mb-2">
						<img src="{{URL::asset('assets/img/brand/logo.png')}}" class="header-brand-img" alt="logo">
						<img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="header-brand-img theme-logos" alt="logo">
					</div>
					<div class="card custom-card">
						<div class="card-body">
							<h4 class="text-center">Signin to Your Account</h4>
							<form>
								<div class="form-group text-left">
									<label>Email</label>
									<input class="form-control" placeholder="Enter your email" type="text">
								</div>
								<div class="form-group text-left">
									<label>Password</label>
									<input class="form-control" placeholder="Enter your password" type="password">
								</div>
								<button class="btn ripple btn-main-primary btn-block">Sign In</button>
							</form>
							<div class="mt-3 text-center">
								<p class="mb-1"><a href="">Forgot password?</a></p>
								<p class="mb-0">Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->
@endsection
@section('js')
@endsection