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

// welcome page
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

// 	task-lists resource:
// 	index 	= displays lists
//	show	= displays tasks inside a list
//	edit	= edit name of list
//	create	= create a new list
Route::resource('task-lists', 'TaskListController');

//	tasks resource:
// 	create	= custom route to display 'create task' form with associated task list.
//	store	= create a new task
//	update	= sets a task to 'completed'
Route::get('tasks/create/{taskListId}', ['as' => 'tasks.create', 'uses' => 'TaskController@create'] );
Route::resource('tasks', 'TaskController', ['except' => 'create'] );


