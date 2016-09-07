<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Todo;
use App\Tag;
use Auth;

class TodosController extends Controller
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
	 * GET /todo
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the todos*/
		$todos = Todo::all();

		/*Load the view and pass the todos*/
		return \View::make('todos.index')->with('todos', $todos);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /todo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$todos = Todo::all();

		$tags = Tag::where('tag_type', 'like', '%Todo%')->lists('tag_title', 'tag_id');

		return \View::make('todos.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /todo
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'todo_title'		=> 'required',
			'todo_description'	=> 'required',
			'todo_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a todo object*/
			$todos = new Todo();

			$todos->todo_title			= $input['todo_title'];
			$todos->todo_description	= $input['todo_description'];
			$todos->todo_created		= $input['todo_created'];
			$todos->user_id				= Auth::id();

			$todos->save();

			$todos->tags()->attach($request->input('tag_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the todo!');
			return Redirect::to('todos');
		}
		else {
			return Redirect::to('todos/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /todo/{todo_id}
	 *
	 * @param  int  $todo_id
	 * @return Response
	 */
	public function show($todo_id)
	{
		$todo = Todo::find($todo_id);
		return \View::make('todos.show')->with('todo', $todo);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /todo/{todo_id}/edit
	 *
	 * @param  int  $todo_id
	 * @return Response
	 */
	public function edit($todo_id)
	{
		$todo = Todo::findOrFail($todo_id);
		
		$tags = Tag::where('tag_type', 'like', '%Todo%')->lists('tag_title', 'tag_id');

		return view('todos.edit', compact('todo', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /todo/{todo_id}
	 *
	 * @param  int  $todo_id
	 * @return Response
	 */
	public function update(Request $request, $todo_id)
	{
		$todo = Todo::findOrFail($todo_id);
		$todo->update($request->all());

		$todo->tags()->sync((array)$request->input('tag_list', []));

		return redirect('todos');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /todo/{todo_id}
	 *
	 * @param  int  $todo_id
	 * @return Response
	 */
	public function destroy($todo_id)
	{
		$todos = Todo::find($todo_id);
		$todos->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the todo!');
		return Redirect::to('todos');
	}
}