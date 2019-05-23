<?php
//use App\User;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
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

Route::get('/fixappointment', function () {
    return view('frontend.fixappointment');
});//route to redirect to FixAppointment page

Route::get('/getlatlong', 'Backend\Access\User\UserController@convert');
//route to redirect to Maps page to show user location (for user side)

Route::get('/getcoords','Backend\Access\User\UserController@convertcoords');


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

Route::post('/fixappointment/search1','SearchController@search');//route to implement and redirect to Search Functionality

Route::get('/locate/{id}','SearchController@locate');//route to redirect to Locate page to see user details

Route::post('/fixappointment/fetch','SearchController@fetch')->name('fixappointment.fetch');//route to implement auto suggesstion dropdown in Search Bar page

Route::get('/logs','ShowAppointmentLogsController@showlogs');//route to show appointment Logs to user on Dashboard page page

Route::get('/accept/{iddd}','FixAppointmentController@update');//route to Accept Appointment Request from logs page

Route::get('/reject/{iddd}','FixAppointmentController@reject');//route to Reject Appointment Request from logs page

Route::get('/fixappointmentform','FixAppointmentController@store');
//route for store data in appointment table


//Route::get('/viewLayout/{floor_no}','LayoutController@viewLayout');

Route::get('/locate1','LayoutController@viewLayout');


Route::get('/index1', function (Request $request) {
    $branch= Input::get('branch_id');
    $floor= Input::get('floor_id');;
    //dd($request->session()->put('my_name','Virat Gandhi'));
    $request->session()->put('branch', $branch);
    $request->session()->put('floor', $floor);
    // dd($request->session()->get('branch'),$request->session()->get('floor'));
    return view('backend.floors.index1');
});

Route::post('/backend/Floor/Floors/','Backend\Floor\FloorsController@updateJson')->name('backend.floors.updateJson');

