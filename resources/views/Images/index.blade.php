@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>images</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/images/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($images as $image)
						<p><a href="{{ URL::to('/images/' . $image->image_id) }}">{{ $image->image_id }}</a></p>
						<p>{{ $image->image_title }}</p>
						<p>{!! html_entity_decode($image->image_description) !!}</p>
						<p>{{ $image->image_created }}</p>
						<p>{{ $image->image_modified }}</p>
						<p>{{ Form::open(array('url' => 'images/' . $image->image_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection