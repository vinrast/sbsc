<?php

Route::middleware(['auth'])->prefix('clientes')->group(function() {

  Route::get('/','CustomerController@index')->name('clientes')
        ->middleware('permission:clientes');

  Route::post('nuevo/{indicator}','CustomerController@new')->name('clientes.nuevo')
        ->middleware('permission:ajustes.departamentos');


});
