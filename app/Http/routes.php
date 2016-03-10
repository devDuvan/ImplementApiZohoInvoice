<?php
Route::get('/','FrontController@index');
Route::resource('invoices','InvoiceController');
Route::resource('contacts','ContactController');