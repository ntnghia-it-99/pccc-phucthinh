<?php

use Illuminate\Support\Facades\Route;

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
//Guest
Route::get('/', 'HomeController@home');
Route::get('/gioi-thieu', 'HomeController@introduce');

//admin
Route::get('/dang-nhap', 'LoginController@index');
Route::get('/dashboard', 'LoginController@dashboard');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

//product
Route::get('/them-san-pham', 'ProductController@add_product');
Route::post('/them-san-pham', 'ProductController@save_product');
Route::get('/danh-sach-sp', 'ProductController@all_product');
Route::get('/chi-tiet/{product_slug}', 'ProductController@details_product');
Route::get('/sua-san-pham/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@save_edit_product');
Route::get('/delete_product/{product_id}', 'ProductController@delete_product');
Route::get('/san-pham', 'ProductController@show_all');

//product
Route::get('/them-du-an', 'ProjectController@add_project');
Route::post('/them-du-an', 'ProjectController@save_project');
Route::get('/danh-sach-du-an', 'ProjectController@all_project');
Route::get('/du-an/{project_slug}', 'ProjectController@details_project');
Route::get('/sua-du-an/{project_id}', 'ProjectController@edit_project');
Route::post('/update-project/{project_id}', 'ProjectController@save_edit_project');
Route::get('/delete_project/{project_id}', 'ProjectController@delete_project');
Route::get('/du-an', 'ProjectController@project');

//category
Route::get('/them-the-loai', 'CategoryController@add_category');
Route::get('/danh-sach-the-loai', 'CategoryController@all_category');
Route::post('/save-category-product', 'CategoryController@save_category');
//brand
Route::get('/them-thuong-hieu', 'CategoryController@add_brand');
Route::get('/danh-sach-thuong-hieu', 'CategoryController@all_brand');
Route::post('/save-brand', 'CategoryController@save_brand');
//service
Route::get('/them-dich-vu', 'ServiceController@add_service');
Route::get('/danh-sach-dich-vu', 'ServiceController@all_service');
Route::get('/sua-dich-vu/{service_id}', 'ServiceController@edit_service');
Route::get('/detail/{service_slug}', 'ServiceController@detail_service');
Route::post('/edit-service', 'ServiceController@save_edit_service');
Route::get('/xoa-dich-vu/{service_id}', 'ServiceController@delete_service');
Route::post('/save-service', 'ServiceController@save_service');
