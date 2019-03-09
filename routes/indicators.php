<?php

Route::middleware(['auth'])->prefix('ajustes/indicadores')->group(function() {

  Route::get('/','IndicatorController@index')->name('indicadores')
        ->middleware('permission:ajustes.indicadores');

  Route::get('/test/{indicator}','IndicatorController@test')->name('test');

  Route::get('editar/{indicator}','IndicatorController@edit')->name('indicadores.editar')
        ->middleware('permission:ajustes.indicadores.editar');

  Route::post('actualizar/{indicator}','IndicatorController@update')->name('indicadores.actualizar')
        ->middleware('permission:ajustes.indicadores.editar');

  Route::post('activar/{indicator}','IndicatorController@active')->name('indicadores.activar');
        //->middleware('permission:ajustes.usuarios.eliminar');

});
