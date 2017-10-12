<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function get_content(  ){

      $name = 'Bohdan';

      return view( 'pages.about', compact('name') );

    }
}
