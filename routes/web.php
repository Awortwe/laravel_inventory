<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\supplier\SupplierController;
use App\Http\Controllers\UnitController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'admin_profile')->name('admin.profile');
    Route::get('edit/profile', 'edit_profile')->name('edit.profile');
    Route::post('update/profile', 'update_profile')->name('update.profile');
    Route::get('change/password', 'change_password')->name('change.password');
    Route::post('update/password', 'update_password')->name('update.password');
});

Route::controller(SupplierController::class)->group(function(){
    Route::get('suppliers/index', 'index')->name('suppliers.index');
    Route::get('suppliers/create', 'create')->name('suppliers.create');
    Route::post('suppliers/store', 'store')->name('suppliers.store');
    Route::get('suppliers/edit/{id}', 'edit')->name('suppliers.edit');
    Route::post('suppliers/update', 'update')->name('suppliers.update');
    Route::get('suppliers/delete/{id}', 'destroy')->name('suppliers.delete');
});

Route::controller(CustomerController::class)->group(function(){
    Route::get('customers/index', 'index')->name('customers.index');
    Route::get('customers/create', 'create')->name('customers.create');
    Route::post('customers/store', 'store')->name('customers.store');
    Route::get('cutomers/edit/{id}', 'edit')->name('customers.edit');
    Route::post('customer/update', 'update')->name('customers.update');
    Route::get('customers/delete/{id}', 'delete')->name('customers.delete');
});

Route::controller(UnitController::class)->group(function(){
    Route::get('units/index', 'index')->name('units.index');
    Route::get('units/create', 'create')->name('units.create');
    Route::post('units/store', 'store')->name('units.store');
    Route::get('units/edit/{id}', 'edit')->name('units.edit');
    Route::post('units/update', 'update')->name('units.update');
    Route::get('units/delete/{id}', 'delete')->name('units.delete');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('categories/index', 'index')->name('categories.index');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories/store', 'store')->name('categories.store');
    Route::get('categories/edit/{id}', 'edit')->name('categories.edit');
    Route::post('categories/update', 'update')->name('categories.update');
    Route::get('categories/delete/{id}', 'delete')->name('categories.delete');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('products/index', 'index')->name('products.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
