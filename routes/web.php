<?php

use Illuminate\Support\Facades\Route;
use W360\Support\Http\Controllers\CaddyProxyController;

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

Route::get('/domain-verify', [CaddyProxyController::class, 'verifyDomain']);

/* W360 Support Routes */
Route::view('/web/{path?}', 'w-support::web')
    ->where('path', '.*')
    ->name('web-support');
