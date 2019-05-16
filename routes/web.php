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
Route::get('/quem-somos', 'Frontend\GtalentosController@trabalheConosco');

Route::get('/processo-seletivo', 'Frontend\GtalentosController@vacancies')->name('processo.seletivo');
Route::post('/send-email', 'MailController@sendemail')->name('send.email');
Route::get('/fale-conosco', 'Frontend\GtalentosController@faleconosco')->name('fale.conosco');
Route::post('/fale-conosco', 'MailController@faleconoscoemail')->name('faleconosco.email');
Route::get('/gt/{slug?}', 'Frontend\GtalentosController@show')->name('gestaot.show');

Route::get('/jovens-talentos', 'Frontend\AppController@index')->name('jovens.talentos');
Route::get('/filter', 'Frontend\AppController@filter')->name('filter');
Route::post('/inscription', 'Frontend\AppController@inscription')->name('inscription.store');
Route::get('/jovens/{slug?}', 'Frontend\AppController@show')->name('info.show');


Auth::routes();

//Rotas do andmin geral
Route::middleware(['auth'])->group(function(){
	include (base_path('routes/admin.php'));
});

