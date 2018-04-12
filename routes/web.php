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

//Route Index User
Route::get('/','UserIndexController@index');
Route::get('/event','UserIndexController@event');

Route::group(['prefix'=>'users','middleware'=>['auth','role:member']], function(){
    Route::get('{id}/detailevent','UserIndexController@detailevent');
    Route::get('/','UserIndexController@myevent');
    Route::post('{id}/daftar','UserIndexController@daftar');
    Route::post('{id}','UserIndexController@destroy');
});



//Route admin / dashboard
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    });
    Route::get('/logout','UserController@logout');

//Route Event Start
    Route::group(['prefix'=>'event'], function(){
        Route::get('/', 'EventController@index');
        Route::get('/excel', 'LaporanController@eventexcel');
        Route::get('/pdf', 'LaporanController@eventpdf');        
        Route::get('/create','EventController@create');
        Route::post('/','EventController@store');
        Route::get('/{id}/edit','EventController@edit');
        Route::post('{id}/update','EventController@update');
        Route::post('{id}','EventController@destroy');
    });

//Route Users
    Route::group(['prefix'=>'users'], function(){
        Route::get('/', 'UserController@index');
        Route::get('/create','UserController@create');
        Route::post('/','UserController@store');
        Route::get('{id}/edit','UserController@edit');
        Route::post('{id}/update','UserController@update');
        Route::post('{id}','UserController@destroy');

    });

//Route Peserta

Route::group(['prefix'=>'peserta'],function(){
    Route::get('/', 'PesertaController@index');
    Route::get('/{id}/view','PesertaController@view');
    Route::post('/{id}', 'PesertaController@destroy');


});

});
//Route Admin End

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
