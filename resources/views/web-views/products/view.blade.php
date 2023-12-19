@extends('layouts.front-end.app')

@section('title', \App\CPU\translate($data['data_from']) . ' ' . \App\CPU\translate('products'))
@php($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings'))
@section('content')
    <style>
        @media screen and (max-width: 430px) {
            .axil-product .cart-action li.select-option a {
                line-height: 39px;
                font-weight: 600;
                font-size: 12px;
                padding: 0 6px;
            }
        }
        .card:hover{
            transform: scale(1.1);
            box-shadow: 8px 8px 8px #44524c;
            transition: 0.3s;
        }
        .card{
            transition: 0.3s;
        }
        a:hover{
            color:black;
        }

    </style>

    <div>
        <div>
            <img src="{{ asset('/storage/app/public/banner/banner-1.png') }}" style="width:100%;" alt=""
                class="category_banner">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="axil-shop-top mb-4 mt-4">
                <div class="row">



                    <!-- End Single Select  -->

                    <!-- Start Single Select  -->
                    {{-- <div class="col-lg-3 col-6">
                        <div class="category-select">

                            <select class="single-select" onchange="cat(this.value)" style="padding-left:5px;">
                                <option>Price Range</option>
                                @for ($i = 0; $i <= 100000; $i += 5000)
                                    <option
                                        value="{{ route('products', ['id' => $data['id'], 'data_from' => $data['data_from'], 'sort_by' => $data['sort_by'], 'min_price' => $i, 'max_price' => $i + 5000, 'name' => $data['name'], 'page' => 1]) }}">
                                        ₹ {{ $i . '-' . ($i += 5000) }}</option>
                                @endfor
                            </select>
                            <!-- End Single Select  -->

                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-3 col-6">
                        <div class="category-select mt_md--10  justify-content-lg-end">

                            <select class="single-select" onchange="filter(this.value)" style="padding-left:5px;">
                                <option value="latest">{{ \App\CPU\translate('Latest') }}</option>
                                <option value="low-high">{{ \App\CPU\translate('Low_to_High') }}
                                    {{ \App\CPU\translate('Price') }} </option>
                                <option value="high-low">{{ \App\CPU\translate('High_to_Low') }}
                                    {{ \App\CPU\translate('Price') }}</option>
                                <option value="a-z">{{ \App\CPU\translate('A_to_Z') }} {{ \App\CPU\translate('Order') }}
                                </option>
                                <option value="z-a">{{ \App\CPU\translate('Z_to_A') }}
                                    {{ \App\CPU\translate('Order') }}</option>
                            </select>

                            <!-- End Single Select  -->
                        </div>
                    </div> --}}
                    <script>
                        filter(high-low);
                    </script>

                    <div class="col-lg-3 col-6" >
                        <div class="card" style="border: 0.5px solid #cbcbcb;border-radius:6px;cursor:pointer;">

                            <a class="text-center">Low to High</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6" >
                        <div class="card" style="border: 0.5px solid #cbcbcb;border-radius:6px;cursor:pointer;">
                            <a class="text-center">High to Low</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6" >
                        <div class="card" style="border: 0.5px solid #cbcbcb;border-radius:6px;cursor:pointer;">
                             <a class="text-center">A to Z</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6" >
                        <div class="card" style="border: 0.5px solid #cbcbcb;border-radius:6px;cursor:pointer;">
                            <a class="text-center">Z to A</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <!-- End .row -->
                    <div class="row row--15">
                        @if (count($products) > 0)
                            <div class="row mt-3" id="ajax-products">
                                @include('web-views.products._ajax-products', [
                                    'products' => $products,
                                    'decimal_point_settings' => $decimal_point_settings,
                                ])
                            </div>
                        @else
                            <div class="text-center pt-5">
                                <h2>{{ \App\CPU\translate('No Product Found') }}</h2>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
        <!-- End .container -->
    </div>

    <script>
        function cat(value) {
            var url = value;
            // alert(url);
            if (url) {
                window.location = url;
            }
            return false;
        }

        function filter(value) {
             alert(value);
            $.get({
                url: '{{ url('/') }}/products',
                data: {
                    id: '{{ $data['id'] }}',
                    name: '{{ $data['name'] }}',
                    data_from: '{{ $data['data_from'] }}',
                    min_price: '{{ $data['min_price'] }}',
                    max_price: '{{ $data['max_price'] }}',
                    sort_by: value
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function() {
                    $('#loading').hide();
                },
            });
        }
    </script>
@endsection
