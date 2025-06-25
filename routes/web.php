<?php

use App\Models\User;
use App\Models\category;
use App\Models\product;
use App\Models\supplier;
use App\Models\OutItem;
use App\Models\Brand;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/product', function () {
    $products = product::all();
    $categories = category::all();
    $brands = brand::all();
    $suppliers = supplier::all();
    return view('product', ['products' => $products, 'brands' => $brands, 'categories' => $categories, 'suppliers' => $suppliers]);
})->middleware('auth');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
// Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/product/move-to-out/{id}', [ProductController::class, 'moveToOut'])->name('product.moveToOut');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/search', [ProductController::class, 'searchPage'])->name('product.search');



Route::get('/category', function () {
    $products = product::all();
    $categories = category::all();

    return view('category', ['products' => $products, 'categories' => $categories]);
})->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');



Route::get('/brand', function () {
    $products = product::all();
    $brands = brand::all();

    return view('brand', ['products' => $products, 'brands' => $brands]);
})->middleware('auth');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::put('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');


Route::get('/supplier', function () {
    $products = product::all();
    $brands = brand::all();
    $suppliers = Supplier::all();

    return view('supplier', ['products' => $products, 'brands' => $brands, 'suppliers' => $suppliers]);
})->middleware('auth');

Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');



Route::get('/in_out', function () {
    $products = product::all();
    $brands = brand::all();
    $categories = category::all();
    $suppliers = supplier::all();

    return view('in_out', ['products' => $products, 'brands' => $brands, 'categories' => $categories, 'suppliers' => $suppliers]);
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

Route::get('/api/search-product', function (Illuminate\Http\Request $request) {
    $query = $request->input('q');

    $results = \App\Models\Product::where('product_name', 'like', "%{$query}%")
        ->select('id', 'product_name', 'product_stock', 'product_brand', 'product_supplier', 'product_category', 'product_code', 'product_image', 'created_at', 'updated_at')
        ->limit(10)
        ->get();

    return response()->json($results);
});


