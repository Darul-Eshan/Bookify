<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.categories.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}