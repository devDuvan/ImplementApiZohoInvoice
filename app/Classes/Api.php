<?php

namespace Padawan\Classes;

use Illuminate\Http\Request;
use Padawan\Http\Requests;

class Api 
{
    private  $token;
	private  $organization_id;
	private  $api_url;

	//protected static function getApiUrl() { return $this->request_url; }
	//protected static function getToken() { return $this->token; }
	//protected static function getOrganizationID() { return $this->organization_id; }

	function __construct()
	{
		$this->token='051cda7b79e684052fe8e37c53035d2c';
		$this->organization_id='246395636';
		$this->api_url='https://invoice.zoho.com/api/v3';
	}
	

	function request($url,$call=false)
	{
		 $headers;
		 $request_url = $this->api_url.$url;
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		 $request_parameters = array(
		 'authtoken' => $this->token,
		 'organization_id' => $this->organization_id
		 );
		 if ($call) {
		 	$request_url .= '&' . http_build_query($request_parameters);
		 	$headers = array("Content-Type: application/pdf","Cache-Control: max-age=0","Accept-Ranges: none");
		 }
		 else{
		 	$request_url .= '?' . http_build_query($request_parameters);	
		 	$headers = array('Accept: application/json');
		 }

		 

		 

		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $request_url);
		 curl_setopt($ch, CURLOPT_HEADER, TRUE);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 $response = curl_exec($ch);
		 $response_info = curl_getinfo($ch);
		 curl_close($ch);
		 $response_body = substr($response, $response_info['header_size']);
		 return $response_body;
	}
}

