<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Image;
use App\Tag;
use App\Tutorial;
use Auth;


class ImagesController extends Controller
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
	 * GET /image
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the images*/
		$images = Image::all();

		/*Load the view and pass the images*/
		return \View::make('images.index')->with('images', $images);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /image/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$images = Image::all();

		$tags = Tag::where('tag_type', 'like', '%Image%')->lists('tag_title', 'tag_id');
		$tutorials = Tutorial::lists('tutorial_title', 'tutorial_id');

		return \View::make('images.create', compact('tags', 'tutorials'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /image
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = Input::all();

		/*Validation*/
		$rules = array(
			'image_title' 			=> 'required',
			'image_description' 	=> 'required',
			'image_type'			=> 'required',
			'image_url'				=> 'required|mimes:jpg,jpeg,png,gif',
			'image_created' 		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*Uploading images*/
			$image 				= $request->file('image_url');
			$filename 			= $image->getClientOriginalName();
			$destinationPath 	= public_path('/uploads');
			$success 			= $image->move($destinationPath, $filename);

			if($success){
				/*We make an image object*/
				$images = new Image();

				$images->image_title			= $input['image_title'];
				$images->image_description 		= $input['image_description'];
				$images->image_type 			= $input['image_type'];
				$images->image_url 				= $filename;
				$images->image_created 			= $input['image_created'];
				$images->user_id				= Auth::id();

				$images->save();

				$images->tags()->attach($request->input('tag_list'));

				$images->tutorials()->attach($request->input('tutorial_list'));

				/*Redirect*/
				Session::flash('message', 'Successfully created a Image!');
				return Redirect::to('images');
			}
		}
		else {
			return Redirect::to('images/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /image/{image_id}
	 *
	 * @param  int  $image_id
	 * @return Response
	 */
	public function show($image_id)
	{
		$image = Image::find($image_id);
		return \View::make('images.show')->with('image', $image);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /image/{image_id}/edit
	 *
	 * @param  int  $image_id
	 * @return Response
	 */
	public function edit($image_id)
	{
		$image = Image::findOrFail($image_id);

		$tags = Tag::where('tag_type', 'like', '%Image%')->lists('tag_title', 'tag_id');

		return view('images.edit', compact('image', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /image/{image_id}
	 *
	 * @param  int  $image_id
	 * @return Response
	 */
	public function update(Request $request, $image_id)
	{
		/*Validation*/
		$validation = \Validator::make($request->all(), [
			'image_title'		=> 'required',
			'image_modified'	=> 'required'
		]);

		/*Check if it fails*/
		if( $validation->fails() ){
			return redirect()->back()->withInput()->with('errors', $validation->errors());
		}

		/*Process valid data & go to success page*/
		$image = Image::findOrFail($image_id);

		if($request->hasFile('image_url') ){
		   $file 				= $request->file('image_url');
		   $filename 			= $file->getClientOriginalName();
		   $destinationPath 	= public_path('uploads/');
		   $file->move($destinationPath, $filename);
		}
		
		$image->image_title = $request->input('image_title');
		$image->image_description = $request->input('image_description');
		$image->image_url = $filename;
		$image->image_modified = $request->input('image_modified');
		$image->save();

		$image->tags()->sync((array)$request->input('tag_list', []));

		return redirect('/images')->with('message','You just updated an image!');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /image/{image_id}
	 *
	 * @param  int  $image_id
	 * @return Response
	 */
	public function destroy($image_id)
	{
		$images = Image::find($image_id);
		$images->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the image!');
		return Redirect::to('images');
	}
}