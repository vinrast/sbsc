<?php

// Route::get('/', function () {
//   // $u = 6; // umbral
//   // $b = 100; // cantidad de clientes captados
//   // $c = 1500; // cantidad de clientes totales
//   // $a = ($b/$c)*100; //calculo indice
//   // $d = $u*0.5; //limite inferior
//   // $e = $u*0.66; // adecuado
//   // $f = $u+1;
//   //
//   // $valores =['umbral' => $u, 'limite rojo' => $d, 'expectativa' => $e, 'superior' => $f, 'indice' => $a];
//   // dd($valores);
//     return view('welcome');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

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

  Route::get('eliminar/{id}','DepartmentController@destroy')->name('departamentos.eliminar')
        ->middleware('permission:ajustes.departamentos.eliminar');

});
