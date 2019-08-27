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

Route::prefix('master-data/menu')->group(function() {
    Route::get('/', 'MasterDataMenuController@index');
    Route::get('/get', 'MasterDataMenuController@get')->name("master_data.menu.get");
    Route::get('/', 'MasterDataMenuController@index')->name("master_data.menu.store");
});
