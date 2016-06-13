<p>INDEX OF TYPES</p>

@foreach($types as $type)

	{{ $type->type_id }} <br />
	{{ $type->type_title }} <br />
	{{ $type->type_description }} <br />
	{{ $type->type_created }} <br />
	{{ $type->type_modified }} <br />

	{{ Form::open(array('url' => 'types/' . $type->type_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}

@endforeach