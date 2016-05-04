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
    //return view('welcome');
	return view('index');
});

/* =========== ROUTES FOR TYPES ===========  */
    Route::resource('types', 'TypesController');
    Route::get('/types', 'TypesController@index');
    Route::get('/types/create', 'TypesController@create');

/* =========== ROUTES FOR CATEGORY ===========  */
    Route::resource('categories', 'CategoriesController');
    Route::get('/categories', 'CategoriesController@index');
    Route::get('/categories/create', 'CategoriesController@create');

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

Route::group(['middleware' => ['web']], function () {
    //
});
