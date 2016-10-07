@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $tutorial->tutorial_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $tutorial->tutorial_id }}</p>
					<p>{{ $tutorial->tutorial_title }}</p>
					{!! html_entity_decode($tutorial->tutorial_description) !!}
					<p>{{ $tutorial->tutorial_created }}</p>
					<p>{{ $tutorial->tutorial_modified }}</p>
					@unless ($tutorial->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($tutorial->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					@unless ($tutorial->images->isEmpty())
						<p>Images:</p>
						@foreach ($tutorial->images as $image)
							<p><a href="{{ URL::to('/images/show/' . $image->image_id) }}">{{ $image->image_title }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/tutorials/' . $tutorial->tutorial_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'tutorials/' . $tutorial->tutorial_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection