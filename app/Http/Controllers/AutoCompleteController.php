<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoCompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
     return view('autocomplete');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('users')
        ->where('first_name', 'LIKE', "%{$query}%")
        ->get();
        dd($data);
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '<li><a href="#">'.$row->first_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
     //return view('autocomplete');
    }

}