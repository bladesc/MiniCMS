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
Route::get('/administrator/menu', 'IndexMenuAdministratorController@menu')->name('admin.menu');
Route::get('/administrator/menu/add', 'IndexMenuAdministratorController@add')->name('admin.menu.add');
Route::post('/administrator/menu/add', 'IndexMenuAdministratorController@addprove')->name('admin.menu.add.prove');
Route::post('/administrator/menu/delete/{id}', 'IndexMenuAdministratorController@delete')->name('admin.menu.delete');
Route::post('/administrator/menu/modify/{id}', 'IndexMenuAdministratorController@modify')->name('admin.menu.modify');
Route::put('/administrator/menu/modify/{id}', 'IndexMenuAdministratorController@modifyprove')->name('admin.menu.modify.prove');
Route::delete('/administrator/menu/delete/{id}', 'IndexMenuAdministratorController@deleteprove')->name('admin.menu.delete.prove');

//administrator->cms
Route::get('/administrator/cms', 'IndexCmsAdministratorController@cms')->name('admin.cms');
Route::post('/administrator/cms', 'IndexCmsAdministratorController@cmss')->name('admin.cms.sort');
Route::get('/administrator/cms/add', 'IndexCmsAdministratorController@add')->name('admin.cms.add');
Route::post('/administrator/cms/add', 'IndexCmsAdministratorController@addprove')->name('admin.cms.add.prove');
Route::post('/administrator/cms/delete/{id}', 'IndexCmsAdministratorController@delete')->name('admin.cms.delete');
Route::post('/administrator/cms/modify/{id}', 'IndexCmsAdministratorController@modify')->name('admin.cms.modify');
Route::put('/administrator/cms/modify/{id}', 'IndexCmsAdministratorController@modifyprove')->name('admin.cms.modify.prove');
Route::delete('/administrator/cms/delete/{id}', 'IndexCmsAdministratorController@deleteprove')->name('admin.cms.delete.prove');

//administrator->gallery
Route::get('/administrator/gallery', 'IndexGalleryAdministratorController@gallery')->name('admin.gallery');

//administrator->seo
Route::get('/administrator/seo', 'IndexSeoAdministratorController@seo')->name('admin.seo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
