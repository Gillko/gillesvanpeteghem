@extends('layouts.layout')
@section('head')
	<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({
		  selector: 'textarea',
		  height: 500,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code'
		  ],
		  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  content_css: '//www.tinymce.com/css/codepen.min.css'
		});
	</script>-->
	<script src="../../../assets/js/libraries/jquery/jquery-1.12.1.min.js"></script>
	<link rel="stylesheet" href="../../../assets/css/libraries/codemirror/codemirror.css">
	<script src="../../../assets/js/libraries/codemirror/codemirror.js"></script>
	<script src="../../../assets/js/libraries/codemirror/addon/fold/xml-fold.js"></script>
	<script src="../../../assets/js/libraries/codemirror/addon/edit/matchtags.js"></script>
	<script src="../../../assets/js/libraries/codemirror/addon/edit/closetag.js"></script>
	<script src="../../../assets/js/libraries/codemirror/mode/xml/xml.js"></script>
	<script src="../../../assets/js/libraries/codemirror/mode/htmlmixed/htmlmixed.js"></script>
@endsection
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a tutorial</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'tutorials')) }}
						{{ Form::label('tutorial_title', 'Title')}}
						{{ Form::text('tutorial_title') }}
						{{ Form::label('tutorial_description', 'Description')}}
						{{ Form::textarea('tutorial_description', null, array('id' => 'textarea', 'class' => 'textarea')) }}
						{{ Form::label('tutorial_created', 'Created')}}
						{{ Form::datetime('tutorial_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}
						{{ Form::label('image_list', 'Images')}}
						{{ Form::select('image_list[]', $images, null, ['multiple']) }}
						{{ Form::label('tutorial_active', 'Active')}}
						{{ Form::text('tutorial_active') }}

						{{ Form::submit('Create the Tutorial!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<script>
		var editor = CodeMirror.fromTextArea(document.getElementById("textarea"), {
			value: "<html>\n  " + document.documentElement.innerHTML + "\n</html>",
		    mode: "text/html",
		    matchTags: {bothTags: true},
		    extraKeys: {"Ctrl-J": "toMatchingTag"},
		    autoCloseTags: true
			// styleActiveLine: true,
			// lineNumbers: true,
			// lineWrapping: true
		});
	</script>
@endsection