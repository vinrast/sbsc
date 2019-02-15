<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
