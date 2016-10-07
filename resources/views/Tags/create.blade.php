@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="title large-5 large-centered column title-gv color-blue-gv">
					<h1>create a tag</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'tags')) }}
						{{ Form::label('tag_title', 'Title')}}
						{{ Form::text('tag_title') }}
						{{ Form::label('tag_description', 'Description')}}
						{{ Form::textarea('tag_description') }}
						{{ Form::label('tag_type', 'Type')}}
						{{ Form::text('tag_type') }}
						{{ Form::label('tag_created', 'Created')}}
						{{ Form::datetime('tag_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::submit('Create the Tag!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
				
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection