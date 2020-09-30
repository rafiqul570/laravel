<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('pages.welcome');
// });

//========fontend Login===========

Route::get('/','FontendController@index');


Auth::routes();

//========Admin Login=============
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');

//========Admin/Category Section========
Route::get('admin/categories','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories/store','Admin\CategoryController@store')->name('store.category');
Route::get('admin/categories/edit/{id}','Admin\CategoryController@edit');
Route::post('admin/categories/update','Admin\CategoryController@update')->name('update.category');
Route::get('admin/categories/delete/{id}','Admin\CategoryController@destroy');
Route::get('admin/categories/inactive/{id}','Admin\CategoryController@inactive');
Route::get('admin/categories/active/{id}','Admin\CategoryController@active');

//===========Admin/brand Section============
Route::get('admin/brands','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brands/store','Admin\BrandController@store')->name('store.brand');
Route::get('admin/brands/edit/{id}','Admin\BrandController@edit');
Route::post('admin/brands-update','Admin\BrandController@update')->name('update.brand');
Route::get('admin/brands/delete/{id}','Admin\BrandController@destroy');
Route::get('admin/brands/inactive/{id}','Admin\BrandController@inactive');
Route::get('admin/brands/active/{id}','Admin\BrandController@active');

//===========Admin/Products Section=======================
Route::get('admin/products/add','Admin\ProductController@addProduct')->name('add.products');
Route::post('admin/products/store','Admin\ProductController@storeProduct')->name('store.products');
Route::get('admin/products/manage','Admin\ProductController@manageProduct')->name('manage.products');
Route::get('admin/products/edit/{id}','Admin\ProductController@editProduct');
Route::post('admin/products/update','Admin\ProductController@updateProduct')->name('update.products');
Route::post('admin/products/image-update','Admin\ProductController@updateImage')->name('update.image');
