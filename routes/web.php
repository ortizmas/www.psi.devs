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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\GtalentosController@index')->name('inicio');
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

Route::get('/dashboard/home', 'DashboardController@home')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');


Route::group(['middleware' => ['role:super-admin']], function() {
	Route::resource('users', 'UserController');
});
//Route::resource('users', 'UserController');
Route::resource('sections', 'SectionController');
Route::resource('categories', 'CategoryController');

//Ajax para categoria
Route::post('categories/create-ajax', 'CategoryController@ajaxCreate')->name('ajax.create');
Route::group(['prefix' => 'laravel-crud-search-sort-ajax-modal-form'], function () {
    Route::get('/', 'CategoryController@index');
});
Route::resource('pages', 'PageController');
Route::resource('posts', 'PostController');
Route::resource('universities', 'UniversityController');
Route::resource('periods', 'PeriodController');
Route::resource('careers', 'CareerController');
Route::resource('courses', 'CourseController');
Route::resource('modules', 'ModuleController');
Route::resource('classrooms', 'ClassroomController');
Route::resource('trainees', 'TraineeController');
Route::resource('assignments', 'AssignmentController');
Route::get('assignments/modules/{course_id}', 'AssignmentController@getModules')->name('assignments.modules');
Route::get('assignments/classrooms/{module_id}', 'AssignmentController@getClassrooms')->name('assignments.classrooms');

//Tests
Route::resource('tests', 'TestController');
Route::post('tests/create-ajax', 'TestController@ajaxCreate')->name('ajax.test.create');
Route::group(['prefix' => 'ajax-test-create-form'], function () {
    Route::get('/', 'TestController@index');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
