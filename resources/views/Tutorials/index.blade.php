@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>tutorials</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/tutorials/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($tutorials as $tutorial)
						<p><a href="{{ URL::to('/tutorials/' . $tutorial->tutorial_id) }}">{{ $tutorial->tutorial_id }}</a></p>
						<p>{{ $tutorial->tutorial_title }}</p>
						<p>{!! html_entity_decode($tutorial->tutorial_description) !!}</p>
						<p>{{ $tutorial->tutorial_created }}</p>
						<p>{{ $tutorial->tutorial_modified }}</p>
						<p>{{ Form::open(array('url' => 'tutorials/' . $tutorial->tutorial_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection