<?php

use App\Models\User;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\supplier;
use App\Models\OutItem;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\brandcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/product', function () {
    $products = product::all();
    $categories = category::all();
    $brands = brand::all();
    return view('product', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
})->middleware('auth');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
// Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/product/move-to-out/{id}', [ProductController::class, 'moveToOut'])->name('product.moveToOut');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');


Route::get('/category', function () {
    $products = product::all();
    $categories = category::all();

    return view('category', ['products' => $products, 'categories' => $categories]);
})->middleware('auth');
Route::post('/category/store', [categorycontroller::class, 'store'])->name('category.store');


Route::get('/brand', function () {
    $products = product::all();
    $brands = brand::all();

    return view('brand', ['products' => $products, 'brands' => $brands]);
})->middleware('auth');

Route::post('/brand/store', [brandcontroller::class, 'store'])->name('brand.store');


Route::get('/supplier', function () {
    $products = product::all();
    $brands = brand::all();
    $suppliers = Supplier::all();

    return view('supplier', ['products' => $products, 'brands' => $brands, 'suppliers' => $suppliers]);
})->middleware('auth');

Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');


Route::get('/in_out', function () {
    $products = product::all();
    $brands = brand::all();

    return view('in_out', ['products' => $products, 'brands' => $brands]);
})->middleware('auth');

Route::get('/out', function () {
    $products = product::all();
    $brands = brand::all();
    $out_items = OutItem::all();

    return view('out', ['products' => $products, 'brands' => $brands, 'out_items' => $out_items]);
})->middleware('auth');



Route::get('/tester', function () {
    $users = User::all(); // Ambil semua data dari tabel users
    return view('tester', ['users' => $users]);
})->middleware('auth');

// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('login.auth');

//     Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
//     Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
// });
