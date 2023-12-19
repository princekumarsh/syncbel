<style>
    .cart_title {
        font-weight: 400 !important;
        font-size: 16px;
    }

    .cart_value {
        font-weight: 600 !important;
        font-size: 16px;
    }

    .cart_total_value {
        font-weight: 700 !important;
        font-size: 25px !important;
        color: {{$web_config['primary_color']}}     !important;
    }
</style>
    <div class="col-lg-4 pt-4 pt-lg-2">
        @php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))
            @php($sub_total=0)
            @php($total_tax=0)
            @php($total_shipping_cost=0)
            @php($order_wise_shipping_discount=\App\CPU\CartManager::order_wise_shipping_discount())
            @php($total_discount_on_product=0)
            @php($cart=\App\CPU\CartManager::get_cart())
            @php($cart_group_ids=\App\CPU\CartManager::get_cart_group_ids())
            @php($shipping_cost=\App\CPU\CartManager::get_shipping_cost())
            @if($cart->count() > 0)
                @foreach($cart as $key => $cartItem)
                    @php($sub_total+=$cartItem['price']*$cartItem['quantity'])
                    @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                    @php($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity'])
                @endforeach

                @php($total_shipping_cost=$shipping_cost)
            @else
                <span>{{\App\CPU\translate('empty_cart')}}</span>
            @endif
        <div class="axil-order-summery">
            <h5 class="title mb--20">Order Summary</h5>
            <div class="summery-table-wrap">
                <table class="table summery-table mb--30">
                    <tbody>
                        <tr class="order-subtotal">
                            <td>{{\App\CPU\translate('sub_total')}}</td>
                            <td> {{\App\CPU\Helpers::currency_converter($sub_total)}}</td>
                        </tr>
                        <!--<tr class="order-shipping">-->
                        <!--    <td>Shipping</td>-->
                        <!--    <td>-->
                        <!--        <div class="input-group">-->
                        <!--            <input type="radio" id="radio1" name="shipping" checked>-->
                        <!--            <label for="radio1">Free Shippping</label>-->
                        <!--        </div>-->
                        <!--        <div class="input-group">-->
                        <!--            <input type="radio" id="radio2" name="shipping">-->
                        <!--            <label for="radio2">Local: ₹35.00</label>-->
                        <!--        </div>-->
                        <!--        <div class="input-group">-->
                        <!--            <input type="radio" id="radio3" name="shipping">-->
                        <!--            <label for="radio3">Flat rate: ₹12.00</label>-->
                        <!--        </div>-->
                        <!--    </td>-->
                        <!--</tr>-->
                        <tr class="order-tax">
                            <td>{{\App\CPU\translate('tax')}}</td>
                            <td> {{\App\CPU\Helpers::currency_converter($total_tax)}}</td>
                        </tr>
                        <tr class="order-tax">
                            <td>{{\App\CPU\translate('shipping')}}</td>
                            <td>{{\App\CPU\Helpers::currency_converter($total_shipping_cost)}}</td>
                        </tr><tr class="order-tax">
                            <td>{{\App\CPU\translate('discount_on_product')}}</td>
                            <td> - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}</td>
                        </tr>
                        @if(session()->has('coupon_discount'))
                        @php($coupon_discount = session()->has('coupon_discount')?session('coupon_discount'):0)
                        </tr><tr class="order-tax">
                            <td>{{\App\CPU\translate('coupon_discount')}}</td>
                            <td>- {{\App\CPU\Helpers::currency_converter($coupon_discount+$order_wise_shipping_discount)}}</td>
                        </tr>
                        @php($coupon_dis=session('coupon_discount'))
                        @else
                        </tr>
                        <tr class="order-tax">
                            <form class="needs-validation" action="javascript:" method="post" novalidate id="coupon-code-ajax">
                            <td>
                                <div class="form-group" style="margin-bottom:0">
                                    <input class="form-control input_code" type="text" name="code" placeholder="{{\App\CPU\translate('Coupon code')}}"
                                        required>
                                    <div class="invalid-feedback">{{\App\CPU\translate('please_provide_coupon_code')}}</div>
                                </div>
                            </td>
                            <td>
                                 <button class="btn btn-success btn-lg btn-block" type="button" onclick="couponCode()">{{\App\CPU\translate('apply_code')}}
                                </button>
                            </td>
                            </form>
                        </tr>
                        
                        @php($coupon_dis=0)
                    @endif
            
            
                        <tr class="order-total">
                            <td style="border:none">{{\App\CPU\translate('total')}}</td>
                            <td style="border:none" class="order-total-amount">{{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product-$order_wise_shipping_discount)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--<a href="" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>-->
        </div>
    </div>
    
    
    

<!--<aside class="col-lg-4 pt-4 pt-lg-2">-->
<!--    <div class="__cart-total">-->
<!--        <div class="cart_total">-->
<!--            @php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))-->
<!--            @php($sub_total=0)-->
<!--            @php($total_tax=0)-->
<!--            @php($total_shipping_cost=0)-->
<!--            @php($order_wise_shipping_discount=\App\CPU\CartManager::order_wise_shipping_discount())-->
<!--            @php($total_discount_on_product=0)-->
<!--            @php($cart=\App\CPU\CartManager::get_cart())-->
<!--            @php($cart_group_ids=\App\CPU\CartManager::get_cart_group_ids())-->
<!--            @php($shipping_cost=\App\CPU\CartManager::get_shipping_cost())-->
<!--            @if($cart->count() > 0)-->
<!--                @foreach($cart as $key => $cartItem)-->
<!--                    @php($sub_total+=$cartItem['price']*$cartItem['quantity'])-->
<!--                    @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])-->
<!--                    @php($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity'])-->
<!--                @endforeach-->

<!--                @php($total_shipping_cost=$shipping_cost)-->
<!--            @else-->
<!--                <span>{{\App\CPU\translate('empty_cart')}}</span>-->
<!--            @endif-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <span class="cart_title">{{\App\CPU\translate('sub_total')}}</span>-->
<!--                <span class="cart_value">-->
<!--                    {{\App\CPU\Helpers::currency_converter($sub_total)}}-->
<!--                </span>-->
<!--            </div>-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <span class="cart_title">{{\App\CPU\translate('tax')}}</span>-->
<!--                <span class="cart_value">-->
<!--                    {{\App\CPU\Helpers::currency_converter($total_tax)}}-->
<!--                </span>-->
<!--            </div>-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <span class="cart_title">{{\App\CPU\translate('shipping')}}</span>-->
<!--                <span class="cart_value">-->
<!--                    {{\App\CPU\Helpers::currency_converter($total_shipping_cost)}}-->
<!--                </span>-->
<!--            </div>-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <span class="cart_title">{{\App\CPU\translate('discount_on_product')}}</span>-->
<!--                <span class="cart_value">-->
<!--                    - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}-->
<!--                </span>-->
<!--            </div>-->
<!--            @if(session()->has('coupon_discount'))-->
<!--                @php($coupon_discount = session()->has('coupon_discount')?session('coupon_discount'):0)-->
<!--                <div class="d-flex justify-content-between">-->
<!--                    <span class="cart_title">{{\App\CPU\translate('coupon_discount')}}</span>-->
<!--                    <span class="cart_value" id="coupon-discount-amount">-->
<!--                        - {{\App\CPU\Helpers::currency_converter($coupon_discount+$order_wise_shipping_discount)}}-->
<!--                    </span>-->
<!--                </div>-->
<!--                @php($coupon_dis=session('coupon_discount'))-->
<!--            @else-->
<!--                <div class="pt-2">-->
<!--                    <form class="needs-validation" action="javascript:" method="post" novalidate id="coupon-code-ajax">-->
<!--                        <div class="form-group">-->
<!--                            <input class="form-control input_code" type="text" name="code" placeholder="{{\App\CPU\translate('Coupon code')}}"-->
<!--                                required>-->
<!--                            <div class="invalid-feedback">{{\App\CPU\translate('please_provide_coupon_code')}}</div>-->
<!--                        </div>-->
<!--                        <button class="btn btn-success btn-lg btn-block" type="button" onclick="couponCode()">{{\App\CPU\translate('apply_code')}}-->
<!--                        </button>-->
<!--                    </form>-->
<!--                </div>-->
<!--                @php($coupon_dis=0)-->
<!--            @endif-->
<!--            <hr class="mt-2 mb-2">-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <span class="cart_title">{{\App\CPU\translate('total')}}</span>-->
<!--                <span class="cart_value">-->
<!--                {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product-$order_wise_shipping_discount)}}-->
<!--                </span>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="container mt-2">-->
<!--            <div class="row p-0">-->
<!--                <div class="col-md-3 p-0 text-center mobile-padding">-->
<!--                    <img class="order-summery-footer-image" src="{{asset("public/assets/front-end/png/delivery.png")}}" alt="">-->
<!--                    <div class="deal-title">3 {{\App\CPU\translate('days_free_delivery')}} </div>-->
<!--                </div>-->

<!--                <div class="col-md-3 p-0 text-center">-->
<!--                    <img class="order-summery-footer-image" src="{{asset("public/assets/front-end/png/money.png")}}" alt="">-->
<!--                    <div class="deal-title">{{\App\CPU\translate('money_back_guarantee')}}</div>-->
<!--                </div>-->
<!--                <div class="col-md-3 p-0 text-center">-->
<!--                    <img class="order-summery-footer-image" src="{{asset("public/assets/front-end/png/Genuine.png")}}" alt="">-->
<!--                    <div class="deal-title">100% {{\App\CPU\translate('genuine')}} {{\App\CPU\translate('product')}}</div>-->
<!--                </div>-->
<!--                <div class="col-md-3 p-0 text-center">-->
<!--                    <img class="order-summery-footer-image" src="{{asset("public/assets/front-end/png/Payment.png")}}" alt="">-->
<!--                    <div class="deal-title">{{\App\CPU\translate('authentic_payment')}}</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</aside>-->
