@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a blog</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'blogs')) }}
						{{ Form::label('blog_title', 'Title')}}
						{{ Form::text('blog_title') }}
						{{ Form::label('blog_description', 'Description')}}
						{{ Form::textarea('blog_description') }}
						{{ Form::label('blog_created', 'Created')}}
						{{ Form::datetime('blog_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tags', 'Tags')}}
						{{ Form::select('tags[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Create the Blog!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection