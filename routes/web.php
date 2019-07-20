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

Route::get('/task', 'TaskController@index')->name('task');

Route::post('/addTask', 'TaskController@addTask')->name('task');
Route::put('/updateTask', 'TaskController@updateTask')->name('task');

Route::get('/getTaskList', 'TaskController@getTaskList')->name('get_task_list');

Route::post('/deleteTask', 'TaskController@deleteTask')->name('delete_task');

Route::get('/home', 'HomeController@index')->name('home');
