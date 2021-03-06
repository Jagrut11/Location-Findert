<?php
/**
 * Branch
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Branch'], function () {
        Route::resource('branches', 'BranchesController');
        //For Datatable
        Route::post('branches/get', 'BranchesTableController')->name('branches.get');
    });
    
});