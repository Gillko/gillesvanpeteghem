<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Diary;
use App\Tag;
use Auth;

class DiariesController extends Controller
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
	 * GET /diary
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the diaries*/
		$diaries = Diary::all();

		/*Load the view and pass the diaries*/
		return \View::make('diaries.index')->with('diaries', $diaries);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /diary/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$diaries = Diary::all();

		$tags = Tag::where('tag_type', 'like', '%Diary%')->lists('tag_title', 'tag_id');

		return \View::make('diaries.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /diary
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'diary_title'		=> 'required',
			'diary_description'	=> 'required',
			'diary_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a diary object*/
			$diaries = new Diary();

			$diaries->diary_title			= $input['diary_title'];
			$diaries->diary_description	= $input['diary_description'];
			$diaries->diary_created		= $input['diary_created'];
			$diaries->user_id				= Auth::id();

			$diaries->save();

			$diaries->tags()->attach($request->input('tag_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the diary!');
			return Redirect::to('diaries');
		}
		else {
			return Redirect::to('diaries/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /diary/{diary_id}
	 *
	 * @param  int  $diary_id
	 * @return Response
	 */
	public function show($diary_id)
	{
		$diary = Diary::find($diary_id);
		return \View::make('diaries.show')->with('diary', $diary);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /diary/{diary_id}/edit
	 *
	 * @param  int  $diary_id
	 * @return Response
	 */
	public function edit($diary_id)
	{
		$diary = Diary::findOrFail($diary_id);
		
		$tags = Tag::where('tag_type', 'like', '%Diary%')->lists('tag_title', 'tag_id');

		return view('diaries.edit', compact('diary', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /diary/{diary_id}
	 *
	 * @param  int  $diary_id
	 * @return Response
	 */
	public function update(Request $request, $diary_id)
	{
		$diary = Diary::findOrFail($diary_id);
		$diary->update($request->all());

		$diary->tags()->sync((array)$request->input('tag_list', []));

		return redirect('diaries');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /diary/{diary_id}
	 *
	 * @param  int  $diary_id
	 * @return Response
	 */
	public function destroy($diary_id)
	{
		$diaries = Diary::find($diary_id);
		$diaries->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the diary!');
		return Redirect::to('diaries');
	}
}