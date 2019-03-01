<?php

Route::middleware(['auth'])->prefix('ajustes/departamentos')->group(function() {

  Route::get('/','DepartmentController@index')->name('departamentos')
        ->middleware('permission:ajustes.departamentos');

  Route::get('crear','DepartmentController@create')->name('departamentos.crear')
        ->middleware('permission:ajustes.departamentos.crear');

  Route::post('almacenar','DepartmentController@store')->name('departamentos.almacenar')
        ->middleware('permission:ajustes.departamentos.crear');

  Route::get('editar/{department}','DepartmentController@edit')->name('departamentos.editar')
        ->middleware('permission:ajustes.departamentos.editar');

  Route::post('actualizar/{department}','DepartmentController@update')->name('departamentos.actualizar')
        ->middleware('permission:ajustes.departamentos.editar');

  Route::get('eliminar/{department}','DepartmentController@destroy')->name('departamentos.eliminar')
        ->middleware('permission:ajustes.departamentos.eliminar');

});
