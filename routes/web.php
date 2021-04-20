<?php

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

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('courses', 'App\Http\Controllers\CoursesController@getAllCourses');
Route::get('courses/{id}', 'App\Http\Controllers\CoursesController@getCourses');
Route::post('courses', 'App\Http\Controllers\CoursesController@createCourses');
Route::put('courses/{id}', 'App\Http\Controllers\CoursesController@updateCourses');
Route::delete('courses/{id}', 'App\Http\Controllers\CoursesController@deleteCourses');
*/