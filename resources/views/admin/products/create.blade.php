@extends('admin.master')
@section('title', 'Create Product')

@section('customStyle')
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/quill/quill.snow.css')}}">
@endsection

@section('customScripts')
    <script src="{{asset('admin/assets/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/quill/quill.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files['0']);
            });

            const quill = new Quill('#editor', {
                theme: 'snow'
            });
            quill.on('text-change', function (delta, oldDelta, source) {
                document.getElementById("description").value = quill.root.innerHTML;
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9"><h4 class="card-title">Add Product Form</h4></div>
                        <div class="col-md-3 text-right"><a href="{{route('admin.products.index')}}" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Product List</a></div>
                    </div>
                    <p class="card-description"> Product details </p>
                    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Title</label>
                                    <div class="col-sm-9">
                                        <input name="title" type="text" class="form-control" style="color: #fff"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Type</label>
                                    <div class="col-sm-9">
                                        <select name="category" class="form-control" required style="color: #fff">
                                            @foreach ($categories as $category)
                                                <option value="{{$category}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Location</label>
                                    <div class="col-sm-9">
                                        <input name="location" type="text" class="form-control" style="color: #fff"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input name="price" placeholder="ex: ৳1200" type="number" class="form-control"
                                               style="color: #fff" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <div id="editor">

                                        </div>
                                        <input name="description" type="hidden" id="description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Image</label>
                                    <input id="image" type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-sm-9">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Image">
                                        <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                            </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Image</label>
                                    <div class="input-group col-sm-9">
                                        <img id="showImage" style="width: 20%;border-radius: 3%;"
                                             src="{{asset('/admin/assets/images/no_image.jpg')}}" alt="product_image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="input-group col-sm-9">
                                        <button type="submit" class="btn btn-info">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

