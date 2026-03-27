<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\InvokableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;


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

Route::get('get-data',[DataController::class,'index']);


Route::get('create1',[ItemController::class,'create1']);
Route::get('create2',[ItemController::class,'create2']);
Route::get('create3',[ItemController::class,'create3']);
Route::post('create4',[ItemController::class,'create4']);
Route::post('create5',[ItemController::class,'create5']);

Route::get('getById/{id}',[ItemController::class,'getById']);
Route::get('getAllItems',[ItemController::class,'getAllItems']);
Route::get('getIemByCondition',[ItemController::class,'getIemByCondition']);
Route::get('getItemByMultipleCondition',[ItemController::class,'getItemByMultipleCondition']);
Route::get('getItemOr',[ItemController::class,'getItemOr']);
Route::get('getWhereIn',[ItemController::class,'getWhereIn']);
Route::get('getBetween',[ItemController::class,'getBetween']);
Route::get('getItemsOrdered',[ItemController::class,'getItemsOrdered']);
Route::get('statistics',[ItemController::class,'statistics']);
Route::get('AdvisorJoin',[ItemController::class,'AdvisorJoin']);
Route::get('selectAttr',[ItemController::class,'selectAttr']);

Route::get('update1',[ItemController::class,'update1']);
Route::get('massUpdate',[ItemController::class,'massUpdate']);


Route::put('update/{id}',[ItemController::class,'update2']);
Route::put('update3/{id}',[ItemController::class,'update3']);

Route::get('createOrUpdate',[ItemController::class,'createOrUpdate']);



Route::get('massDelete',[ItemController::class,'massDelete']);


Route::get('delete/{id}',[ItemController::class,'delete']);

Route::get('first-page',[ViewController::class,'index']);
Route::get('second-page',[ViewController::class,'index2']);

Route::get('list-items',[ViewController::class,'listItems']);
Route::get('view-item/{id}',[ViewController::class,'viewItem'])->name('viewItemCustom');


Route::get('list-products',[ProductController::class,'list'])->name('listProducts');
Route::get('add-product',[ProductController::class,'add'])->name('addProduct');
Route::post('save-product',[ProductController::class,'save'])->name('saveProduct');
Route::get('view-product/{id}',[ProductController::class,'view'])->name('viewProduct');
Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('editProduct');
Route::put('update-product/{id}',[ProductController::class,'update'])->name('updateProduct');
Route::delete('delete-product/{id}',[ProductController::class,'delete'])->name('deleteProduct');
Route::get('delete-product2/{id}',[ProductController::class,'delete'])->name('deleteProduct2');

Route::resource('category',CategoryController::class);
Route::get('delete-category/{category}',[CategoryController::class,'destroy'])->name('category.delete');

Route::get('page1',[PageController::class,'page1']);
Route::get('page2',[PageController::class,'page2']);

Route::get('index',[PageController::class,'index']);
Route::get('blog',[PageController::class,'blog']);
