<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Tag;
use Auth;

class TagsController extends Controller
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
	 * GET /tag
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the tags*/
		$tags = Tag::all();

		/*Load the view and pass the tags*/
		return \View::make('tags.index')->with('tags', $tags);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tag/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = Tag::lists('tag_id', 'tag_title');

		return \View::make('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tag
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = Input::all();

		/*Validation*/
		$rules = array(
			'tag_title'			=> 'required',
			'tag_description'	=> 'required',
			'tag_type'			=> 'required',
			'tag_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a tag object*/
			$tags = new Tag();

			$tags->tag_title 		= $input['tag_title'];
			$tags->tag_description 	= $input['tag_description'];
			$tags->tag_type 		= $input['tag_type'];
			$tags->tag_created 		= $input['tag_created'];
			$tags->user_id 			= Auth::id();
			
			$tags->save();

			/*Redirect*/
			Session::flash('message', 'Successfully created a tag!');
			return Redirect::to('tags');
		}
		else {
			return Redirect::to('tags/create')->withInput()->withErrors($validator);
		}   
	}

	/**
	 * Display the specified resource.
	 * GET /tag/{tag_id}
	 *
	 * @param  int  $tag_id
	 * @return Response
	 */
	public function show($tag_id)
	{
		$tag = Tag::find($tag_id);
		return \View::make('tags.show')->with('tag', $tag);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tag/{tag_id}/edit
	 *
	 * @param  int  $tag_id
	 * @return Response
	 */
	public function edit($tag_id)
	{
		$tag = Tag::findOrFail($tag_id);

		//$types = Type::lists('type_title', 'type_id');

		return view('tags.edit', compact('tag'));//, 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tag/{tag_id}
	 *
	 * @param  int  $tag_id
	 * @return Response
	 */
	public function update(Request $request, $tag_id)
	{
		$tag = Tag::findOrFail($tag_id);

		$tag->update($request->all());

		//$tag->types()->sync($request->input('type_list'));

		return redirect('tags');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tag/{tag_id}
	 *
	 * @param  int  $tag_id
	 * @return Response
	 */
	public function destroy($tag_id)
	{
		$tags = Tag::find($tag_id);
		$tags->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the tag!');
		return Redirect::to('tags');
	}
}