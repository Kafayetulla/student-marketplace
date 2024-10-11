<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 'Shopping')->orderBy('id', 'desc')->get();

        confirmDelete('Delete Product!', 'Are you sure you want to delete?');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'Shopping')->pluck('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request);

        Product::create($data);

        Alert::success('Product Added Successfully!', 'You have added a new product');
        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::where('type', 'Shopping')->pluck('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request, $product->image);
        $product->update($data);

        Alert::success('Product Updated Successfully!', 'You have updated the product');
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        Alert::success('Product Successfully deleted!', 'You have removed the product');
        return back();
    }
}
