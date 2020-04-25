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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('index', 'AdminBlogController@index')->name('admin_index');
    Route::get('form', 'AdminBlogController@form')->name('admin_form');
    Route::post('form', 'AdminBlogController@create')->name('admin_create');
    Route::get('edit', 'AdminBlogController@edit')->name('admin_edit');
    Route::post('edit', 'AdminBlogController@update')->name('admin_update');
    Route::get('delete', 'AdminBlogController@delete')->name('admin_delete');
});

Route::get('top', 'FrontBlogController@top')->name('top');
Route::get('article', 'FrontBlogController@article')->name('article');
Route::get('contact', 'FrontBlogController@contact')->name('contact');
Route::post('contact', 'FrontBlogController@send')->name('send');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
