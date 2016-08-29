@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>types</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
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
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection