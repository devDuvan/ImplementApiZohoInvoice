<?php

namespace Padawan\Http\Controllers;

use Illuminate\Http\Request;

use Padawan\Http\Requests;


class InvoiceController extends Controller
{
    function index (Request $request)
    {
    	$limit = $request->query('minTotal');
    	$page =$request->query('page');
    	$shortData =$request->query('shortData');


    	if (!$limit){$limit=0;}
    	if (!$shortData){$shortData=false;}

    	$Api = new \Padawan\Classes\Api();

        $response = json_decode($Api->request('/invoices'),true);
        $invoices_response=$response["invoices"];
        $invoices = array();
        $i=0;

        foreach ($invoices_response as $invoice) {
        	if ($invoice["total"]>$limit) {
        	$invoices[$i]=$invoice;
        	$i++;
        	}
        }
        
		$total = count( $invoices ); 
		$max = 5; 
		$totalPages = ceil( $total/ $max ); 
		$page = max($page, 1); 
		$page = min($page, $totalPages); 
		$offset = ($page - 1) * $max;
		if( $offset < 0 ) $offset = 0;
		$invoices = array_slice( $invoices, $offset, $max );

		$result = array('invoices' => $invoices,'minTotal'=>$limit,'pages'=>$totalPages,'page'=>$page,'shortData'=>$shortData);

        return view('invoices',compact('result'));
    }

    function show($id)
    {
    	$Api = new \Padawan\Classes\Api();
        $response = $Api->request('/invoices/pdf?invoice_ids='.$id,true);
        header("Content-type:application/pdf");
		header("Content-Disposition:attachment;filename='".$id.".pdf'");
        return $response;
    }
}
