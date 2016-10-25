@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $image->image_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $image->image_id }}</p>
					<p>{{ $image->image_title }}</p>
					{!! html_entity_decode($image->image_description) !!}
					<p>{{ $image->image_created }}</p>
					<p>{{ $image->image_modified }}</p>
					<p>{{ $image->image_url }}</p>
					<img src="{{asset('uploads/' . $image->image_url )}}" width="100"/><br/><br/>
					@unless ($image->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($image->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					{{-- @unless ($image->tutorials->isEmpty())
						<p>Tutorials:</p>
						@foreach ($image->tutorials as $tutorial)
							<p><a href="{{ URL::to('/tutorials/show/' . $tutorial->tutorial_id) }}">{{ $tutorial->tutorial_title }}</a></p>
						@endforeach
					@endunless --}}
					<a href="{{ URL::to('/images/' . $image->image_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'images/' . $image->image_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection