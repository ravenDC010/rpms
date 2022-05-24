<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\StudentCourseController;
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

Route::get('/controller','UserController@index');

Auth::routes();


Route::middleware('auth')->group(function () {

    //all user permissions
    Route::get('/profile', 'HomeController@index')->name('profile');
    Route::prefix('projects')->group(function() {
        //view projects
        Route::get('/view','ProjectController@view')->name('project.view');
        Route::get('/view/{id}','ProjectController@viewProject')->name('project.viewProject');
    });

    //teacher permissions
    Route::group([ "middleware" => 'checkrole:teacher'], function() {
        Route::prefix('projects')->group(function() {
            //add project
            Route::get('/add','ProjectController@add')->name('ProjectController.add');

            //store project
            Route::post('/store','ProjectController@store')->name('ProjectController.store');


        });
    });
});
