<?php

use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Twig\Extension\Debug;

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

Route::get('/', function () {
    // Debugbar::startMeasure('Wohoo', 'Rendering our first message');
    // try {
    //     throw new Exception('Try Message!');
    // } catch (Exception $e) {
    //     Debugbar::addException($e);
    // }
    $name = "Code with Dary";
    return view('welcome', [
        'name' => $name,
    ]);
});
