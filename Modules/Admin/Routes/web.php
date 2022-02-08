<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication')->group(function(){
    //Đăng nhập
    Route::get('/login', 'AdminLoginController@getFormLogin')->name('admin.get.login');
    Route::post('/login', 'AdminLoginController@postFormLogin')->name('admin.post.login');

    //Đăng xuất
    Route::get('/logout', 'AdminLogoutController@getLogout')->name('admin.get.logout');
});



Route::prefix('api-admin')->middleware('CheckLoginAdmin')->group(function() {
    #Dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    #Route cho Category
    Route::prefix('category')->group(function () {
        #Index
        Route::get('/', 'AdminCategoryController@index')->name('admin.category.index');

        #Create
        Route::get('/create', 'AdminCategoryController@create')->name('admin.category.create');
        Route::post('/create', 'AdminCategoryController@store')->name('admin.category.store');

        #Edit
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('admin.category.edit');
        Route::post('/edit', 'AdminCategoryController@update')->name('admin.category.update');

        #Delete
        Route::get('/delete/{id}', 'AdminCategoryController@delete')->name('admin.category.delete');

        #Active và Hot
        Route::get('/active/{id}', 'AdminCategoryController@active')->name('admin.category.active');
        Route::get('/hot/{id}', 'AdminCategoryController@hot')->name('admin.category.hot');

        #Ajax detail
        Route::post('/detail/{id}', 'AdminCategoryController@ajaxDetail')->name('ajax.admin.category.detail');
    });


    #Route cho Products
    Route::prefix('product')->group(function () {
        #Index
        Route::get('/', 'AdminProductController@index')->name('admin.product.index');

        #Create
        Route::get('/create', 'AdminProductController@create')->name('admin.product.create');
        Route::post('/create', 'AdminProductController@store')->name('admin.product.store');

        #Edit
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('admin.product.edit');
        Route::post('/edit', 'AdminProductController@update')->name('admin.product.update');

        #Delete
        Route::get('/delete/{id}', 'AdminProductController@delete')->name('admin.product.delete');

        #Active và Hot
        Route::get('/active/{id}', 'AdminProductController@active')->name('admin.product.active');
        Route::get('/hot/{id}', 'AdminProductController@hot')->name('admin.product.hot');

        #Ajax detail
        Route::post('/detail/{id}', 'AdminProductController@ajaxDetail')->name('ajax.admin.product.detail');
    });


    #Route cho Slide
    Route::prefix('slide')->group(function () {
        #Index
        Route::get('/', 'AdminSlideController@index')->name('admin.slide.index');

        #Create
        Route::get('/create', 'AdminSlideController@create')->name('admin.slide.create');
        Route::post('/create', 'AdminSlideController@store')->name('admin.slide.store');

        #Edit
        Route::get('/edit/{id}', 'AdminSlideController@edit')->name('admin.slide.edit');
        Route::post('/edit', 'AdminSlideController@update')->name('admin.slide.update');

        #Delete
        Route::get('/delete/{id}', 'AdminSlideController@delete')->name('admin.slide.delete');

        #Active và Hot
        Route::get('/active/{id}', 'AdminSlideController@active')->name('admin.slide.active');
        Route::get('/hot/{id}', 'AdminSlideController@hot')->name('admin.slide.hot');

        #Ajax detail
        Route::post('/detail/{id}', 'AdminSlideController@ajaxDetail')->name('ajax.admin.slide.detail');
    });

    #Route cho User
    Route::prefix('user')->group(function () {
        #Index
        Route::get('/', 'AdminUserController@index')->name('admin.user.index');

        #Delete
        Route::get('/delete/{id}', 'AdminUserController@delete')->name('admin.user.delete');

        #Active
        Route::get('/active/{id}', 'AdminUserController@active')->name('admin.user.active');

        #Ajax detail
        Route::post('/detail/{id}', 'AdminUserController@ajaxDetail')->name('ajax.admin.user.detail');
    });

    #Route cho Transaction
    Route::prefix('transaction')->group(function () {
        #Index
        Route::get('/', 'AdminTransactionController@index')->name('admin.transaction.index');

        #Delete
        Route::get('/delete/{id}', 'AdminTransactionController@delete')->name('admin.transaction.delete');

        #Action
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.transaction.action');

        #Ajax detail
        Route::post('/detail/{id}', 'AdminTransactionController@ajaxDetail')->name('ajax.admin.transaction.detail');
        
    });
});
