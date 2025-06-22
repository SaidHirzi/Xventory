<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_status' => 'required',
        ]);

        category::create([
            'category_code' => $request->product_name,
            'category_name' => $request->product_category,
            'status' => $request->product_status,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }
}