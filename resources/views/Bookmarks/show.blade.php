@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $bookmark->bookmark_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<div class="category">
						<p>{{ $bookmark->bookmark_id }}</p>
						<p>{{ $bookmark->bookmark_title }}</p>
						<p>{{ $bookmark->bookmark_description }}</p>
						<p>{{ $bookmark->bookmark_url }}</p>
						<p>{{ $bookmark->bookmark_created }}</p>
						<p>{{ $bookmark->bookmark_modified }}</p>
						@unless ($bookmark->tags->isEmpty())
							<p>Tags:</p>
							@foreach ($bookmark->tags as $tag)
								<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
							@endforeach
						@endunless
						@unless ($bookmark->images->isEmpty())
							<p>Images:</p>
							@foreach ($bookmark->images as $image)
								<p><a href="{{ URL::to('/images/show/' . $image->image_id) }}">{{ $image->image_title }}</a></p>
							@endforeach
						@endunless
						<a href="{{ URL::to('/bookmarks/' . $bookmark->bookmark_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
						{{ Form::open(array('url' => 'bookmarks/' . $bookmark->bookmark_id, 'class' => '')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection