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

    Route::resource('types', 'TypesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('bookmarks', 'BookmarksController');

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

    Route::get('/register', 'Auth\AuthController@getRegister');
    /* =========== ROUTES FOR TYPES ===========  */
    Route::get('/types', 'TypesController@index');
    Route::get('/types/create', 'TypesController@create');
    Route::delete('/types/{type_id}', 'TypesController@destroy');

    /* =========== ROUTES FOR CATEGORY ===========  */
    Route::get('/categories', 'CategoriesController@index');
    Route::get('/categories/create', 'CategoriesController@create');
    Route::delete('/categories/{category_id}', 'CategoriesController@destroy');

    /* =========== ROUTES FOR BOOKMARKS ===========  */  
    Route::get('/bookmarks', 'BookmarksController@index');
    Route::get('/bookmarks/create', 'BookmarksController@create');
    Route::delete('/bookmarks/{bookmark_id}', 'BookmarksController@destroy');
});
