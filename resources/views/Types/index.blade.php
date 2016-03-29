<p>INDEX OF TYPES</p>

@foreach($types as $type)
	{{ $type->type_id }} <br />
	{{ $type->type_title }} <br />
	{{ $type->type_description }} <br />
	{{ $type->type_created }} <br />
	{{ $type->type_modified }} <br />
@endforeach