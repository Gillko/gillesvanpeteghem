@extends('layouts.layout')
@section('content')
<div class="container">
	<div class="content">
		<div class="row">
			<div class="large-12">
				<div class="">Register</div>
				<form class="" role="form" method="POST" action="{{ url('/register') }}">
					{!! csrf_field() !!}

					<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
						<label class="">Name</label>
						<div class="">
							<input type="text" class="" name="name" value="{{ old('name') }}">

							@if ($errors->has('name'))
								<span class="">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
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
					<div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<label class="">Confirm Password</label>

						<div class="">
							<input type="password" class="" name="password_confirmation">

							@if ($errors->has('password_confirmation'))
								<span class="">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="">
						<div class="">
							<button type="submit" class="">
								<i class=""></i>Register
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	@include('layouts.footer')
</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection