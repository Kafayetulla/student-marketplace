<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToLetStoreRequest;
use App\Http\Requests\ToLetUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserToLetController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->where('type', 'To-Let')->orderBy('id', 'desc')->get();

        confirmDelete('Delete To-Let!', 'Are you sure you want to delete?');
        return view('user.to-lets.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'To-Let')->pluck('name', 'id');

        return view('user.to-lets.create', compact('categories'));
    }

    public function store(ToLetStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['type'] = 'To-Let';
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request);

        Product::create($data);

        Alert::success('To-Let Added Successfully!', 'You have added a new post');
        return redirect()->route('user.to-lets.index');
    }

    public function show(Product $product)
    {
        $this->checkAuthorization($product);

        return view('user.to-lets.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->checkAuthorization($product);

        $categories = Category::where('type', 'To-Let')->pluck('name', 'id');

        return view('user.to-lets.edit', compact('product', 'categories'));
    }

    public function update(ToLetUpdateRequest $request, Product $product)
    {
        $this->checkAuthorization($product);
        $data = $request->validated();
        $data['image'] = app(ProductRepository::class)->handleImageUpload($request, $product->image);

        $product->update($data);

        Alert::success('Post Updated Successfully!', 'You have updated the post');
        return redirect()->route('user.to-lets.index');
    }

    public function destroy(Product $product)
    {
        $this->checkAuthorization($product);

        $product->delete();

        Alert::success('Post Successfully deleted!', 'You have removed the post');
        return back();
    }

    private function checkAuthorization(Product $product)
    {
        if ($product->user_id != auth()->id() && $product->type !== 'To-Let') {
            abort(403, 'Unauthorized action.');
        }
    }
}
