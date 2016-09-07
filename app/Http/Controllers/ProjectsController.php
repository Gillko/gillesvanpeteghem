<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Project;
use App\Tag;
use App\Image;
use Auth;

class ProjectsController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['store', 'destroy']]);
	}
	
	/**
	 * Display a listing of the resource.
	 * GET /project
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the projects*/
		$projects = Project::all();

		/*Load the view and pass the projects*/
		return \View::make('projects.index')->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /project/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$projects = Project::all();

		$tags = Tag::where('tag_type', 'like', '%Project%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Project%')->lists('image_title', 'image_id');

		return \View::make('projects.create', compact('tags', 'images'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /project
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'project_title'			=> 'required',
			'project_description'	=> 'required',
			'project_url'			=> 'required',
			'project_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a project object*/
			$projects = new Project();

			$projects->project_title			= $input['project_title'];
			$projects->project_description		= $input['project_description'];
			$projects->project_url				= $input['project_url'];
			$projects->project_created			= $input['project_created'];
			$projects->user_id					= Auth::id();

			$projects->save();

			$projects->tags()->attach($request->input('tag_list'));

			$projects->images()->attach($request->input('image_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the project!');
			return Redirect::to('projects');
		}
		else {
			return Redirect::to('projects/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /project/{project_id}
	 *
	 * @param  int  $project_id
	 * @return Response
	 */
	public function show($project_id)
	{
		$project = Project::find($project_id);
		return \View::make('projects.show')->with('project', $project);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /project/{project_id}/edit
	 *
	 * @param  int  $project_id
	 * @return Response
	 */
	public function edit($project_id)
	{
		$project = Project::findOrFail($project_id);
		
		$tags = Tag::where('tag_type', 'like', '%Project%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Project%')->lists('image_title', 'image_id');

		return view('projects.edit', compact('project', 'tags', 'images'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /project/{project_id}
	 *
	 * @param  int  $project_id
	 * @return Response
	 */
	public function update(Request $request, $project_id)
	{
		$project = Project::findOrFail($project_id);
		$project->update($request->all());

		$project->tags()->sync((array)$request->input('tag_list', []));

		$project->images()->sync((array)$request->input('image_list', []));

		return redirect('projects');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /project/{project_id}
	 *
	 * @param  int  $project_id
	 * @return Response
	 */
	public function destroy($project_id)
	{
		$projects = Project::find($project_id);
		$projects->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the project!');
		return Redirect::to('projects');
	}
}