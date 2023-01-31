<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::get('courseUsers', 'CourseUserController@index')->name('courseUser.index');
    Route::delete('courseUsers/{id}', 'CourseUserController@destroy')->name('courseUser.destroy');
    Route::get('users/{id}/card', 'UserController@showCard');
    Route::post('users/{id}/card', 'UserController@updateCard')->name('cards.update');
    Route::resource('course-types', 'CourseTypeController');
    Route::resource('courses', 'CourseController')->except('show');
    Route::get('courses/{id}/courseDetails', 'CourseController@courseDetail')
        ->name('courses.courseDetails.index');
    Route::get('courses/{id}/courseDetails/create', 'CourseController@courseDetailCreate')
        ->name('courses.courseDetails.create');
    Route::post('courses/{id}/courseDetails', 'CourseController@courseDetailStore')
        ->name('courses.courseDetails.store');
    Route::get('courses/{course_id}/courseDetails/{courseDetail_id}', 'CourseController@courseDetailEdit')
        ->name('courses.courseDetails.edit');
    Route::put('courses/{course_id}/courseDetails/{courseDetail_id}', 'CourseController@courseDetailUpdate')
        ->name('courses.courseDetails.update');
    Route::delete('courses/{course_id}/courseDetails/{courseDetail_id}', 'CourseController@courseDetailDelete')
        ->name('courses.courseDetails.destroy');
});
