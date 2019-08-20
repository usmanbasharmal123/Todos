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
// Route::get('/todos',['uses'=>'TodosController@index','as'=>'todos']);
// Route::post('/create/todo', [
//     'uses' => 'TodosController@store'
//     ]);
// Route::get('/todo/delete/{id}', ['uses'=>'TodosController@delete','as'=>'todo.delete']);
// Route::get('/todo/update/{id}',['uses'=>'TodosController@update','as'=>'todo.update']);
// Route::post('/todo/save/{id}',['uses'=>'TodosController@save','as'=>'todo.save']);


Route::get('/index',['uses'=>'TodosController@index','as'=>'index']);
Route::post('/insert',['uses'=>'TodosController@insert','as'=>'insert']);
Route::get('/delete/{id}',['uses'=>'TodosController@delete','as'=>'delete']);
Route::get('/update/{id}',['uses'=>'TodosController@update','as'=>'update']);
Route::Post('/save/{id}',['uses'=>'TodosController@save','as'=>'save']);
Route::get('completed/{id}',['uses'=>'TodosController@completed','as'=>'completed']);

Auth::routes();


Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);
    Route::get('/post/create',['uses'=>'PostsController@create','as'=>'post.create']);
    Route::post('/post/store',['uses'=>'PostsController@store','as'=>'post.store']);
    Route::get('/category/create',['uses'=>'CategoriesController@create','as'=>'category.create']);
    Route::post('/category/store',['uses'=>'CategoriesController@store','as'=>'category.store']);
    Route::get('/categories', ['uses'=>'CategoriesController@index','as'=>'categories']);
    Route::get('/category/edit/{id}', ['uses'=>'CategoriesController@edit','as'=>'category.edit']);
    Route::get('/category/delete/{id}', ['uses'=>'CategoriesController@destroy','as'=>'category.delete']);
    Route::post('/category/update/{id}', ['uses'=>'CategoriesController@update','as'=>'category.update']);
});

