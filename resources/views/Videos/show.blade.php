@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $video->video_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $video->video_id }}</p>
					<p>{{ $video->video_title }}</p>
					<p>{{ $video->video_description }}</p>
					<p>{{ $video->video_url }}</p>
					<p>{{ $video->video_created }}</p>
					<p>{{ $video->video_modified }}</p>
					@unless ($video->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($video->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/videos/' . $video->video_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'videos/' . $video->video_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection