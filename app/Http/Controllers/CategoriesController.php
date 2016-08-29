<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Category;
use Auth;

class CategoriesController extends Controller
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
	 * GET /category
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the categories*/
        $categories = Category::all();

        /*Load the view and pass the categories*/
		return \View::make('categories.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();

		$types = \DB::table('types')->lists('type_title', 'type_id');

		return \View::make('categories.create')->with('types', $types);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
     $input = Input::all();

		/*Validation*/
        $rules = array(
        	'category_title' 		=> 'required',
        	'category_description' 	=> 'required',
        	'category_created' 		=> 'required',
        	'type_id' 				=> 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a category object*/
            $categories = new Category();

            $categories->category_title 		= $input['category_title'];
            $categories->category_description 	= $input['category_description'];
            $categories->category_created 		= $input['category_created'];
            $categories->type_id 				= $input['type_id'];
            $categories->user_id				= Auth::id();

            $categories->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a category!');
            return Redirect::to('categories');
        }
        else {
            return Redirect::to('categories/create')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($category_id)
	{
		$category = Category::find($category_id);
		return \View::make('categories.show')->with('category', $category);
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
	public function destroy($category_id)
	{
		$categories = Category::find($category_id);
		$categories->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('categories');
	}
}
