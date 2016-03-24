{{ Form::open(array('url' => 'bookmark/add', 'action' => 'BookmarkController@create')) }}
	{{ Form::label('bookmark_title', 'Title')}}
    {{ Form::text('bookmark_title') }}
    {{ Form::label('bookmark_url', 'URL')}}
    {{ Form::text('bookmark_url') }}
    {{ Form::label('bookmark_image', 'Image')}}
    {{ Form::text('bookmark_image') }}
    {{ Form::label('bookmark_created', 'Created')}}
    {{ Form::date('bookmark_created') }}
{{ Form::close() }}