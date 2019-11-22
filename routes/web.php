<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Modulo usuarios
| Route::get('users', 'UserController@index')->name('users.index'); //GET
| Route::get('/users/create', 'UserController@create')->name('users.create'); //GET
| Route::post('/users', 'UserController@store')->name('users.store'); //POST
| Route::get('/users/{user}', 'UserController@show')->name('users.show'); //GET
| Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit'); //GET
| Route::post('/users/{user}', 'UserController@update')->name('users.update'); //PUT/PATCH
| Route::get('/users/{user}', 'UserController@destroy')->name('users.destroy'); //DELETE
|
*/

Route::namespace('Frontend')->group(function () {
	Route::get('/', 'AppController@index')->name('inicio');
	Route::get('/quem-somos', 'AppController@quemSomos')->name('quem.somos');
	Route::get('/destaque/{slug}', 'ContentController@destaque')->name('content.destaque');
	Route::get('/treinamento/{slug}', 'ContentController@treinamento')->name('content.treinamento');
	Route::get('/palestra/{slug}', 'ContentController@palestra')->name('content.palestra');
	Route::get('/clinica/{slug}', 'ContentController@getPage')->name('content.page');

	Route::get('/produtos/{slug?}', 'ProductController@index')->name('products.index');
	Route::get('/items-clube', 'ProductController@items')->name('products.items');



	Route::get('/programas/{slug?}', 'ProgramsController@index')->name('programs.index');
	Route::get('/consultorias/{slug?}', 'ProgramsController@index')->name('consulting.index');
	Route::get('/especialidades/{slug?}', 'ProgramsController@index')->name('especialities.index');

	Route::get('/inscription/{slug}', 'ProgramsController@create')->name('inscription.create');
	Route::post('/inscription', 'ProgramsController@store')->name('inscription.store');

	Route::get('cursos-e-treinamentos', 'CursoController@index')->name('cursos.index');
	Route::get('cursos-e-treinamentos/{url}', 'CursoController@show')->name('cursos.show');

	Route::get('/pre-matricula', 'PreRegisterController@create')->name('preregister.create');
	Route::post('/pre-matricula', 'PreRegisterController@store')->name('preregister.store');
});

Route::post('/send-email', 'MailController@sendemail')->name('send.email');
Route::get('/fale-conosco', 'GtalentosController@faleconosco')->name('fale.conosco');
Route::post('/fale-conosco', 'MailController@faleconoscoemail')->name('faleconosco.email');

Auth::routes();

//Rotas do andmin geral
Route::middleware(['auth'])->group(function () {
	include(base_path('routes/admin.php'));
});

Route::get('/precing', 'TestController@precing')->name('precing');

Route::get('/{slug}', 'ContentController@getPage')->name('content.all');