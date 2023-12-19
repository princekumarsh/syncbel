<style>
    .back-btn:hover {
        transition: 0.3s;
        transform: scale(1.05);
    }
    a.axil-btn, button.axil-btn {
        padding: 7px 22px;
    }
</style>
<div class="feature_header mb-2">
    <span>{{ \App\CPU\translate('shopping_cart') }}</span>
</div>

@php($shippingMethod = \App\CPU\Helpers::get_business_settings('shipping_method'))
@php(
    $cart = \App\Model\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id')
)

<div class="row g-3">
    <!-- List of items-->
    <div class="col-lg-8">
        @foreach ($cart as $group_key => $group)
            <div class="table-responsive">
                @foreach ($group as $cart_key => $cartItem)
                    @if ($shippingMethod == 'inhouse_shipping')
                        <?php

                        $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                        $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';

                        ?>
                    @else
                        <?php
                        if ($cartItem->seller_is == 'admin') {
                            $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                            $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                        } else {
                            $seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                            $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                        }
                        ?>
                    @endif

                    @if ($cart_key == 0)
                        <div class="card-headers" style="border-bottom: 1px solid #afe4e7;">
                            @if ($cartItem->seller_is == 'admin')
                                <b>
                                    <span>{{ \App\CPU\translate('shop_name') }} : </span>
                                    <a
                                        href="{{ route('shopView', ['id' => 0]) }}">{{ \App\CPU\Helpers::get_business_settings('company_name') }}</a>
                                </b>
                            @else
                                <b>
                                    <span>{{ \App\CPU\translate('shop_name') }}:</span>
                                    <a href="{{ route('shopView', ['id' => $cartItem->seller_id]) }}">
                                        {{ \App\Model\Shop::where(['seller_id' => $cartItem['seller_id']])->first()->name }}
                                    </a>
                                </b>
                            @endif
                        </div>
                    @endif
                @endforeach
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            @if ($shipping_type != 'order_wise')
                                <th scope="col" class="product-thumbnail">Product</th>
                            @else
                                <th scope="col" class="product-thumbnail">Product</th>
                            @endif
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">{{ \App\CPU\translate('unit_price') }}</th>
                            <th scope="col" class="product-quantity">{{ \App\CPU\translate('qty') }}</th>
                            <th scope="col" class="product-subtotal">{{ \App\CPU\translate('price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $physical_product = false;
                        foreach ($group as $row) {
                            if ($row->product_type == 'physical') {
                                $physical_product = true;
                            }
                        }
                        ?>
                        @foreach ($group as $cart_key => $cartItem)
                            <tr>
                                <td class="product-remove"><a onclick="removeFromCart({{ $cartItem['id'] }})"
                                        class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail">
                                    <a href="{{ route('product', $cartItem['slug']) }}">
                                        <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $cartItem['thumbnail'] }}"
                                            alt="Product">
                                    </a>
                                </td>
                                <td class="product-title"><a
                                        href="{{ route('product', $cartItem['slug']) }}">{{ $cartItem['name'] }}</a>
                                </td>
                                <td class="product-price" data-title="Price"><span class="currency-symbol">
                                        @if ($cartItem['discount'] > 0)
                                            <strike class="__inline-18">
                                                {{ \App\CPU\Helpers::currency_converter($cartItem['price']) }}
                                            </strike>
                                        @endif
                                        <div class=" text-accent">
                                            {{ \App\CPU\Helpers::currency_converter($cartItem['price'] - $cartItem['discount']) }}
                                        </div>

                                </td>
                                <td class="product-quantity" data-title="Qty">

                                    <div class="">
                                        @php($minimum_order = \App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))
                                        <input class="__cart-input" type="number"
                                            name="quantity[{{ $cartItem['id'] }}]"
                                            id="cartQuantity{{ $cartItem['id'] }}"
                                            onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{ $cartItem['id'] }}')"
                                            min="{{ $minimum_order->minimum_order_qty ?? 1 }}"
                                            value="{{ $cartItem['quantity'] }}"
                                            style="border: 1px solid #afc61f;     width: 80px;">
                                    </div>

                                </td>
                                <td class="product-subtotal" data-title="Subtotal"><span
                                        class="currency-symbol">{{ \App\CPU\Helpers::currency_converter(($cartItem['price'] - $cartItem['discount']) * $cartItem['quantity']) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="d-flex btn-full-max-sm align-items-center __gap-6px flex-wrap justify-content-between">
            <!--<a href="{{ route('home') }}" class="btn btn-info btn-lg">-->
            <!--    <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'forward' : 'backward' }} px-1"></i> {{ \App\CPU\translate('continue_shopping') }}-->
            <!--</a>-->
            <a href="{{ route('home') }}" class="axil-btn btn-info back-btn checkout-btn">
                <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'forward' : 'backward' }} px-1"></i>
                {{ \App\CPU\translate('continue_shopping') }}</a>
            <a onclick="checkout()" class="axil-btn btn-bg-primary checkout-btn">{{ \App\CPU\translate('checkout') }}
                <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'backward' : 'forward' }} px-1"></i>
            </a>
            <!--<a onclick="checkout()"-->
            <!--class="btn btn-success btn-lg pull-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}">-->
                <!--    {{ \App\CPU\translate('checkout') }}-->
                <!--    <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'backward' : 'forward' }} px-1"></i>-->
                <!--</a>-->
        </div>
    </div>

    <!-- Sidebar-->
    @include('web-views.partials._order-summary')
</div>


<script>
    cartQuantityInitialize();

    function set_shipping_id(id, cart_group_id) {
        $.get({
            url: '{{ url('/') }}/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                location.reload();
            },
            complete: function() {
                $('#loading').hide();
            },
        });
    }
</script>
<script>
    function checkout() {
        let order_note = $('#order_note').val();
        //console.log(order_note);
        $.post({
            url: "{{ route('order_note') }}",
            data: {
                _token: '{{ csrf_token() }}',
                order_note: order_note,

            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                let url = "{{ route('checkout-details') }}";
                location.href = url;

            },
            complete: function() {
                $('#loading').hide();
            },
        });
    }

    // $('.dec').click(function(){
    //     alert('mjh');
    //     //Other code etc.
    // });
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        //   $(".dec").click(function(){
        //     // alert('jjj')
        //     // // var numItems = $('.dec').length;
        //     // // var incItems = $('.inc').length;
        //     // var incItems =     $('.pro-qty > .dec').length;
        //     // alert(incItems);

        //   });



        //   $(".dec").click(function(){
        //   // Holds the product ID of the clicked element
        //   var productId = $(this).attr('class').replace('__cart-input', '');
        //   var incItems =     $('.__cart-input').length;
        //     alert(productId+''+incItems);

        // });
    });
</script>
