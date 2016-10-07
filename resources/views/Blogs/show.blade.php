@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $blog->blog_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $blog->blog_id }}</p>
					<p>{{ $blog->blog_title }}</p>
					{!! html_entity_decode($blog->blog_description) !!}
					<p>{{ $blog->blog_created }}</p>
					<p>{{ $blog->blog_modified }}</p>
					@unless ($blog->tags->isEmpty())
						<p>Tags:</p>
						@foreach ($blog->tags as $tag)
							<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/blogs/' . $blog->blog_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $blog->blog_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection