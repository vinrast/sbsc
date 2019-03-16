<?php

Route::middleware(['auth'])->prefix('clientes')->group(function() {

  Route::get('/','CustomerController@index')->name('clientes')
        ->middleware('permission:clientes');

  Route::post('nuevo/{indicator}','CustomerController@new')->name('clientes.nuevo')
        ->middleware('permission:clientes.nuevo');

  Route::post('almacenar/{indicator}','CustomerController@storage')->name('clientes.guardar')
        ->middleware('permission:clientes.nuevo');

  Route::post('buscar-registro','CustomerController@search')->name('clientes.buscar')
        ->middleware('permission:clientes.borrar');

  Route::post('borrar/{indicator}','CustomerController@destroy')->name('clientes.borrar')
        ->middleware('permission:clientes.borrar');

});
