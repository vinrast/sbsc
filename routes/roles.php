<?php

Route::middleware(['auth'])->prefix('ajustes/roles')->group(function() {

  Route::get('/','RoleController@index')->name('roles')
        ->middleware('permission:ajustes.roles');

  Route::get('crear','RoleController@create')->name('roles.crear')
        ->middleware('permission:ajustes.roles.crear');

  Route::post('almacenar','RoleController@store')->name('roles.almacenar')
        ->middleware('permission:ajustes.roles.crear');

  Route::get('editar/{role}','RoleController@edit')->name('roles.editar')
        ->middleware('permission:ajustes.roles.editar');

  Route::post('actualizar/{role}','RoleController@update')->name('roles.actualizar')
        ->middleware('permission:ajustes.roles.editar');

  Route::get('eliminar/{role}','RoleController@destroy')->name('roles.eliminar')
        ->middleware('permission:ajustes.roles.eliminar');

});
