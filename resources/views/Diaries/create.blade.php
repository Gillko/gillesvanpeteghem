@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a diary</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'diaries')) }}
						{{ Form::label('diary_title', 'Title')}}
						{{ Form::text('diary_title') }}
						{{ Form::label('diary_description', 'Description')}}
						{{ Form::textarea('diary_description') }}
						{{ Form::label('diary_created', 'Created')}}
						{{ Form::datetime('diary_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tags', 'Tags')}}
						{{ Form::select('tags[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Create the Diary!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection