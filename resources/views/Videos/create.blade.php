@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a video</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'videos')) }}
						{{ Form::label('video_title', 'Title')}}
						{{ Form::text('video_title') }}
						{{ Form::label('video_description', 'Description')}}
						{{ Form::textarea('video_description') }}
						{{ Form::label('video_url', 'URL')}}
						{{ Form::text('video_url') }}
						{{ Form::label('video_created', 'Created')}}
						{{ Form::datetime('video_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Create a Video!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection