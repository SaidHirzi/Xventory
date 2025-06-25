<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_code' => 'required',
            'category_name' => 'required',
            'category_status' => 'required',
        ]);

        category::create([
            'category_code' => $request->category_code,
            'category_name' => $request->category_name,
            'status' => $request->category_status,
        ]);


        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_code = $request->category_code;
        $category->status = $request->status;

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }
}