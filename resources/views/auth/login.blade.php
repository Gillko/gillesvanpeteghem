@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>login</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					<form data-abide role="" method="POST" action="{{ url('/login') }}">
						{!! csrf_field() !!}
						<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>E-Mail Address</label>
							<input type="email" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('email') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="">Password</label>
							<input type="password" name="password">
							@if ($errors->has('password'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('password') }}</p>
								</div>
							@endif
						</div>
						<label>
							<input type="checkbox" name="remember">Remember Me
						</label>
						<button type="submit" class="button expanded">Login</button>
						<a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
					</form>
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection