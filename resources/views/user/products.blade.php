<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                            type="button" role="tab" aria-controls="tab-one" aria-selected="true">{{ $featured ?? 'All'}}
                    </button>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-{{$category}}" data-bs-toggle="tab"
                                data-bs-target="#tab-{{$category}}" type="button" role="tab"
                                aria-controls="tab-{{$category}}" aria-selected="false">{{$category}}</button>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom"  style="height: 250px">
                                        <a href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}" style="height: 250px">
                                            <img class="default-img"
                                                 src="{{asset('/products_images/'.$product->image)}}"
                                                 alt="product_image">
                                            <img class="hover-img" src="{{asset('/products_images/'.$product->image)}}"
                                                 alt="product_image">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="View Details" href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}"
                                           class="action-btn hover-up" data-bs-toggle="modal"
                                           data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="row">
                                        <div class="col-md-4 product-category">
                                            <a href="javascript://">{{$product->category}}</a>
                                        </div>
                                        <div class="col-md-8 product-category" style="text-align: right">
                                            <a href="javascript://"><i class="fi-rs-location-alt"> </i> {{$product->location}}</a>
                                        </div>
                                    </div>
                                    <h2><a href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}">{{$product->title}}</a></h2>
{{--                                    <div class="rating-result" title="90%">--}}
{{--                                        <span>--}}
{{--                                            <span>90%</span>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
                                    <div class="product-price">
                                        <span>${{$product->price}}</span>
                                    </div>
                                    <p class="pt-1" style="font-size: .8rem"><i class="fi-rs-user"></i> {{$product->user->name}}</p>
                                    <p class="pt-1" style="font-size: .8rem"><i class="fi-rs-smartphone"></i> {{$product->user->phone}}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            @foreach($categories as $category)
                <div class="tab-pane fade" id="tab-{{$category}}" role="tabpanel" aria-labelledby="tab-{{$category}}">
                    <div class="row product-grid-4">
                        @foreach ($products as $product)
                            @if($product->category == $category)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom"  style="height: 250px">
                                                <a href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}">
                                                    <img class="default-img"
                                                         src="{{asset('/products_images/'.$product->image)}}"
                                                         alt="product_image">
                                                    <img class="hover-img"
                                                         src="{{asset('/products_images/'.$product->image)}}"
                                                         alt="product_image">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="View Details"
                                                   href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}"
                                                   class="action-btn hover-up" data-bs-toggle="modal"
                                                   data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="row">
                                                <div class="col-md-4 product-category">
                                                    <a href="javascript://">{{$product->category}}</a>
                                                </div>
                                                <div class="col-md-8 product-category" style="text-align: right">
                                                    <a href="javascript://"><i class="fi-rs-location-alt"> </i> {{$product->location}}</a>
                                                </div>
                                            </div>
                                            <h2><a href="{{route(($product->type == 'shopping'?'shopping.show':'to-lets.show'), $product->id)}}">{{$product->title}}</a></h2>
                                            {{--                                    <div class="rating-result" title="90%">--}}
                                            {{--                                        <span>--}}
                                            {{--                                            <span>90%</span>--}}
                                            {{--                                        </span>--}}
                                            {{--                                    </div>--}}
                                            <div class="product-price">
                                                <span>${{$product->price}}</span>
                                            </div>
                                            <p class="pt-1" style="font-size: .8rem"><i class="fi-rs-user"></i> {{$product->user->name}}</p>
                                            <p class="pt-1" style="font-size: .8rem"><i class="fi-rs-smartphone"></i> {{$product->user->phone}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!--End tab-content-->
    </div>
</section>
