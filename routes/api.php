<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload-invoice', 'InvoicesController@store')->name('invoice.store');

Route::get('/all-invoices', 'InvoicesController@index')->name('invoice.index');

Route::get('/invoice/{id}', 'InvoicesController@create')->name('single.invoice');

Route::get('/invoices-summary', 'InvoicesController@summary')->name('invoice.summary');