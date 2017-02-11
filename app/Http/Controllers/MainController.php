<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){

		 $data = array(
			 'server_url' => config('app.server_url'),
			 'revision' => config('app.revision')
		 );

		return view('welcome', $data);
	}

    function docs(){
		 $data = array(
			 'docs' => file_get_contents(base_path().'/resources/docs.html'),
			 'revision' => config('app.revision')
		 );
		return view('docs', $data);
	}
}
