<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up</title>
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
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="site-logo"><img class="__inline-11"
                        src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                        alt="{{$web_config['name']->value}}" height="60px" width="250"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="{{ route('customer.auth.login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign
                            In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">I'm New Here</h3>
                        <p class="b2 mb--55" style="margin-bottom: 20px">Enter your detail below</p>
                        <form class="singin-form" action="{{ route('customer.auth.sign-up') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="reg-fn">{{ \App\CPU\translate('full_name') }}</label>
                                <input class="form-control" value="{{ old('f_name') }}" type="text" name="f_name"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                    >

                                     @error('f_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                            </div>
                            {{-- <div class="form-group">
                                <label for="reg-ln">{{ \App\CPU\translate('last_name') }}</label>
                                <input class="form-control" type="text" value="{{ old('l_name') }}" name="l_name"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                <div class="invalid-feedback">{{ \App\CPU\translate('Please enter your last name') }}!
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label for="reg-email">{{ \App\CPU\translate('email_address') }}</label>
                                <input class="form-control" type="email" value="{{ old('email') }}" name="email"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                    >
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="reg-phone">{{ \App\CPU\translate('phone_number') }}
                                    {{-- <small class="text-primary">( * {{ \App\CPU\translate('country_code_is_must') }}
                                        {{ \App\CPU\translate('like_for_BD_880') }} )</small> --}}
                                    </label>
                                <input class="form-control" type="number" value="{{ old('phone') }}" name="phone"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                    >
                                @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">

                                <label for="si-password">{{ \App\CPU\translate('password') }}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                        placeholder="{{ \App\CPU\translate('minimum_8_characters_long') }}" >
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{ \App\CPU\translate('Show') }}
                                            {{ \App\CPU\translate('password') }} </span>
                                    </label>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="si-password">{{ \App\CPU\translate('confirm_password') }}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="con_password" type="password"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                        placeholder="{{ \App\CPU\translate('minimum_8_characters_long') }}"
                                        id="si-password" >
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"
                                            style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{ \App\CPU\translate('Show') }}
                                            {{ \App\CPU\translate('password') }} </span>
                                    </label>
                                </div>
                                @error('con_password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn w-100">Create
                                    Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>
