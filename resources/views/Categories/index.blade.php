<p>INDEX OF CATEGORIES</p>

@foreach($categories as $category)

	{{ $category->category_id }} <br />
	{{ $category->category_title }} <br />
	{{ $category->category_description }} <br />
	{{ $category->category_created }} <br />
	{{ $category->category_modified }} <br />

	{{ $category->type_id }} <br />

	{{ Form::open(array('url' => 'categories/' . $category->category_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}

@endforeach