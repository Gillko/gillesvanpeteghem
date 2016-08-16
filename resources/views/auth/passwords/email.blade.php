@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="content">
			<div class="grayBox">
				<div class="row">
					<div class="title large-3 large-centered column">
						<h1>Reset Password</h1>
					</div>
				</div>
			</div>
			<div class="">
				<div class="">
					<div class="">
						{{-- <div class="">Reset Password</div> --}}
						<div class="">
							@if (session('status'))
								<div class="">
									{{ session('status') }}
								</div>
							@endif
							<form class="" role="form" method="POST" action="{{ url('/password/email') }}">
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
								<div class="">
									<div class="">
										<button type="submit" class="">
											<i class=""></i>Send Password Reset Link
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection
