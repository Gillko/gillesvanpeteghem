@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="title large-5 large-centered column title-gv color-blue-gv">
					<h1>create a type</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'types')) }}
						{{ Form::label('type_title', 'Title')}}
					    {{ Form::text('type_title') }}
					    {{ Form::label('type_description', 'Description')}}
					    {{ Form::text('type_description') }}
					    {{ Form::label('type_created', 'Created')}}
					    {{ Form::datetime('type_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
					    {{ Form::submit('Create the Type!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
				
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection