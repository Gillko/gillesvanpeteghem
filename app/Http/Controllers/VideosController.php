<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Video;
use App\Tag;
use Auth;

class VideosController extends Controller
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
	 * GET /video
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the videos*/
        $videos = Video::all();

        /*Load the view and pass the videos*/
		return \View::make('videos.index')->with('videos', $videos);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /video/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$videos = Video::all();

		$tags = Tag::where('tag_type', 'like', '%Video%')->lists('tag_title', 'tag_id');

		return \View::make('videos.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /video
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
     $input = Input::all();

		/*Validation*/
        $rules = array(
        	'video_title' 			=> 'required',
        	'video_description' 	=> 'required',
        	'video_url' 			=> 'required',
        	'video_created' 		=> 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a video object*/
            $videos = new Video();

            $videos->video_title			= $input['video_title'];
            $videos->video_description 		= $input['video_description'];
            $videos->video_url 				= $input['video_url'];
            $videos->video_created 			= $input['video_created'];
            $videos->user_id				= Auth::id();

            $videos->save();

            $videos->tags()->attach($request->input('tag_list'));

            /*Redirect*/
            Session::flash('message', 'Successfully created a video!');
            return Redirect::to('videos');
        }
        else {
            return Redirect::to('videos/create')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /video/{video_id}
	 *
	 * @param  int  $video_id
	 * @return Response
	 */
	public function show($video_id)
	{
		$video = Video::find($video_id);
		return view('videos.show', compact('video'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /video/{video_id}/edit
	 *
	 * @param  int  $video_id
	 * @return Response
	 */
	public function edit($video_id)
	{
		$video = Video::findOrFail($video_id);
		
		$tags = Tag::where('tag_type', 'Video')->lists('tag_title', 'tag_id');

		return view('videos.edit', compact('video', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /video/{video_id}
	 *
	 * @param  int  $video_id
	 * @return Response
	 */
	public function update(Request $request, $video_id)
	{
		$video = Video::findOrFail($video_id);
		$video->update($request->all());

		$video->tags()->sync((array)$request->input('tag_list'));

		return redirect('videos');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /video/{video_id}
	 *
	 * @param  int  $video_id
	 * @return Response
	 */
	public function destroy($video_id)
	{
		$videos = Video::find($video_id);
		$videos->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the video!');
		return Redirect::to('videos');
	}
}