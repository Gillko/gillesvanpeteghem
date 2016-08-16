@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="content">
			<div class="grayBox">
				<div class="row">
					<div class="title large-3 large-centered column">
						<h1>bookmarks</h1>
					</div>
				</div>
			</div>
			@foreach($bookmarks as $bookmark)
				{{ $bookmark->bookmark_id }} <br />
				{{ $bookmark->bookmark_title }} <br />
				{{ $bookmark->bookmark_description }} <br />
				{{ $bookmark->bookmark_created }} <br />
				{{ $bookmark->bookmark_modified }} <br />
				{{ $bookmark->category_id }} <br />
				{{ Form::open(array('url' => 'bookmarks/' . $bookmark->bookmark_id, 'class' => '')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
				{{ Form::close() }}
			@endforeach
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection