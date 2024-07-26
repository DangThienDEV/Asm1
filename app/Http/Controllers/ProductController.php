<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::with('category')->get(); // Eager load the category relationship
        return view('admin.product.index', compact('products'));
    }

    // Hiển thị form tạo sản phẩm mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    // Xử lý lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'luot_xem' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/images', 'public');
        }

        Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'luot_xem' => $request->input('luot_xem'),
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }
    // Hiển thị chi tiết sản phẩm
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Xử lý cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'required|string|max:100',
            'price' => 'required|numeric',
            'content' => 'required|string',
            'status' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'luot_xem' => 'required|integer'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // Xử lý xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

