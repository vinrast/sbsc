<?php

Route::middleware(['auth'])->prefix('finanzas')->group(function() {

  Route::get('/','FinanceController@index')->name('finanzas')
        ->middleware('permission:finanzas');

  Route::post('nuevo/{indicator}','FinanceController@new')->name('finanzas.nuevo')
        ->middleware('permission:finanzas.nuevo');

  Route::post('almacenar/{indicator}','FinanceController@storage')->name('finanzas.guardar')
        ->middleware('permission:finanzas.nuevo');

  Route::post('buscar-registro','FinanceController@search')->name('finanzas.buscar')
        ->middleware('permission:finanzas.borrar');

  Route::post('borrar/{indicator}','FinanceController@destroy')->name('finanzas.borrar')
        ->middleware('permission:finanzas.borrar');

});
