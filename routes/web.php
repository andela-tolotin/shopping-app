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
    return view('index');
});

Route::get('/home', function () {
    return view('dashboard.index');
})->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('load_login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('load_register');
Route::post('/profile/update', 'ProfileUpdateController@updateProfile')->name('profile_update');

Auth::routes();

Route::group(['middleware' => ['auth.isAdmin']], function() {
	Route::get('/product', 'ProductController@showProductForm')->name('load_product');
	Route::post('/product', 'ProductController@postProduct')->name('post_product');

	Route::get('/category', 'CategoryController@showCategoryForm')->name('load_category');
	Route::post('/category', 'CategoryController@postCategory')->name('post_category');

	Route::get('/manage/users', 'UserController@listUsers')->name('manage_user');
	Route::get('/users/{id}/edit', 'UserController@editUser')->name('edit_user');
	Route::get('/users/{id}/update', 'UserController@updateUser')->name('update_user');
});
