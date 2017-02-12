<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');

Route::get('/docs', 'MainController@docs');

/*Route::get('/swagger.json', function () {
	return response()->json(json_decode(file_get_contents('swagger.json'), true));
});*/

Route::get('/visualizer', function () {
    return view('visualizer', ['revision' => config('app.revision')]);
});
