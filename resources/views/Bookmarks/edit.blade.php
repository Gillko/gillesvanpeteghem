@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $bookmark->bookmark_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{!! Form::model($bookmark, ['method' => 'PATCH', 'action' => ['BookmarksController@update', $bookmark->bookmark_id]]) !!}
						{{ Form::label('bookmark_title', 'Title')}}
						{{ Form::text('bookmark_title') }}
						{{ Form::label('bookmark_description', 'Description')}}
						{{ Form::textarea('bookmark_description') }}
						{{ Form::label('bookmark_url', 'URL')}}
						{{ Form::text('bookmark_url') }}
						{{ Form::label('bookmark_modified', 'Modified')}}
						{{ Form::datetime('bookmark_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{!! Form::label('tag_list', 'Tags') !!}
						{!! Form::select('tag_list[]', $tags, null, ['multiple']) !!}
						{!! Form::label('image_list', 'Images') !!}
						{!! Form::select('image_list[]', $images, null, ['multiple']) !!}

						{{ Form::submit('Edit the Bookmark!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection