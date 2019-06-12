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

Route::group(['middleware'=>'web'], function() 
{
    Route::get('/', ['uses'=>'IndexController@actionIndex', 'as'=>'home']);
    Route::match(['get','post'],'/add', ['uses'=>'IndexController@actionAdd', 'as'=>'add']);
    Route::match(['get', 'post'], '/update/{id}', ['uses' => 'IndexController@actionUpdate', 'as' => 'update'])->where('id', '[0-9]+');
    Route::get('/delete/{id}', ['uses' => 'IndexController@actionDelete', 'as' => 'delete'])->where('id', '[0-9]+');
    Route::get('/generate/{id}', ['uses' => 'IndexController@actionGenerate', 'as' => 'generate'])->where('id', '[0-9]+');
    Route::get('/statistics/{id}', ['uses' => 'IndexController@actionStatistics', 'as' => 'statistics'])->where('id', '[0-9]+');
    Route::match(['get','post'],'/download/{name?}', ['uses' => 'IndexController@actionDownload', 'as' => 'download']);
    
    
});