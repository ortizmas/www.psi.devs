<?php  
Route::get('/dashboard/home', 'DashboardController@home')->name('home');
Route::get('/home', 'DashboardController@home')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');


Route::group(['middleware' => ['role:super-admin']], function() {
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('permissions', 'PermissionController');
	Route::get('permissions/assign/{role_id}', 'PermissionController@assignPermission')->name('permissions.assign');
	Route::post('permissions/assign', 'PermissionController@assignPermissionStore')->name('permissions.assign.store');

});

Route::group(['middleware' => ['role:super-admin|admin']], function() {
	//Route::resource('users', 'UserController');
	Route::resource('sections', 'SectionController');
	Route::resource('categories', 'CategoryController');
	Route::get('cursos/categories', 'CategoryController@getCategoriesByCourses')->name('categories.courses');

	//Ajax para categoria
	Route::post('categories/create-ajax', 'CategoryController@ajaxCreate')->name('ajax.create');
	Route::group(['prefix' => 'laravel-crud-search-sort-ajax-modal-form'], function () {
	    Route::get('/', 'CategoryController@index');
	});
	Route::resource('pages', 'PageController');
	Route::resource('posts', 'PostController');
});

Route::group(['middleware' => ['role:super-admin|admin|teachers']], function() {
	Route::resource('universities', 'UniversityController');
	Route::resource('periods', 'PeriodController');
	Route::resource('careers', 'CareerController');

	Route::resource('courses', 'CourseController');
	Route::resource('modules', 'ModuleController');
	Route::get('modules/{idCourse}/index', 'ModuleController@index')->name('modules.index.param');
	Route::resource('classrooms', 'ClassroomController');
	Route::get('classrooms/{idModule}/index', 'ClassroomController@index')->name('classrooms.index.param');

	Route::resource('trainees', 'TraineeController');
	Route::resource('inscriptions', 'InscriptionController');
	Route::get('alunos', 'InscriptionController@getInscriptionPaid')->name('inscriptions.paid');

	Route::resource('assignments', 'AssignmentController');
	Route::get('assignments/modules/{course_id}', 'AssignmentController@getModules')->name('assignments.modules');
	Route::get('assignments/classrooms/{module_id}', 'AssignmentController@getClassrooms')->name('assignments.classrooms');

	Route::get('assignments/{userId}/courses', 'AssignmentController@assignCourses')->name('assign.courses');
	Route::get('assignments/{course_id}/user/{userId}', 'AssignmentController@assignModules')->name('assignments.modules.user');

});

Route::resource('profiles', 'ProfileController');
Route::get('profiles/edit/{iscriptionId}', 'ProfileController@editPerfil')->name('profiles.inscription.edit');
Route::put('profiles/atualizar/{iscriptionId}', 'ProfileController@updatePerfil')->name('profiles.inscription.update');


//Tests
Route::resource('tests', 'TestController');
Route::post('tests/create-ajax', 'TestController@ajaxCreate')->name('ajax.test.create');
Route::group(['prefix' => 'ajax-test-create-form'], function () {
    Route::get('/', 'TestController@index');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
