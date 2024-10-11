@extends('user.dashboard-master')
@section('title', 'To-Lets List')
@section('dashboard.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9"><h4 class="card-title">All To-Lets</h4></div>
                    <div class="col-md-3 text-right"><a href="{{route('user.to-lets.create')}}" class="btn btn-primary"><i class="fi-rs-plus"></i> Create To-Let </a></div>
                </div>
                <div class="table-responsive mt-1">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>To-Let Image</th>
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
                                    <img style="max-width: 100px" src="{{asset('products_images/'.$product->image)}}" alt="image"/>
                                </td>
                                <td>{{$product->category}}</td>
                                <td style="color: orange">${{$product->price}}</td>
                                <td style="color: orange">{{config('common.status.'.$product->status)}}</td>
                                <td>{{$product->user->name}}</td>
                                <td>
                                    <a href="{{route('user.to-lets.show',$product->id)}}"
                                       style="font-size: 20px;color: green; float: left; margin-right: 20px"><i class="fi-rs-eye"></i></a>
                                    <a href="{{route('user.to-lets.edit',$product->id)}}" class="mr-3"
                                       style="font-size: 20px;color:#7149C6; float: left; margin-right: 20px"><i class="fi-rs-edit"></i></a>

                                    <form action="{{route('user.to-lets.destroy',$product->id)}}" method="post"
                                          data-confirm-delete="true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="font-size: 20px; color:#FF6D60; border: none; background: none; float: left; padding: 0">
                                            <i class="fi-rs-trash"></i></button>
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
                                        <h4>No Post Was Found!</h4>
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

@section('customStyle')
    <style>
        button[type='submit']:hover {
            background-color: transparent !important;
        }
    </style>
@endsection
