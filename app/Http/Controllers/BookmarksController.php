<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Bookmark;
use App\Tag;
use App\Image;
use Auth;

class BookmarksController extends Controller
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
	 * GET /bookmark
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the bookmarks*/
		$bookmarks = Bookmark::all();

		/*Load the view and pass the bookmarks*/
		return \View::make('bookmarks.index')->with('bookmarks', $bookmarks);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /bookmark/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$bookmarks = Bookmark::all();

		$tags = Tag::where('tag_type', 'like', '%Bookmark%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Bookmark%')->lists('image_title', 'image_id');

		return \View::make('bookmarks.create', compact('tags', 'images'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /bookmark
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'bookmark_title'	=> 'required',
			'bookmark_url'		=> 'required',
			'bookmark_created'	=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a bookmark object*/
			$bookmarks = new Bookmark();

			$bookmarks->bookmark_title			= $input['bookmark_title'];
			$bookmarks->bookmark_description	= $input['bookmark_description'];
			$bookmarks->bookmark_url			= $input['bookmark_url'];
			$bookmarks->bookmark_created		= $input['bookmark_created'];
			$bookmarks->user_id					= Auth::id();

			$bookmarks->save();

			$bookmarks->tags()->attach($request->input('tag_list'));

			$bookmarks->images()->attach($request->input('image_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the bookmark!');
			return Redirect::to('bookmarks');
		}
		else {
			return Redirect::to('bookmarks/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /bookmark/{bookmark_id}
	 *
	 * @param  int  $bookmark_id
	 * @return Response
	 */
	public function show($bookmark_id)
	{
		$bookmark = Bookmark::find($bookmark_id);
		return \View::make('bookmarks.show')->with('bookmark', $bookmark);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /bookmark/{bookmark_id}/edit
	 *
	 * @param  int  $bookmark_id
	 * @return Response
	 */
	public function edit($bookmark_id)
	{
		$bookmark = Bookmark::findOrFail($bookmark_id);
		
		$tags = Tag::where('tag_type', 'like', '%Bookmark%')->lists('tag_title', 'tag_id');

		$images = Image::where('image_type', 'like', '%Bookmark%')->lists('image_title', 'image_id');

		return view('bookmarks.edit', compact('bookmark', 'tags', 'images'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /bookmark/{bookmark_id}
	 *
	 * @param  int  $bookmark_id
	 * @return Response
	 */
	public function update(Request $request, $bookmark_id)
	{
		$bookmark = Bookmark::findOrFail($bookmark_id);
		$bookmark->update($request->all());

		$bookmark->tags()->sync((array)$request->input('tag_list', []));

		$bookmark->images()->sync((array)$request->input('image_list', []));

		return redirect('bookmarks');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /bookmark/{bookmark_id}
	 *
	 * @param  int  $bookmark_id
	 * @return Response
	 */
	public function destroy($bookmark_id)
	{
		$bookmarks = Bookmark::find($bookmark_id);
		$bookmarks->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the bookmark!');
		return Redirect::to('bookmarks');
	}
}