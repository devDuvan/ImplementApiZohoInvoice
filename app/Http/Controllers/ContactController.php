<?php

namespace Padawan\Http\Controllers;

use Illuminate\Http\Request;
use Padawan\Http\Requests;


class ContactController extends Controller
{
	
    function index ()
    {
        $Api = new \Padawan\Classes\Api();
        $response = json_decode($Api->request('/contacts'),true);
        $contacts=$response["contacts"];
    	return view('contacts',compact('contacts'));
    }

    function show ($id)
    {
        $Api = new \Padawan\Classes\Api();
        $response = json_decode($Api->request('/contacts/'.$id),true);
        $contact=$response["contact"];
        return view('contact',compact('contact'));
    }
}
