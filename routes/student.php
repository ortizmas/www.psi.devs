<?php 

Route::prefix('home')->namespace('Students')->group(function () {
    Route::get('my-courses', 'StudentController@index')->name('my.courses');
});

Route::prefix('course')->namespace('Students')->group(function () {
    Route::get('{url}/learn/lecture/{id}', 'StudentController@myCourse')->name('learn.lecture');
});