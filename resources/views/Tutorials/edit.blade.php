@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $tutorial->tutorial_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($tutorial, ['method' => 'PATCH', 'action' => ['TutorialsController@update', $tutorial->tutorial_id]]) }}
						{{ Form::label('tutorial_title', 'Title')}}
						{{ Form::text('tutorial_title') }}
						{{ Form::label('tutorial_description', 'Description')}}
						{{ Form::textarea('tutorial_description') }}
						{{ Form::label('tutorial_modified', 'Modified')}}
						{{ Form::datetime('tutorial_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}
						{{ Form::label('image_list', 'Images')}}
						{{ Form::select('image_list[]', $images, null, ['multiple']) }}

						{{ Form::submit('Edit the Tutorial!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection