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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/info', 'HomeController@AddPersonalInfo')->name('Info');
Route::get('/addQuestion', 'QuestionController@addQuestion')->name('addQuestion');
Route::post('/postQuestion', 'QuestionController@postQuestion')->name('PostQuestion');;
Route::get('/viewQuestion', 'QuestionController@viewQuestion')->name('Question');
Route::get('/addDepartment', 'AdminController@addDepartment')->name('Department');
Route::post('/postDepartment', 'AdminController@postDepartment')->name('PostDepartment');
Route::post('/deleteDepartment', 'AdminController@deleteDepartment')->name('DeleteDepartment');
Route::get('/addTag', 'AdminController@addTag')->name('Tag');
Route::post('/postTag', 'AdminController@postTag')->name('PostTag');
Route::post('/deleteTag', 'AdminController@deleteTag')->name('DeleteTag');