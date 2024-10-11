<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->where('type', 'Shopping')->orderBy('id', 'desc')->get();

        confirmDelete('Delete Product!', 'Are you sure you want to delete?');
        return view('user.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'Shopping')->pluck('name', 'id');

        return view('user.products.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request);

        Product::create($data);

        Alert::success('Product Added Successfully!', 'You have added a new product');
        return redirect()->route('user.products.index');
    }

    public function show(Product $product)
    {
        $this->checkAuthorization($product);
        return view('user.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->checkAuthorization($product);
        $categories = Category::where('type', 'Shopping')->pluck('name', 'id');

        return view('user.products.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->checkAuthorization($product);
        $data = $request->validated();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request, $product->image);

        $product->update($data);

        Alert::success('Product Updated Successfully!', 'You have updated the product');
        return redirect()->route('user.products.index');
    }

    public function destroy(Product $product)
    {
        $this->checkAuthorization($product);
        $product->delete();

        Alert::success('Product Successfully deleted!', 'You have removed the product');
        return back();
    }

    private function checkAuthorization(Product $product)
    {
        if ($product->user_id != auth()->id() && $product->type !== 'To-Let') {
            abort(403, 'Unauthorized action.');
        }
    }
}
