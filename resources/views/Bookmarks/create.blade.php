<p>CREATE A BOOKMARK</p>

{{ Form::open(array('url' => 'bookmarks')) }}

	{{ Form::label('bookmark_title', 'Title')}}
    {{ Form::text('bookmark_title') }}
    {{ Form::label('bookmark_url', 'URL')}}
    {{ Form::text('bookmark_url') }}
    {{ Form::label('bookmark_image', 'Image')}}
    {{ Form::text('bookmark_image') }}
    {{ Form::label('bookmark_created', 'Created')}}
    {{ Form::datetime('bookmark_created', Carbon\Carbon::now()->format('Y-m-d,h:m:s')) }}

    {{ Form::label('Category') }}
    {{ Form::select('category_id', 
        (['0' => 'Select a Category'] + $categories), 
            null, 
            ['class' => '']) }}

    {{ Form::submit('Create the Bookmark!') }}

{{ Form::close() }}