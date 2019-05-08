<?php

//use App\User;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
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

Route::POST('/search1','searchController@search');


Route::get('/locate/{id}','SearchController@locate');


Route::get('/logs','ShowAppointmentLogsController@showlogs');
Route::get('/autocomplete', 'AutoCompleteController@index');
Route::post('/autocomplete/fetch', 'AutoCompleteController@fetch')->name('autocomplete.fetch');



Route::get('/getlatlong', 'Backend\Access\User\UserController@convert');


Route::get('/accept/{iddd}','FixAppointmentController@update');
Route::get('/reject/{iddd}','FixAppointmentController@reject');
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


Route::get('/fixappointmentform','FixAppointmentController@store');
//route for store data in appointment table
