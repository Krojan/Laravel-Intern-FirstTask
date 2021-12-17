<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register',[\App\Http\Controllers\UserController::class, 'create']);
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store']);

    Route::get('/login', 'UserController@login')->name('login');
    Route::POST('/login', 'UserController@logUser');

});

Route::get('/logout', 'UserController@logoutUser')->name('logout');

Route::group(['prefix' => 'user',  'middleware' => 'auth'], function() {
    Route::get('/list', 'UserController@list')->name('user_list');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/edit/{id}', 'UserController@edit')->name('user_edit');
    Route::post('/update/{id}', 'UserController@update')->name('user_update');
    Route::get('/delete/{id}', 'UserController@delete')->name('user_delete');

});

Route::group(['prefix'=>'category', 'middleware'=>'auth'],function(){

    Route::get('/list', 'CategoryController@list')->name('category_list');
    Route::get('/create', 'CategoryController@create')->name('category_create');
    Route::post('/create', 'CategoryController@store')->name('category_store');

    Route::get('/edit/{id}', 'CategoryController@edit')->name('category_edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('category_update');
    Route::get('/delete/{id}', 'CategoryController@delete')->name('category_delete');
});

Route::group(['prefix'=>'banner', 'middleware'=>'auth'], function(){

    Route::get('/list', 'BannerController@list')->name('banner_list');
    Route::get('/create', 'BannerController@create')->name('banner_create');
    Route::post('/create', 'BannerController@store')->name('banner_store');

    Route::get('/edit/{id}', 'BannerController@edit')->name('banner_edit');
    Route::post('/update/{id}', 'BannerController@update')->name('banner_update');
    Route::get('/delete/{id}', 'BannerController@delete')->name('banner_delete');

});

Route::group(['middleware'=>'auth'], function(){
    Route::group(['prefix'=>'product'],function(){
        Route::get('/create', 'ProductController@create')->name('product_create');
        Route::post('/create', 'ProductController@store')->name('product_store');
        Route::get('/list', 'ProductController@list')->name('product_list');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product_edit');
        Route::post('/update/{id}', 'ProductController@update')->name('product_update');
        Route::get('/delete/{id}', 'ProductController@delete')->name('product_delete');
    });
});

