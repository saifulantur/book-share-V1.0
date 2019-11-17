<?php

Auth::routes(['verify' => true]);

Route::get('/', 'FrontendController\DashboardController@dashboard')->name('dashboard');

Route::group(['middleware'=> ['auth', 'verified']], function (){
Route::get('/test', 'FrontendController\DashboardController@test')->name('test');
});


//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin','middleware'=> ['admin']], function (){

    Route::get('/panel', 'BackendController\AdminPanelController@adminPanel')->name('panel');

});

