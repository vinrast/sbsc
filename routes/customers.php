<?php

Route::middleware(['auth'])->prefix('clientes')->group(function() {

  Route::get('/','CustomerController@index')->name('clientes')
        ->middleware('permission:clientes');


});
