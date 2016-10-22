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
		<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace( 'tutorial_description' );
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
		$('#tutorial_description').on('keydown', function(ev) {
			var keyCode = ev.keyCode || ev.which;

			if (keyCode == 9) {
				ev.preventDefault();
				var start = this.selectionStart;
				var end = this.selectionEnd;
				var val = this.value;
				var selected = val.substring(start, end);
				var re, count;

				if(ev.shiftKey) {
					re = /^\t/gm;
					count = -selected.match(re).length;
					this.value = val.substring(0, start) + selected.replace(re, '') + val.substring(end);
					// todo: add support for shift-tabbing without a selection
				} else {
					re = /^/gm;
					count = selected.match(re).length;
					this.value = val.substring(0, start) + selected.replace(re, '\t') + val.substring(end);
				}

				if(start === end) {
					this.selectionStart = end + count;
				} else {
					this.selectionStart = start;
				}

				this.selectionEnd = end + count;
			}
		});
		</script>
		@include('layouts.footer')
	</div>
@endsection