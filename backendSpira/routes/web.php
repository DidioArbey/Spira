<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
// Route::get('/','App\Http\Controllers\AuthController@loginView');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {


    
    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('user.login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me' );
    Route::post('register', 'App\Http\Controllers\AuthController@register');

    Route::get('/listCourse','App\Http\Controllers\CoursesController@getAllCourses')->name('courses.list');
    Route::post('/n','App\Http\Controllers\CoursesController@storeCourse')->name('courses.store');
    Route::get('/editCourse/{id}','App\Http\Controllers\CoursesController@editCourse')->name('courses.edit');
    Route::post('/updateCourse/{id}','App\Http\Controllers\CoursesController@updateCourse')->name('courses.update');
    Route::get('/delateCourse/{id}','App\Http\Controllers\CoursesController@delateCourse')->name('courses.delete');

});




