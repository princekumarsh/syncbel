@extends('layouts.front-end.app')
<style>

</style>
@section('title', \App\CPU\translate('Verify'))

@section('content')
    <div class="container py-4 py-lg-5 my-4 __inline-7">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 box-shadow" >
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="h4 mb-1">{{\App\CPU\translate('one_step_ahead')}}</h2>
                            <p class="font-size-sm text-muted mb-4">{{\App\CPU\translate('verify_information_to_continue')}}.</p>
                        </div>
                        <form class="needs-validation_" id="sign-up-form" action="{{ route('customer.auth.verify') }}"
                              method="post">
                            @csrf
                            <div class="col-sm-12">
                                @php($email_verify_status = \App\CPU\Helpers::get_business_settings('email_verification'))
                                @php($phone_verify_status = \App\CPU\Helpers::get_business_settings('phone_verification'))
                                <div class="form-group">
                                    @if(\App\CPU\Helpers::get_business_settings('email_verification'))
                                        <label for="reg-phone" class="text-primary">
                                            *
                                            {{\App\CPU\translate('please') }}
                                            {{\App\CPU\translate('provide') }}
                                            {{\App\CPU\translate('verification') }}
                                            {{\App\CPU\translate('token') }}
                                            {{\App\CPU\translate('sent_in_your_email') }}
                                        </label>
                                    @elseif(\App\CPU\Helpers::get_business_settings('phone_verification'))
                                        <label for="reg-phone" class="text-primary">
                                            *
                                            {{\App\CPU\translate('please') }}
                                            {{\App\CPU\translate('provide') }}
                                            {{\App\CPU\translate('OTP') }}
                                            {{-- {{\App\CPU\translate('sent_in_your_phone') }} --}}
                                        </label>
                                    @else
                                        <label for="reg-phone" class="text-primary">* {{\App\CPU\translate('verification_code') }} / {{ \App\CPU\translate('OTP')}}</label>
                                    @endif
                                    <input class="form-control" type="text" name="token" required>

                                </div>
                                @error('token')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <button type="submit" style="height: 49px;font-size:16px;font-weight:800;" class="btn btn-primary" >{{\App\CPU\translate('verify')}}</button>
                                </div>
                                 <div class="col-lg-6 col-6">
                                    <!--<a href="{{route('customer.auth.check', [$user->id])}}"  >Resend OTP</a>-->
                                    <button style="height: 49px;font-size:17px;font-weight:800;" class="btn btn-warning" onclick="window.location.href='{{route('customer.auth.check', [$user->id])}}'">Resend OTP</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
@endpush
