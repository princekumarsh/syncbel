<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/styles.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/front-end/assets/images/syncbel_feb.png')}}">

    <!-- CSS
    ============================================ -->

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/assets/css/style.min.css')}}">

</head>


<body>
    <div class="axil-signin-area">
        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="{{route('home')}}" class="site-logo"><img class="__inline-11"
                        src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                        alt="{{$web_config['name']->value}}" height="60px" width="250"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Not a customer?</p>
                        <a href="{{route('customer.auth.sign-up')}}" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form" style="margin-top:10px;">
                        <h3 class="title">Sign in</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <form class="singin-form" autocomplete="off" action="{{route('customer.auth.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="si-email">{{\App\CPU\translate('email_address')}}
                                / {{\App\CPU\translate('phone')}}</label>
                            <input class="form-control" type="text" name="user_id" id="si-email"
                                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                    value="{{old('user_id')}}"
                                    placeholder="{{\App\CPU\translate('Enter_email_address_or_phone_number')}}"
                                    required>
                            <div
                                class="invalid-feedback">{{\App\CPU\translate('please_provide_valid_email_or_phone_number')}}
                                .
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="si-password">{{\App\CPU\translate('password')}}</label>
                            <div class="password-toggle">
                                <input class="form-control" name="password" type="password" id="si-password"
                                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                        required>
                                <label class="password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox"><i
                                        class="czi-eye password-toggle-indicator"></i><span
                                        class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between">

                            <div class="form-group">
                                <input type="checkbox"
                                        class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"
                                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="" for="remember">{{\App\CPU\translate('remember_me')}}</label>
                            </div>
                            <a class="font-size-sm" href="{{route('customer.auth.recover-password')}}">
                                {{\App\CPU\translate('forgot_password')}}?
                            </a>
                        </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>

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
    <script src="{{asset('public/assets/front-end/assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('public/assets/front-end/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('public/assets/front-end/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('public/assets/front-end/assets/js/vendor/waypoints.min.js')}}"></script>

    {{-- <!-- Main JS -->
    <script src="{{asset('public/assets/front-end/assets/js/main.js')}}"></script> --}}
<!-- Main JS -->
    <script src="{{ asset('public/assets/front-end/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/assets/front-end') }}/js/sweet_alert.js"></script>
    {{-- Toastr --}}
    <script src={{ asset('public/assets/back-end/js/toastr.js') }}></script>
    {!! Toastr::message() !!}




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
</body>
</html>
