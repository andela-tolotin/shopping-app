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

Route::get('/{locale}', 'HomeController@listProducts')->name('home');
Route::get('/{locale}/login', 'Auth\LoginController@showLoginForm')->name('load_login');
Route::post('/{locale}/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/{locale}/register', 'Auth\RegisterController@showRegistrationForm')->name('load_register');

Auth::routes();

Route::get('/{locale}/product/{id}/view', 'ProductController@viewProduct')->name('product-details');
Route::get('/{locale}/carts', 'CartController@viewCart')->name('view_carts');
Route::get('/{locale}/product/{id}/checkout', 'CartController@checkout')->name('purchase_product');

Route::post('/{locale}/payment/stripe', 'PaymentController@payWithStrip')->name('stripe_payment');

Route::group(['middleware' => 'auth.isBuyer'], function () {
    Route::get('/{locale}/user/orders', 'OrderController@listCurrentUserOrders')->name('list_user_orders');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{locale}/home', 'HomeController@index')->name('dashboard_index');
    Route::get('/{locale}/profile', 'ProfileUpdateController@editprofile')->name('profile');
    Route::post('/{locale}/profile/update', 'ProfileUpdateController@updateProfile')->name('profile_update');

    //Payment
    Route::post('/{locale}/buy/point', 'PaymentController@buyPointWithStripe')->name('buy_point_with_stripe');
    Route::post('/{locale}/product/{id}/pay_with_point', 'PaymentController@buyProductWithPoint')->name('buy_product_with_point');

    //pointWallet
    Route::get('/{locale}/add_amount', 'PointWalletController@loadPointAmountForm')->name('load_buy_point');
    Route::get('/{locale}/buy_point', 'PointWalletController@loadPointBag')->name('buy_point');
});

Route::group(['middleware' => ['auth.isAdmin']], function() {
    //Product
    Route::get('/{locale}/product', 'ProductController@showProductForm')->name('load_product');
    Route::post('/{locale}/product', 'ProductController@postProduct')->name('post_product');
    Route::get('/{locale}/products', 'ProductController@listProducts')->name('list_products');
    Route::get('/{locale}/product/{id}/edit', 'ProductController@editProductForm')->name('edit_product');
    Route::post('/{locale}/product/{id}/update', 'ProductController@updateProduct')->name('update_product');
    Route::get('/{locale}/product/{id}/delete', 'ProductController@deleteProduct')->name('delete_product');


    //Category
    Route::get('/{locale}/category', 'CategoryController@showCategoryForm')->name('load_category');
    Route::post('/{locale}/category', 'CategoryController@postCategory')->name('post_category');
    Route::get('/{locale}/categories', 'CategoryController@listCategories')->name('list_categories');
    Route::get('/{locale}/category/{id}/edit', 'CategoryController@editCategoryForm')->name('edit_category');
    Route::post('/{locale}/category/{id}/update', 'CategoryController@updateCategory')->name('update_category');
    Route::get('/{locale}/category/{id}/delete', 'CategoryController@deleteCategory')->name('delete_category');

    //User
	Route::get('/{locale}/manage/users', 'UserController@listUsers')->name('manage_user');
	Route::get('/{locale}/users/{id}/edit', 'UserController@editUser')->name('edit_user');
	Route::post('/{locale}/users/{id}/update', 'UserController@updateUser')->name('update_user');
	Route::get('/{locale}/users/{id}/delete', 'UserController@deleteUser')->name('delete_user');

    //Payment
    Route::get('/{locale}/config/payment', 'PaymentController@loadPaymentConfigForm')->name('config_payment');
    Route::post('/{locale}/create/payment', 'PaymentController@addPaymentConfig')->name('create_payment');
    Route::get('/{locale}/payment/gateways', 'PaymentController@listpaymentGateway')->name('list_payments');
    Route::get('/{locale}/payment/{id}/edit', 'PaymentController@editPayment')->name('edit_payment');
    Route::post('/{locale}/payment/{id}/update', 'PaymentController@updatePayment')->name('update_payment');
    Route::get('/{locale}/payment/{id}/delete', 'PaymentController@deletePayment')->name('delete_payment');

    //Advert
    Route::get('/{locale}/advert', 'AdvertController@loadAdvertForm')->name('load_advert');
    Route::post('/{locale}/advert/upload', 'AdvertController@uploadAdvert')->name('upload_advert');
    Route::get('/{locale}/adverts', 'AdvertController@listAdverts')->name('list_adverts');
    Route::get('/{locale}/advert/{id}/display', 'AdvertController@displayAdvert')->name('display_advert');
    Route::get('/{locale}/adverts/{id}/delete', 'AdvertController@deleteAdvert')->name('delete_advert');

    //Transaction stock
    Route::get('/{locale}/transactions', 'TransactionController@stock')->name('stock');
});

Route::group(['middleware' => ['auth.isAdminAndManager']], function() {
    //Order
    Route::get('/{locale}/orders', 'OrderController@listOrders')->name('list_orders');
    Route::get('/{locale}/order/{id}/delete', 'OrderController@deleteOrder')->name('delete_order');
    Route::get('/{locale}/order/{id}/approve', 'OrderController@approveOrder')->name('approve_order');
});
