<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WebAuthorController;
use App\Http\Controllers\WebBookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('authors.index');
});

// Author Web Routes (with forms)
Route::resource('authors', WebAuthorController::class);

// Book Web Routes (with forms)
Route::resource('books', WebBookController::class);
