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
    return redirect()->route('Home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('Home');
Route::get('/info', 'HomeController@AddPersonalInfo')->name('Info');

Route::get('/viewQuestion/{id}', 'QuestionController@viewQuestion')->name('Question');

Route::get('/tags','QuestionController@tags')->name('Tags');
Route::get('/questionByTag/{id}', 'QuestionController@questionbyTag')->name('QuestionByTag');
Route::get('/departments','QuestionController@departments')->name('Departments');
Route::get('/questionByDepartment/{id}', 'QuestionController@questionbyDepartment')->name('QuestionByDepartment');
Route::get('/search','QuestionController@search')->name('Search');
Route::post('/searchQuestion', 'QuestionController@searchQuestion')->name('SearchQuestion');
Route::get('/getUser/{id}', 'QuestionController@getUser')->name('User');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/addQuestion', 'QuestionController@addQuestion')->name('addQuestion');
    Route::post('/postQuestion', 'QuestionController@postQuestion')->name('PostQuestion');
    Route::post('/postAnswer/{id}', 'QuestionController@postAnswer')->name('Answer');
    Route::post('/voteAnswer/{id}', 'QuestionController@voteAnswer')->name('AnswerVote');
    Route::post('/voteQuestion/{id}', 'QuestionController@voteQuestion')->name('QuestionVote');
    Route::get('/editQuestion/{id}', 'QuestionController@editQuestion')->name('EditQuestion');
    Route::post('/postEditQuestion/{id}', 'QuestionController@postEditQuestion')->name('PostEditQuestion');
    Route::get('/editAnswer/{id}', 'QuestionController@editAnswer')->name('EditAnswer');
    Route::post('/postEditAnswer/{id}', 'QuestionController@postEditAnswer')->name('PostEditAnswer');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/addDepartment', 'AdminController@addDepartment')->name('Department');
    Route::post('/postDepartment', 'AdminController@postDepartment')->name('PostDepartment');
    Route::post('/deleteDepartment', 'AdminController@deleteDepartment')->name('DeleteDepartment');
    Route::get('/addTag', 'AdminController@addTag')->name('Tag');
    Route::post('/postTag', 'AdminController@postTag')->name('PostTag');
    Route::post('/deleteTag', 'AdminController@deleteTag')->name('DeleteTag');
});