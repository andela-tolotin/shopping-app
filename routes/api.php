<?php

use Illuminate\Http\Request;

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

Route::get('/token', 'TokenGenerator@issueToken');

Route::group(['middleware' => ['api']], function() {
	Route::post('/roles', 'Role@createRole');
	Route::get('/roles', 'Role@getRoles');
	Route::get('/roles/{id}', 'Role@getRole');
	Route::put('/roles', 'Role@updateRole');

	Route::post('/users', 'User@createUser');
	Route::get('/users', 'User@getUsers');
	Route::get('/users/{id}', 'User@getUser');
	Route::get('/users/{id}/transactions', 'User@getUserTransactions');
	Route::put('/users', 'User@updateUser');

	Route::post('/categories', 'Category@createCategory');
	Route::get('/categories', 'Category@getCategories');
	Route::get('/categories/{id}', 'Category@getCategories');
	Route::get('/categories/{id}/products', 'Category@getProducts');
	Route::put('/categories', 'Category@updateCategories');

	Route::post('/products', 'Product@createProduct');
	Route::get('/products', 'Product@getproducts');
	Route::get('/products/{id}', 'Product@getproduct');
	Route::put('/products', 'Product@updateProduct');

	Route::post('/payment_gateways', 'PaymentGateway@createPaymentGateway');
	Route::get('/payment_gateways', 'PaymentGateway@getPaymentGateways');
	Route::get('/payment_gateways/{id}', 'PaymentGateway@getPaymentGateway');
	Route::get('/payment_gateways/{id}/transactions', 'PaymentGateway@getTransactions');
	Route::put('/payment_gateways', 'PaymentGateway@updatePaymentGateway');

	Route::post('/transactions', 'Transaction@createTransaction');
	Route::get('/transactions', 'Transaction@getTransactions');
	Route::get('/transactions/{id}', 'Transaction@getTransaction');
	Route::put('/transactions', 'Transaction@updateTransaction');
});
