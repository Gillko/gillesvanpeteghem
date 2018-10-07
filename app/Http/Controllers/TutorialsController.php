<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Tutorial;
use App\Tag;
use App\Image;
use Auth;

class TutorialsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth', ['except' => ['store', 'destroy', 'show']]);
    }
    
    /**
	 * Display a listing of the resource.
	 * GET /tutorial
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the tutorials*/
        $tutorials = Tutorial::all();

        /*Load the view and pass the tutorials*/
		return \View::make('tutorials.index')->with('tutorials', $tutorials);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tutorial/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$tutorials = Tutorial::all();

		$tags = Tag::where('tag_type', 'like', '%Tutorial%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Tutorial%')->lists('image_title', 'image_id');

		return \View::make('tutorials.create', compact('tags', 'images'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tutorial
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
     	$input = Input::all();

		/*Validation*/
        $rules = array(
        	'tutorial_title' 		=> 'required',
        	'tutorial_description' 	=> 'required',
        	'tutorial_created' 		=> 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $tutorials = new Tutorial();

            $tutorials->tutorial_title			= $input['tutorial_title'];
            $tutorials->tutorial_description 	= $input['tutorial_description'];
            $tutorials->tutorial_created 		= $input['tutorial_created'];
            $tutorials->user_id					= Auth::id();

            $tutorials->save();

            $tutorials->tags()->attach($request->input('tag_list'));

			$tutorials->images()->attach($request->input('image_list'));

            /*Redirect*/
            Session::flash('message', 'Successfully created a tutorial!');
            return Redirect::to('tutorials');
        }
        else {
            return Redirect::to('tutorials/create')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /tutorial/{tutorial_id}
	 *
	 * @param  int  $tutorial_id
	 * @return Response
	 */
	public function show($tutorial_id)
	{
		$tutorial = Tutorial::find($tutorial_id);
		return \View::make('tutorials.show')->with('tutorial', $tutorial);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tutorial/{tutorial_id}/edit
	 *
	 * @param  int  $tutorial_id
	 * @return Response
	 */
	public function edit($tutorial_id)
	{
		$tutorial = Tutorial::findOrFail($tutorial_id);

		$tags = Tag::where('tag_type', 'like', '%Tutorial%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Tutorial%')->lists('image_title', 'image_id');

		return view('tutorials.edit', compact('tutorial', 'tags', 'images'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tutorial/{tutorial_id}
	 *
	 * @param  int  $tutorial_id
	 * @return Response
	 */
	public function update(Request $request, $tutorial_id)
	{
		$tutorial = Tutorial::findOrFail($tutorial_id);

		$tutorial->update($request->all());

		$tutorial->tags()->sync((array)$request->input('tag_list', []));

		$tutorial->images()->sync((array)$request->input('image_list', []));

		return redirect('tutorials');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tutorial/{tutorial_id}
	 *
	 * @param  int  $tutorial_id
	 * @return Response
	 */
	public function destroy($tutorial_id)
	{
		$tutorials = Tutorial::find($tutorial_id);
		$tutorials->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the tutorial!');
		return Redirect::to('tutorials');
	}
}