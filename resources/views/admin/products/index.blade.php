@extends('admin.master')
@section('title', 'Products List')
@section('content')
    <form action="{{url('/search-product')}}" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" method="GET">
        @csrf
        <input type="text" name="search" class="form-control" placeholder="Search products" style="color: #fff">
    </form>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Products</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Posted By</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <img src="{{asset('products_images/'.$product->image)}}" alt="image"/>
                                </td>
                                <td>{{$product->category}}</td>
                                <td style="color: orange">${{$product->price}}</td>
                                <td style="color: orange">{{config('common.status.'.$product->status)}}</td>
                                <td>{{$product->user->name}}</td>
                                <td>
                                    <a href="{{route('admin.products.show',$product->id)}}" class="mr-3"
                                       style="font-size: 20px;color: green; float: left"><i class="mdi mdi-eye"></i></a>
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="mr-3"
                                       style="font-size: 20px;color:#7149C6; float: left"><i class="mdi mdi-tooltip-edit"></i></a>

                                    <form action="{{route('admin.products.destroy',$product->id)}}" method="post"
                                          data-confirm-delete="true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="font-size: 20px; color:#FF6D60; border: none; background: none; float: left">
                                            <i class="mdi mdi-delete-sweep"></i></button>
                                    </form>



                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="16">
                                    <div class="text-center">
                                        <img style="width: 25%;height: 25%;"
                                             src="{{asset('/user/assets/imgs/no-search-result.png')}}"
                                             alt="no-search-result">
                                        <h4>No Product Was Found!</h4>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
