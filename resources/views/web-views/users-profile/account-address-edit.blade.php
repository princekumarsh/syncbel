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
    <div class="container pb-5 mb-2 mb-md-4 rtl __account-address" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <h2 class="text-center py-3 m-0 headerTitle">{{\App\CPU\translate('UPDATE_ADDRESSES')}}</h2>
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <section class="col-lg-9 col-md-9" style="border: 1px solid #CBD3D9;border-radius: 6px !important;">


            <div class="col-12">
                <form action="{{route('address-update')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="id" value="{{$shippingAddress->id}}">
                            <ul class="donate-now">
                                <li class="address_type_li">
                                    <input type="radio" class="address_type" id="a50" name="addressAs" value="home" {{ $shippingAddress->address_type == 'home' ? 'checked' : ''}} />
                                    <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                                </li>
                                <li class="address_type_li">
                                    <input type="radio" class="address_type" id="a75" name="addressAs" value="office" {{ $shippingAddress->address_type == 'office' ? 'checked' : ''}}/>
                                    <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <input type="hidden" id="is_billing" value="{{$shippingAddress->is_billing}}">
                            <ul class="donate-now">
                                <li class="address_type_bl">
                                    <input type="radio" class="bill_type" id="b25" name="is_billing" value="0"  {{ $shippingAddress->is_billing == '0' ? 'checked' : ''}} />
                                    <label for="b25" class="component">{{\App\CPU\translate('shipping')}}</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Name </label>
                                <input class="form-control" value="{{$shippingAddress->contact_person_name}}" type="text" id="name" name="name" required>
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName"> Phone</label>
                                <input class="form-control" type="number" value="{{$shippingAddress->phone}}" id="phone" name="phone" required>
                                <label>Phone</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="lastName"> Address</label>
                                <input class="form-control" value="{{$shippingAddress->address}}" type="text" name="address" id="address" required>
                                <label>Address</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName"> Zip code</label>@if($zip_restrict_status)
                                    <select name="zip" id="" class="form-control selectpicker" data-live-search="true">
                                        <input type="text" name="" id="">
                                        @foreach($zip_codes as $code)
                                            <option value="{{ $code->zipcode }}">{{ $code->zipcode }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input class="form-control" type="text" value="{{$shippingAddress->zip}}" id="zip" name="zip" required>
                                @endif
                                <label>Zip code</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName"> City</label>
                                <input class="form-control" type="text" value="{{$shippingAddress->city}}" id="address-city" name="city" required>
                                <label>City</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

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

        </section>
    </div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('map_api_key')}}&libraries=places&v=3.49"></script>
<script src="{{ asset('public/assets/front-end/js/bootstrap-select.min.js') }}"></script>
<script>

    function initAutocomplete() {
        var myLatLng = { lat: {{$shipping_latitude??'-33.8688'}}, lng: {{$shipping_longitude??'151.2195'}} };

        const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
            center: { lat: {{$shipping_latitude??'-33.8688'}}, lng: {{$shipping_longitude??'151.2195'}} },
            zoom: 13,
            mapTypeId: "roadmap",
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });

        marker.setMap( map );
        var geocoder = geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
            var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
            var coordinates = JSON.parse(coordinates);
            var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
            marker.setPosition( latlng );
            map.panTo( latlng );

            document.getElementById('latitude').value = coordinates['lat'];
            document.getElementById('longitude').value = coordinates['lng'];

            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        document.getElementById('address').value = results[1].formatted_address;
                        console.log(results[1].formatted_address);
                    }
                }
            });
        });

        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
            marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var mrkr = new google.maps.Marker({
                    map,
                    title: place.name,
                    position: place.geometry.location,
                });

                google.maps.event.addListener(mrkr, "click", function (event) {
                    document.getElementById('latitude').value = this.position.lat();
                    document.getElementById('longitude').value = this.position.lng();

                });

                markers.push(mrkr);

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    };
    $(document).on('ready', function () {
        initAutocomplete();

    });

    $(document).on("keydown", "input", function(e) {
      if (e.which==13) e.preventDefault();
    });
</script>
@endpush
