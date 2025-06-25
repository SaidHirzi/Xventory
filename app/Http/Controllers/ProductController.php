<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OutItem;
use App\Models\Brand;



class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_stock' => 'required|integer|min:0',
            'product_category' => 'required|string',
            'product_brand' => 'required|string',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_supplier' => 'required|string',
        ]);

        // Simpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('products', 'public');
        }

        // Simpan data produk
        Product::create([
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_category' => $request->product_category,
            'product_brand' => $request->product_brand,
            'product_image' => $imagePath,
            'product_supplier' => $request->product_supplier,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);
    //     // $product->delete();

    //     return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    // }

    public function moveToOut($id)
    {
        $product = Product::findOrFail($id);

        // Copy ke tabel out_items
        OutItem::create([
            'product_code' => $product->product_code,
            'product_name' => $product->product_name,
            'product_category' => $product->product_category,
            'product_brand' => $product->product_brand,
            'product_stock' => $product->product_stock,
            'product_supplier' => $product->product_supplier,
            'product_image' => $product->product_image,
        ]);

        // Optional: hapus dari tabel produk
        $product->delete();

        return redirect()->back()->with('success', 'Produk dipindahkan ke Out Item.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_stock = $request->product_stock;
        $product->product_category = $request->product_category;
        $product->product_brand = $request->product_brand;
        $product->product_supplier = $request->product_supplier;
        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }


    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        $brands = Brand::all(); // Tambahkan ini

        return view('product.index', compact('products', 'brands'));
    }



    public function searchPage(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
            $query->where('product_name', 'like', '%' . $search . '%');
        })->get();

        return view('product.search', compact('products', 'search'));
    }


}
