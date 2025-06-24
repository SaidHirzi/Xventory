<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kode_brand' => 'required|unique:brands,kode_brand',
            'nama_brand' => 'required',
            'status' => 'required',
        ]);

        Brand::create([
            'kode_brand' => $request->kode_brand,
            'nama_brand' => $request->nama_brand,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Brand berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $brand = brand::findOrFail($id);
        $brand->delete();

        return redirect()->back()->with('success', 'brand berhasil dihapus.');
    }

    // public function update(Request $request, $id)
    // {
    //     $brand = brand::findOrFail($id);
    //     $brand->nama_brand = $request->nama_brand;
    //     $brand->kode_brand = $request->kode_brand;
    //     $brand->status = $request->status;
    //     $brand->save();

    //     return redirect()->back()->with('success', 'Category updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_brand' => 'required|string|max:255',
            'nama_brand' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'kode_brand' => $request->kode_brand,
            'nama_brand' => $request->nama_brand,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Supplier berhasil diperbarui.');
    }
}
