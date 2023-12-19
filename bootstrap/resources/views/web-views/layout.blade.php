<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Syncbel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/styles.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('public/assets/front-end/assets/images/syncbel_feb.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/assets/css/style.min.css') }}">

</head>

<body>
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
   @include('layouts.front-end.partials._header')

    @yield('content')

    <div class="service-area">
        <div class="container">
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
    </div>
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>

                            <div class="inner">
                                <p>Lorem ipsum dolor <br>
                                    Lorem ipsum dolor <br>
                                    India.
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i>
                                            something@mantr.com</a></li>
                                    <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> (+01)
                                            544-756-2424</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Account</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="">My Account</a></li>
                                    <li><a href="">Login / Register</a></li>
                                    <li><a href="l">Cart</a></li>
                                    <li><a href="">Wishlist</a></li>
                                    <li><a href="">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Link</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Terms Of Use</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="">Contact</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">lorem</h5>
                            <div class="inner">
                                <span>India is largest country</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2023. All rights reserved by <a target="_blank" href="#"></a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div
                            class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{ asset('public/assets/front-end/assets/images/icons/cart/cart-1.png') }}"
                                        alt="paypal cart"></li>
                                <li><img src="{{ asset('public/assets/front-end/assets/images/icons/cart/cart-2.png') }}"
                                        alt="paypal cart"></li>
                                <li><img src="{{ asset('public/assets/front-end/assets/images/icons/cart/cart-5.png') }}"
                                        alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div
                                            class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-big-01.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('public/assets/front-end/assets/images/product/product-big-01.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-big-02.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('public/assets/front-end/assets/images/product/product-big-02.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-big-03.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('public/assets/front-end/assets/images/product/product-big-03.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/thumb-08.png') }}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/thumb-07.png') }}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('public/assets/front-end/assets/images/product/product-thumb/thumb-09.png') }}"
                                                    alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{ asset('public/assets/front-end/assets/images/icons/rate.png') }}"
                                                    alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Tables</h3>
                                        <span class="price-amount">₹155.00 - ₹255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                            pretium. Integer ante est, elementum eget magna. Pellentesque sagittis
                                            dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="l"
                                                        class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href=""
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search"
                            placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="">
                                <img src="{{ asset('public/assets/front-end/assets/images/product/electric/product-09.png') }}"
                                    alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">₹29.99</span>
                                <span class="price old-price">₹49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="l" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="">
                                <img src="{{ asset('public/assets/front-end/assets/images/product/electric/product-09.png') }}"
                                    alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">₹29.99</span>
                                <span class="price old-price">₹49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="l" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->






    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('public/assets/front-end/assets/js/vendor/waypoints.min.js') }}"></script>

     <!-- Main JS -->
    <script src="{{ asset('public/assets/front-end/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/assets/front-end') }}/js/sweet_alert.js"></script>
    {{-- Toastr --}}
    <script src={{ asset('public/assets/back-end/js/toastr.js') }}></script>
    {!! Toastr::message() !!}

    <script>
        function addWishlist(product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('store-wishlist') }}",
                method: 'POST',
                data: {
                    product_id: product_id
                },
                success: function(data) {
                    if (data.value == 1) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('.countWishlist').html(data.count);
                        $('.countWishlist-' + product_id).text(data.product_count);
                        $('.tooltip').html('');

                    } else if (data.value == 2) {
                        Swal.fire({
                            type: 'info',
                            title: 'WishList',
                            text: data.error
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'WishList',
                            text: data.error
                        });
                    }
                }
            });
        }

        function removeWishlist(product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('delete-wishlist') }}",
                method: 'POST',
                data: {
                    id: product_id
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    Swal.fire({
                        type: 'success',
                        title: 'WishList',
                        text: data.success
                    });
                    $('.countWishlist').html(data.count);
                    $('#set-wish-list').html(data.wishlist);
                    $('.tooltip').html('');
                },
                complete: function() {
                    $('#loading').hide();
                },
            });
        }

        function quickView(product_id) {
            $.get({
                url: '{{ route('quick-view') }}',
                dataType: 'json',
                data: {
                    product_id: product_id
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    console.log("success...")
                    $('#quick-view').modal('show');
                    $('#quick-view-modal').empty().html(data.view);
                },
                complete: function() {
                    $('#loading').hide();
                },
            });
        }

        function addToCart(form_id = 'add-to-cart-form', redirect_to_checkout = false) {
            //alert(form_id)
            if (checkAddToCartValidity()) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('cart.add') }}',
                    data: $('#' + form_id).serializeArray(),
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            updateNavCart();
                            toastr.success(response.message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                            $('.call-when-done').click();
                            if (redirect_to_checkout) {
                                location.href = "{{ route('checkout-details') }}";
                            }
                            return false;
                        } else if (response.status == 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Cart',
                                text: response.message
                            });
                            return false;
                        }
                    },
                    complete: function() {
                        $('#loading').hide();

                    }
                });
            } else {
                Swal.fire({
                    type: 'info',
                    title: 'Cart',
                    text: '{{ \App\CPU\translate('please_choose_all_the_options') }}'
                });
            }
        }

        function buy_now() {
            addToCart('add-to-cart-form', true);
            /* location.href = "{{ route('checkout-details') }}"; */
        }

        function currency_change(currency_code) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('currency.change') }}',
                data: {
                    currency_code: currency_code
                },
                success: function(data) {
                    toastr.success('{{ \App\CPU\translate('Currency changed to') }}' + data.name);
                    location.reload();
                }
            });
        }

        function removeFromCart(key) {
            $.post('{{ route('cart.remove') }}', {
                _token: '{{ csrf_token() }}',
                key: key
            }, function(response) {
                $('#cod-for-cart').hide();
                updateNavCart();
                $('#cart-summary').empty().html(response.data);
                toastr.info('{{ \App\CPU\translate('Item has been removed from cart') }}', {
                    CloseButton: true,
                    ProgressBar: true
                });
                let segment_array = window.location.pathname.split('/');
                let segment = segment_array[segment_array.length - 1];
                if (segment === 'checkout-payment' || segment === 'checkout-details') {
                    location.reload();
                }
            });
        }

        function updateNavCart() {
            $.post('{{ route('cart.nav-cart') }}', {
                _token: '{{ csrf_token() }}'
            }, function(response) {
                $('#cart_items').html(response.data);
            });
        }

        function cartQuantityInitialize() {
            $('.btn-number').click(function(e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                productType = $(this).attr('product-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());

                if (!isNaN(currentVal)) {
                    console.log(productType)
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max') || (productType === 'digital')) {
                            input.val(currentVal + 1).change();
                        }

                        if ((parseInt(input.val()) == input.attr('max')) && (productType === 'physical')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });

            $('.input-number').focusin(function() {
                $(this).data('oldValue', $(this).val());
            });

            $('.input-number').change(function() {
                productType = $(this).attr('product-type');
                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                var name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cart',
                        text: '{{ \App\CPU\translate('Sorry, the minimum order quantity does not match') }}'
                    });
                    $(this).val($(this).data('oldValue'));
                }
                if (productType === 'digital' || valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cart',
                        text: '{{ \App\CPU\translate('Sorry, stock limit exceeded') }}.'
                    });
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function(e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        }

        function updateQuantity(key, element) {
            $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                key: key,
                quantity: element.value
            }, function(data) {
                updateNavCart();
                $('#cart-summary').empty().html(data);
            });
        }

        function updateCartQuantity(minimum_order_qty, key) {
            /* var quantity = $("#cartQuantity" + key).children("option:selected").val(); */
            var quantity = $("#cartQuantity" + key).val();
            if (minimum_order_qty > quantity) {
                toastr.error('{{ \App\CPU\translate('minimum_order_quantity_cannot_be_less_than_') }}' +
                    minimum_order_qty);
                $("#cartQuantity" + key).val(minimum_order_qty);
                return false;
            }

            $.post('{{ route('cart.updateQuantity') }}', {
                _token: '{{ csrf_token() }}',
                key: key,
                quantity: quantity
            }, function(response) {
                if (response.status == 0) {
                    toastr.error(response.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $("#cartQuantity" + key).val(response['qty']);
                } else {
                    updateNavCart();
                    $('#cart-summary').empty().html(response);
                }
            });
        }

        $('#add-to-cart-form input').on('change', function() {
            getVariantPrice();
        });

        function getVariantPrice() {
            if ($('#add-to-cart-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{ route('cart.variant_price') }}',
                    data: $('#add-to-cart-form').serializeArray(),
                    success: function(data) {
                        console.log(data)
                        $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
                        $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
                        $('#set-tax-amount').html(data.tax);
                        $('#set-discount-amount').html(data.discount);
                        $('#available-quantity').html(data.quantity);
                        $('.cart-qty-field').attr('max', data.quantity);
                    }
                });
            }
        }

        function checkAddToCartValidity() {
            var names = {};
            $('#add-to-cart-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });
            if ($('input:radio:checked').length == count) {
                return true;
            }
            return false;
        }

        // @if (Request::is('/') && \Illuminate\Support\Facades\Cookie::has('popup_banner') == false)
        //     $(document).ready(function() {
        //         $('#popup-modal').appendTo("body").modal('show');
        //     });
        //     @php(\Illuminate\Support\Facades\Cookie::queue('popup_banner', 'off', 1))
        // @endif

        // $(".clickable").click(function() {
        //     window.location = $(this).find("a").attr("href");
        //     return false;
        // });
    </script>

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            @endforeach
        </script>
    @endif

    <script>
        function couponCode() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route('coupon.apply') }}',
                data: $('#coupon-code-ajax').serializeArray(),
                success: function(data) {
                    /* console.log(data);
                    return false; */
                    if (data.status == 1) {
                        let ms = data.messages;
                        ms.forEach(
                            function(m, index) {
                                toastr.success(m, index, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        );
                    } else {
                        let ms = data.messages;
                        ms.forEach(
                            function(m, index) {
                                toastr.error(m, index, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        );
                    }
                    setInterval(function() {
                        location.reload();
                    }, 2000);
                }
            });
        }

        jQuery(".search-bar-input").keyup(function() {
            $(".search-card").css("display", "block");
            let name = $(".search-bar-input").val();
            if (name.length > 0) {
                $.get({
                    url: '{{ url('/') }}/searched-products',
                    dataType: 'json',
                    data: {
                        name: name
                    },
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(data) {
                        $('.search-result-box').empty().html(data.result)
                    },
                    complete: function() {
                        $('#loading').hide();
                    },
                });
            } else {
                $('.search-result-box').empty();
            }
        });

        jQuery(".search-bar-input-mobile").keyup(function() {
            $(".search-card").css("display", "block");
            let name = $(".search-bar-input-mobile").val();
            if (name.length > 0) {
                $.get({
                    url: '{{ url('/') }}/searched-products',
                    dataType: 'json',
                    data: {
                        name: name
                    },
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(data) {
                        $('.search-result-box').empty().html(data.result)
                    },
                    complete: function() {
                        $('#loading').hide();
                    },
                });
            } else {
                $('.search-result-box').empty();
            }
        });

        jQuery(document).mouseup(function(e) {
            var container = $(".search-card");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        });

        const img = document.getElementByTagName("img")
        img.addEventListener("error", function(event) {
            event.target.src = '{{ asset('public/assets/front-end/img/image-place-holder.png') }}';
            event.onerror = null
        })

        function route_alert(route, message) {
            Swal.fire({
                title: '{{ \App\CPU\translate('Are you sure') }}?',
                text: message,
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '{{ $web_config['primary_color'] }}',
                cancelButtonText: '{{ \App\CPU\translate('No') }}',
                confirmButtonText: '{{ \App\CPU\translate('Yes') }}',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    location.href = route;
                }
            })
        }
    </script>
    <script>
        $('.filter-show-btn').on('click', function() {
            $('#shop-sidebar').toggleClass('show')
        })
    </script>

    @stack('script')
</body>

</html>
