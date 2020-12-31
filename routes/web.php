<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
   phpinfo();
});

Auth::routes();

Route::get('stocks', 'StocksController@index')->name('stocks.index');
