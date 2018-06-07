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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('industry', 'IndustryController@index')->name('industry');
Route::get('industry/import', 'IndustryController@form');
Route::post('industry/import', 'IndustryController@save');
Route::get('industry/export', 'IndustryController@export');

Route::get('location', 'LocationController@index')->name('location');
Route::get('location/import', 'LocationController@form');
Route::post('location/import', 'LocationController@save');
Route::get('location/export', 'LocationController@export');

Route::get('product', 'ProductController@index')->name('product');
Route::get('product/import', 'ProductController@form');
Route::post('product/import', 'ProductController@save');
Route::get('product/export', 'ProductController@export');

Route::get('customer', 'CustomerController@index')->name('customer');
Route::get('customer/import', 'CustomerController@form');
Route::post('customer/import', 'CustomerController@save');
Route::get('customer/export', 'CustomerController@export');

Route::get('period', 'PeriodController@index')->name('period');
Route::get('period/import', 'PeriodController@form');
Route::post('period/import', 'PeriodController@save');
Route::get('period/export', 'PeriodController@export');

Route::get('sale', 'SaleController@index')->name('sale');
Route::get('sale/import', 'SaleController@form');
Route::post('sale/import', 'SaleController@save');
Route::get('sale/export', 'SaleController@export');

Route::group(['prefix' => 'olap'], function (){
   Route::get('tahun', 'HomeController@tahun');
   Route::get('month', 'HomeController@month');
   Route::get('location', 'HomeController@location');
   Route::get('product', 'HomeController@product');
   Route::get('customer', 'HomeController@customer');
});
