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
}
