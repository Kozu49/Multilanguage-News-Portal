<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\SubDistrictController;
use App\Http\Controllers\backend\PostController;



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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Logout
Route::get('/admin/logout', [AdminController::class,'Logout'])->name('admin.logout');

//Admin Category All Routes
Route::get('/categories', [CategoryController::class,'Index'])->name('categories');
Route::get('add/category', [CategoryController::class,'AddCategory'])->name('add.category');
Route::post('store/category', [CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('category/{id}/edit', [CategoryController::class,'EditCategory'])->name('edit.category');
Route::post('category/{id}/update', [CategoryController::class,'UpdateCategory'])->name('update.category');
Route::get('category/{id}/delete', [CategoryController::class,'DeleteCategory'])->name('delete.category');

//Admin SubCategory All Routes
Route::get('/subcategories', [SubCategoryController::class,'Index'])->name('subcategories');
Route::get('add/subcategory', [SubCategoryController::class,'AddSubCategory'])->name('add.subcategory');
Route::post('store/subcategory', [SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('subcategory/{id}/edit', [SubCategoryController::class,'EditSubCategory'])->name('edit.subcategory');
Route::post('subcategory/{id}/update', [SubCategoryController::class,'UpdateSubCategory'])->name('update.subcategory');
Route::get('subcategory/{id}/delete', [SubCategoryController::class,'DeleteSubCategory'])->name('delete.subcategory');

//Admin District All Routes
Route::get('/districts', [DistrictController::class,'Index'])->name('districts');
Route::get('add/district', [DistrictController::class,'AddDistrict'])->name('add.district');
Route::post('store/district', [DistrictController::class,'StoreDistrict'])->name('store.district');
Route::get('district/{id}/edit', [DistrictController::class,'EditDistrict'])->name('edit.district');
Route::post('district/{id}/update', [DistrictController::class,'UpdateDistrict'])->name('update.district');
Route::get('district/{id}/delete', [DistrictController::class,'DeleteDistrict'])->name('delete.district');

//Admin SubDistrict All Routes
Route::get('/subdistricts', [SubDistrictController::class,'Index'])->name('subdistricts');
Route::get('add/subdistrict', [SubDistrictController::class,'AddSubDistrict'])->name('add.subdistrict');
Route::post('store/subdistrict', [SubDistrictController::class,'StoreSubDistrict'])->name('store.subdistrict');
Route::get('subdistrict/{id}/edit', [SubDistrictController::class,'EditSubDistrict'])->name('edit.subdistrict');
Route::post('subdistrict/{id}/update', [SubDistrictController::class,'UpdateSubDistrict'])->name('update.subdistrict');
Route::get('subdistrict/{id}/delete', [SubDistrictController::class,'DeleteSubDistrict'])->name('delete.subdistrict');

//Admin Posts All Routes
Route::get('/createpost', [PostController::class,'create'])->name('create.post');
Route::post('store/post', [PostController::class,'StorePost'])->name('store.post');
Route::get('/allpost', [PostController::class,'allPost'])->name('all.post');
Route::get('/post/{id}/edit', [PostController::class,'EditPost'])->name('edit.post');
Route::post('post/{id}/update', [PostController::class,'UpdatePost'])->name('update.post');
Route::get('/post/{id}/delete', [PostController::class,'DeletePost'])->name('delete.post');






//json Data for Category and District
Route::get('/get/subcategory/{category_id}', [PostController::class,'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class,'GetSubDistrict']);
