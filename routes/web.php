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

Route::get('/contactus', function(){
    return view('frontend.contactus');
});

Route::get('/AboutUs', function () {
    return view('frontend.AboutUs');
});//route to redirect to About Us page

Route::get('/howitworks', function () {
    return view('frontend.howitworks');
});//route to redirect to How It Works page

Route::get('/fixappointment', function () {
    return view('frontend.fixappointment');
});//route to redirect to Fix Appointment page


Route::POST('/search1','searchController@search');
//route to execute search Functionality 

Route::post('/search','SearchController@search');

Route::get('/locate/{id}','SearchController@locate');

//Route::get('locate/{lat}/{lng}', 'SearchController@locate');

Route::get('/logs','ShowAppointmentLogsController@showlogs');

//Route::get('/create', 'BranchesController@create');

// Route::get('/getlatlong', function () {
//     return view('backend.access.getlatlong');
// });

Route::get('/getlatlong', 'Backend\Access\User\UserController@convert');

Route::get('/accept/{id}/{idd}','FixAppointmentController@update');
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
