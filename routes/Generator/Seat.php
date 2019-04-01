<?php
/**
 * Seat
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Seat'], function () {
        Route::resource('seats', 'SeatsController');
        //For Datatable
        Route::post('seats/get', 'SeatsTableController')->name('seats.get');
    });
    
});