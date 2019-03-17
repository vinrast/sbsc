<?php

Route::middleware(['auth'])->prefix('procesos-internos')->group(function() {

  Route::get('/','InternalProcessesController@index')->name('procesos-internos')
        ->middleware('permission:procesos-internos');

  Route::post('nuevo/{indicator}','InternalProcessesController@new')->name('procesos-internos.nuevo')
        ->middleware('permission:procesos-internos.nuevo');

  Route::post('almacenar/{indicator}','InternalProcessesController@storage')->name('procesos-internos.guardar')
        ->middleware('permission:procesos-internos.nuevo');

  Route::post('buscar-registro','InternalProcessesController@search')->name('procesos-internos.buscar')
        ->middleware('permission:procesos-internos.borrar');

  Route::post('borrar/{indicator}','InternalProcessesController@destroy')->name('procesos-internos.borrar')
        ->middleware('permission:procesos-internos.borrar');

});
