<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('libros', 'LibrosController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'admin'], function (){

		Route::group(['middleware' => 'admin'], function(){

			Route::resource('users' , 'UserController');

			Route::get('admin/users/{users}', [

			'as'   => 'admin.users.destroy',
			'uses' => 'UserController@destroy'

			]);


		});

		

		Route::resource('autores', 'AutoresController');

		Route::get('admin/autores/{autores}', [

			'as'   => 'admin.autores.destroy',
			'uses' => 'AutoresController@destroy'

			]);

		Route::resource('categorias', 'CategoriasController');

		Route::get('admin/categorias/{categorias}', [

			'as'   => 'admin.categorias.destroy',
			'uses' => 'CategoriasController@destroy'

			]);

		Route::resource('libros','LibrosController');

			Route::get('admin/libros/{libros}', [

				'as'   => 'admin.libros.destroy',
				'uses' => 'LibrosController@destroy'

				]);
	});  
});


