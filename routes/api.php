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

Route::get('/token', 'Api\TokenGenerator@issueToken');

Route::group(['middleware' => ['auth.api']], function() {
	Route::post('/roles', 'Api\RoleController@createRole');
	Route::get('/roles', 'Api\RoleController@getRoles');
	Route::get('/roles/{id}', 'Api\RoleController@getRole');
	Route::put('/roles/{id}', 'Api\RoleController@updateRole');

	Route::post('/users', 'Api\UserController@createUser');
	Route::get('/users', 'Api\UserController@getUsers');
	Route::get('/users/{id}', 'Api\UserController@getUser');
	Route::get('/users/{id}/transactions', 'Api\UserController@getUserTransactions');
	Route::put('/users/{id}', 'Api\UserController@updateUser');

	// Route::post('/categories', 'Api\CategoryController@createCategory');
	// Route::get('/categories', 'Api\CategoryController@getCategories');
	// Route::get('/categories/{id}', 'Api\CategoryController@getCategories');
	// Route::get('/categories/{id}/products', 'Api\CategoryController@getProducts');
	// Route::put('/categories', 'Api\CategoryController@updateCategories');

	// Route::post('/products', 'Api\ProductController@createProduct');
	// Route::get('/products', 'Api\ProductController@getproducts');
	// Route::get('/products/{id}', 'Api\ProductController@getproduct');
	// Route::put('/products', 'Api\ProductController@updateProduct');

	// Route::post('/payment_gateways', 'Api\PaymentGatewayController@createPaymentGateway');
	// Route::get('/payment_gateways', 'Api\PaymentGatewayController@getPaymentGateways');
	// Route::get('/payment_gateways/{id}', 'Api\PaymentGatewayController@getPaymentGateway');
	// Route::get('/payment_gateways/{id}/transactions', 'Api\PaymentGatewayController@getTransactions');
	// Route::put('/payment_gateways', 'Api\PaymentGatewayController@updatePaymentGateway');

	// Route::post('/transactions', 'Api\TransactionController@createTransaction');
	// Route::get('/transactions', 'Api\TransactionController@getTransactions');
	// Route::get('/transactions/{id}', 'Api\TransactionController@getTransaction');
	// Route::put('/transactions', 'Api\TransactionController@updateTransaction');
});
