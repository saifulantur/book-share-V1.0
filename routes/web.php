<?php

Auth::routes(['verify' => true]);

Route::get('/', 'FrontendController\DashboardController@dashboard')->name('dashboard');//User Dashboard

Route::group(['middleware'=> ['auth', 'verified']], function (){

    Route::get('/test', 'FrontendController\DashboardController@test')->name('test');//For test purpose

});


//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin','middleware'=> ['admin']], function (){

    Route::get('/panel', 'BackendController\AdminPanelController@adminPanel')->name('panel');//admin Dashboard

    Route::get('/author', 'BackendController\AuthorController@index')->name('author');//Author index page
    Route::post('/author/store', 'BackendController\AuthorController@store')->name('authorStore');//Author store
    Route::get('/author/edit/{id}', 'BackendController\AuthorController@edit')->name('authorEdit');//Author Edit Page
    Route::post('/author/update/{id}', 'BackendController\AuthorController@update')->name('authorUpdate');//Author Update
    Route::get('/author/destroy/{id}', 'BackendController\AuthorController@destroy')->name('authorDestroy');//Author Soft Delete
    Route::get('/author/restore/{id}', 'BackendController\AuthorController@restore')->name('authorRestore');//Author Restore
    Route::get('/author/permanentDelete/{id}', 'BackendController\AuthorController@permanentDelete')->name('authorPermanentDelete');//Author Permanent Delete

    Route::get('/category', 'BackendController\CategoryController@index')->name('category');//Category index page
    Route::post('/category/store', 'BackendController\CategoryController@store')->name('categoryStore');//Category store
    Route::get('/category/edit/{id}', 'BackendController\CategoryController@edit')->name('categoryEdit');//Category Edit Page
    Route::post('/category/update/{id}', 'BackendController\CategoryController@update')->name('categoryUpdate');//Category Update
    Route::get('/category/destroy/{id}', 'BackendController\CategoryController@destroy')->name('categoryDestroy');//Category Soft Delete
    Route::get('/category/restore/{id}', 'BackendController\CategoryController@restore')->name('categoryRestore');//Category Restore
    Route::get('/category/permanentDelete/{id}', 'BackendController\CategoryController@permanentDelete')->name('categoryPermanentDelete');//Category Permanent Delete

    Route::get('/publisher', 'BackendController\PublisherController@index')->name('publisher');//publisher index page
    Route::post('/publisher/store', 'BackendController\PublisherController@store')->name('publisherStore');//publisher store
    Route::get('/publisher/edit/{id}', 'BackendController\PublisherController@edit')->name('publisherEdit');//publisher Edit Page
    Route::post('/publisher/update/{id}', 'BackendController\PublisherController@update')->name('publisherUpdate');//publisher Update
    Route::get('/publisher/destroy/{id}', 'BackendController\PublisherController@destroy')->name('publisherDestroy');//publisher Soft Delete
    Route::get('/publisher/restore/{id}', 'BackendController\PublisherController@restore')->name('publisherRestore');//publisher Restore
    Route::get('/publisher/permanentDelete/{id}', 'BackendController\PublisherController@permanentDelete')->name('publisherPermanentDelete');//publisher Permanent Delete

    Route::get('/city', 'BackendController\CityController@index')->name('city');//city index page
    Route::post('/city/store', 'BackendController\CityController@store')->name('cityStore');//city store
    Route::get('/city/edit/{id}', 'BackendController\CityController@edit')->name('cityEdit');//city Edit Page
    Route::post('/city/update/{id}', 'BackendController\CityController@update')->name('cityUpdate');//city Update
    Route::get('/city/destroy/{id}', 'BackendController\CityController@destroy')->name('cityDestroy');//city Soft Delete
    Route::get('/city/restore/{id}', 'BackendController\CityController@restore')->name('cityRestore');//city Restore
    Route::get('/city/permanentDelete/{id}', 'BackendController\CityController@permanentDelete')->name('cityPermanentDelete');//city Permanent Delete


    Route::get('/area', 'BackendController\AreaController@index')->name('area'); //area index page
    Route::post('/area/store', 'BackendController\AreaController@store')->name('areaStore'); //Area Store
    Route::get('area/edit/{id}', 'BackendController\AreaController@edit')->name('areaEdit'); // Area Edit Page
    Route::post('area/update/{id}', 'BackendController\AreaController@update')->name('areaUpdate'); // Area Update

    Route::get('/area/destroy/{id}', 'BackendController\AreaController@destroy')->name('areaDestroy');//Area Soft Delete
    Route::get('/area/restore/{id}', 'BackendController\AreaController@restore')->name('areaRestore');//city Restore
    Route::get('/area/permanentDelete/{id}', 'BackendController\AreaController@permanentDelete')->name('areaPermanentDelete');//city Permanent Delete

});

