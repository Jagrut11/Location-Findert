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
});

Route::get('/howitworks', function () {
    return view('frontend.howitworks');
});
Route::get('/fixappointment', function () {
    return view('frontend.fixappointment');
});

Route::POST('/search',function(){
    $q = Input::get ( 'q' );
     // dd($q);
    $user = User::where('first_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        //dd($user);
        return view('frontend.user.dashboard')->withDetails($user)->withQuery ( $q );
    else return view ('frontend.user.dashboard')->withMessage('No Details found. Try to search again !');
});

Route::POST('/search1',function(){
    $q = Input::get ( 'q' );
     // dd($q);
    $user = User::where('first_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        //dd($user);
        return view('frontend.fixappointment')->withDetails($user)->withQuery ( $q );
    else return view ('frontend.fixappointment')->withMessage('No Details found. Try to search again !');
});

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