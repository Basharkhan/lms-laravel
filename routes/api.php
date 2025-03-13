<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::apiResource('books', BookController::class);

Route::get('books', [BookController::class, 'index']);       // Get all books
Route::post('books', [BookController::class, 'store']);      // Create a new book
Route::get('books/{id}', [BookController::class, 'show']);   // Show a specific book
Route::put('books/{id}', [BookController::class, 'update']); // Update a book
Route::delete('books/{id}', [BookController::class, 'destroy']); // Delete a book

