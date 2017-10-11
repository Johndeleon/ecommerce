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

Route::get('/home', 'HomeController@index');
Route::get('product/redirecthome',
		function()
				{
					return redirect('home');
				}
	);
Route::get('redirecthome',
		function()
				{
					return redirect('home');
				}
	);

Route::get('/product/{id}', 'HomeController@product');
Route::get('/cartitems', 'HomeController@cartitems');


Route::post('product/addtocart/{id}', 'HomeController@addtocart');

Route::get('/removeproduct/{id}', 'HomeController@removeproduct');

Route::get('billinginfo', 'HomeController@addbillinginfo');
	

Route::post('savebillinginfos','HomeController@savebillinginfo');
Route::get('invoice', 'HomeController@showinvoice');

