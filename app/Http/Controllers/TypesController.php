<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Input;
use Validator;
use Redirect;
use Session;
use App\Type;
use Auth;

class TypesController extends Controller
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
	 * GET /type
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the types*/
		$types = Type::all();

		/*Load the view and pass the types*/
		return \View::make('types.index')->with('types', $types);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /type/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$types = Type::all();
		return \View::make('types.create')->with('types', $types);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /type
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		/*Validation*/
		$rules = array(
			'type_title'		=> 'required',
			'type_description'	=> 'required',
			'type_created'		=> 'required',
			//'user_id'			=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a band object*/
			$types = new Type();

			$types->type_title = $input['type_title'];
			$types->type_description = $input['type_description'];
			$types->type_created = $input['type_created'];
			$types->user_id = Auth::id();
			
			$types->save();

			/*Redirect*/
			Session::flash('message', 'Successfully created a bookmark!');
			return Redirect::to('types');
		}
		else {
			return Redirect::to('types/create')->withInput()->withErrors($validator);
		}   
	}

	/**
	 * Display the specified resource.
	 * GET /type/{id}
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
	 * GET /type/{id}/edit
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
	 * PUT /type/{id}
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
	 * DELETE /type/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($type_id)
	{
		$types = Type::find($type_id);
		$types->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the type!');
		return Redirect::to('types');
	}

}