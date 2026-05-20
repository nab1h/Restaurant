<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:categories,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric|lt:price',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image', 'is_discount', 'is_available']);
        $data['is_discount'] = $request->has('is_discount');
        $data['is_available'] = $request->has('is_available');


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('status', 'تمت إضافة المنتج بنجاح');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'cat_id' => 'required|exists:categories,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric|lt:price',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image', 'is_discount', 'is_available']);
        $data['is_discount'] = $request->has('is_discount');
        $data['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            if ($product->image) Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('status', 'تم تعديل المنتج بنجاح');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->back()->with('status', 'تم الحذف بنجاح');
    }
}
