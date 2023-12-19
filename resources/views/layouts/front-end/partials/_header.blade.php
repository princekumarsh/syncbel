 @php
   ($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
 @endphp
 <style>
     @media screen and (max-width: 1020px){
         .mobile-hidden{
             display:none;
         }
     }
     @media screen and (max-width: 575px){
         .icon-mobile-hidden{
             display:none !important;
         }
     }
     @media screen and (min-width: 576px){
         .desktop-hidden{
             display:none !important;
         }
         .search-mobile{
             display: none !important;
         }
     }
     .searchbar-design{
         background-color: #fff !important;
         border: 1px solid #cfcfcf !important;
     }

     .search_re{
        display: block;
        position: absolute;
        z-index: 9999;
        margin-top: 1%;
        right: 10px;
        width: 98%;
    }
    .fs-16{
        font-size:16px;
    }
 </style>
<header class="header axil-header header-style-2">


    <!-- Start Header Top Area  -->
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="header-brand">
                        <a href="{{route('home')}}" class="logo logo-dark">
                            <img class="__inline-11"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>

                        </a>
                        <a href="{{route('home')}}" class="logo logo-light">
                            <img class="__inline-11"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>

                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-9 col-7">
                    <div class="header-action desktop-hidden">
                    <ul class="action-list">
                        <li class="axil-search d-sm-none d-block" style="margin: 0px 11px;">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">

                            </a>
                        </li>
                        <li class="shopping-cart" style="margin: 0px 11px;">
                            <a href="{{ route('wishlists') }}" class="wishlist-dropdown-btn">
                                <span class="cart-count">
                                    {{ session()->has('wish_list') ? count(session('wish_list')) : 0 }}
                                </span>

                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        @php
                            $cart = \App\CPU\CartManager::get_cart();

                        @endphp
                        <li class="shopping-cart" style="margin: 0px 11px;">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">

                                    {{ $cart->count() }}
                                </span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account" style="margin: 0px 11px;">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                {{-- <span class="title">QUICKLINKS</span> --}}
                                @if (auth('customer')->user())
                                    <a class="dropdown-item" href="{{ route('account-oder') }}">
                                        {{ \App\CPU\translate('my_order') }} </a>
                                    <a class="dropdown-item" href="{{ route('user-account') }}">
                                        {{ \App\CPU\translate('my_profile') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="{{ route('customer.auth.logout') }}">{{ \App\CPU\translate('logout') }}</a>
                                @else
                                    <div class="login-btn">
                                        <a class="dropdown-item fs-16" href="{{ route('customer.auth.login') }}">
                                            <i
                                                class="fa fa-sign-in {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>
                                            {{ \App\CPU\translate('sign_in') }}
                                        </a>
                                    </div>
                                    <div class="reg-footer text-center">No account yet? < <a class="dropdown-item"
                                            href="{{ route('customer.auth.sign-up') }}">
                                            <i
                                                class="fa fa-user-circle {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>{{ \App\CPU\translate('sign_up') }}
                                            </a></div>
                                @endif

                            </div>
                        </li>

                    </ul>
                </div>

                    <div class="header-top-dropdown dropdown-box-style">

                        <div class="axil-search">
                            <form action="{{route('products')}}" type="submit" class="search_form">
                                <button type="submit" class="icon wooc-btn-search search_button">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input search-bar-input searchbar-design"  name="name" id="search2"
                                    value="" maxlength="128"  placeholder="{{\App\CPU\translate('Search here ...')}}"
                                    autocomplete="off">

                                    <input name="data_from" value="search" hidden>
                                     <input name="page" value="1" hidden>
                                     <div class="search-result-box">

                                     </div>

                            </form>
                        </div>
                    </div>
                    {{-- <div class="input-group-overlay d-none d-md-block mx-4"
                     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                    <form action="{{route('products')}}" type="submit" class="search_form">
                        <input class="form-control appended-form-control search-bar-input" type="text"
                               autocomplete="off"
                               placeholder="{{\App\CPU\translate('Search here ...')}}"
                               name="name">
                        <button class="input-group-append-overlay search_button" type="submit"
                                style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};top:0">
                                <span class="input-group-text __text-20px">
                                    <i class="czi-search text-white"></i>
                                </span>
                        </button>
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <diV class="card search-card __inline-13">
                            <div class="card-body search-result-box __h-400px overflow-x-hidden overflow-y-auto"></div>
                        </diV>
                    </form>
                </div> --}}
                </div>
                <div class="col-lg-4 mobile-hidden">
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
                <div class="col-12">
                    <div class="search-mobile">
                            <form action="{{route('products')}}" type="submit" class="search_form">
                                <button type="submit" class="icon wooc-btn-search search_button">

                                </button>
                                <input type="search" class="product-search-input search-bar-input"  name="name" id="search2"
                                    value="" maxlength="128"  placeholder="{{\App\CPU\translate('Search here ...')}}"
                                    autocomplete="off" style="width: 100%">

                                    <input name="data_from" value="search" hidden>
                                     <input name="page" value="1" hidden>
                                     <div class="search-result-box">

                                     </div>

                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area  -->

    <!-- Start Mainmenu Area  -->
    <div class="axil-mainmenu aside-category-menu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-nav-department">
                    <aside class="header-department">
                        <button class="header-department-text department-title" id="c_catgories">
                            <span class="icon"><i class="fal fa-bars"></i></span>
                            <span class="text">Categories</span>
                        </button>
                        @php
                            $categories = \App\Model\Category::with(['childes.childes'])
                                ->where('position', 0)
                                ->priority()
                                ->paginate(11);
                        @endphp
                        <nav class="department-nav-menu">
                            <button class="sidebar-close"><i class="fas fa-times"></i></button>
                            <ul class="nav-menu-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="javascript:"

                                            class="nav-link has-megamenu">
                                            <span class="menu-icon"><img
                                                    src="{{ asset("storage/app/public/category/$category->icon") }}"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    alt="Department"></span>
                                            <span class="menu-text" onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">{{ $category['name'] }}</span>
                                        </a>
                                         @if($category->childes->count()>0)
                                            <div class="department-megamenu">
                                                <div class="department-submenu-wrap" style="background-color: white">
                                                    <div class="department-submenu" style="width: 200px">
                                                        <ul>
                                                             @foreach($category['childes'] as $subCategory)
                                                                <li><a href="javascript:" onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                                                    <span class="menu-icon"><img
                                                                        src="{{ asset("storage/app/public/category/$subCategory->icon") }}"
                                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                        alt="Department" style="height:27px;">
                                                                    </span>
                                                                    {{$subCategory['name']}}</a></li>
                                                             @endforeach
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                         @endif

                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index" class="logo">
                                <img class="__inline-11"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('products',['data_from'=>'shop-page','page'=>'1']) }}">Shop</a>
                            </li>
                            <li><a href="{{ route('about-us') }}">About</a></li>

                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="header-action icon-mobile-hidden">
                    <ul class="action-list">
                        <li class="axil-search d-sm-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="shopping-cart">
                            <a href="{{ route('wishlists') }}" class="wishlist-dropdown-btn">
                                <span class="cart-count">
                                    {{ session()->has('wish_list') ? count(session('wish_list')) : 0 }}
                                </span>

                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        @php
                            $cart = \App\CPU\CartManager::get_cart();

                        @endphp
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">

                                    {{ $cart->count() }}
                                </span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                {{-- <span class="title">QUICKLINKS</span> --}}
                                @if (auth('customer')->user())
                                    <a class="dropdown-item" href="{{ route('account-oder') }}">
                                        {{ \App\CPU\translate('my_order') }} </a>
                                    <a class="dropdown-item" href="{{ route('user-account') }}">
                                        {{ \App\CPU\translate('my_profile') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="{{ route('customer.auth.logout') }}">{{ \App\CPU\translate('logout') }}</a>
                                @else
                                    <div class="login-btn">
                                        <a class="dropdown-item" href="{{ route('customer.auth.login') }}">
                                            <i
                                                class="fa fa-sign-in {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>
                                            {{ \App\CPU\translate('sign_in') }}
                                        </a>
                                    </div>
                                    <div class="reg-footer text-center">No account yet?  <a class="dropdown-item fs-16"
                                            href="{{ route('customer.auth.sign-up') }}">
                                            <i
                                                class="fa fa-user-circle {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>&nbsp;{{ \App\CPU\translate('sign_up') }}
                                            </a></div>
                                @endif

                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>

            @php
                $sub_total = 0;
                $total_tax = 0;

            @endphp

            @if ($cart->count() > 0)
                <div class="cart-body">
                    @foreach ($cart as $cartItem)
                        <ul class="cart-item-list">
                            <li class="cart-item">
                                <div class="item-img">
                                    <a href=""><img
                                            onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $cartItem['thumbnail'] }}"
                                            alt="Commodo Blown Lamp"></a>
                                    <button class="close-btn" onclick="removeFromCart({{ $cartItem['id'] }})"><i
                                            class="fas fa-times"></i></button>
                                </div>
                                <div class="item-content">
                                    {{-- <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(64)</span>
                                </div> --}}
                                    <h3 class="item-title"><a
                                            href="{{ route('product', $cartItem['slug']) }}">{{ Str::limit($cartItem['name'], 30) }}</a>
                                    </h3>
                                    @foreach (json_decode($cartItem['variations'], true) as $key => $variation)
                                        <span class="__text-14px">{{ $key }} :
                                            {{ $variation }}</span><br>
                                    @endforeach
                                    <div class="item-price">
                                        {{ \App\CPU\Helpers::currency_converter(($cartItem['price'] - $cartItem['discount']) * $cartItem['quantity']) }}
                                    </div>
                                    {{-- <div class="pro-qty item-quantity">
                                        <input type="number" class="quantity-input"
                                            value="{{ $cartItem['quantity'] }}">
                                    </div> --}}
                                </div>
                            </li>

                        </ul>
                        @php
                            $sub_total += ($cartItem['price'] - $cartItem['discount']) * $cartItem['quantity'];
                            $total_tax += $cartItem['tax'] * $cartItem['quantity'];
                        @endphp
                    @endforeach

                </div>
                <div class="cart-footer">
                    <h3 class="cart-subtotal">
                        <span class="subtotal-title">Subtotal:</span>
                        <span class="subtotal-amount"> {{ \App\CPU\Helpers::currency_converter($sub_total) }}</span>
                    </h3>
                    <h3 class="cart-subtotal">
                        <span class="subtotal-title">Total Quantity:</span>
                        <span class="subtotal-amount"> {{ $cart->count() }}</span>
                    </h3>
                    <div class="group-btn">
                        <a href="{{ route('shop-cart') }}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                        <a href="{{ route('checkout-details') }}"
                            class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                    </div>
                </div>
            @else
                <div class="cart-body">
                    <h6 class="text-danger text-center m-0">{{ \App\CPU\translate('Empty') }}
                        {{ \App\CPU\translate('Cart') }}</h6>
                </div>
            @endif


        </div>
    </div>
    <!-- End Mainmenu Area  -->





    <!-- Header Search Modal End -->

    <!-- Header Search Modal End -->
</header>
