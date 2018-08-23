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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/administrator', 'IndexAdministratorController@index')->name('admin.index');
Route::get('/administrator/menu', 'IndexAdministratorController@menu')->name('admin.menu');
Route::delete('/administrator/menu/delete', 'IndexAdministratorController@delete')->name('admin.menu.delete');
Route::put('/administrator/menu/modify', 'IndexAdministratorController@modify')->name('admin.menu.modify');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
