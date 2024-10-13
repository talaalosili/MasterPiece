<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.layout.master');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('dashboard/users', [UserController::class, 'index'])->name('users.index');

Route::get('dashboard/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('dashboard/users', [UserController::class, 'store'])->name('users.store');

Route::get('dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('dashboard/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::get('dashboard/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::delete('dashboard/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');

Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');

Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');

Route::put('companies/{company}', [CompanyController::class, 'update'])->name('companies.update');

Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); 
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index'); 
Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedback.create'); 
Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedback.store'); 
Route::get('/feedbacks/{product}', [FeedbackController::class, 'show'])->name('feedback.show'); 
Route::get('/feedbacks/{product}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
Route::put('/feedbacks/{product}', [FeedbackController::class, 'update'])->name('feedback.update'); 
Route::delete('/feedbacks/{product}', [FeedbackController::class, 'destroy'])->name('feedback.destroy'); 