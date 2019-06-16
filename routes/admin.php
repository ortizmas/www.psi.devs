<?php  
Route::get('/dashboard/home', 'DashboardController@home')->name('home');
Route::get('/home', 'DashboardController@home')->name('home');
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
