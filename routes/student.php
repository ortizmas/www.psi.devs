<?php 

Route::prefix('home')->namespace('Students')->group(function () {
    Route::get('my-courses', 'StudentController@index')->name('my.courses');
});

Route::prefix('course')->namespace('Students')->group(function () {
    Route::get('{url}/learn/lecture/{id}', 'StudentController@myCourse')->name('learn.lecture');
    Route::get('/{url}/learn/{id}', 'StudentController@getClassroom')->name('learn.classroom');
    Route::get('class/{url}/learn/{id}', 'StudentController@getClassroomBySlugAndId')->name('learn.play');

    Route::get('/has-many-through', 'StudentController@hasManyThrough')->name('learn.hasmanythrough');
});

Route::post('student/anotation', 'AnnotationController@storeStudentNotes')->name('student.annotation');