<?php
/**
 * Floor
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Floor'], function () {
        Route::resource('floors', 'FloorsController');
        //For Datatable
        Route::post('floors/get', 'FloorsTableController')->name('floors.get');

        Route::post('floors/store', 'FloorsController@store')->name('floors.store');

    });
    
});