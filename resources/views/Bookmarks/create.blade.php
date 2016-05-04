<p>CREATE A BOOKMARK</p>

{{ Form::open(array('url' => 'bookmarks')) }}
	{{ Form::label('bookmark_title', 'Title')}}
    {{ Form::text('bookmark_title') }}
    {{ Form::label('bookmark_url', 'URL')}}
    {{ Form::text('bookmark_url') }}
    {{ Form::label('bookmark_image', 'Image')}}
    {{ Form::text('bookmark_image') }}
    {{ Form::label('bookmark_created', 'Created')}}
    {{ Form::date('bookmark_created') }}

    {{ Form::submit('Create the Bookmark!', array('class' => '')) }}
{{ Form::close() }}