@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="title large-3 large-centered column">
					<h1>bookmarks</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<div class="row">
						<div class="large-2 columns">
							<div class="category">
								<p class="">{{ $bookmark->category->category_title }}</p>
								{{ $bookmark->bookmark_id }} <br />
								{{ $bookmark->bookmark_title }} <br />
								{{ $bookmark->bookmark_url }} <br />
								{{ $bookmark->bookmark_image }} <br />
								{{ $bookmark->bookmark_created }} <br />
								{{ $bookmark->bookmark_modified }} <br />
								{{ Form::open(array('url' => 'bookmarks/' . $bookmark->bookmark_id, 'class' => '')) }}
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection