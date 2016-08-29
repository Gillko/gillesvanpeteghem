@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-4 large-centered column title-gv color-blue-gv">
					<h1>Reset Password</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					@if (session('status'))
						<div data-abide-error class="alert callout">
							<p><i class="fi-alert"></i>{{ session('status') }}</p>
						</div>
					@endif
					<form data-abide role="form" method="POST" action="{{ url('/password/email') }}">
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
						<button type="submit" class="button expanded">Send Password Reset Link</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection
