<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class)->only(['index', 'edit', 'destroy'])->names('admin.users');
