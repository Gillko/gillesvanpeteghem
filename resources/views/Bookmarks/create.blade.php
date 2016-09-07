@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a bookmark</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'bookmarks')) }}
						{{ Form::label('bookmark_title', 'Title')}}
						{{ Form::text('bookmark_title') }}
						{{ Form::label('bookmark_description', 'Description')}}
						{{ Form::textarea('bookmark_description') }}
						{{ Form::label('bookmark_url', 'URL')}}
						{{ Form::text('bookmark_url') }}
						{{ Form::label('bookmark_created', 'Created')}}
						{{ Form::datetime('bookmark_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}
						{{ Form::label('image_list', 'Images')}}
						{{ Form::select('image_list', $images, null, ['multiple']) }}

						{{ Form::submit('Create the Bookmark!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection