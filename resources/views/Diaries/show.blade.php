@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $diary->diary_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $diary->diary_id }}</p>
					<p>{{ $diary->diary_title }}</p>
					{!! html_entity_decode($diary->diary_description) !!}
					<p>{{ $diary->diary_created }}</p>
					<p>{{ $diary->diary_modified }}</p>
					@unless ($diary->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($diary->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/diaries/' . $diary->diary_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $diary->diary_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection