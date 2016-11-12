@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $todo->todo_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($todo, ['method' => 'PATCH', 'action' => ['TodosController@update', $todo->todo_id]]) }}
						{{ Form::label('todo_title', 'Title')}}
						{{ Form::text('todo_title') }}
						{{ Form::label('todo_description', 'Description')}}
						{{ Form::textarea('todo_description') }}
						{{ Form::label('todo_modified', 'Modified')}}
						{{ Form::datetime('todo_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Edit the Todo!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection