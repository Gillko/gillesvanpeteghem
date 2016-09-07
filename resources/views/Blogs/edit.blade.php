@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $blog->blog_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogsController@update', $blog->blog_id]]) }}
						{{ Form::label('blog_title', 'Title')}}
						{{ Form::text('blog_title') }}
						{{ Form::label('blog_description', 'Description')}}
						{{ Form::textarea('blog_description') }}
						{{ Form::label('blog_modified', 'Modified')}}
						{{ Form::datetime('blog_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Edit the Blog!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection