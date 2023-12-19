@extends('layouts.front-end.app')
@section('title',\App\CPU\translate('My Address'))

@push('css_or_js')
    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.css"/>
    <link rel="stylesheet" href="{{ asset('public/assets/front-end/css/bootstrap-select.min.css') }}">
    <style>
        .form-control{
            font-size:18px;
        }
    </style>
@endpush
@section('content')


<div class="container text-center">
    <h3 class="headerTitle my-3">{{\App\CPU\translate('add_address')}}</h3>
</div>

<!-- Page Content-->
<div class="container pb-5 mb-2 mb-md-4 mt-3 rtl"
     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <div class="row">
        <!-- Sidebar-->
    @include('web-views.partials._profile-aside')
    <!-- Content  -->
    <div class="col-xl-9 col-md-8" style="border: 1px solid #CBD3D9;border-radius: 6px !important;">
        <form action="{{route('address-store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <ul class="donate-now">
                        <li>
                            <input type="radio" id="a50" name="addressAs" value="home"/>
                            <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                        </li>
                        <li>
                            <input type="radio" id="a75" name="addressAs" value="office" checked="checked"/>
                            <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="donate-now">
                        <li>
                            <input type="radio" name="is_billing" id="b25" value="0" checked/>
                            <label for="b25" class="billing_component">{{\App\CPU\translate('shipping')}}</label>
                        </li>
                        {{-- <li>
                            <input type="radio" name="is_billing" id="b50" value="1"/>
                            <label for="b50" class="billing_component">{{\App\CPU\translate('billing')}}</label>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">Name </label>
                        <input class="form-control" type="text" id="name" name="name" required>
                        <label>Name</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName"> Phone</label>
                        <input class="form-control" type="number" id="phone" name="phone" required>
                        <label>Phone</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="lastName"> Address</label>
                        <input class="form-control" type="text" name="address" id="address" required>
                        <label>Address</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName"> Zip code</label>@if($zip_restrict_status)
                            <select name="zip" id="" class="form-control selectpicker" data-live-search="true">
                                @foreach($zip_codes as $code)
                                    <option value="{{ $code->zipcode }}">{{ $code->zipcode }}</option>
                                @endforeach
                            </select>
                        @else
                            <input class="form-control" type="text" id="zip" name="zip" required>
                        @endif
                        <label>Zip code</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName"> City</label>
                        <input class="form-control" type="text" id="address-city" name="city" required>
                        <label>City</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="hidden" id="country" name="country" value="India">
                        <label for="state"> State</label>
                        <select name="state" id=""
                            class="form-control"
                            data-live-search="true" required>
                            @forelse(DB::table('states')->where('country_id','101')->get() as $state)
                                <option value="{{ $state->name }}">
                                    {{ $state->name }}</option>
                            @empty
                                <option value="">
                                    {{ \App\CPU\translate('No_country_to_deliver') }}
                                </option>
                            @endforelse
                        </select>
                    </div>
                </div>




                <div class="col-12">
                    <div class="form-group mb--0">
                        <input type="submit" class="axil-btn" value="Save Changes">
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>






@endsection
