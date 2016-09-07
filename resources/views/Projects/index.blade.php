@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>projects</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/projects/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($projects as $project)
						<p><a href="{{ URL::to('/projects/' . $project->project_id) }}">{{ $project->project_id }}</a></p>
						<p>{{ $project->project_title }}</p>
						<p>{{ $project->project_description }}</p>
						<p>{{ $project->project_url }}</p>
						<p>{{ $project->project_created }}</p>
						<p>{{ $project->project_modified }}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection