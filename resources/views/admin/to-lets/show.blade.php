@extends('admin.master')
@section('title', $product->title)

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9"><h4 class="card-title">To-Let details</h4></div>
                        <div class="col-md-3 text-right"><a href="{{route('admin.to-lets.index')}}" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> To-Let List</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To-Let Title</label>
                                <label class="col-sm-9 col-form-label">{{$product->title}}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To-Let Type</label>
                                <label class="col-sm-9 col-form-label">{{$product->category}}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <label class="col-sm-9 col-form-label">{{$product->location}}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price</label>
                                <label class="col-sm-9 col-form-label">৳ {{$product->price}}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9 col-form-label">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <label class="col-sm-9 col-form-label">{{config('common.status.'.$product->status)}}</label>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To-Let Image</label>
                                <div class="col-sm-9 col-form-label">
                                    <img style="max-width: 40%" src="{{asset('products_images/'.$product->image)}}" alt="product image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

