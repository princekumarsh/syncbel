@extends('layouts.front-end.app')
<style>
    .bg_image--10 {
    background-image: url(	https://syncbel.com/public/assets/front-end/assets/images/bg/bg-image-10.jpg);
}
</style>
@section('content')

    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
        {{-- form content --}}
        <div class="col-lg-8">
            <div class="axil-signin-form container">
                <h3 class="title">I'm New Here</h3>
                <p class="b2 mb--55" style="margin-bottom: 20px">Enter your detail below</p>
                <form class="singin-form" action="{{ route('customer.auth.sign-up') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="reg-fn">{{ \App\CPU\translate('full_name') }}</label>
                                <input class="form-control" value="{{ old('f_name') }}" type="text" name="f_name"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">

                                @error('f_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="reg-email">{{ \App\CPU\translate('email_address') }}</label>
                                <input class="form-control" type="email" value="{{ old('email') }}" name="email"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reg-phone">{{ \App\CPU\translate('phone_number') }}

                                </label>
                                <input class="form-control" type="number" value="{{ old('phone') }}" name="phone"
                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="si-password">{{ \App\CPU\translate('password') }}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                        placeholder="{{ \App\CPU\translate('minimum_8_characters_long') }}">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{ \App\CPU\translate('Show') }}
                                            {{ \App\CPU\translate('password') }} </span>
                                    </label>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="si-password">{{ \App\CPU\translate('confirm_password') }}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="con_password" type="password"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                                        placeholder="{{ \App\CPU\translate('minimum_8_characters_long') }}"
                                        id="si-password">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"
                                            style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{ \App\CPU\translate('Show') }}
                                            {{ \App\CPU\translate('password') }} </span>
                                    </label>
                                </div>
                                @error('con_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn w-100">Create
                                    Account</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>

@endsection
