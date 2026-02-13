<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get("route-1",[FirstController::class,'index']);
Route::get('route-2',[FirstController::class,'index2']);
Route::get("route-3",[FirstController::class,'index3']);
Route::get("route-4",[FirstController::class,'index4']);
Route::get("route-5",[FirstController::class,'index5']);
Route::get("route-6",[FirstController::class,'index6']);
Route::get("route-7",[FirstController::class,'index7']);
Route::get("route-8",[FirstController::class,'index8']);
Route::get("route-9",[FirstController::class,'index9']);
Route::get("route-10/{id}",[FirstController::class,'index11']);
Route::get("route-11/{id}",[FirstController::class,'index12']);
Route::get("route-12/{id}/{name}",[FirstController::class,'index13']);

//method 2 to create routes

Route::get("route-1-duplicate","App\Http\Controllers\FirstController@index");
Route::get("route-1-3",[
    'uses'=> "App\Http\Controllers\FirstController@index"
]);


Route::resource('item',ResourceController::class)
//->except(["store"]);
->only(['index','create']);
;
Route::apiResource('item2',ApiController::class);
Route::get('item2',InvokableController::class);





Route::post("post-route",[FirstController::class,'index9']);
