<?php

namespace Padawan\Http\Controllers;

use Illuminate\Http\Request;

use Padawan\Http\Requests;

class FrontController extends Controller
{
    function index ()
    {
    	return view('index');
    }
}
