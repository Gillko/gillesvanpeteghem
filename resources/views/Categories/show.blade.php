@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="title large-3 large-centered column">
					<h1>categories</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ $category->category_id }} <br />
					{{ $category->category_title }} <br />
					{{ $category->category_description }} <br />
					{{ $category->category_created }} <br />
					{{ $category->category_modified }} <br />
					{{-- {{ $category->type_id }} <br /> --}}
					{{ Form::open(array('url' => 'categories/' . $category->category_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
					{{ Form::close() }}

					{{ $category->type->type_id }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection