<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SculptureController;
// use Debugbar;
use App\Http\Controllers\DiscriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/',[HomeController::class,'login']);
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::resource('users',UserController::class)->except(['show']);
   Route::resource('languages',LanguageController::class)->except(['show']);
   Route::resource('cities',CityController::class);
   Route::get('city_lang/{lang_id}/{city_id}',[CityController::class, 'getCityByLang']);
   Route::get('place_lang/{lang_id}/{place_id}',[PlaceController::class,'getPlaceByLang']);
   Route::get('sculpture_lang/{lang_id}/{sculpture_id}',[SculptureController::class,'getSculptureByLang']);
   Route::get('discrption_lang/{lang_id}/{discrption_id}',[DiscriptionController::class,'getDiscrptionByLang']);



// Route::post('addlang',[CityController::class,'addlang']);
Route::post('cities.addlang', [CityController::class, 'addlang'])->name('cities.addlang');
Route::resource('places',PlaceController::class);
Route::post('places.addlang', [PlaceController::class, 'addlang'])->name('places.addlang');
Route::resource('sculptures',SculptureController::class);
Route::post('sculptures.addlang', [SculptureController::class, 'addlang'])->name('sculptures.addlang');
Route::resource('discriptions',DiscriptionController::class);
Route::post('discriptions.addlang', [DiscriptionController::class, 'addlang'])->name('discriptions.addlang');


      });


