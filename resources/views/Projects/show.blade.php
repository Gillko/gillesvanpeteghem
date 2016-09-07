@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $project->project_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<div class="category">
						<p>{{ $project->project_id }}</p>
						<p>{{ $project->project_title }}</p>
						<p>{{ $project->project_description }}</p>
						<p>{{ $project->project_url }}</p>
						<p>{{ $project->project_created }}</p>
						<p>{{ $project->project_modified }}</p>
						@unless ($project->tags->isEmpty())
							<p>Tags:</p>
							@foreach ($project->tags as $tag)
								<p><a href="{{ URL::to('/tags/show/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></p>
							@endforeach
						@endunless
						@unless ($project->images->isEmpty())
							<p>Images:</p>
							@foreach ($project->images as $image)
								<p><a href="{{ URL::to('/images/show/' . $image->image_id) }}">{{ $image->image_title }}</a></p>
							@endforeach
						@endunless
						<a href="{{ URL::to('/projects/' . $project->project_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
						{{ Form::open(array('url' => 'projects/' . $project->project_id, 'class' => '')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection