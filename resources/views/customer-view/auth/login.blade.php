@extends('layouts.front-end.app')
<style>
    .bg_image--9 {
    background-image: url(https://syncbel.com/public/assets/front-end/assets/images/bg/bg-image-9.jpg);
}
</style>
@section('content')


    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="axil-signin-banner bg_image bg_image--9">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
        {{-- form section --}}
        <div class="col-lg-8">
            <div class="axil-signin-form container" style="margin-top:10px;">
                <h3 class="title">Sign in</h3>
                <p class="b2 mb--55">Enter your detail below</p>
                <!--<form class="singin-form" autocomplete="off" action="{{route('customer.auth.login')}}" method="post">-->
                <!--    @csrf -->
                <!--<div class="form-group">-->
                <!--    <label for="si-email">Email address-->
                <!--        / Phone</label>-->
                <!--    <input class="form-control" type="text" name="user_id" id="si-email"-->
                <!--                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"-->
                <!--                    value="{{old('user_id')}}"-->
                <!--                    placeholder="{{\App\CPU\translate('Enter_email_address_or_phone_number')}}"-->
                <!--                    required>-->
                <!--            <div-->
                <!--                class="invalid-feedback">{{\App\CPU\translate('please_provide_valid_email_or_phone_number')}}-->
                <!--                .-->
                <!--            </div>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--    <label for="si-password">Password</label>-->
                <!--    <div class="password-toggle">-->
                <!--         <input class="form-control" name="password" type="password" id="si-password"-->
                <!--                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"-->
                <!--                        required>-->
                <!--                <label class="password-toggle-btn">-->
                <!--                    <input class="custom-control-input" type="checkbox"><i-->
                <!--                        class="czi-eye password-toggle-indicator"></i><span-->
                <!--                        class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>-->
                <!--                </label>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="form-group d-flex flex-wrap justify-content-between">-->

                <!--    <div class="form-group">-->
                <!--        <input type="checkbox" class="mr-1" name="remember" id="remember">-->

                <!--        <label class="" for="remember">Remember me</label>-->
                <!--    </div>-->
                <!--    <a class="font-size-sm" href="{{route('customer.auth.recover-password')}}">-->
                <!--        Forgot password?-->
                <!--    </a>-->
                <!--</div>-->
                <!--    <div class="form-group d-flex align-items-center justify-content-between">-->
                <!--        <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>-->

                <!--    </div>-->
                <!--</form>-->
                <form class="singin-form" autocomplete="off" action="{{ route('customer.auth.login') }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label for="si-email">{{ \App\CPU\translate('email_address') }}
                                    / {{ \App\CPU\translate('phone') }}</label>
                                <input class="form-control" type="text" name="user_id" id="si-email"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                    value="{{ old('user_id') }}"
                                    placeholder="{{ \App\CPU\translate('Enter_email_address_or_phone_number') }}"
                                    required>
                                <div class="invalid-feedback">
                                    {{ \App\CPU\translate('please_provide_valid_email_or_phone_number') }}
                                    .
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="si-password">{{ \App\CPU\translate('password') }}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                        required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{ \App\CPU\translate('Show') }}
                                            {{ \App\CPU\translate('password') }} </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">

                                <div class="form-group">
                                    <input type="checkbox"
                                        class="{{ Session::get('direction') === 'rtl' ? 'ml-1' : 'mr-1' }}"
                                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class=""
                                        for="remember">{{ \App\CPU\translate('remember_me') }}</label>
                                </div>
                                <a class="font-size-sm" href="{{ route('customer.auth.recover-password') }}">
                                    {{ \App\CPU\translate('forgot_password') }}?
                                </a>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>

                            </div>
                        </form>
            </div>
        </div>
    </div>

@endsection
