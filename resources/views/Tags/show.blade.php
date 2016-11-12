@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $tag->tag_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $tag->tag_id }}</p>
					<p>{{ $tag->tag_title }}</p>
					<p>{{ $tag->tag_description }}</p>
					<p>{{ $tag->tag_type }}</p>
					<p>{{ $tag->tag_created }}</p>
					<p>{{ $tag->tag_modified }}</p>
					<a href="{{ URL::to('/tags/' . $tag->tag_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					<p>{{ Form::open(array('url' => 'tags/' . $tag->tag_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection