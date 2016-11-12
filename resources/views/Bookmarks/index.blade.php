@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>bookmarks</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/bookmarks/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($bookmarks as $bookmark)
						<p><a href="{{ URL::to('/bookmarks/' . $bookmark->bookmark_id) }}">{{ $bookmark->bookmark_id }}</a></p>
						<p>{{ $bookmark->bookmark_title }}</p>
						<p>{{ $bookmark->bookmark_description }}</p>
						<p>{{ $bookmark->bookmark_url }}</p>
						<p>{{ $bookmark->bookmark_created }}</p>
						<p>{{ $bookmark->bookmark_modified }}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection