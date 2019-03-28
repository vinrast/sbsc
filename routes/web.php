<?php

Route::get('/', function (){
  return redirect('/inicio');
});

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');

Route::post('buscar-ano/{indicator}', 'HomeController@getYearsIndicators')->name('home.buscar-ano');

Route::post('generar', 'HomeController@generateCharts')->name('home.generar');

Route::get('auditoria', 'AuditController@index')->name('auditoria');
