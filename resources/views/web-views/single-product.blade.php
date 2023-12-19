@extends('web-views.layout')

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
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            @if ($product->images != null)
                                                @foreach (json_decode($product->images) as $key => $photo)
                                                    <div class="cz-thumblist">
                                                        <a class="cz-thumblist-item  {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center "
                                                            href="#image{{ $key }}">
                                                            <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                src="{{ asset("storage/app/public/product/$photo") }}"
                                                                alt="Product thumb">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <div class="label-block">
                                            <div class="product-badget">20% OFF</div>
                                        </div>
                                         @if ($product->images != null)
                                                @foreach (json_decode($product->images) as $key => $photo)
                                        <div class="product-quick-view position-view">

                                                    {{-- <div class="cz-thumblist">
                                                        <a class="cz-thumblist-item  {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center "
                                                            href="#image{{ $key }}">
                                                            <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                src="{{ asset("storage/app/public/product/$photo") }}"
                                                                alt="Product thumb">
                                                        </a>
                                                    </div> --}}

                                            <a href="{{ asset("storage/app/public/product/$photo") }}"
                                                class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                          @endforeach
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        @if ($product->images != null)
                                            @foreach (json_decode($product->images) as $key => $photo)
                                                <div class="cz-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                    id="image{{ $key }}">
                                                    <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                        src="{{ asset("storage/app/public/product/$photo") }}"
                                                        data-zoom="{{ asset("storage/app/public/product/$photo") }}"
                                                        alt="Product image" width="">
                                                    <div class="cz-image-zoom-pane"></div>
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
                                    <span
                                        class="{{ Session::get('direction') === 'rtl' ? 'mr-2' : 'ml-2' }} __text-12px font-regular">
                                        (<span>{{ \App\CPU\translate('tax') }} : </span>
                                        <span id="set-tax-amount"></span>)
                                    </span>
                                    <div class="product-rating">
                                        @for ($inc = 0; $inc < 5; $inc++)
                                            @if ($inc < $overallRating[0])
                                               <div class="star-rating">  <i class="far fa-star"></i> </div>
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
                                                <div class="product-description-label mt-2 text-body">
                                                    {{ \App\CPU\translate('color') }}:
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-color mb-1 flex-start {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'ml-2' }}"
                                                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0;">
                                                        @foreach (json_decode($product->colors) as $key => $color)
                                                            <div>
                                                                <li>
                                                                    <input type="radio"
                                                                        id="{{ $product->id }}-color-{{ $key }}"
                                                                        name="color" value="{{ $color }}"
                                                                        @if ($key == 0) checked @endif>
                                                                    <label style="background: {{ $color }};"
                                                                        for="{{ $product->id }}-color-{{ $key }}"
                                                                        data-toggle="tooltip">
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
                                        <div class="row flex-start mx-0">
                                            <div
                                                class="product-description-label text-body mt-2 {{ Session::get('direction') === 'rtl' ? 'pl-2' : 'pr-2' }}">
                                                {{ $choice->title }}
                                                :
                                            </div>
                                            <div>
                                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start row"
                                                    style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0;">
                                                    @foreach ($choice->options as $key => $option)
                                                        <div>
                                                            <li class="for-mobile-capacity">
                                                                <input type="radio"
                                                                    id="{{ $choice->name }}-{{ $option }}"
                                                                    name="{{ $choice->name }}"
                                                                    value="{{ $option }}"
                                                                    @if ($key == 0) checked @endif>
                                                                <label class="__text-12px"
                                                                    for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                            </li>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Quantity + Add to cart -->
                                    <div class="mt-2">
                                        <div class="product-quantity d-flex flex-wrap align-items-center __gap-15">
                                            <div class="d-flex align-items-center">
                                                <div class="product-description-label text-body mt-2">
                                                    {{ \App\CPU\translate('Quantity') }}:</div>
                                                <div class="d-flex justify-content-center align-items-center __w-160px"
                                                    style="color: {{ $web_config['primary_color'] }}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                            data-type="minus" data-field="quantity" disabled="disabled"
                                                            style="color: {{ $web_config['primary_color'] }}">
                                                            -
                                                        </button>
                                                    </span>

                                                    <input type="text" name="quantity"
                                                        class="form-control input-number text-center cart-qty-field __inline-29"
                                                        placeholder="1" value="{{ $product->minimum_order_qty ?? 1 }}"
                                                        product-type="{{ $product->product_type }}"
                                                        min="{{ $product->minimum_order_qty ?? 1 }}" max="100">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                            product-type="{{ $product->product_type }}" data-type="plus"
                                                            data-field="quantity"
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
                                                        <strong>{{ \App\CPU\translate('total_price') }}</strong> :
                                                    </div>
                                                    &nbsp; <strong id="chosen_price"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                        <div class="col-12">
                                            @if ($product['product_type'] == 'physical' && $product['current_stock'] <= 0)
                                                <h5 class="mt-3 text-danger">{{ \App\CPU\translate('out_of_stock') }}</h5>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="__btn-grp mt-2 mb-3">
                                        <button
                                            class="btn btn-secondary element-center __iniline-26 btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                            onclick="buy_now()" type="button">
                                            <span class="string-limit">{{ \App\CPU\translate('buy_now') }}</span>
                                        </button>
                                        <button
                                            class="btn btn--primary element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                            onclick="addToCart()" type="button">
                                            <span class="string-limit">{{ \App\CPU\translate('add_to_cart') }}</span>
                                        </button>
                                        <button type="button" onclick="addWishlist('{{ $product['id'] }}')"
                                            class="btn __text-18px text-danger">
                                            <i class="fa fa-heart-o " aria-hidden="true"></i>
                                            <span
                                                class="countWishlist-{{ $product['id'] }}">{{ $countWishlist }}</span>
                                        </button>
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
                                            <h5 class="title">Specifications:</h5>
                                             <p class="description">{!! $product->details !!}</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                    <div class="col-lg-6 mb--30">
                                        <div class="single-desc">
                                            <h5 class="title">Care & Maintenance:</h5>
                                            <p>Use warm water to describe us as a product team that creates amazing UI/UX
                                                experiences, by crafting top-notch user experience.</p>
                                        </div>
                                    </div>
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
                                            <h5 class="title">{{$reviews_of_product->total()}} Review for this product</h5>

                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                @foreach ($product->reviews as $review)
                                                     <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img
                                                                onerror="this.src='{{ asset('public/assets/front-end/assets/images/blog/author-image-4.png') }}'"
                                                                src="{{ asset('storage/app/public/profile/'.$review->user->image)}}"
                                                                    alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Cameron Williamson">{{$review->user->f_name .' '.$review->user->l_name}}</span>
                                                                        </span>
                                                                    </a>
                                                                    <span class="commenter-rating ratiing-four-star">
                                                                         @if (round($overallRating[0]) >= 5)
                                                                        @for ($i = 0; $i < 5; $i++)
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                              @endfor
                                                                    @endif
                                                                    @if (round($overallRating[0]) == 4)
                                                                        @for ($i = 0; $i < 4; $i++)
                                                                           <a href="#"><i class="fas fa-star"></i></a>
                                                                        @endfor
                                                                        <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a>
                                                                    @endif
                                                                    @if (round($overallRating[0]) == 3)
                                                                        @for ($i = 0; $i < 3; $i++)
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        @endfor
                                                                        @for ($j = 0; $j < 2; $j++)
                                                                            <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a>
                                                                        @endfor
                                                                    @endif
                                                                    @if (round($overallRating[0]) == 2)
                                                                        @for ($i = 0; $i < 2; $i++)
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        @endfor
                                                                        @for ($j = 0; $j < 3; $j++)
                                                                            <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a>
                                                                        @endfor
                                                                    @endif
                                                                    @if (round($overallRating[0]) == 1)
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                        <a href="#"><i class="fas fa-star"></i></a>

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
                                                                    <p>{{$review->comment}}
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
                                <a href="{{route('product',$relatedProduct->slug)}}">
                                    <img src="{{ asset("storage/app/public/product/thumbnail/$relatedProduct->thumbnail") }}"
                                        alt="Product Images">
                                </a>
                                @if($product->discount > 0)
                                <div class="label-block label-right">
                                    <div class="product-badget">@if ($product->discount_type == 'percent')
                                                {{round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))}}%
                                            @elseif($product->discount_type =='flat')
                                                {{\App\CPU\Helpers::currency_converter($product->discount)}}
                                            @endif
                                            {{\App\CPU\translate('off')}}</div>
                                </div>

                            @else
                                <div class="d-flex justify-content-end for-dicount-div-null">
                                    <span class="for-discoutn-value-null"></span>
                                </div>
                            @endif

                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product',$relatedProduct->slug)}}">{{$relatedProduct->name}}</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">₹{{$relatedProduct->unit_price}}</span>
                                        <span class="price current-price">₹{{$relatedProduct->purchase_price}}</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
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

@stop
