<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Routes for samples
 */
Route::get('/samples', 'BiomeController@listSamples');

/**
 * Routes for organisms
 */
Route::post('/organisms', 'BiomeController@newOrganism');
Route::get('/organisms', 'BiomeController@listOrganisms');
Route::get('/organisms-top10', 'BiomeController@listOrganismsTop10');

