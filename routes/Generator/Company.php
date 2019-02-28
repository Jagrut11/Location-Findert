<?php
/**
 * Company
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Company'], function () {
        Route::resource('companies', 'CompaniesController');
        //For Datatable
        Route::post('companies/get', 'CompaniesTableController')->name('companies.get');
    });
    
});