<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Blog;
use App\Tag;
use Auth;

class BlogsController extends Controller
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
	 * GET /blog
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the blogs*/
		$blogs = Blog::all();

		/*Load the view and pass the blogs*/
		return \View::make('blogs.index')->with('blogs', $blogs);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /blog/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$blogs = Blog::all();

		$tags = Tag::where('tag_type', 'like', '%Blog%')->lists('tag_title', 'tag_id');

		return \View::make('blogs.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /blog
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'blog_title'		=> 'required',
			'blog_description'	=> 'required',
			'blog_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a blog object*/
			$blogs = new Blog();

			$blogs->blog_title			= $input['blog_title'];
			$blogs->blog_description	= $input['blog_description'];
			$blogs->blog_created		= $input['blog_created'];
			$blogs->user_id				= Auth::id();

			$blogs->save();

			$blogs->tags()->attach($request->input('tag_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the blog!');
			return Redirect::to('blogs');
		}
		else {
			return Redirect::to('blogs/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /blog/{blog_id}
	 *
	 * @param  int  $blog_id
	 * @return Response
	 */
	public function show($blog_id)
	{
		$blog = Blog::find($blog_id);
		return \View::make('blogs.show')->with('blog', $blog);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /blog/{blog_id}/edit
	 *
	 * @param  int  $blog_id
	 * @return Response
	 */
	public function edit($blog_id)
	{
		$blog = Blog::findOrFail($blog_id);
		
		$tags = Tag::where('tag_type', 'like', '%Blog%')->lists('tag_title', 'tag_id');

		return view('blogs.edit', compact('blog', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /blog/{blog_id}
	 *
	 * @param  int  $blog_id
	 * @return Response
	 */
	public function update(Request $request, $blog_id)
	{
		$blog = Blog::findOrFail($blog_id);
		$blog->update($request->all());

		$blog->tags()->sync((array)$request->input('tag_list', []));

		return redirect('blogs');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /blog/{blog_id}
	 *
	 * @param  int  $blog_id
	 * @return Response
	 */
	public function destroy($blog_id)
	{
		$blogs = Blog::find($blog_id);
		$blogs->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the blog!');
		return Redirect::to('blogs');
	}
}