@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a project</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'projects')) }}
						{{ Form::label('project_title', 'Title')}}
						{{ Form::text('project_title') }}
						{{ Form::label('project_description', 'Description')}}
						{{ Form::textarea('project_description') }}
						{{ Form::label('project_url', 'URL')}}
						{{ Form::text('project_url') }}
						{{ Form::label('project_created', 'Created')}}
						{{ Form::datetime('project_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}
						{{ Form::label('image_list', 'Images')}}
						{{ Form::select('image_list[]', $images, null, ['multiple']) }}

						{{ Form::submit('Create the Project!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection