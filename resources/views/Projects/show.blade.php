@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-12 fullWidth-gv columns">
						<h1 class="title-tutorial-gv">{{ $project->project_title }}</h1>
						<p>{{ $project->project_url }}</p>
						<p class="created-gv">Created on {{ $project->project_created }}<br/>
						Modified on {{ $project->project_modified }}</p>
						{!! html_entity_decode($project->project_description) !!}

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