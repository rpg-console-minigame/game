<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/run-schedule', function (Request $request) {
    $key = $request->header('X-CRON-KEY');

    if ($key !== env('CRON_SECRET')) {
        abort(403, 'Unauthorized');
    }

    Artisan::call('schedule:run');
    return response()->json(['status' => 'Schedule executed']);
});