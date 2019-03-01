<?php

Route::middleware(['auth'])->prefix('ajustes/usuarios')->group(function() {

  Route::get('/','UserController@index')->name('usuarios')
        ->middleware('permission:ajustes.usuarios');

  Route::get('ver/{user}','UserController@show')->name('usuarios.ver');

  Route::get('crear','UserController@create')->name('usuarios.crear')
        ->middleware('permission:ajustes.usuarios.crear');

  Route::post('almacenar','UserController@store')->name('usuarios.almacenar')
        ->middleware('permission:ajustes.usuarios.crear');

  Route::get('editar/{user}','UserController@edit')->name('usuarios.editar')
        ->middleware('permission:ajustes.usuarios.editar');

  Route::post('actualizar/{user}','UserController@update')->name('usuarios.actualizar')
        ->middleware('permission:ajustes.usuarios.editar');

  Route::get('eliminar/{user}','UserController@destroy')->name('usuarios.eliminar')
        ->middleware('permission:ajustes.usuarios.eliminar');
});
