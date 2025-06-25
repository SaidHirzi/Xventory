<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category; // atau nama model kategorimu

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalBrands = Brand::count();
        $totalCategories = Category::count();

        return view('dashboard', compact('totalProducts', 'totalBrands', 'totalCategories'));
    }
}
