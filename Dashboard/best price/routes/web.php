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


// Admin dashboard all controller start here

// dashboard login routes

Route::get('/admin', 'dashboardController@index');

Route::get('/dashboard', 'superadminController@index');

Route::post('/admindashboard', 'dashboardController@dashboard');

Route::get('/logout', 'superadminController@logout');


// add and show all category routes

Route::get('/addcategory','categoryController@index');

Route::get('/allcategory','categoryController@allCategory');

Route::post('/savecategory','categoryController@addCategory');


// CRUD category routes

Route::get('/deactivecategory/{category_id}','categoryController@deactiveCategory');

Route::get('/activecategory/{category_id}','categoryController@activeCategory');

Route::get('/editcategory/{category_id}','categoryController@editCategory');

Route::post('/updatecategory/{category_id}','categoryController@updateCategory');

Route::get('/deletecategory/{category_id}','categoryController@deleteCategory');


// add and show all products routes


Route::get('/addproduct','productController@index');

Route::post('/uploadproduct','productController@addProducts');

Route::get('/allproduct','productController@allProduct');

Route::get('/activate/{product_id}','productController@activateProduct');

Route::get('/deactivate/{product_id}','productController@deactivateProduct');

Route::get('/deleteproduct/{product_id}','productController@deleteProduct');

Route::get('/editproduct/{product_id}','productController@editProduct');

Route::post('/updateproduct/{productId}','productController@updateProduct');



















// Admin dashboard all controller end here
