@extends('layouts.layout')
@section('content')
	<style>
		span{
			/*float:left;*/
		}
	</style>
	<div class="container-gv">
		<div class="content-gv">
			{{-- <div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $tutorial->tutorial_title }}</h1>
				</div>
			</div> --}}
			<div class="row">
				<div class="large-12 fullWidth-gv columns">
					{{-- <p>{{ $tutorial->tutorial_id }}</p> --}}
					<h1 class="title-tutorial-gv">{{ $tutorial->tutorial_title }}</h1>
					<p class="created-gv">Created on {{ $tutorial->tutorial_created }}<br/>
					Modified on {{ $tutorial->tutorial_modified }}</p>
					{{-- <p class="created-gv">Created on {{ $tutorial->tutorial_created->format('d-m-Y H:m:s') }}<br/>Last modified on {{ $tutorial->tutorial_modified->format('d-m-Y H:m:s') }}</p> --}}
					{!! html_entity_decode($tutorial->tutorial_description) !!}
					<p></p>
					
					@unless ($tutorial->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($tutorial->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					@unless ($tutorial->images->isEmpty())
						<p>Images:</p>
						@foreach ($tutorial->images as $image)
							<p><a href="{{ URL::to('/images/show/' . $image->image_id) }}">{{ $image->image_title }}</a> ({{ $image->image_url }})</p>
						@endforeach
					@endunless

					@if (Auth::check())
						<a href="{{ URL::to('/tutorials/' . $tutorial->tutorial_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
						{{ Form::open(array('url' => 'tutorials/' . $tutorial->tutorial_id, 'class' => '')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					@endif
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<script>
		// var str = document.getElementById('trim').innerHTML;
		// str.replace(' ', '');
	</script>
@endsection