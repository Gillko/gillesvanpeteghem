@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>diaries</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/diaries/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($diaries as $diary)
						<p><a href="{{ URL::to('/diaries/' . $diary->diary_id) }}">{{ $diary->diary_id }}</a></p>
						<p>{{ $diary->diary_title }}</p>
						<p>{!! html_entity_decode($diary->diary_description) !!}</p>
						<p>{{ $diary->diary_created }}</p>
						<p>{{ $diary->diary_modified }}</p>
						<p>{{ Form::open(array('url' => 'diaries/' . $diary->diary_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
@endsection