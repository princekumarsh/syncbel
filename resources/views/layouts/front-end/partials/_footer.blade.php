 @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())

<!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <img class="{{Session::get('direction') === "rtl" ? 'rightalign' : ''}}" src="{{asset("storage/app/public/company/")}}/{{ $web_config['footer_logo']->value }}"
                                onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                alt="{{ $web_config['name']->value }}"/>
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
                                    <li><a href="{{route('track-order.index')}}">Track Order</a></li>
                                    <li><a href="{{route('refund-policy')}}">Refund Policy</a></li>
                                    <li><a href="{{route('return-policy')}}">Return Policy</a></li>
                                    <li><a href="{{route('cancellation-policy')}}">Cancellation Policy</a></li>
                                    <li><a href=" @if(auth('customer')->check()) {{route('user-account')}} @else {{route('customer.auth.sign-up')}} @endif">Profile Info</a></li>
                                
                                    <!--<li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>-->
                                    <!--<li><a href="{{route('terms')}}">Terms Of Use</a></li>-->
                                    <!--<li><a href="#">FAQ</a></li>-->
                                    <!--<li><a href="">Contact</a></li>-->
                                    <!--<li><a href="">Contact</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Address</h5>
                            <div class="inner">
                                <span>{{ \App\CPU\Helpers::get_business_settings('shop_address')}}</span>
                            </div>
                            <div class="inner">
                                <ul class="support-list-item">
                                    <li><a href="mailto: {{\App\CPU\Helpers::get_business_settings('company_email')}}"><i class="fal fa-envelope-open"></i>{{\App\CPU\Helpers::get_business_settings('company_email')}}</a></li>
                                    <li><a href="tel:{{$web_config['phone']->value}}"><i class="fal fa-phone-alt"></i> {{\App\CPU\Helpers::get_business_settings('company_phone')}}</a></li>
                                </ul>
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
                            @foreach ($social_media as $item)
                                <a href="{{$item->link}}"
                                    title="{{$item->name}}" target="_blank"
                                    rel="noopener noreferrer">
                                    <i style="color:{{$item->color}}" class="{{$item->icon}}" style="font-size: 27px !important;" aria-hidden="true"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© {{ $web_config['copyright_text']->value }} <a target="_blank" href="#"></a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div
                            class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{ asset('public/assets/front-end/assets/images/icons/cart/cart.png') }}"
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
