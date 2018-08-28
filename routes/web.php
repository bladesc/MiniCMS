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

    //administrator->menu
    Route::get('/administrator/menu', 'IndexMenuAdministratorController@menu')->name('admin.menu');
    Route::get('/administrator/menu/add', 'IndexMenuAdministratorController@add')
        ->name('admin.menu.add');
    Route::post('/administrator/menu/add', 'IndexMenuAdministratorController@addProve')
        ->name('admin.menu.add.prove');
    Route::post('/administrator/menu/delete/{id}', 'IndexMenuAdministratorController@delete')
        ->name('admin.menu.delete');
    Route::post('/administrator/menu/modify/{id}', 'IndexMenuAdministratorController@modify')
        ->name('admin.menu.modify');
    Route::put('/administrator/menu/modify/{id}', 'IndexMenuAdministratorController@modifyProve')
        ->name('admin.menu.modify.prove');
    Route::delete('/administrator/menu/delete/{id}', 'IndexMenuAdministratorController@deleteProve')
        ->name('admin.menu.delete.prove');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/administrator', 'IndexAdministratorController@index')->name('admin.index');

    //administrator->cms
    Route::get('/administrator/cms', 'IndexCmsAdministratorController@cms')->name('admin.cms');
    Route::get('/administrator/cms/add', 'IndexCmsAdministratorController@add')->name('admin.cms.add');
    Route::post('/administrator/cms/add', 'IndexCmsAdministratorController@addProve')->name('admin.cms.add.prove');
    Route::post('/administrator/cms/delete/{id}', 'IndexCmsAdministratorController@delete')->name('admin.cms.delete');
    Route::post('/administrator/cms/modify/{id}', 'IndexCmsAdministratorController@modify')->name('admin.cms.modify');
    Route::put('/administrator/cms/modify/{id}', 'IndexCmsAdministratorController@modifyProve')->name('admin.cms.modify.prove');
    Route::delete('/administrator/cms/delete/{id}', 'IndexCmsAdministratorController@deleteProve')->name('admin.cms.delete.prove');

    //administrator->gallery
    Route::get('/administrator/gallery', 'IndexGalleryAdministratorController@gallery')->name('admin.gallery');
    Route::get('/administrator/gallery/add-image', 'IndexGalleryAdministratorController@addImage')->name('admin.gallery.add');
    Route::put('/administrator/gallery/add-image', 'IndexGalleryAdministratorController@addImageProve')->name('admin.gallery.add.prove');

    //administrator->gallery->categories
    Route::get('/administrator/gallery/add-category', 'IndexGalleryAdministratorController@addCategory')->name('admin.gallery.add.category');
    Route::post('/administrator/gallery/add-category', 'IndexGalleryAdministratorController@addCategoryProve')->name('admin.gallery.add.category.prove');


    //administrator->seo
    Route::get('/administrator/seo', 'IndexSeoAdministratorController@seo')->name('admin.seo');

    //administrator->users
    Route::get('/administrator/users', 'AdminUsersController@index')->name('admin.users');

    //administrator->account
    Route::get('/administrator/account', 'AdminAccountController@index')->name('admin.account');

    //administrator->statistics
    Route::get('/administrator/statistics', 'AdminStatisticsController@index')->name('admin.statistics');

    //administrator->template
    Route::get('/administrator/template', 'AdminTemplateController@index')->name('admin.template');
    Route::get('/administrator/template/add-logo', 'AdminTemplateController@addLogo')->name('admin.template.add.logo');
    Route::put('/administrator/template/add-logo', 'AdminTemplateController@addLogoProve')->name('admin.template.add.logo.prove');
    Route::get('/administrator/template/add-header', 'AdminTemplateController@addHeader')->name('admin.template.add.header');
    Route::put('/administrator/template/add-header', 'AdminTemplateController@addHeaderProve')->name('admin.template.add.header.prove');
});

    Route::get('/home', 'HomeController@index')->name('home');
    // Only authenticated users may enter...

