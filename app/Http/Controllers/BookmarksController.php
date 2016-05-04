<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Input;
use Validator;
use Redirect;

class BookmarksController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /bookmark
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the bookmarks*/
        //$bookmarks = Bookmark::all();

        /*Load the view and pass the bookmarks*/
        return \View::make('bookmarks.index');
        //return View::make('bookmarks.index');
            //->with('bookmarks', $bookmarks);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /bookmark/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//$bookmarks = Bookmark::all();

        return \View::make('bookmarks.create');//->with('bookmarks', $bookmarks);
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
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a band object*/
            $bookmarks = new Bookmark();

            $bookmarks->bookmark_title = $request->input('bookmark_title');
            $bookmarks->bookmark_url = $request->input('bookmark_url');
            $bookmarks->bookmark_image = $request->input('bookmark_image');
            $bookmarks->bookmark_created = $request->input('bookmark_created');
            
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
	 * GET /bookmark/{id}
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
	 * GET /bookmark/{id}/edit
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
	 * PUT /bookmark/{id}
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
	 * DELETE /bookmark/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}