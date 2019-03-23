<?php
/**
 * Appointment
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Appointment'], function () {
        Route::resource('appointments', 'AppointmentsController');
        //For Datatable
        Route::post('appointments/get', 'AppointmentsTableController')->name('appointments.get');
    });
    
});