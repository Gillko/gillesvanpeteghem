@extends('layouts.layout')
@section('head')
	<script src="../../../assets/js/libraries/jquery/jquery-1.12.1.min.js"></script>
	<link rel="stylesheet" href="../../../assets/css/libraries/codemirror/codemirror.css">
	<script src="../../../assets/js/libraries/codemirror/codemirror.js"></script>
	<script src="../../../assets/js/libraries/codemirror/xml.js"></script>
@endsection
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
						{{ Form::textarea('project_description', null, array('id' => 'textarea', 'class' => 'textarea')) }}
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
	<script>
		var editor = CodeMirror.fromTextArea(document.getElementById("textarea"), {
			mode: "application/xml",
			styleActiveLine: true,
			lineNumbers: true,
			lineWrapping: true
		});
	</script>
@endsection