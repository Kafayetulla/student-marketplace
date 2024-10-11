<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToLetStoreRequest;
use App\Http\Requests\ToLetUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

class AdminToLetController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 'To-Let')->orderBy('id', 'desc')->get();

        confirmDelete('Delete To-Let!', 'Are you sure you want to delete?');
        return view('admin.to-lets.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'To-Let')->pluck('name', 'id');

        return view('admin.to-lets.create', compact('categories'));
    }

    public function store(ToLetStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['type'] = 'To-Let';
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request);

        Product::create($data);

        Alert::success('To-Let Added Successfully!', 'You have added a new post');
        return redirect()->route('admin.to-lets.index');
    }

    public function show(Product $product)
    {
        return view('admin.to-lets.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::where('type', 'To-Let')->pluck('name', 'id');

        return view('admin.to-lets.edit', compact('product', 'categories'));
    }

    public function update(ToLetUpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request, $product->image);

        $product->update($data);

        Alert::success('Post Updated Successfully!', 'You have updated the post');
        return redirect()->route('admin.to-lets.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        Alert::success('Post Successfully deleted!', 'You have removed the post');
        return back();
    }
}
