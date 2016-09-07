@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $image->image_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
				    {!! Form::model($image,['url' => '/images/'.$image->image_id, 'method' => 'PUT', 'files'=>true]) !!}
						{{ Form::label('image_title', 'Title')}}
						{{ Form::text('image_title') }}
						{{ Form::label('image_description', 'Description')}}
						{{ Form::textarea('image_description') }}
						{{ Form::label('image_url', 'URL')}}
						{{ Form::file('image_url') }}
						<img src="{{asset('uploads/' . $image->image_url )}}" width="100"/>
						{{ Form::label('image_modified', 'Modified')}}
						{{ Form::datetime('image_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Modify the Image!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection