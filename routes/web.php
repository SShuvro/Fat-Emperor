<?php

use App\Http\Controllers\fatEmperorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\ProductSubCategoryModal;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteproductCategoryProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');

//Login 

Route::get('/admin', [LoginController::class, 'index'])->name('login.view');
Route::post('login/credential/check', [LoginController::class, 'checkLogin'])->name('login.check.credential');

Route::get('logout', [LoginController::class, 'logout'])->name('logout.view');


//User
Route::get('user-management', [UserController::class, 'index'])->name('user.view');
Route::post('user-management/add', [UserController::class, 'addUser'])->name('user.save');
Route::get('user-management/details/{id}', [UserController::class, 'detailsOfUser'])->name('user.details');
Route::put('user-management/update', [UserController::class, 'updateUser'])->name('user.update');
Route::put('user-management/delete', [UserController::class, 'deleteUser'])->name('user.delete');

//Product Category
Route::get('productCategory-management', [ProductCategoryController::class, 'index'])->name('productCategory.view');
Route::post('productCategory-management/add', [ProductCategoryController::class, 'addProductCategory'])->name('productCategory.save');
Route::get('productCategory-management/details/{id}', [ProductCategoryController::class, 'detailsOfProductCategory'])->name('productCategory.details');
Route::post('productCategory-management/update', [ProductCategoryController::class, 'updateProductCategory'])->name('productCategory.update');
Route::put('productCategory-management/delete', [ProductCategoryController::class, 'deleteProductCategory'])->name('productCategory.delete');
Route::put('productCategory-management/front', [ProductCategoryController::class, 'showInFront'])->name('productCategory.showInFront');

//Product Sub Category
Route::get('productSubCategory-management', [ProductSubCategoryController::class, 'index'])->name('productSubCategory.view');
Route::post('productSubCategory-management/add', [ProductSubCategoryController::class, 'addProductSubCategory'])->name('productSubCategory.save');
Route::get('productSubCategory-management/details/{id}', [ProductSubCategoryController::class, 'detailsOfProductSubCategory'])->name('productSubCategory.details');
Route::post('productSubCategory-management/update', [ProductSubCategoryController::class, 'updateProductSubCategory'])->name('productSubCategory.update');
Route::put('productSubCategory-management/delete', [ProductSubCategoryController::class, 'deleteProductSubCategory'])->name('productSubCategory.delete');
Route::put('productSubCategory-management/front', [ProductSubCategoryController::class, 'showInFront'])->name('productSubCategory.showInFront');

//Product
Route::get('product-management', [ProductController::class, 'index'])->name('product.view');
Route::post('product-management/add', [ProductController::class, 'addProduct'])->name('product.save');
Route::get('product-management/details/{id}', [ProductController::class, 'detailsOfProduct'])->name('product.details');
Route::post('product-management/update', [ProductController::class, 'updateProduct'])->name('product.update');
Route::put('product-management/delete', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::put('product-management/front', [ProductController::class, 'showInFront'])->name('product.showInFront');
Route::get('product-management/subCategorySelect/{id}', [ProductController::class, 'subCategorySelect'])->name('product.subCategorySelect');

//Frontend

Route::get('/', [fatEmperorController::class,'index'])->name('index.view');
Route::get('/menu', [fatEmperorController::class,'menu'])->name('menu.view');
