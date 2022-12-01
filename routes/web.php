<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\supplier\SupplierController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
