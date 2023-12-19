@extends('layouts.front-end.app')

@section('title', $web_config['name']->value . ' ' . \App\CPU\translate('Online Shopping') . ' | ' .
    $web_config['name']->value . ' ' . \App\CPU\translate(' Ecommerce'))

    @push('css_or_js')
        <style>
            .rtl {
                direction: ltr;
            }

            .__best-selling:hover .ptr,
            .flash_deal_product:hover .flash-product-title {
                color: {{ $web_config['primary_color'] }};
            }

            .cz-countdown-hours {
                border: .5px solid{{ $web_config['primary_color'] }};
            }

            .cz-countdown-minutes {
                border: .5px solid{{ $web_config['primary_color'] }};
            }

            .cz-countdown-seconds {
                border: .5px solid{{ $web_config['primary_color'] }};
            }

            .flash_deal_product_details .flash-product-price {
                color: {{ $web_config['primary_color'] }};
            }

            .featured_deal_left {
                background: {{ $web_config['primary_color'] }} 0% 0% no-repeat padding-box;
            }

            .category_div:hover {
                color: {{ $web_config['secondary_color'] }};
            }

            .deal_of_the_day {
                background: {{ $web_config['secondary_color'] }};
            }

            .best-selleing-image {
                background: {{ $web_config['primary_color'] }}10;
            }

            .top-rated-image {
                background: {{ $web_config['primary_color'] }}10;
            }

            @media (max-width: 800px) {
                .categories-view-all {
                    {{ session('direction') === 'rtl' ? 'margin-left: 10px;' : 'margin-right: 6px;' }}
                }

                .categories-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 0px;' : 'margin-left: 6px;' }}
                }

                .seller-list-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 0px;' : 'margin-left: 10px;' }}
                }

                .seller-list-view-all {
                    {{ Session::get('direction') === 'rtl' ? 'margin-left: 20px;' : 'margin-right: 10px;' }}
                }

                .category-product-view-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 16px;' : 'margin-left: -8px;' }}
                }

                .category-product-view-all {
                    {{ Session::get('direction') === 'rtl' ? 'margin-left: -7px;' : 'margin-right: 5px;' }}
                }
            }

            @media(min-width:801px) {
                .categories-view-all {
                    {{ session('direction') === 'rtl' ? 'margin-left: 30px;' : 'margin-right: 27px;' }}
                }

                .categories-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 25px;' : 'margin-left: 25px;' }}
                }

                .seller-list-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 6px;' : 'margin-left: 10px;' }}
                }

                .seller-list-view-all {
                    {{ Session::get('direction') === 'rtl' ? 'margin-left: 12px;' : 'margin-right: 10px;' }}
                }

                .seller-card {
                    {{ Session::get('direction') === 'rtl' ? 'padding-left:0px !important;' : 'padding-right:0px !important;' }}
                }

                .category-product-view-title {
                    {{ Session::get('direction') === 'rtl' ? 'margin-right: 10px;' : 'margin-left: -12px;' }}
                }

                .category-product-view-all {
                    {{ Session::get('direction') === 'rtl' ? 'margin-left: -20px;' : 'margin-right: 0px;' }}
                }
            }

            .countdown-card {
                background: {{ $web_config['primary_color'] }}10;

            }

            .flash-deal-text {
                color: {{ $web_config['primary_color'] }};
            }

            .countdown-background {
                background: {{ $web_config['primary_color'] }}
            }

            .czi-arrow-left {
                color: {{ $web_config['primary_color'] }};
                background: {{ $web_config['primary_color'] }}10;
            }

            .czi-arrow-right {
                color: {{ $web_config['primary_color'] }};
                background: {{ $web_config['primary_color'] }}10;
            }

            .flash-deals-background-image {
                background: {{ $web_config['primary_color'] }}10;
            }

            .view-all-text {
                color: {{ $web_config['secondary_color'] }} !important;
            }

            .feature-product .czi-arrow-left {
                color: {{ $web_config['primary_color'] }};
                background: {{ $web_config['primary_color'] }}10
            }

            .feature-product .czi-arrow-right {
                color: {{ $web_config['primary_color'] }};
                background: {{ $web_config['primary_color'] }}10;
                font-size: 12px;
            }

            .__inline-61 .countdown-card {
                height: 150px !important;
                border-radius: 5px;
            }

            .__inline-61 .flash-deal-text {
                text-transform: uppercase;
                text-align: center;
                font-weight: 700;
                font-size: 20px;
                border-radius: 5px;
                margin-top: 25px;
            }

            .__inline-61 .countdown-background {
                padding: 5px 5px;
                border-radius: 5px;
                margin-top: 15px;
            }

            .__inline-61 .carousel-wrap {
                position: relative;
            }

            .__inline-61 .owl-nav {
                top: 40%;
                position: absolute;
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            .__inline-61 .owl-prev {
                float: left;
            }

            .__inline-61 .owl-next {
                float: right;
            }

            .__inline-61 .flash-deals-background-image {
                border-radius: 5px;
                width: 125px;
                height: 125px;
            }

            .container-fluid,
            .container-xl {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto
            }

            @media (min-width: 1280px) {

                .container,
                .container-sm,
                .container-md,
                .container-lg,
                .container-xl {
                    max-width: 1280px
                }
            }

            @media only screen and (max-width: 767px) {
                .service-box {
                    display: none !important;
                }
            }

            .axil-section-gap {
                padding: 0px 0
            }

            @media only screen and (max-width: 767px) {
                .axil-section-gap {
                    padding: 0px 0
                }
            }
        </style>
    @endpush
@section('content')

    @php $decimal_point_settings = !empty(\App\CPU\Helpers::get_business_settings('decimal_point_settings')) ? \App\CPU\Helpers::get_business_settings('decimal_point_settings') : 0; @endphp
    @php
        $featured_deals = \App\Model\FlashDeal::with([
            'products' => function ($query_one) {
                $query_one->with('product.reviews')->whereHas('product', function ($query_two) {
                    $query_two->active();
                });
            },
        ])
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->where(['status' => 1])
            ->where(['deal_type' => 'feature_deal'])
            ->first();

    @endphp

    <main class="main-wrapper">
        {{-- {{dd(auth('customer')->user())}} --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($banner as $k => $b)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $k }}"
                        class="{{ $k == '0' ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide {{ $k }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($banner as $k => $b)
                    <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                        <a href="{{$b['url']}}">
                            <img src="{{ asset('/storage/app/public/banner/' . $b->photo) }}"
                            class="d-block w-100 banner_home">
                        </a>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="service-area sa">
            <div class="container mt-5 mb-1">
                <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                    <div class="col">
                        <div class="service-box service-style-2">
                            <div class="icon">
                                <img src="{{ asset('public/assets/front-end/assets/images/icons/service1.png') }}"
                                    alt="Service">
                            </div>
                            <div class="content">
                                <h6 class="title">Fast &amp; Secure Delivery</h6>
                                <p>Tell about your service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box service-style-2">
                            <div class="icon">
                                <img src="{{ asset('public/assets/front-end/assets/images/icons/service2.png') }}"
                                    alt="Service">
                            </div>
                            <div class="content">
                                <h6 class="title">Money Back Guarantee</h6>
                                <p>Within 10 days.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box service-style-2">
                            <div class="icon">
                                <img src="{{ asset('public/assets/front-end/assets/images/icons/service3.png') }}"
                                    alt="Service">
                            </div>
                            <div class="content">
                                <h6 class="title">24 Hour Return Policy</h6>
                                <p>No question ask.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box service-style-2">
                            <div class="icon">
                                <img src="{{ asset('public/assets/front-end/assets/images/icons/service4.png') }}"
                                    alt="Service">
                            </div>
                            <div class="content">
                                <h6 class="title">Pro Quality Support</h6>
                                <p>24/7 Live support.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--Startflash deals-->

            {{-- flash deal --}}
            @php

                $flash_deals = \App\Model\FlashDeal::with([
                    'products' => function ($query) {
                        $query->with('product')->whereHas('product', function ($q) {
                            $q->active();
                        });
                    },
                ])
                    ->where(['status' => 1])
                    ->where(['deal_type' => 'flash_deal'])
                    ->whereDate('start_date', '<=', date('Y-m-d'))
                    ->whereDate('end_date', '>=', date('Y-m-d'))
                    ->first();
            @endphp

            @if (isset($flash_deals) && $flash_deals->products)
                <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
                    <div class="container ml--xxl-0">
                        <div class="product-area pb--50">
                            <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                                    This Week’s</span>
                                <h2 class="title">Flash Deals</h2>
                            </div>
                            <div
                                class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                                @foreach ($flash_deals->products as $key => $deal)
                                    @if ($deal->product)
                                        <div class="slick-single-layout">
                                            <div class="axil-product product-style-four">
                                                <div class="thumbnail">
                                                    <a href="{{ route('product', $deal->product->slug) }}">
                                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $deal->product['thumbnail'] }}"
                                                            alt="Product Images">
                                                        <img class="hover-img"
                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $deal->product['thumbnail'] }}"
                                                            alt="Product Images">
                                                    </a>
                                                    @if($deal->product->discount > 0)
                                                    <div class="label-block label-right">
                                                        <div class="product-badget">
                                                            @if ($deal->product->discount_type == 'percent')
                                                                {{ round($deal->product->discount) }}%
                                                            @elseif($deal->product->discount_type == 'flat')
                                                                {{ \App\CPU\Helpers::currency_converter($deal->product->discount) }}

                                                            @endif
                                                            {{ \App\CPU\translate('off') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="product-hover-action">
                                                        <ul class="cart-action">
                                                            <li class="select-option"><a
                                                                    href="{{ route('product', $deal->product->slug) }}">Buy
                                                                    now</a></li>
                                                            <!--<li class="quickview"><a-->
                                                            <!--        href="{{ route('product', $deal->product->slug) }}"><i-->
                                                            <!--            class="far fa-eye"></i></a></li>-->
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="inner">
                                                        <h5 class="title"><a
                                                                href="{{ route('product', $deal->product->slug) }}">{{ Str::limit($deal->product['name'], 23) }}</a>
                                                        </h5>
                                                        <div class="product-price-variant">
                                                            <span
                                                                class="price old-price">{{ \App\CPU\Helpers::currency_converter($deal->product->unit_price) }}</span>
                                                            @if ($deal->product->discount > 0)
                                                                <span
                                                                    class="price current-price">{{ \App\CPU\Helpers::currency_converter($deal->product->unit_price - \App\CPU\Helpers::get_product_discount($deal->product, $deal->product->unit_price)) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <!-- End .slick-single-layout -->
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- flashdeal end --}}
            <!--flash deals end-->
            <!--Deal of the Day-->
            <!-- Poster Countdown Area  -->
            @if ($deal_of_the_day)
                <div class="axil-poster-countdown" style="margin-top:0px">
                    <a href="{{ route('product', [$deal_of_the_day->slug]) }}">
                        <div class="container">
                            <div class="poster-countdown-wrap bg-lighter">

                                <div class="row">
                                    <div class="col-xl-5 col-lg-6">
                                        <div class="poster-countdown-content">
                                            <div class="section-title-wrapper">
                                                <span class="title-highlighter highlighter-secondary"> <i
                                                        class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                                                <h2 class="title">{{ $deal_of_the_day->title }}</h2>
                                            </div>
                                            {{-- <div class="poster-countdown countdown mb--40"></div> --}}
                                            <p>{{ $deal_of_the_day->name }}</p>
                                            <a href="{{ route('product', [$deal_of_the_day->slug]) }}"
                                                class="axil-btn btn-bg-primary">Check it Out!</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-6">
                                        <div class="poster-countdown-thumbnail" id="watch-poster">
                                            <img src="{{ asset('/storage/app/public/product/thumbnail/' . $deal_of_the_day->thumbnail) }}"
                                                alt="Poster Product">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <!-- End Poster Countdown Area  -->
            <!--End Deal of the Day-->

            <!--Featured Deals-->
            @if ($featured_deals)
                <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
                    <div class="container ml--xxl-0">
                        <div class="product-area pb--50">
                            <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                                    This
                                    Week’s</span>
                                <h2 class="title">Featured deal</h2>
                            </div>
                            <div
                                class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

                                @foreach ($featured_deals->products as $key => $fp)
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="{{ route('product', [$fp->product->slug]) }}">
                                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $fp->product->thumbnail) }}"
                                                        alt="Product Images">
                                                    <img class="hover-img"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $fp->product->thumbnail) }}"
                                                        alt="Product Images">
                                                </a>
                                                @if($fp->product->discount > 0)
                                                <div class="label-block label-right">
                                                    <div class="product-badget">
                                                        @if ($fp->product->discount_type == 'percent')
                                                            {{ round($fp->product->discount) }}%
                                                        @elseif($fp->product->discount_type == 'flat')
                                                            {{ \App\CPU\Helpers::currency_converter($fp->product->discount) }}
                                                        @endif {{ \App\CPU\translate('off') }}
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">

                                                        <li class="select-option">
                                                            <form id="add-to-cart-form" class="mb-2">
                                                                @csrf
                                                                <input type="hidden" name="idhh"
                                                                    value="{{ $fp->product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <button id="btn-add-to-cart" class="btn "
                                                                    onclick="window.location.href='{{ route('product', [$fp->product->slug]) }}'"
                                                                    type="button" value="Buy now">
                                                                    Buy now
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <!--<li class="quickview"><a-->
                                                        <!--        href="{{ route('product', [$fp->product->slug]) }}"><i-->
                                                        <!--            class="far fa-eye"></i></a>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('product', [$fp->product->slug]) }}">{{ Str::limit($fp->product->name, 23) }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        @if ($fp->product->discount > 0)
                                                            <span
                                                                class="price old-price">{{ \App\CPU\Helpers::currency_converter($fp->product->unit_price) }}</span>
                                                        @endif
                                                        <span class="price current-price">
                                                            {{ \App\CPU\Helpers::currency_converter(
                                                                $fp->product->unit_price - \App\CPU\Helpers::get_product_discount($fp->product, $fp->product->unit_price)
                                                            ) }}
                                                        </span>
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
            @endif

            <!-- End Featured Deals Product Area  -->

            <!--Start Featured Product-->
            @if ($featured_products)
                <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
                    <div class="container ml--xxl-0">
                        <div class="product-area pb--50">
                            <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                                    This
                                    Week’s</span>
                                <h2 class="title">Featured Products</h2>
                            </div>
                            <div
                                class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

                                @foreach ($featured_products as $product)
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="{{ route('product', [$product->slug]) }}">
                                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $product->thumbnail) }}"
                                                        alt="Product Images">
                                                    <img class="hover-img"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $product->thumbnail) }}"
                                                        alt="Product Images">
                                                </a>
                                                @if($product->discount > 0)
                                                    <div class="label-block label-right">
                                                        <div class="product-badget">
                                                            @if ($product->discount_type == 'percent')
                                                                {{ round($product->discount) }}%
                                                            @elseif($product->discount_type == 'flat')
                                                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                            @endif {{ \App\CPU\translate('off') }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">

                                                        <li class="select-option">
                                                            <form id="add-to-cart-form" class="mb-2">
                                                                @csrf
                                                                <input type="hidden" name="idhh"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <button id="btn-add-to-cart" class="btn "
                                                                    onclick="window.location.href='{{ route('product', [$product->slug]) }}'"
                                                                    type="button">
                                                                    {{ \App\CPU\translate('Buy_now') }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('product', [$product->slug]) }}">{{ Str::limit($product->name, 23) }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        @if ($product->discount > 0)
                                                            <span
                                                                class="price old-price">{{ \App\CPU\Helpers::currency_converter($product->unit_price) }}</span>
                                                        @endif
                                                        <span class="price current-price">
                                                            {{ \App\CPU\Helpers::currency_converter(
                                                                $product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)
                                                            ) }}
                                                        </span>
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
                <!--<div class="axil-shop-area axil-section-gap bg-color-white">-->
                <!--    <div class="container">-->
                <!--        <div class="row">-->
                <!--            <div class="col-lg-12">-->
                <!-- End .row -->
                <!--                <div class="row row--15">-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/led-bulb-9w-night-lamp-05w-RVDkUC"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-29-64ecf7cc8181a.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹100.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/led-bulb-9w-night-lamp-05w-RVDkUC"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/led-bulb-9w-night-lamp-05w-RVDkUC"-->
                <!--                                            >LED Bulb 9W &amp; Night Lamp-->
                <!--                                            0.5W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹228.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹128.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/syncbel-led-bulb-20w-PrNz8R"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-28-64eb9937c4052.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹249.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/syncbel-led-bulb-20w-PrNz8R"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/syncbel-led-bulb-20w-PrNz8R"-->
                <!--                                            >LED Light Bulb 20W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹499.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹250.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/syncbel-led-bulb-15w-ys1vPz"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-27-64eb96017857f.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹150.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/syncbel-led-bulb-15w-ys1vPz"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/syncbel-led-bulb-15w-ys1vPz"-->
                <!--                                            >LED Light Bulb 15W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹299.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹149.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/syncbel-led-downlight-9w-eBln7p"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-27-64eb8fd1eb24d.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹100.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/syncbel-led-downlight-9w-eBln7p"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/syncbel-led-downlight-9w-eBln7p"-->
                <!--                                            >LED Downlight 9W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹299.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹199.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/syncbel-led-bulb-9w-skFg9M"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-27-64eb8e25ef569.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹70.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/syncbel-led-bulb-9w-skFg9M"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/syncbel-led-bulb-9w-skFg9M"-->
                <!--                                            >LED Light Bulb 9W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹149.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹79.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-xl-3 col-sm-6 col-6">-->
                <!--                        <div class="axil-product product-style-one mb--30">-->
                <!--                            <div class="thumbnail">-->
                <!--                                <a-->
                <!--                                    href="http://localhost/sync/product/syncbel-led-night-lamp-05w-NRZ54j"-->
                <!--                                >-->
                <!--                                    <img-->
                <!--                                        onerror="this.src='http://localhost/sync/public/assets/front-end/img/image-place-holder.png'"-->
                <!--                                        data-sal-delay="100"-->
                <!--                                        data-sal-duration="800"-->
                <!--                                        loading="lazy"-->
                <!--                                        src="http://localhost/sync/storage/app/public/product/thumbnail/2023-08-27-64eb8c4be55b9.png"-->
                <!--                                        alt="Product Images"-->
                <!--                                    />-->
                <!--                                </a>-->
                <!--                                <div class="label-block label-right">-->
                <!--                                    <div class="product-badget">₹30.0 Off</div>-->
                <!--                                </div>-->
                <!--                                <div class="product-hover-action">-->
                <!--                                    <ul class="cart-action">-->
                <!--                                        <li class="wishlist">-->
                <!--                                            <a href=""-->
                <!--                                                ><i class="far fa-heart"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                        <li class="select-option">-->
                <!--                                            <a-->
                <!--                                                href="http://localhost/sync/product/syncbel-led-night-lamp-05w-NRZ54j"-->
                <!--                                                >Add to Cart</a-->
                <!--                                            >-->
                <!--                                        </li>-->
                <!--                                        <li class="quickview">-->
                <!--                                            <a-->
                <!--                                                href="#"-->
                <!--                                                data-bs-toggle="modal"-->
                <!--                                                data-bs-target="#quick-view-modal"-->
                <!--                                                ><i class="far fa-eye"></i-->
                <!--                                            ></a>-->
                <!--                                        </li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="product-content">-->
                <!--                                <div class="inner">-->
                <!--                                    <h5 class="title">-->
                <!--                                        <a-->
                <!--                                            href="http://localhost/sync/product/syncbel-led-night-lamp-05w-NRZ54j"-->
                <!--                                            >SyncBel LED Night Lamp 0.5W</a-->
                <!--                                        >-->
                <!--                                    </h5>-->
                <!--                                    <div class="product-price-variant">-->
                <!--                                        <span class="price current-price"-->
                <!--                                            >₹79.0</span-->
                <!--                                        >-->

                <!--                                        <span class="price old-price"-->
                <!--                                            >₹49.0</span-->
                <!--                                        >-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!-- End .container -->
                <!--</div>-->

            @endif

            <!-- End Featured Product Area  -->

            <!-- Start Best Sell Product Area  -->

            <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
                <div class="container">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i>This
                            Month</span>
                        <h2 class="title">Best Sell Products</h2>
                    </div>
                    <div
                        class="new-arrivals-product-activation-2 product-transparent-layout slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                        @foreach ($bestSellProduct as $key => $bestSell)
                            @if ($bestSell->product && $key < 3)
                                <div class="slick-single-layout">
                                    <div class="axil-product product-style-seven">
                                        <div class="thumbnail">
                                            <a href="{{ route('product', $bestSell->product->slug) }}">
                                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800"
                                                    loading="lazy"
                                                    src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $bestSell->product['thumbnail'] }}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">

                                                    <li class="select-option">
                                                        <form id="add-to-cart-form" class="mb-2">
                                                            @csrf
                                                            <input type="hidden" name="idhh"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button id="btn-add-to-cart" class="btn "
                                                                onclick="window.location.href='{{ route('product', [$product->slug]) }}'"
                                                                type="button">
                                                                {{ \App\CPU\translate('Buy_now') }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content" style="padding-top:15px;">
                                            {{-- <div class="cart-btn">
                                                <a href="{{ route('product', $bestSell->product->slug) }}">
                                                    <i class="flaticon-shopping-cart"></i>
                                                </a>
                                            </div> --}}
                                            <div class="inner">
                                                <h5 class="title"><a
                                                        href="{{ route('product', $bestSell->product->slug) }}">{{ \Illuminate\Support\Str::limit($bestSell->product['name'], 30) }}</a>
                                                </h5>
                                                <div class="product-price-variant">
                                                    @if ($bestSell->product->discount > 0)
                                                        <span
                                                            class="price old-price">{{ \App\CPU\Helpers::currency_converter($bestSell->product->unit_price) }}</span>
                                                    @endif
                                                    <span class="price current-price">
                                                        {{ \App\CPU\Helpers::currency_converter(
                                                            $bestSell->product->unit_price -
                                                                \App\CPU\Helpers::get_product_discount($bestSell->product, $bestSell->product->unit_price)
                                                        ) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!---->
                    </div>
                </div>
            </div>
            <!-- End  Best Sell Product Area  -->

            <!-- Start Expolre Our Product Area  -->
            @if ($latest_products)
                <div class="axil-product-area bg-color-white axil-section-gap">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                                Our
                                Products</span>
                            <h2 class="title">Explore our Products</h2>
                        </div>
                        <div
                            class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                            <div class="slick-single-layout">
                                <div class="row row--15">
                                    @foreach ($latest_products as $product)
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-6 mb--30">
                                            <div class="axil-product product-style-one">
                                                <div class="thumbnail">
                                                    <a href="{{ route('product', $product->slug) }}">
                                                        <img data-sal="fade" data-sal-delay="100"
                                                            data-sal-duration="1500"
                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                            alt="Product Images">
                                                    </a>
                                                    @if($product->discount > 0)
                                                    <div class="label-block label-right">
                                                        <div class="product-badget">
                                                            @if ($product->discount_type == 'percent')
                                                                {{ round($product->discount) }}%
                                                            @elseif($product->discount_type == 'flat')
                                                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                            @endif {{ \App\CPU\translate('off') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="product-hover-action">
                                                        <ul class="cart-action">

                                                            <li class="select-option"><a
                                                                    href="{{ route('product', $product->slug) }}">Buy
                                                                    now</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="inner">
                                                        <h5 class="title"><a
                                                                href="{{ route('product', $product->slug) }}">{{ Str::limit($product->name, 23) }}</a>
                                                        </h5>
                                                        <div class="product-price-variant">
                                                            @if ($product->discount > 0)
                                                                <span
                                                                    class="price old-price">{{ \App\CPU\Helpers::currency_converter($product->unit_price) }}</span>
                                                            @endif
                                                            <span class="price current-price">
                                                                {{ \App\CPU\Helpers::currency_converter(
                                                                    $product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)
                                                                ) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Single Product  -->

                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center mt--20 mt_sm--0">
                                <a href="{{ route('products',['data_from'=>'shop-page','page'=>'1']) }}" class="axil-btn btn-bg-lighter btn-load-more">View
                                    All
                                    Products</a>
                            </div>
                        </div>

                    </div>
                </div>
            @endif







            <!-- End Expolre Product Area  -->


            <!-- Start New Arrivals Product Area  -->
            @if ($latest_products)
                <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
                    <div class="container ml--xxl-0">
                        <div class="product-area pb--50">
                            <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                                    This
                                    Week’s</span>
                                <h2 class="title">New Arrivals</h2>
                            </div>
                            <div
                                class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

                                @foreach ($latest_products as $fp)
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="{{ route('product', [$fp->slug]) }}">
                                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $fp->thumbnail) }}"
                                                        alt="Product Images">
                                                    <img class="hover-img"
                                                        src="{{ asset('/storage/app/public/product/thumbnail/' . $fp->thumbnail) }}"
                                                        alt="Product Images">
                                                </a>
                                                @if($fp->discount > 0)
                                                <div class="label-block label-right">
                                                    <div class="product-badget">
                                                        @if ($fp->discount_type == 'percent')
                                                            {{ round($fp->discount) }}%
                                                        @elseif($fp->discount_type == 'flat')
                                                            {{ \App\CPU\Helpers::currency_converter($fp->discount) }}

                                                        @endif
                                                        {{ \App\CPU\translate('off') }}
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <!--<li class="wishlist"><a href=""><i-->
                                                        <!--            class="far fa-heart"></i></a>-->
                                                        <!--</li>-->
                                                        <li class="select-option">
                                                            <form id="add-to-cart-form" class="mb-2">
                                                                @csrf
                                                                <input type="hidden" name="idhh"
                                                                    value="{{ $fp->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <button id="btn-add-to-cart" class="btn "
                                                                    onclick="window.location.href='{{ route('product', [$fp->slug]) }}'"
                                                                    type="button">
                                                                    {{ \App\CPU\translate('Buy_now') }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <!--<li class="quickview"><a-->
                                                        <!--        href="{{ route('product', [$fp->slug]) }}"><i-->
                                                        <!--            class="far fa-eye"></i></a>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('product', [$fp->slug]) }}">{{ Str::limit($fp->name, 23) }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        @if ($fp->discount > 0)
                                                            <span
                                                                class="price old-price">{{ \App\CPU\Helpers::currency_converter($fp->unit_price) }}</span>
                                                        @endif
                                                        <span class="price current-price">
                                                            {{ \App\CPU\Helpers::currency_converter(
                                                                $fp->unit_price - \App\CPU\Helpers::get_product_discount($fp, $fp->unit_price)
                                                            ) }}
                                                        </span>
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
            @endif

        </div>
    </main>
@endsection
