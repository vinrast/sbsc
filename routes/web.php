<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('buscar-ano/{indicator}', 'HomeController@getYearsIndicators')->name('home.buscar-ano');
