@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>blogs</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/blogs/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($blogs as $blog)
						<p><a href="{{ URL::to('/blogs/' . $blog->blog_id) }}">{{ $blog->blog_id }}</a></p>
						<p>{{ $blog->blog_title }}</p>
						<p>{!! html_entity_decode($blog->blog_description) !!}</p>
						<p>{{ $blog->blog_created }}</p>
						<p>{{ $blog->blog_modified }}</p>
						<p>{{ Form::open(array('url' => 'blogs/' . $blog->blog_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection