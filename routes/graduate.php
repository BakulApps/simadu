<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'kelulusan'], function (){
    Route::match(['get', 'post'], '/', 'MainController@index')->name('home');
    Route::match(['get', 'post'], '/autentikasi/{id}', 'MainController@authentication')->name('home.authentication');
    Route::match(['get', 'post'], '/pengumuman', 'MainController@search')->name('notify');
    Route::match(['get', 'post'], '/cetak', 'MainController@print')->name('print');
    Route::group(['prefix' => 'administrasi'], function (){
        Route::match(['get', 'post'], '/masuk', 'AuthController@login')->name('admin.login');
        Route::match(['get', 'post'], '/keluar', 'AuthController@logout')->name('admin.logout');
        Route::group(['middleware' => 'auth.graduate'], function (){
            Route::match(['get', 'post'], '', 'AdminController@index')->name('admin.home');
            Route::match(['get', 'post'], '/siswa', 'AdminController@student')->name('admin.student');
            Route::match(['get', 'post'], '/master/tahun', 'MasterController@year')->name('admin.master.year');
            Route::match(['get', 'post'], '/master/pelajaran', 'MasterController@subject')->name('admin.master.subject');
            Route::match(['get', 'post'], '/penilaian/semester', 'ValueController@semester')->name('admin.value.semester');
            Route::match(['get', 'post'], '/penilaian/ujian', 'ValueController@exam')->name('admin.value.exam');
            Route::match(['get', 'post'], '/penilaian/ijazah', 'ValueController@ijazah')->name('admin.value.ijazah');
            Route::match(['get', 'post'], '/pengumuman', 'AdminController@notify')->name('admin.notify');
            Route::match(['get', 'post'], '/penilaian/pengaturan', 'ValueController@setting')->name('admin.value.setting');
            Route::match(['get', 'post'], '/pengaturan', 'AdminController@setting')->name('admin.setting');
        });
    });

});
