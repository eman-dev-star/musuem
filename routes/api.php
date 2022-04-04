<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\SclupturesController;
use App\Http\Controllers\DiscrptionsController;




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
Route::get('langs', [LangController::class, 'langs']);
Route::get('cities', [CitiesController::class, 'cities']);
Route::get('city/{id}', [CitiesController::class, 'city']);
Route::get('citylang/{id}', [CitiesController::class, 'citylang']);


Route::get('places', [PlacesController::class, 'places']);
Route::get('placescity', [PlacesController::class, 'placescity']);
Route::get('placelang/{id}', [PlacesController::class, 'placelang']);

Route::get('sclupture', [SclupturesController::class, 'sclupture']);
Route::get('scluptureid/{id}', [SclupturesController::class, 'scluptureid']);
Route::get('sclupturelang/{id}', [SclupturesController::class, 'sclupturelang']);

Route::get('discrption', [DiscrptionsController::class, 'discrption']);
Route::get('discrptionlang/{lang}', [DiscrptionsController::class, 'discrptionlang']);
Route::get('discrptionid/{id}', [DiscrptionsController::class, 'discrptionid']);










