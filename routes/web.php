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

Route::resource('jobs', 'JobController');

Route::resource('users', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getemps/{department}', 'JobController@fetch')->name('emps.fetch');
Route::get('/jobs/status/{status}', 'JobController@status')->name('jobstatus.index');
