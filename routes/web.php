<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'StudentController@index');
Route::group(array('prefix' => 'student'), function () {
    Route::get('/create', 'StudentController@create');
    Route::post('/store', 'StudentController@store')->name('student.store');
    Route::get('/edit/{id}', 'StudentController@edit');
    Route::post('/update/{id}', 'StudentController@update')->name('student.update');
    Route::get('/delete/{id}', 'StudentController@destroy');
});
Route::group(array('prefix' => 'marklist'), function () {
    Route::get('/', 'MarkListController@index');
    Route::get('/add-mark', 'MarkListController@create');
    Route::post('/add-marklist', 'MarkListController@store')->name('marklist.store');
    Route::get('/edit/{id}', 'MarkListController@edit');
    Route::post('/update/{id}', 'MarkListController@update')->name('marklist.update');
    Route::get('/delete/{id}', 'MarkListController@destroy');
});
    

