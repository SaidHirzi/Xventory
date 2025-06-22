<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;


class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'status' => 'required|string',
            'address' => 'required|string',
        ]);

        Supplier::create([
            'supplier_name' => $request->supplier_name,
            'status' => $request->status,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Supplier berhasil ditambahkan.');
    }

}