@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="content">
			<div class="grayBox">
				<div class="row">
					<div class="title large-3 large-centered column">
						<h1>login</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					<form class="" role="" method="POST" action="{{ url('/login') }}">
						{!! csrf_field() !!}
						<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="">E-Mail Address</label>

							<div class="">
								<input type="email" class="" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
									<span class="">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="">Password</label>

							<div class="">
								<input type="password" class="" name="password">

								@if ($errors->has('password'))
									<span class="">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="">
							<div class="">
								<div class="">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>
						<div class="">
							<div class="">
								<button type="submit" class="">
									<i class=""></i>Login
								</button>

								<a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection
