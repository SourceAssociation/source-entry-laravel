<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 只有站点开启了才能访问
Route::group(['middleware' => 'date'], function () {
    Route::get('/', 'HomeController@index');

    // 个人中心
    Route::group(['middleware' => 'auth'], function () {
        Route::get('center', 'CenterController@index');
        Route::get('center/avatar', 'CenterController@avatar');
    });

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

});

// Ajax请求（提示保证站点开启）
Route::group(['middleware' => 'ajax'], function () {
    // 登录注册
    Route::post('ajax/login', 'AuthController@login');
    Route::post('ajax/register', 'AuthController@register');

    // 更新用户信息
    Route::post('ajax/center/update', 'CenterController@update');
});

