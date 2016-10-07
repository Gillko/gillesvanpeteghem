@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-12">
					<div class="large-5 large-centered column title-gv color-blue-gv">
						<h1>register</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					<form data-abide role="form" method="POST" action="{{ url('/register') }}">
						{!! csrf_field() !!}
						<div class="{{ $errors->has('user_firstname') ? ' has-error' : '' }}">
							<label>Firstname</label>
							<input type="text" name="user_firstname" value="{{ old('name') }}">
							@if ($errors->has('user_firstname'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('user_firstname') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('user_surname') ? ' has-error' : '' }}">
							<label>Surname</label>
							<input type="text" name="user_surname" value="{{ old('name') }}">
							@if ($errors->has('user_surname'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('user_surname') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('user_username') ? ' has-error' : '' }}">
							<label>Username</label>
							<input type="text" name="user_username" value="{{ old('name') }}">
							@if ($errors->has('user_username'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('user_username') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="">E-Mail Address</label>
							<input type="email" class="" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('email') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
							<label>Password</label>
							<input type="password" class="" name="password">

							@if ($errors->has('password'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('password') }}</p>
								</div>
							@endif
						</div>
						<div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label>Confirm Password</label>
							<input type="password" class="" name="password_confirmation">
							@if ($errors->has('password_confirmation'))
								<div data-abide-error class="alert callout">
									<p><i class="fi-alert"></i>{{ $errors->first('password_confirmation') }}</p>
								</div>
							@endif
						</div>
						<button type="submit" class="button expanded">Register</button>
					</form>
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection