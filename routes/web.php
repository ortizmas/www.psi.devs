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
| Route::post('/users/{user}', 'UserController@show')->name('users.show'); //GET
| Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit'); //GET
| Route::post('/users/{user}', 'UserController@update')->name('users.update'); //PUT/PATCH
| Route::get('/users/{user}', 'UserController@destroy')->name('users.destroy'); //DELETE
|
*/
Route::get('/', 'Frontend\AppController@index')->name('inicio');
Route::get('/quem-somos', 'Frontend\AppController@quemSomos')->name('quem.somos');
Route::get('/treinamento/{slug}', 'Frontend\ContentController@treinamento')->name('content.treinamento');
Route::get('/palestra/{slug}', 'Frontend\ContentController@palestra')->name('content.palestra');
Route::get('/clinica/{slug}', 'Frontend\ContentController@getPage')->name('content.page');



Route::post('/send-email', 'MailController@sendemail')->name('send.email');
Route::get('/fale-conosco', 'Frontend\GtalentosController@faleconosco')->name('fale.conosco');
Route::post('/fale-conosco', 'MailController@faleconoscoemail')->name('faleconosco.email');


Auth::routes();

//Rotas do andmin geral
Route::middleware(['auth'])->group(function(){
	include (base_path('routes/admin.php'));
});

