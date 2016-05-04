<p>CREATE A TYPE</p>

{{ Form::open(array('url' => 'types')) }}
	{{ Form::label('type_title', 'Title')}}
    {{ Form::text('type_title') }}
    {{ Form::label('type_description', 'Description')}}
    {{ Form::text('type_description') }}
    {{ Form::label('type_created', 'Created')}}
    {{ Form::datetime('type_created', Carbon\Carbon::now()->format('Y-m-d,h:m:s')) }}
    {{ Form::submit('Create a Type!') }}
{{ Form::close() }}