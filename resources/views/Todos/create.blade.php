@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a todo</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'todos')) }}
						{{ Form::label('todo_title', 'Title')}}
						{{ Form::text('todo_title') }}
						{{ Form::label('todo_description', 'Description')}}
						{{ Form::textarea('todo_description') }}
						{{ Form::label('todo_created', 'Created')}}
						{{ Form::datetime('todo_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tags', 'Tags')}}
						{{ Form::select('tags[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Create the Todo!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection