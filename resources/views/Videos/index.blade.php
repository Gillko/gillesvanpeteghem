@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>videos</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/videos/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($videos as $video)
						<p><a href="{{ URL::to('/videos/' . $video->video_id) }}">{{ $video->video_id }}</a></p>
						<p>{{ $video->video_title }}</p>
						<p>{{ $video->video_description }}</p>
						<p>{{ $video->video_url }}</p>
						<p>{{ $video->video_created }}</p>
						<p>{{ $video->video_modified }}</p>
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection