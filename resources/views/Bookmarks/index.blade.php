<p>INDEX OF BOOKMARKS</p>

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