@extends('web-views.layout')

@section('content')

    <div>
        <div>
            <img src="{{ asset('/storage/app/public/banner/banner-1.png') }}" style="width:100%;" alt=""
                class="category_banner">
        </div>
    </div>

    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="axil-shop-top mb-4">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="category-select">
                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <!-- End Single Select  -->

                                    <!-- Start Single Select  -->
                                    {{-- <select class="single-select">
                                            <option>Color</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>Green</option>
                                            <option>Pink</option>
                                        </select> --}}
                                    <!-- End Single Select  -->

                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Price Range</option>
                                        <option>0 - 100</option>
                                        <option>100 - 500</option>
                                        <option>500 - 1000</option>
                                        <option>1000 - 1500</option>
                                    </select>
                                    <!-- End Single Select  -->

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Sort by Latest</option>
                                        <option>Sort by Name</option>
                                        <option>Sort by Price</option>
                                        <option>Sort by Viewed</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <!-- End .row -->
                    <div class="row row--15">
                        @foreach ($products as $product)
                            <div class="col-xl-3 col-sm-6">
                            <div class="axil-product product-style-one mb--30">
                                <div class="thumbnail">
                                    <a href="{{route('product',[$product->slug])}}">
                                        <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                            data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                            alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">@if ($product->discount_type == 'percent')
                                                                {{ round($product->discount) }}%
                                                            @elseif($product->discount_type == 'flat')
                                                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                            @endif {{ \App\CPU\translate('off') }}</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href=""><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="{{route('product',[$product->slug])}}">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="{{route('product',[$product->slug])}}">{{ \Illuminate\Support\Str::limit($product['name'], 100) }}</a></h5>
                                        <div class="product-price-variant">
                                            @if ($product->discount > 0)
                                            <span class="price current-price">{{ \App\CPU\Helpers::currency_converter($product->unit_price) }}</span>

                                             @endif

                                            <span class="price old-price">{{ \App\CPU\Helpers::currency_converter(
                                                                    $product->unit_price -
                                                                        \App\CPU\Helpers::get_product_discount($product, $product->unit_price),
                                                                ) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- End .container -->
    </div>


@stop
