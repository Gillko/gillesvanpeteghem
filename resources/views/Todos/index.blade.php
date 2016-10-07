@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>todos</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/todos/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($todos as $todo)
						<p><a href="{{ URL::to('/todos/' . $todo->todo_id) }}">{{ $todo->todo_id }}</a></p>
						<p>{{ $todo->todo_title }}</p>
						<p>{!! html_entity_decode($todo->todo_description) !!}</p>
						<p>{{ $todo->todo_created }}</p>
						<p>{{ $todo->todo_modified }}</p>
						<p>{{ Form::open(array('url' => 'todos/' . $todo->todo_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection