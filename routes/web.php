<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('fe.home');

#Products
Route::prefix('san-pham')->group(function(){

    #All products
    Route::get('/','ProductController@index')->name('fe.product.all');

    #Product by Category
    Route::get('/{slugID}','ProductController@byCategory')->name('fe.product.by.category');

    #Detail product
    Route::get('/{slug}/{id}','ProductController@detailProduct')->name('fe.product.detail');
});

#Account
Route::prefix('account')->group(function(){
    //Register
    Route::get('/register', 'UserRegisterController@getFormRegister')->name('fe.get.register');
    Route::post('/register', 'UserRegisterController@postFormRegister')->name('fe.post.register');

    //Ajax checkmail register
    Route::get('/check-mail', 'AjaxController@checkmail')->name('ajax.check.mail');

    //Login
    Route::get('/login', 'UserLoginController@getFormLogin')->name('fe.get.login');
    Route::post('/login', 'UserLoginController@postFormLogin')->name('fe.post.login');

    //Logout
    Route::get('/logout', 'UserLogoutController@getLogout')->name('fe.get.logout');
});



//Cart
Route::prefix('cart')->group(function(){
    //Add to cart
    Route::get('/add/{proID}', 'ShoppingCartController@add')->name('shopping.get.add');
    
    //Delete 1 pro in cart
    Route::get('/delete/{rowID}', 'ShoppingCartController@remove')->name('shopping.get.remove');

    //update cart
    Route::post('/update/{proID}', 'ShoppingCartController@update')->name('ajax.shopping.get.update');

    //List product in cart
    Route::get('/', 'ShoppingCartController@index')->name('shopping.get.index');

    //Tiến hành thanh toán
    Route::get('/checkout', 'ShoppingCartController@checkout')->name('shopping.get.checkout');
    Route::post('/checkout', 'ShoppingCartController@postCheckout')->name('shopping.post.checkout');

});


#Send mail test
Route::get('/gui', 'EmailController@sendEMail');


Route::get('/donhang', function () {
    return view('emails.xacnhanDH');
});


Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
