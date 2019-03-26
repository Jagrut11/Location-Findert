<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

Route::get('/contactus', function(){
    return view('frontend.contactus');
});

Route::get('/AboutUs', function () {
    return view('frontend.AboutUs');
});

Route::get('/howitworks', function () {
    return view('frontend.howitworks');
});
Route::get('/fixappointment', function () {
    return view('frontend.fixappointment');
});

Route::post('/search','SearchController@search');

Route::get('/locate','SearchController@locate');


//Route::get('/create', 'BranchesController@create');

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});

/*
* Routes From Module Generator
*/
includeRouteFiles(__DIR__.'/Generator/');