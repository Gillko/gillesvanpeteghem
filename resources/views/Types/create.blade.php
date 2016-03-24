{{ Form::open(array('url' => 'types/create', 'route' => 'types/store')) }}
	{{ Form::label('type_title', 'Title')}}
    {{ Form::text('type_title') }}
    {{ Form::label('type_description', 'Description')}}
    {{ Form::text('type_description') }}
    {{ Form::label('type_created', 'Created')}}
    {{ Form::text('type_created') }}
    {{ Form::submit('Create a Type!') }}
{{ Form::close() }}