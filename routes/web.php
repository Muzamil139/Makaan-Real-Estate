<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;

Route::get('/', [ClientController::class, 'index']);

//   **************
// Routes For Admin
//   **************
Route::get('admin', [AdminController::class, 'admin']);

// Route for managing property
Route::get('manage_property', [AdminController::class, 'manage_property']);
Route::post('add_propert', [AdminController::class, 'add_property'])->name('addProperty');
Route::post('update_propert', [AdminController::class, 'update_property'])->name('UpdateProperty');
Route::get('delete_property/{id}', [AdminController::class, 'delete_property']);

//Route for rented Property
Route::get('rented_property', [AdminController::class, 'rented_property']);
Route::get('delete_rents/{id}', [AdminController::class, 'delete_rents']);

//   **************
// Routes For Auth
//   **************
Route::get('login', [UserController::class, 'login']);
Route::post('userLogin', [UserController::class, 'userLogin'])->name('login');
Route::get('signup', [UserController::class, 'signup']);
Route::post('register', [UserController::class, 'register'])->name('registration');
Route::get('logout', [UserController::class, 'logout']);

//   **************
// Routes For Clients
//   **************
Route::get('property', [ClientController::class, 'property']);
Route::get('property_details/{id}', [ClientController::class, 'property_details']);
Route::get('myProperty', [ClientController::class, 'myProperty']);

//   **************
// Routes For Rent_Properties
//   **************
Route::post('rent_property', [RentController::class, 'rent_property'])->name('rents');

