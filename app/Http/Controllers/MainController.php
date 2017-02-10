<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){

		 $data = array();

		return view('welcome', $data);
	}

    function docs(){
		 $data = array(
			 'docs' => file_get_contents(base_path().'/resources/docs.html')
		 );
		return view('docs', $data);
	}
}
