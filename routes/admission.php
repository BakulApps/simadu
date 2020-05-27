<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ppdb'], function (){
    Route::match(['get', 'post'],'/', 'MainController@index')->name('admission.home');
    Route::match(['get', 'post'],'/pendaftaran', 'MainController@register')->name('admission.register');
    Route::match(['get', 'post'],'/unggah', 'MainController@upload')->name('admission.upload');
    Route::match(['get', 'post'],'/pengumuman', 'MainController@notice')->name('admission.notice');
    Route::match(['get', 'post'],'/cetak', 'MainController@print')->name('admission.print');
    Route::match(['get', 'post'],'/test', function (){
        return \Illuminate\Support\Facades\Artisan::call('storage:link');
    });
    Route::group(['prefix' => 'administrasi'], function (){
        Route::match(['get', 'post'],'/masuk', 'AuthController@login')->name('admission.admin.login');
        Route::match(['get', 'post'],'/keluar', 'AuthController@logout')->name('admission.admin.logout');
        Route::group(['middleware' => 'auth.admission'], function (){
            Route::match(['get', 'post'], '/', 'AdminController@index')->name('admission.admin.home');
            Route::match(['get', 'post'], '/peserta', 'AdminController@student')->name('admission.admin.student');
            Route::match(['get', 'post'], '/unggah', 'AdminController@upload')->name('admission.admin.upload');
            Route::match(['get', 'post'], '/pengaturan', 'AdminController@setting')->name('admission.admin.setting');
        });
    });
});

