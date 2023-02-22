<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
//ВРЕМЕННО********************************
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProducttypeController;
//****************************************
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [OrderController::class, 'show_in_progress']);
Route::match(['get', 'post'], '/users', [UserController::class, 'search']);
Route::get('/users/{id}',  [UserController::class, 'info'])->where('id', '[0-9]+');
Route::match(['get', 'post'], '/adduser', [UserController::class, 'add']);
Route::get('/users/{id}/addresses',  [AddressController::class, 'show'])->where('id', '[0-9]+');
Route::match(['get', 'post'], '/users/{id}/addresses/add', [AddressController::class, 'add'])->where('id', '[0-9]+');
Route::get('/users/{user_id}/addresses/{address_id}/setasmain',  [AddressController::class, 'setAsMain'])->
                      where('user_id', '[0-9]+')->
                      where('address_id', '[0-9]+');
Route::get('/users/{user_id}/addresses/{address_id}/delete',  [AddressController::class, 'delete'])->
                      where('user_id', '[0-9]+')->
                      where('address_id', '[0-9]+');
Route::match(['get', 'post'], '/users/{user_id}/addresses/{address_id}/edit', [AddressController::class, 'edit'])->
                      where('user_id', '[0-9]+')->
                      where('address_id', '[0-9]+');
Route::match(['get', 'post'], '/users/{id}/editphone', [PhoneController::class, 'edit'])->where('id', '[0-9]+');
Route::match(['get', 'post'], '/users/{id}/editname', [UserController::class, 'editname'])->where('id', '[0-9]+');
Route::match(['get', 'post'], '/users/{id}/editmail', [UserController::class, 'editmail'])->where('id', '[0-9]+');
Route::get('/addorder', [ProductController::class, 'get_user']);
Route::match(['get', 'post'], '/addorder/user', [ProductController::class, 'addorder']);
Route::match(['get', 'post'],'/addorder/create', [OrderController::class, 'createorder']);
Route::match(['get', 'post'],'/ordersinprogress',  [OrderController::class, 'show_in_progress']);
Route::get('/ordersinprogress/{order_number}',  [OrderController::class, 'changeStatus'])->where('order_number', '[0-9]+');
Route::get('/ordersinprogress/{order_number}/delete',  [OrderController::class, 'delete'])->where('order_number', '[0-9]+');
Route::get('/ordersinprogress/{order_number}/orderinfo',  [OrderController::class, 'orderInfo'])->where('order_number', '[0-9]+');
Route::match(['get', 'post'],'/users/{id}/orders',  [OrderController::class, 'orderslist'])->where('id', '[0-9]+');
Route::match(['get', 'post'], '/orderslist',  [OrderController::class, 'show_all_orders']);
Route::match(['get', 'post'], '/ordersinprogress/{order_number}/editorder', [OrderController::class, 'edit'])->where('order_number', '[0-9]+');
Route::get('/ordersinprogress/{order_number}/editorder/delete/{id}',  [OrderController::class, 'delete_product'])->
       where('order_number', '[0-9]+')->
       where('id', '[0-9]+');
//ВРЕМЕННЫЕ***********************************************
/*Route::get('/addcountry',  [CountryController::class, 'add']);
Route::get('/addcity',  [CityController::class, 'add']);
Route::get('/showall',  [CountryController::class, 'show']);
Route::get('/addstreet',  [StreetController::class, 'add']);
Route::get('/addbuilding',  [BuildingController::class, 'add']);
Route::get('/addappartment',  [AppartmentController::class, 'add']);
Route::get('/addstatus',  [StatusController::class, 'add']);
Route::get('/addpt',  [ProducttypeController::class, 'add']);
Route::get('/addproduct',  [ProductController::class, 'add']);*/
//********************************************************
Route::get('/{pageNotFount}', function () {
                return view('empty', 
            [
                'title' => 'Empty page',
            ]);
    });
