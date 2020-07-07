<?php

/*
Route::get('/{any}', function () {
  return view('producto');
})->where('any', '.*');
*/
Route::get('/{name}',function () {
  return view('producto');
})->where('name', 'home|crear|productos|editar');
