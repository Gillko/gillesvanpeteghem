@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $video->video_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($video, ['method' => 'PATCH', 'action' => ['VideosController@update', $video->video_id]]) }}
						{{ Form::label('video_title', 'Title')}}
						{{ Form::text('video_title') }}
						{{ Form::label('video_description', 'Description')}}
						{{ Form::textarea('video_description') }}
						{{ Form::label('video_url', 'URL')}}
						{{ Form::text('video_url') }}
						{{ Form::label('video_modified', 'Modified')}}
						{{ Form::datetime('video_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Edit the Video!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection