<?php
/**
 * Branchcompany
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Branchcompany'], function () {
        Route::resource('branchcompanies', 'BranchcompaniesController');
        //For Datatable
        Route::post('branchcompanies/get', 'BranchcompaniesTableController')->name('branchcompanies.get');
    });
    
});