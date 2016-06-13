<p>CREATE A CATEGORY</p>

{{ Form::open(array('url' => 'categories')) }}

	{{ Form::label('category_title', 'Title')}}
    {{ Form::text('category_title') }}
    {{ Form::label('category_description', 'Description')}}
    {{ Form::text('category_description') }}
    {{ Form::label('category_created', 'Created')}}
    {{ Form::datetime('category_created', Carbon\Carbon::now()->format('Y-m-d,h:m:s')) }}
    
    {{ Form::label('Type') }}
    {{ Form::select('type_id', 
        (['0' => 'Select a Type'] + $types), 
            null, 
            ['class' => '']) }}


    {{ Form::submit('Create a Category!') }}
{{ Form::close() }}