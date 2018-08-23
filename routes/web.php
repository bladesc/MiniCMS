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

//administrator->menu
Route::get('/administrator/menu', 'IndexAdministratorController@menu')->name('admin.menu');
Route::delete('/administrator/menu/delete', 'IndexAdministratorController@delete')->name('admin.menu.delete');
Route::put('/administrator/menu/modify', 'IndexAdministratorController@modify')->name('admin.menu.modify');

//administrator->cms
Route::get('/administrator/cms', 'IndexCmsAdministratorController@cms')->name('admin.cms');
Route::delete('/administrator/cms/delete', 'IndexCmsAdministratorController@delete')->name('admin.cms.delete');
Route::put('/administrator/cms/modify', 'IndexCmsAdministratorController@modify')->name('admin.cms.modify');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
