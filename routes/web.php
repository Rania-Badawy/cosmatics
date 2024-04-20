<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\OpinionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('user.home');
});

Route::get('contact', function () {
    return view('user.contact');
});

Route::get('about', function () {
    return view('user.about');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/', "home");
    Route::get('showProducts/{id}', "showProducts");
    Route::post('addCart', "addCart");
    Route::get('carts', "carts");
    Route::post('editCart/{id}', "editCart");
        Route::post('deleteCart/{id}', "deleteCart");
});

Route::controller(CategoryController::class)->group(function () {
    Route::middleware('is_admin')->group(function () {
        Route::get('categories', "all");
        Route::get('categories/add', "add");
        Route::post('categories/insert', "insert");
        Route::get('categories/edit/{id}', "edit");
        Route::post('categories/update/{id}', "update");
        Route::post('categories/delete/{id}', "delete");
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::middleware('is_admin')->group(function () {
        Route::get('admin_dashboard', "dashboard");
        Route::get('products', "all");
        Route::get('products/show/{id}', "show");
        Route::get('products/add', "add");
        Route::post('products/insert', "insert");
        Route::get('products/edit/{id}', "edit");
        Route::post('products/update/{id}', "update");
        Route::post('products/delete/{id}', "delete");
    });
});

Route::controller(OpinionController::class)->group(function () {
    Route::middleware('is_admin')->group(function () {
        Route::get('opinions', "all");
        Route::get('opinions/show/{id}', "show");
        Route::get('opinions/add', "add");
        Route::post('opinions/insert', "insert");
        Route::get('opinions/edit/{id}', "edit");
        Route::post('opinions/update/{id}', "update");
        Route::post('opinions/delete/{id}', "delete");
    });
});

Route::controller(ContactController::class)->group(function () {
    Route::middleware('is_admin')->group(function () {
        Route::get('contacts/edit', "edit");
        Route::post('contacts/update', "update");
    });
});

Route::get("change/{lang}", function ($lang) {
    if ($lang == "en") {
        session()->put("lang", "en");
    } else {
        session()->put("lang", "ar");
    }
    return redirect()->back();
});

Route::get('logout', function () {
    Auth::logout();
    return redirect(url("/"));
});
