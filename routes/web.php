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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('admin/user')->group(function(){
	route::get('/','UserDetailController@index')->name('admin.user.index');
	route::get('/create','UserDetailController@create')->name('admin.user.create');
	route::post('/','UserDetailController@store')->name('admin.user.store');
	route::get('/{user}/edit','UserDetailController@edit')->name('admin.user.edit');
	route::post('/{user}/{userdetail}/update','UserDetailController@update')->name('admin.user.update');
	route::get('/{user}/delete','UserDetailController@destroy')->name('admin.user.destroy');
	route::post('/{user}/confirm_delete','UserDetailController@Confirm_Destroy')->name('admin.user.confirm_destroy');
});

Route::middleware('auth')->prefix('admin/vendor')->group(function(){
	route::get('/','VendorController@index')->name('admin.vendor.index');
	route::get('/create','VendorController@create')->name('admin.vendor.create');
	route::post('/','VendorController@store')->name('admin.vendor.store');
	route::get('/{vendor}/edit','VendorController@edit')->name('admin.vendor.edit');
	route::post('/{vendor}/update','VendorController@update')->name('admin.vendor.update');
	route::get('/{vendor}/delete','VendorController@destroy')->name('admin.vendor.destroy');
	route::post('/{vendor}/confirm_delete','VendorController@Confirm_Destroy')->name('admin.vendor.confirm_destroy');
});

Route::middleware('auth')->prefix('admin/vehicle')->group(function(){
	route::get('/','VehicleController@index')->name('admin.vehicle.index');
	route::get('/create','VehicleController@create')->name('admin.vehicle.create');
	route::post('/','VehicleController@store')->name('admin.vehicle.store');
	route::get('/{vehicle}/show','VehicleController@show')->name('admin.vehicle.show');
	route::get('/{vehicle}/edit','VehicleController@edit')->name('admin.vehicle.edit');
	route::post('/{vehicle}/update','VehicleController@update')->name('admin.vehicle.update');
	route::get('/{vehicle}/delete','VehicleController@destroy')->name('admin.vehicle.destroy');
	route::post('/{vehicle}/confirm_delete','VehicleController@Confirm_Destroy')->name('admin.vehicle.confirm_destroy');
});

Route::middleware('auth')->prefix('admin/repair')->group(function(){
	route::get('/','RepairController@index')->name('admin.repair.index');
	route::get('/create','RepairController@create')->name('admin.repair.create');
	route::post('/','RepairController@store')->name('admin.repair.store');
	route::get('/{repair}/edit','RepairController@edit')->name('admin.repair.edit');
	route::post('/{repair}/update','RepairController@update')->name('admin.repair.update');
	route::get('/{repair}/delete','RepairController@destroy')->name('admin.repair.destroy');
	route::post('/{repair}/confirm_delete','RepairController@Confirm_Destroy')->name('admin.repair.confirm_destroy');
});

Route::middleware('auth')->prefix('admin/fuel')->group(function(){
	route::get('/','FuelController@index')->name('admin.fuel.index');
	route::get('/create','FuelController@create')->name('admin.fuel.create');
	route::post('/','FuelController@store')->name('admin.fuel.store');
	route::get('/{fuel}/edit','FuelController@edit')->name('admin.fuel.edit');
	route::post('/{fuel}/update','FuelController@update')->name('admin.fuel.update');
	route::get('/{fuel}/delete','FuelController@destroy')->name('admin.fuel.destroy');
	route::post('/{fuel}/confirm_delete','FuelController@Confirm_Destroy')->name('admin.fuel.confirm_destroy');
});

Route::middleware('auth')->prefix('admin/trip')->group(function(){
	route::get('/','TripController@index')->name('admin.trip.index');
	route::get('/create','TripController@create')->name('admin.trip.create');
	route::post('/','TripController@store')->name('admin.trip.store');
	route::get('/{trip}/edit','TripController@edit')->name('admin.trip.edit');
	route::post('/{trip}/update','TripController@update')->name('admin.trip.update');
	route::get('/{trip}/delete','TripController@destroy')->name('admin.trip.destroy');
	route::post('/{trip}/confirm_delete','TripController@Confirm_Destroy')->name('admin.trip.confirm_destroy');
});


