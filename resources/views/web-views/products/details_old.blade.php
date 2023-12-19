@extends('layouts.front-end.app')

@section('title', $product['name'])

    <meta name="description" content="{{ $product->slug }}">
    <meta name="keywords" content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
    @if ($product->added_by == 'seller')
        <meta name="author" content="{{ $product->seller->shop ? $product->seller->shop->name : $product->seller->f_name }}">
    @elseif($product->added_by == 'admin')
        <meta name="author" content="{{ $web_config['name']->value }}">
    @endif
    <!-- Viewport-->

    @if ($product['meta_image'] != null)
        <meta property="og:image" content="{{ asset('storage/app/public/product/meta') }}/{{ $product->meta_image }}" />
        <meta property="twitter:card" content="{{ asset('storage/app/public/product/meta') }}/{{ $product->meta_image }}" />
    @else
        <meta property="og:image" content="{{ asset('storage/app/public/product/thumbnail') }}/{{ $product->thumbnail }}" />
        <meta property="twitter:card"
            content="{{ asset('storage/app/public/product/thumbnail/') }}/{{ $product->thumbnail }}" />
    @endif

    @if ($product['meta_title'] != null)
        <meta property="og:title" content="{{ $product->meta_title }}" />
        <meta property="twitter:title" content="{{ $product->meta_title }}" />
    @else
        <meta property="og:title" content="{{ $product->name }}" />
        <meta property="twitter:title" content="{{ $product->name }}" />
    @endif
    <meta property="og:url" content="{{ route('product', [$product->slug]) }}">

    @if ($product['meta_description'] != null)
        <meta property="twitter:description" content="{!! $product['meta_description'] !!}">
        <meta property="og:description" content="{!! $product['meta_description'] !!}">
    @else
        <meta property="og:description"
            content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
        <meta property="twitter:description"
            content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
    @endif
    <meta property="twitter:url" content="{{ route('product', [$product->slug]) }}">

    <link rel="stylesheet" href="{{ asset('public/assets/front-end/css/product-details.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn-number:hover {
            color: {{ $web_config['secondary_color'] }};

        }

        .for-total-price {
            margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: -30%;
        }

        .feature_header span {
            padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 15px;
        }

        .flash-deals-background-image {
            background: {{ $web_config['primary_color'] }}10;
        }

        @media (max-width: 768px) {
            .for-total-price {
                padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 30%;
            }

            .product-quantity {
                padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 4%;
            }

            .for-margin-bnt-mobile {
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 7px;
            }

        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 3px;
            }

            .for-discount {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: -7%;
            }

            .product-quantity {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 4%;
            }

        }


        @media (max-width: 500px) {
            .for-dicount-div {
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: -5%;
            }

            .for-total-price {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: -20%;
            }

            .view-btn-div {
                float: {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }};
            }

            .for-discount {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 7%;
            }

            .for-mobile-capacity {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 7%;
            }
            /*.fixed-sm-size{*/
            /*    position: fixed;*/
            /*    margin-top: -147%;*/
            /*    width: 100%;*/
            /*    z-index: 1;*/
            /*    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;*/
            /*}*/
            ..fixed-sm-size{
                width: 100%;
            }
            /*.btn-buy{*/
            /*    background-color:white !important;*/
            /*}*/

        }
        @media screen and (max-width:500px){
            .only-desk-view{
                display: none;
            }
            /*.hidden-sm-size{*/
            /*    display: none !important;*/
            /*}*/
            .heart-hidden-sm{
                display: none !important;
            }
        }
        @media screen and (min-width: 501px){
            .fixed-sm-size{
                display: none;
            }
            .hidden-lg-size{
                display: none !important;
            }
            .heart_design{
                display: none !important;
            }
        }

        .axil-section-gap {
            padding: 80px 0;
        }
        input[type=checkbox] ~label::before, input[type=radio] ~ label::before,
        input[type=checkbox] ~label::after, input[type=radio] ~ label::after{
            position: absolute;
            margin-left: -999999px;
        }

        input:checked ~ .type_design{
            transform: scale(1.1);
            border-color: red !important;
            transition: all 0.3s ease;
        }
        label:not(.form-check-label):not(.custom-control-label):not(.custom-file-label):not(.custom-option-label) {
            min-width: 3.25rem;
            height: 3.25rem;
            float: left;
            padding: 0.375rem 0;
            display: block;
            color: #818a91;
            font-size: 1.6rem;
            font-weight: 400;
            text-align: center;
            background: transparent;
            text-transform: uppercase;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            transform: scale(1);
        }
        .heart_design{
            position: absolute;
            margin-top: 3%;
            z-index: 1;
            margin-left: -125px;
        }
        .btn-buy{
           background-color:#ff497c !important;
        }
    </style>
    <style>

    </style>


@section('content')
    <?php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    $decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings');
    ?>
    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <!---->
                                <div class="col-lg-10 order-lg-2">
                                <!--<div id="carouselExampleControls" class="carousel slide hidden-lg-size" data-ride="carousel">-->
                                <!--        <div class="carousel-inner">-->
                                <!--            @if ($product->images != null)-->
                                <!--                @foreach (json_decode($product->images) as $key => $photo)-->
                                <!--                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} col-sm-3">-->

                                <!--                    <img src="{{ asset("storage/app/public/product/$photo") }}" class="d-block w-100"-->
                                <!--                            title="" alt=""  />-->
                                <!--                </div>-->
                                <!--                @endforeach-->
                                <!--            @endif-->
                                <!--             @if ($product->images != null)-->
                                <!--            @foreach (json_decode($product->images) as $key => $photo)-->
                                <!--            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">-->
                                <!--              <img class="d-block w-100" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"-->
                                <!--                src="{{asset("storage/app/public/product/$photo")}}" alt="Product thumb" alt="First slide">-->
                                <!--            </div>-->
                                <!--            @endforeach-->
                                <!--            @endif-->
                                <!--        </div>-->
                                <!--          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">-->
                                <!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                                <!--            <span class="sr-only">Previous</span>-->
                                <!--          </a>-->
                                <!--          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">-->
                                <!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                                <!--            <span class="sr-only">Next</span>-->
                                <!--          </a>-->
                                <!--    </div>  -->

                                    <div class="single-product-thumbnail-wrap zoom-gallery hidden-sm-size">
                                        <div class="heart_design">
                                            <button type="button" onclick="addWishlist('{{ $product['id'] }}')"
                                                    class="btn __text-18px text-danger">
                                                    <i class="fa fa-heart" aria-hidden="true" style="font-size: 18px;"></i>
                                                    <span
                                                        class="countWishlist-{{ $product['id'] }}" style="font-size: 18px">{{ $countWishlist }}</span>
                                            </button>
                                        </div>
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            @if ($product->images != null)
                                                @foreach (json_decode($product->images) as $key => $photo)
                                                    <div class="thumbnail">
                                                        <a href="{{ asset("storage/app/public/product/$photo") }}"
                                                            class="popup-zoom">
                                                            <img src="{{ asset("storage/app/public/product/$photo") }}"
                                                                alt="Product Images">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="label-block">
                                            <div class="product-badget">@if ($product->discount_type == 'percent')
                                                        {{ round($product->discount) }}%
                                                    @elseif($product->discount_type == 'flat')
                                                        {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                        {{ \App\CPU\translate('off') }}
                                                    @endif </div>
                                        </div>
                                        <!--<div class="product-quick-view position-view">-->
                                        <!--    <a href="#" class="popup-zoom">-->
                                        <!--        <i class="far fa-search-plus"></i>-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <!---->
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        @if ($product->images != null)
                                            @foreach (json_decode($product->images) as $key => $photo)
                                                <div class="small-thumb-img">
                                                    <img src="{{ asset("storage/app/public/product/$photo") }}"
                                                        alt="thumb image">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    {{-- <span
                                        class="d-inline-block  align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2' }} __color-FE961C">{{ $overallRating[0] }}</span> --}}
                                    @if ($product->discount > 0)
                                        <strike style="color: #E96A6A;"
                                            class="{{ Session::get('direction') === 'rtl' ? 'ml-1' : 'mr-3' }}">
                                            {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                        </strike>
                                    @endif
                                    <span class="h3 font-weight-normal text-accent ">
                                        {{ \App\CPU\Helpers::get_price_range($product) }}
                                    </span>
                                    <!--<span-->
                                    <!--    class="{{ Session::get('direction') === 'rtl' ? 'mr-2' : 'ml-2' }} __text-12px font-regular">-->
                                    <!--    (<span>{{ \App\CPU\translate('tax') }} : </span>-->
                                    <!--    <span id="set-tax-amount"></span>)-->
                                    <!--</span>-->
                                    <div class="product-rating">
                                        @for ($inc = 0; $inc < 5; $inc++)
                                            @if ($inc < $overallRating[0])
                                                <div class="star-rating"> <i class="far fa-star"></i> </div>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        {{-- <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div> --}}
                                        <div class="review-link">
                                            <a href="#">(<span>{{ $product->reviews->count() }}</span> customer
                                                reviews)</a>
                                        </div>
                                    </div>

                                    <form id="add-to-cart-form" class="mb-2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div
                                            class="position-relative {{ Session::get('direction') === 'rtl' ? 'ml-n4' : 'mr-n4' }} mb-2">
                                            @if (count(json_decode($product->colors)) > 0)
                                                <div class="flex-start">
                                                    <div class="product-description-label mt-2 text-body" style="font-size:14px;margin-right: 3%">
                                                        {{ \App\CPU\translate('color') }}:
                                                    </div>
                                                    <div>
                                                        <ul class="list-inline checkbox-color mb-1 flex-start {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'ml-2' }}"
                                                            style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0;">
                                                            <!--<li>-->

                                                            <!--            <label-->
                                                            <!--                for=""-->

                                                            <!--                >-->
                                                            <!--                <span class="outline"></span></label>-->
                                                            <!--        </li>-->
                                                            @foreach (json_decode($product->colors) as $key => $color)

                                                                <div>
                                                                    <!-- <a href="">lll</a>
                                                                    <a href="">lll</a>
                                                                    <a href="">lll</a>
                                                                    <a href="">lll</a> -->
                                                                    <li>
                                                                        <input type="radio" class="redio_hide"
                                                                            id="{{ $product->id }}-color-{{ $key }}"
                                                                            name="color" value="{{ $color }}"
                                                                            @if ($key == 0) checked @endif>
                                                                        <label style="background: {{ $color }};"
                                                                            for="{{ $product->id }}-color-{{ $key }}"
                                                                            data-toggle="tooltip" class="label_hide"
                                                                            >
                                                                            <span class="outline"></span></label>
                                                                    </li>
                                                                </div>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                $qty = 0;
                                                if (!empty($product->variation)) {
                                                    foreach (json_decode($product->variation) as $key => $variation) {
                                                        $qty += $variation->qty;
                                                    }
                                                }
                                            @endphp
                                        </div>
                                        @foreach (json_decode($product->choice_options) as $key => $choice)
                                            <div class="d-flex justify-content-left mx-0">
                                                <div
                                                    class="product-description-label text-body mt-2 {{ Session::get('direction') === 'rtl' ? 'pl-2' : 'pr-2' }}" style="font-size: 16px;margin-right: 3%">
                                                    {{ $choice->title }}
                                                    :
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start"
                                                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0; ">
                                                        <!--<li class="for-mobile-capacity">-->
                                                        <!--    <label style="margin-right:30px;"-->
                                                        <!--        ></label>-->
                                                        <!--</li>-->
                                                        @foreach ($choice->options as $key => $option)

                                                                <li class="for-mobile-capacity" style="margin-left:5px;">
                                                                    <input type="radio"
                                                                        id="{{ $choice->name }}-{{ $option }}"
                                                                        name="{{ $choice->name }}"
                                                                        value="{{ $option }}"
                                                                        @if ($key == 0) checked @endif>
                                                                    <label class="__text-12px type_design"
                                                                        for="{{ $choice->name }}-{{ $option }}" style="padding:2px;">{{ $option }}</label>
                                                                </li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- Quantity + Add to cart -->
                                        <div class="mt-2">
                                            <div class="product-quantity d-flex flex-wrap align-items-center __gap-15 mb-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="product-description-label text-body mt-2">
                                                        {{ \App\CPU\translate('Quantity') }}:</div>
                                                    <div class="d-flex justify-content-center align-items-center __w-160px"
                                                        style="color: {{ $web_config['primary_color'] }}">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-number __p-10" type="button"
                                                                data-type="minus" data-field="quantity"
                                                                disabled="disabled"
                                                                style="color: {{ $web_config['primary_color'] }}">
                                                                -
                                                            </button>
                                                        </span>

                                                        <input type="text" name="quantity"
                                                            class="form-control input-number text-center cart-qty-field __inline-29" style="border:1px solid #aadfa0"
                                                            placeholder="1"
                                                            value="{{ $product->minimum_order_qty ?? 1 }}"
                                                            product-type="{{ $product->product_type }}"
                                                            min="{{ $product->minimum_order_qty ?? 1 }}" max="100">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-number __p-10" type="button"
                                                                product-type="{{ $product->product_type }}"
                                                                data-type="plus" data-field="quantity"
                                                                style="color: {{ $web_config['primary_color'] }}">
                                                                +
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="chosen_price_div">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}">
                                                        <div class="product-description-label">
                                                            <strong style="font-weight: 800;">{{ \App\CPU\translate('total_price') }}</strong> :
                                                        </div>
                                                        &nbsp; <strong id="chosen_price"></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                            <div class="col-12">
                                                @if ($product['product_type'] == 'physical' && $product['current_stock'] <= 0)
                                                    <h5 class="mt-3 text-danger">{{ \App\CPU\translate('out_of_stock') }}
                                                    </h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="only-desk-view">
                                            <div class="d-flex justify-content-between">
                                            <button
                                                class="btn-buy axil-btn btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                                onclick="buy_now()" type="button">
                                                <span class="string-limit" style="color:white;">{{ \App\CPU\translate('buy_now') }}</span>
                                            </button>
                                            <button
                                                class="axil-btn btn-bg-primary btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}" style="margin-left: 2%;"
                                                onclick="addToCart()" type="button">
                                                <span class="string-limit">{{ \App\CPU\translate('add_to_cart') }}</span>
                                            </button>
                                            <!--<button type="button" onclick="addWishlist('{{ $product['id'] }}')"-->
                                            <!--        class="btn __text-18px text-danger heart-hidden-sm">-->
                                            <!--        <i class="fa fa-heart" aria-hidden="true" style="font-size: 18px;"></i>-->
                                            <!--        <span-->
                                            <!--            class="countWishlist-{{ $product['id'] }}" style="font-size: 18px">{{ $countWishlist }}</span>-->
                                            <!--</button>-->
                                            <!--<button type="button" onclick="addWishlist('{{ $product['id'] }}')"-->
                                            <!--        class="btn __text-18px text-danger heart-hidden-sm">-->
                                            <!--        <i class="fa fa-share" aria-hidden="true" style="font-size: 18px;"></i>-->
                                            <!--</button>-->

                                        </div>
                                        </div>
                                    </form>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        {{-- <li class="nav-item " role="presentation">
                            <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab"
                                aria-controls="additional-info" aria-selected="false">Additional Information</a>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 mb--30">
                                        <div class="single-desc">
                                            <!--<h5 class="title">Specifications:</h5>-->
                                            <p class="description">{!! $product->details !!}</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                    <!--@if($product->details)-->
                                    <!--    <div class="col-lg-6 mb--30">-->
                                    <!--        <div class="single-desc">-->
                                    <!--            <h5 class="title">Short Description:</h5>-->
                                    <!--            <p>{!! $product->details !!}</p>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--@endif-->
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="pro-des-features">
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/icon-3.png') }}"
                                                        alt="icon">

                                                </div>
                                                Easy Returns
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/icon-2.png') }}"
                                                        alt="icon">
                                                </div>
                                                Quality Service
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/icon-1.png') }}"
                                                        alt="icon">
                                                </div>
                                                Original Product
                                            </li>
                                        </ul>
                                        <!-- End .pro-des-features -->
                                    </div>
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        {{-- <div class="tab-pane fade" id="additional-info" role="tabpanel"
                            aria-labelledby="additional-info-tab">
                            <div class="product-additional-info">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Stand Up</th>
                                                <td>35″L x 24″W x 37-45″H(front to back wheel)</td>
                                            </tr>
                                            <tr>
                                                <th>Folded (w/o wheels) </th>
                                                <td>32.5″L x 18.5″W x 16.5″H</td>
                                            </tr>
                                            <tr>
                                                <th>Folded (w/ wheels) </th>
                                                <td>32.5″L x 24″W x 18.5″H</td>
                                            </tr>
                                            <tr>
                                                <th>Door Pass Through </th>
                                                <td>24</td>
                                            </tr>
                                            <tr>
                                                <th>Frame </th>
                                                <td>Aluminum</td>
                                            </tr>
                                            <tr>
                                                <th>Weight (w/o wheels) </th>
                                                <td>20 LBS</td>
                                            </tr>
                                            <tr>
                                                <th>Weight Capacity </th>
                                                <td>60 LBS</td>
                                            </tr>
                                            <tr>
                                                <th>Width</th>
                                                <td>24″</td>
                                            </tr>
                                            <tr>
                                                <th>Handle height (ground to handle) </th>
                                                <td>37-45″</td>
                                            </tr>
                                            <tr>
                                                <th>Wheels</th>
                                                <td>Aluminum</td>
                                            </tr>
                                            <tr>
                                                <th>Size</th>
                                                <td>S, M, X, XL</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        @php
                            $reviews_of_product = App\Model\Review::where('product_id', $product->id)->paginate(2);
                        @endphp
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 mb--40">
                                        <div class="axil-comment-area pro-desc-commnet-area">
                                            <h5 class="title">{{ $reviews_of_product->total() }} Review for this product
                                            </h5>

                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                @foreach ($product->reviews as $review)
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img onerror="this.src='{{ asset('public/assets/front-end/assets/images/blog/author-image-4.png') }}'"
                                                                        src="{{ asset('storage/app/public/profile/' . $review->user->image) }}"
                                                                        alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="Cameron Williamson">{{ $review->user->f_name . ' ' . $review->user->l_name }}</span>
                                                                            </span>
                                                                        </a>
                                                                        <span class="commenter-rating ratiing-four-star">
                                                                            @if (round($overallRating[0]) >= 5)
                                                                                @for ($i = 0; $i < 5; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star"></i></a>
                                                                                @endfor
                                                                            @endif
                                                                            @if (round($overallRating[0]) == 4)
                                                                                @for ($i = 0; $i < 4; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star"></i></a>
                                                                                @endfor
                                                                                <a href="#"><i
                                                                                        class="fas fa-star empty-rating"></i></a>
                                                                            @endif
                                                                            @if (round($overallRating[0]) == 3)
                                                                                @for ($i = 0; $i < 3; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star"></i></a>
                                                                                @endfor
                                                                                @for ($j = 0; $j < 2; $j++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star empty-rating"></i></a>
                                                                                @endfor
                                                                            @endif
                                                                            @if (round($overallRating[0]) == 2)
                                                                                @for ($i = 0; $i < 2; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star"></i></a>
                                                                                @endfor
                                                                                @for ($j = 0; $j < 3; $j++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star empty-rating"></i></a>
                                                                                @endfor
                                                                            @endif
                                                                            @if (round($overallRating[0]) == 1)
                                                                                @for ($i = 0; $i < 1; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star"></i></a>
                                                                                @endfor
                                                                                @for ($i = 0; $i < 4; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star empty-rating"></i></a>
                                                                                @endfor
                                                                            @endif
                                                                            @if (round($overallRating[0]) == 0)
                                                                                @for ($i = 0; $i < 5; $i++)
                                                                                    <a href="#"><i
                                                                                            class="fas fa-star empty-rating"></i></a>
                                                                                @endfor
                                                                            @endif
                                                                            {{-- <a href="#"><i class="fas fa-star"></i></a>

                                                                        <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a> --}}
                                                                        </span>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>{{ $review->comment }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                                <!-- End Single Comment  -->
                                            </ul>
                                        </div>
                                        <!-- End .axil-commnet-area -->
                                    </div>
                                    <!-- End .col -->
                                    <div class="col-lg-6 mb--40">
                                        <!-- Start Comment Respond  -->
                                        {{-- <div class="comment-respond pro-des-commend-respond mt--0">
                                            <h5 class="title mb--30">Add a Review</h5>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                            <div class="rating-wrapper d-flex-center mb--40">
                                                Your Rating <span class="require">*</span>
                                                <div class="reating-inner ml--20">
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                </div>
                                            </div>

                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Other Notes (optional)</label>
                                                            <textarea name="message" placeholder="Your Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Name <span class="require">*</span></label>
                                                            <input id="name" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Email <span class="require">*</span> </label>
                                                            <input id="email" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <button type="submit" id="submit"
                                                                class="axil-btn btn-bg-primary w-auto">Submit
                                                                Comment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                        <!-- End Comment Respond  -->
                                    </div>
                                    <!-- End .col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->

        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    {{-- <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Your
                        Recently</span> --}}
                    <h2 class="title">Similar Products</h2>
                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="slick-single-layout">
                            <div class="axil-product">
                                <div class="thumbnail">
                                    <a href="{{ route('product', $relatedProduct->slug) }}">
                                        <img src="{{ asset("storage/app/public/product/thumbnail/$relatedProduct->thumbnail") }}"
                                            alt="Product Images">
                                    </a>
                                    @if ($product->discount > 0)
                                        <div class="label-block label-right">
                                            <div class="product-badget">

                                                 @if ($product->discount_type == 'percent')
                                                        {{ round($product->discount) }}%
                                                    @elseif($product->discount_type == 'flat')
                                                        {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                        {{ \App\CPU\translate('off') }}
                                                    @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-end for-dicount-div-null">
                                            <span class="for-discoutn-value-null"></span>
                                        </div>
                                    @endif

                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href=""><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a
                                                href="{{ route('product', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <span class="price old-price">₹{{ $relatedProduct->unit_price }}</span>
                                            <span
                                                class="price current-price">₹{{ $relatedProduct->purchase_price }}</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span
                                                            class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- End .slick-single-layout -->

                </div>
            </div>
        </div>
        <!-- End Recently Viewed Product Area  -->
        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            {{-- <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>
    <div style="position:fixed;z-index:2;background-color:#ff497c;bottom:0;width: 100%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" class="fixed-sm-size">
        <div class="d-flex justify-content-between">
            <button
                class="axil-btn btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                onclick="addToCart()" type="button" style="background-color:#ff497c;">
                <span class="string-limit" style="color:white;">{{ \App\CPU\translate('add_to_cart') }}</span>
            </button>
            <button
                class="axil-btn btn-bg-primary btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}" style="margin-left: 2%;"
                onclick="buy_now()"" type="button">
                <span class="string-limit">{{ \App\CPU\translate('buy_now') }}</span>
            </button>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function() {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }
    </script>
    <script>
        $(document).ready(function() {
            load_review();
        });
        let load_review_count = 1;

        function load_review() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: '{{ route('review-list-product') }}',
                data: {
                    product_id: {{ $product->id }},
                    offset: load_review_count
                },
                success: function(data) {
                    $('#product-review-list').append(data.productReview)
                    if (data.not_empty == 0 && load_review_count > 2) {
                        toastr.info('{{ \App\CPU\translate('no more review remain to load') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        console.log('iff');
                    }
                }
            });
            load_review_count++
        }
    </script>

    {{-- Messaging with shop seller --}}
    <script>
        $('#contact-seller').on('click', function(e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({
                'height': '276px'
            });
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function(e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '{{ route('messages_store') }}',
                    data: data,
                    success: function(respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({
                    'height': '125px'
                });
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function(e) {
            e.preventDefault();
            $('#seller_details').animate({
                'height': '114px'
            });
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
        async="async"></script>
@endpush
