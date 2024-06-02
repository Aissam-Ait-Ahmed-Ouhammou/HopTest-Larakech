<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Grouping similar routes
Route::get('/', [ContactController::class, 'index']);
Route::post('/store-contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/destroy/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/show/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::post('/update/contact', [ContactController::class, 'update'])->name('contact.update');
Route::get('/sort', [ContactController::class, 'sortContacts'])->name('contacts.sort');

// Refactored routes using Route::resource() for CRUD operations
Route::resource('contacts', ContactController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::get('/contacts/sort', [ContactController::class, 'sortContacts'])->name('contacts.sort');
