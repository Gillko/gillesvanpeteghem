@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $diary->diary_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($diary, ['method' => 'PATCH', 'action' => ['DiariesController@update', $diary->diary_id]]) }}
						{{ Form::label('diary_title', 'Title')}}
						{{ Form::text('diary_title') }}
						{{ Form::label('diary_description', 'Description')}}
						{{ Form::textarea('diary_description') }}
						{{ Form::label('diary_modified', 'Modified')}}
						{{ Form::datetime('diary_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('tag_list', 'Tags')}}
						{{ Form::select('tag_list[]', $tags, null, ['multiple']) }}

						{{ Form::submit('Edit the Diary!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection