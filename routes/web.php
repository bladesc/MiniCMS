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



Auth::routes();

Route::group(['middleware' => ['web']], function() {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/pages/{name}', 'IndexController@pages')
        ->where(['name' => '[a-z]+'])
        ->name('index.pages');

});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/administrator', 'AdministratorController@index')->name('admin.index');

    //administrator->menu
    Route::get('/administrator/menu', 'AdminMenuController@menu')->name('admin.menu');
    Route::get('/administrator/menu/add', 'AdminMenuController@add')
        ->name('admin.menu.add');
    Route::post('/administrator/menu/add', 'AdminMenuController@addProve')
        ->name('admin.menu.add.prove');
    Route::post('/administrator/menu/delete/{id}', 'AdminMenuController@delete')
        ->name('admin.menu.delete');
    Route::post('/administrator/menu/modify/{id}', 'AdminMenuController@modify')
        ->name('admin.menu.modify');
    Route::put('/administrator/menu/modify/{id}', 'AdminMenuController@modifyProve')
        ->name('admin.menu.modify.prove');
    Route::delete('/administrator/menu/delete/{id}', 'AdminMenuController@deleteProve')
        ->name('admin.menu.delete.prove');

    //administrator->cms
    Route::get('/administrator/cms', 'AdminCmsController@cms')->name('admin.cms');
    Route::get('/administrator/cms/add', 'AdminCmsController@add')->name('admin.cms.add');
    Route::post('/administrator/cms/add', 'AdminCmsController@addProve')->name('admin.cms.add.prove');
    Route::post('/administrator/cms/delete/{id}', 'AdminCmsController@delete')->name('admin.cms.delete');
    Route::post('/administrator/cms/modify/{id}', 'AdminCmsController@modify')->name('admin.cms.modify');
    Route::put('/administrator/cms/modify/{id}', 'AdminCmsController@modifyProve')->name('admin.cms.modify.prove');
    Route::delete('/administrator/cms/delete/{id}', 'AdminCmsController@deleteProve')->name('admin.cms.delete.prove');

    //administrator->gallery
    Route::get('/administrator/gallery', 'AdminGalleryController@gallery')->name('admin.gallery');
    Route::get('/administrator/gallery/add-image', 'AdminGalleryController@addImage')->name('admin.gallery.add');
    Route::put('/administrator/gallery/add-image', 'AdminGalleryController@addImageProve')->name('admin.gallery.add.prove');

    //administrator->gallery->categories
    Route::get('/administrator/gallery/add-category', 'AdminGalleryController@addCategory')->name('admin.gallery.add.category');
    Route::post('/administrator/gallery/add-category', 'AdminGalleryController@addCategoryProve')->name('admin.gallery.add.category.prove');


    //administrator->seo
    Route::get('/administrator/seo', 'AdminSeoController@seo')->name('admin.seo');

    //administrator->users
    Route::get('/administrator/users', 'AdminUsersController@index')->name('admin.users');

    //administrator->account
    Route::get('/administrator/account', 'AdminAccountController@index')->name('admin.account');

    //administrator->statistics
    Route::get('/administrator/statistics', 'AdminStatisticsController@index')->name('admin.statistics');

    //administrator->template
    Route::get('/administrator/template', 'AdminTemplateController@index')
        ->name('admin.template');
    Route::get('/administrator/template/add-logo', 'AdminTemplateController@addLogo')
        ->name('admin.template.add.logo');
    Route::put('/administrator/template/add-logo', 'AdminTemplateController@addLogoProve')
        ->name('admin.template.add.logo.prove');
    Route::get('/administrator/template/add-header', 'AdminTemplateController@addHeader')
        ->name('admin.template.add.header');
    Route::put('/administrator/template/add-header', 'AdminTemplateController@addHeaderProve')
        ->name('admin.template.add.header.prove');
    Route::delete('/administrator/template/{id}', 'AdminTemplateController@deleteItem')
        ->name('admin.template.delete.item');
    Route::put('/administrator/template/{id}', 'AdminTemplateController@updateItem')
        ->name('admin.template.update.item');
});

    Route::get('/home', 'HomeController@index')->name('home');
    // Only authenticated users may enter...

