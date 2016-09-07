@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $todo->todo_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $todo->todo_id }}</p>
					<p>{{ $todo->todo_title }}</p>
					{!! html_entity_decode($todo->todo_description) !!}
					<p>{{ $todo->todo_created }}</p>
					<p>{{ $todo->todo_modified }}</p>
					@unless ($todo->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($todo->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/todos/' . $todo->todo_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $todo->todo_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection