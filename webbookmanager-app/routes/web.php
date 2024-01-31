<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;



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


Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

Route::get('/login', [SessionController::class, 'create'])->name('login.index');

Auth::routes();

//sanctum's proteccion (needed to log in)
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function(){
        return view('home');
    })->name('home');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //users
    Route::resource('/users', UserController::class);//->middleware('can:users')->name('users');
    Route::get('/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->middleware('can:users.edit')->name('users.edit');
    Route::delete('/users/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('can:users.destroy')->name('users.destroy');;
    //Route::get('/users/search', UserController::class, 'render')->name('users.search');

    //routes for books:
    Route::resource('/books', BookController::class);
    Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create')->middleware('can:books.create');
    Route::post('/books/store', [App\Http\Controllers\BookController::class, 'store'])->name('books.store')->middleware('can:books.store');
    Route::get('/books/show/{id}', [App\Http\Controllers\BookController::class, 'show']);
    Route::post('/books/edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])->middleware('can:books.edit');
    Route::delete('/books/destroy/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->middleware('can:books.destroy');

    //Route::get('books/search', [App\Http\Controllers\BookController::class, 'search'])->name('books.search');

    //Comment system
    Route::post('/comments', [CommentController::class, 'store']);
    Route::delete('/comments/destroy/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

    //categories
    Route::resource('/categories', CategoryController::class);
    Route::post('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('can:categories.create')->name('categories.create');
    Route::get('/categories/show/{id}', [App\Http\Controllers\CategoryController::class, 'show']);
    Route::delete('/categories/destroy/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('can:categories.destroy');


    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    //Route::get('/contact', [ContactController::class, 'selectBook'])->name('contact.selectBook');


    //Route::get('/cart', CartController::class);
    //Route::get('/search', [CartController::class, 'search'])->name('search');

    Route::get('/shop', [CartController::class, 'shop'])->name('shop');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


});

//revisar la actualización de libros y hacerlo al igual que el create!!!!!
//redireccionar las rutas a 'shop' en vez de a 'booox.index'
//arregalr el buscador el cual no muestra las imágenes




