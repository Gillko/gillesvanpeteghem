<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', function () {
		return view('home');
	});

	/*Route::resource('tags', 'TagsController');
	Route::resource('tutorials', 'TutorialsController');
	Route::resource('bookmarks', 'BookmarksController');*/

	Route::get('/register', 'Auth\AuthController@getRegister');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::get('/', function () {
		return view('home');
	});

	//Route::get('/register', 'Auth\AuthController@getRegister');

	/* =========== ROUTES FOR TAGS ===========  */
	Route::resource('tags', 'TagsController');
	Route::get('/tags', 'TagsController@index');
	Route::get('/tags/create', 'TagsController@create');
	Route::delete('/tags/{tag_id}', 'TagsController@destroy');
	Route::get('/tags/show/{tag_id}', 'TagsController@show');
	Route::get('/tags/{tag_id}/edit', 'TagsController@edit');

	/* =========== ROUTES FOR BOOKMARKS ===========  */ 
	Route::resource('bookmarks', 'BookmarksController');
	Route::get('/bookmarks', 'BookmarksController@index');
	Route::get('/bookmarks/create', 'BookmarksController@create');
	Route::delete('/bookmarks/{bookmark_id}', 'BookmarksController@destroy');
	Route::get('/bookmarks/show/{bookmark_id}', 'BookmarksController@show');
	Route::get('/bookmarks/{bookmark_id}/edit', 'BookmarksController@edit');

	 /* =========== ROUTES FOR VIDEOS ===========  */ 
	Route::resource('videos', 'VideosController');
	Route::get('/videos', 'VideosController@index');
	Route::get('/videos/create', 'VideosController@create');
	Route::delete('/videos/{bookmark_id}', 'VideosController@destroy');
	Route::get('/videos/show/{video_id}', 'VideosController@show');
	Route::get('/videos/{video_id}/edit', 'VideosController@edit');

	/* =========== ROUTES FOR TUTORIALS ===========  */
	Route::resource('tutorials', 'TutorialsController');
	Route::get('/tutorials', 'TutorialsController@index');
	Route::get('/tutorials/create', 'TutorialsController@create');
	Route::delete('/tutorials/{tutorial_id}', 'TutorialsController@destroy');
	Route::get('/tutorials/show/{tutorial_id}', 'TutorialsController@show');
	Route::get('/tutorials/{tutorial_id}/edit', 'TutorialsController@edit');

	/* =========== ROUTES FOR PROJECTS ===========  */ 
	Route::resource('projects', 'ProjectsController');
	Route::get('/projects', 'ProjectsController@index');
	Route::get('/projects/create', 'ProjectsController@create');
	Route::delete('/projects/{project_id}', 'ProjectsController@destroy');
	Route::get('/projects/show/{project_id}', 'ProjectsController@show');
	Route::get('/projects/{project_id}/edit', 'ProjectsController@edit');

	/* =========== ROUTES FOR BLOGS ===========  */ 
	Route::resource('blogs', 'BlogsController');
	Route::get('/blogs', 'BlogsController@index');
	Route::get('/blogs/create', 'BlogsController@create');
	Route::delete('/blogs/{blog_id}', 'BlogsController@destroy');
	Route::get('/blogs/show/{blog_id}', 'BlogsController@show');
	Route::get('/blogs/{blog_id}/edit', 'BlogsController@edit');

	/* =========== ROUTES FOR TODOS ===========  */ 
	Route::resource('todos', 'TodosController');
	Route::get('/todos', 'TodosController@index');
	Route::get('/todos/create', 'TodosController@create');
	Route::delete('/todos/{todo_id}', 'TodosController@destroy');
	Route::get('/todos/show/{todo_id}', 'TodosController@show');
	Route::get('/todos/{todo_id}/edit', 'TodosController@edit');

	/* =========== ROUTES FOR DIARIES ===========  */ 
	Route::resource('diaries', 'DiariesController');
	Route::get('/diaries', 'DiariesController@index');
	Route::get('/diaries/create', 'DiariesController@create');
	Route::delete('/diaries/{diary_id}', 'DiariesController@destroy');
	Route::get('/diaries/show/{diary_id}', 'DiariesController@show');
	Route::get('/diaries/{diary_id}/edit', 'DiariesController@edit');

	/* =========== ROUTES FOR IMAGES ===========  */ 
	Route::resource('images', 'ImagesController');
	Route::get('/images', 'ImagesController@index');
	Route::get('/images/create', 'ImagesController@create');
	Route::delete('/images/{image_id}', 'ImagesController@destroy');
	Route::get('/images/show/{image_id}', 'ImagesController@show');
	Route::get('/images/{image_id}/edit', 'ImagesController@edit');

	/* =========== ROUTES FOR ROLES ===========  */ 
	Route::resource('roles', 'RolesController');
	Route::get('/roles', 'RolesController@index');
	Route::get('/roles/create', 'RolesController@create');
	Route::delete('/roles/{role_id}', 'RolesController@destroy');
	Route::get('/roles/show/{role_id}', 'RolesController@show');
	Route::get('/roles/{role_id}/edit', 'RolesController@edit');
});