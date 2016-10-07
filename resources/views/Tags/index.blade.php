@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>tags</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/tags/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($tags as $tag)
						<p class=""><a href="{{ URL::to('/tags/' . $tag->tag_id) }}">{{ $tag->tag_id }}</a></p>
						<p>{{ $tag->tag_title }}</p>
						<p>{{ $tag->tag_description }}</p>
						<p>{{ $tag->tag_type }}</p>
						<p>{{ $tag->tag_created }}</p>
						<p>{{ $tag->tag_modified }}</p>
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection