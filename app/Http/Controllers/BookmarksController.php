<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Bookmark;
/*use App\Type;*/

class BookmarksController extends Controller
{
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

		$categories = \DB::table('categories')->lists('category_title', 'category_id');

		return \View::make('bookmarks.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /bookmark
	 *
	 * @return Response
	 */
	public function store()
	{
     $input = Input::all();

		/*Validation*/
        $rules = array(
        	'bookmark_title'	=> 'required',
        	'bookmark_url'		=> 'required',
        	'bookmark_image'	=> 'required',
        	'bookmark_created'	=> 'required',
        	'category_id' 		=> 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a category object*/
            $bookmarks = new Bookmark();

            $bookmarks->bookmark_title = $input['bookmark_title'];
            $bookmarks->bookmark_url = $input['bookmark_url'];
            $bookmarks->bookmark_image = $input['bookmark_image'];
            $bookmarks->bookmark_created = $input['bookmark_created'];
            $bookmarks->category_id = $input['category_id'];

            $bookmarks->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a bookmark!');
            return Redirect::to('bookmarks');
        }
        else {
            return Redirect::to('bookmarks/create')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /category/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($bookmark_id)
	{
		$bookmarks = CateBookmarkgory::find($bookmark_id);
		$bookmarks->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the bookmark!');
		return Redirect::to('bookmarks');
	}
}
