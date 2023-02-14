<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * No need for a class here as we just want it to output our react frontend using the
 * route.
 *
 * We're gunna have the form on the react frontend send a ajax request to the
 * API route.
 */

Route::get('/', function () {
    return view('converter');
});
