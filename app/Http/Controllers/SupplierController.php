<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'supplier_code' => 'required|string|max:255',
            'supplier_name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        Supplier::create([
            'supplier_code' => $request->supplier_code,
            'supplier_name' => $request->supplier_name,
            'status' => $request->status,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_code' => 'required|string|max:255',
            'supplier_name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'supplier_code' => $request->supplier_code,
            'supplier_name' => $request->supplier_name,
            'status' => $request->status,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier berhasil dihapus.');
    }
}
