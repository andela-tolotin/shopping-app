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

Route::get('/', 'HomeController@listProducts');

Route::get('/profile', 'ProfileUpdateController@editprofile')->name('profile');
Route::get('/home', 'HomeController@index')->name('dashboard_index');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('load_login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('load_register');
Route::post('/profile/update', 'ProfileUpdateController@updateProfile')->name('profile_update');

Auth::routes();

Route::group(['middleware' => ['auth.isAdmin']], function() {
    //Product
    Route::get('/product', 'ProductController@showProductForm')->name('load_product');
    Route::post('/product', 'ProductController@postProduct')->name('post_product');
    Route::get('/products', 'ProductController@listProducts')->name('list_products');
    Route::get('/product/{id}/edit', 'ProductController@editProductForm')->name('edit_product');
    Route::post('/product/{id}/update', 'ProductController@updateProduct')->name('update_product');
    Route::get('/product/{id}/delete', 'ProductController@deleteProduct')->name('delete_product');

    //Category
    Route::get('/category', 'CategoryController@showCategoryForm')->name('load_category');
    Route::post('/category', 'CategoryController@postCategory')->name('post_category');
    Route::get('/categories', 'CategoryController@listCategories')->name('list_categories');
    Route::get('/category/{id}/edit', 'CategoryController@editCategoryForm')->name('edit_category');
    Route::post('/category/{id}/update', 'CategoryController@updateCategory')->name('update_category');
    Route::get('/category/{id}/delete', 'CategoryController@deleteCategory')->name('delete_category');

    //User
	Route::get('/manage/users', 'UserController@listUsers')->name('manage_user');
	Route::get('/users/{id}/edit', 'UserController@editUser')->name('edit_user');
	Route::post('/users/{id}/update', 'UserController@updateUser')->name('update_user');
	Route::get('/users/{id}/delete', 'UserController@deleteUser')->name('delete_user');

    //Payment
    Route::get('/config/payment', 'PaymentController@loadPaymentConfigForm')->name('config_payment');
    Route::post('/create/payment', 'PaymentController@addPaymentConfig')->name('create_payment');
    Route::get('/payment/gateways', 'PaymentController@listpaymentGateway')->name('list_payments');
    Route::get('/payment/{id}/edit', 'PaymentController@editPayment')->name('edit_payment');
    Route::post('/payment/{id}/update', 'PaymentController@updatePayment')->name('update_payment');
    Route::get('/payment/{id}/delete', 'PaymentController@deletePayment')->name('delete_payment');

    //Advert
    Route::get('/advert', 'AdvertController@loadAdvertForm')->name('load_advert');
    Route::post('/advert/upload', 'AdvertController@uploadAdvert')->name('upload_advert');
    Route::get('/adverts', 'AdvertController@listAdverts')->name('list_adverts');
    Route::get('/adverts/{id}/delete', 'AdvertController@deleteAdvert')->name('delete_advert');
});

Route::get('/product/{id}/view', 'ProductController@viewProduct')->name('product-details');
Route::get('/carts', 'CartController@viewCart')->name('view_carts');
Route::get('/product/{id}/checkout', 'CartController@checkout')->name('purchase_product');


