<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'kelulusan'], function (){
    Route::match(['get', 'post'], '/', 'MainController@index')->name('graduate.home');
    Route::match(['get', 'post'], '/autentikasi/{id}', 'MainController@authentication')->name('graduate.home.authentication');
    Route::match(['get', 'post'], '/pengumuman', 'MainController@search')->name('graduate.notify');
    Route::match(['get', 'post'], '/cetak', 'MainController@print')->name('graduate.print');
    Route::match(['get', 'post'], '/test', 'MainController@test')->name('graduate.test');
    Route::group(['prefix' => 'administrasi'], function (){
        Route::match(['get', 'post'], '/masuk', 'AuthController@login')->name('graduate.admin.login');
        Route::match(['get', 'post'], '/keluar', 'AuthController@logout')->name('graduate.admin.logout');
        Route::group(['middleware' => 'auth.graduate'], function (){
            Route::match(['get', 'post'], '', 'AdminController@index')->name('graduate.admin.home');
            Route::match(['get', 'post'], '/siswa', 'AdminController@student')->name('graduate.admin.student');
            Route::match(['get', 'post'], '/master/tahun', 'MasterController@year')->name('graduate.admin.master.year');
            Route::match(['get', 'post'], '/master/pelajaran', 'MasterController@subject')->name('graduate.admin.master.subject');
            Route::match(['get', 'post'], '/penilaian/semester', 'ValueController@semester')->name('graduate.admin.value.semester');
            Route::match(['get', 'post'], '/penilaian/ujian', 'ValueController@exam')->name('graduate.admin.value.exam');
            Route::match(['get', 'post'], '/penilaian/ijazah', 'ValueController@ijazah')->name('graduate.admin.value.ijazah');
            Route::match(['get', 'post'], '/pengumuman', 'AdminController@notify')->name('graduate.admin.notify');
            Route::match(['get', 'post'], '/penilaian/pengaturan', 'ValueController@setting')->name('graduate.admin.value.setting');
            Route::match(['get', 'post'], '/pengaturan', 'AdminController@setting')->name('graduate.admin.setting');
        });
    });

});
