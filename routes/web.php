<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('company', 'CompanyController');
Route::get('getProjects','ProjectController@getProject')->name('get.project');
Route::resource('projects', 'ProjectController');
Route::resource('roles', 'RoleController');
Route::resource('comments', 'CommentController');
Route::resource('tasks', 'TaskController');
