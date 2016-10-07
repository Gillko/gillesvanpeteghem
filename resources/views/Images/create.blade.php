@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a image</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'images', 'files' => true)) }}
						{{ Form::label('image_title', 'Title')}}
						{{ Form::text('image_title') }}
						{{ Form::label('image_description', 'Description')}}
						{{ Form::textarea('image_description') }}
						{{ Form::label('image_type', 'Type')}}
						{{ Form::text('image_type') }}
						{{ Form::label('image_url', 'URL')}}
						{{ Form::file('image_url') }}
						{{ Form::label('image_created', 'Created')}}
						{{ Form::datetime('image_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Create the Image!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection