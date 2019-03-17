<?php

Route::middleware(['auth'])->prefix('aprendizaje')->group(function() {

  Route::get('/','LearningController@index')->name('aprendizaje')
        ->middleware('permission:aprendizaje');

  Route::post('nuevo/{indicator}','LearningController@new')->name('aprendizaje.nuevo')
        ->middleware('permission:aprendizaje.nuevo');

  Route::post('almacenar/{indicator}','LearningController@storage')->name('aprendizaje.guardar')
        ->middleware('permission:aprendizaje.nuevo');

  Route::post('buscar-registro','LearningController@search')->name('aprendizaje.buscar')
        ->middleware('permission:aprendizaje.borrar');

  Route::post('borrar/{indicator}','LearningController@destroy')->name('aprendizaje.borrar')
        ->middleware('permission:aprendizaje.borrar');

});
