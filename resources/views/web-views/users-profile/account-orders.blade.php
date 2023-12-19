@extends('layouts.front-end.app')
<style>
    .cancel:hover{
        background-color: red !important;
        border-color:red !important;
    }
    .badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem
    }

    .badge:empty {
        display: none
    }

    .btn .badge {
        position: relative;
        top: -1px
    }

    .badge-pill {
        padding-right: .6em;
        padding-left: .6em;
        border-radius: 10rem
    }

    .badge-primary {
        color: #fff;
        background-color: #007bff
    }

    .badge-primary[href]:focus,
    .badge-primary[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #0062cc
    }

    .badge-secondary {
        color: #fff;
        background-color: #6c757d
    }

    .badge-secondary[href]:focus,
    .badge-secondary[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #545b62
    }

    .badge-success {
        color: #fff;
        background-color: #28a745
    }

    .badge-success[href]:focus,
    .badge-success[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #1e7e34
    }

    .badge-info {
        color: #fff;
        background-color: #17a2b8
    }

    .badge-info[href]:focus,
    .badge-info[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #117a8b
    }

    .badge-warning {
        color: #212529;
        background-color: #ffc107
    }

    .badge-warning[href]:focus,
    .badge-warning[href]:hover {
        color: #212529;
        text-decoration: none;
        background-color: #d39e00
    }

    .badge-danger {
        color: #fff;
        background-color: #dc3545
    }

    .badge-danger[href]:focus,
    .badge-danger[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #bd2130
    }

    .badge-light {
        color: #212529;
        background-color: #f8f9fa
    }

    .badge-light[href]:focus,
    .badge-light[href]:hover {
        color: #212529;
        text-decoration: none;
        background-color: #dae0e5
    }

    .badge-dark {
        color: #fff;
        background-color: #343a40
    }

    .badge-dark[href]:focus,
    .badge-dark[href]:hover {
        color: #fff;
        text-decoration: none;
        background-color: #1d2124
    }
</style>
@section('title',\App\CPU\translate('My Order List'))


@section('content')

    <div class="container text-center">
        <h3 class="headerTitle my-3">{{\App\CPU\translate('my_order')}}</h3>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
        <div class="col-xl-9 col-md-8">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="nav-orders" role="tabpanel">
                    <div class="axil-dashboard-order">
                        <div class="table-responsive" style="border: 1px solid #CBD3D9;border-radius: 6px !important;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th></th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Actions</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @foreach($orders as $order)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$order['id']}}</th>

                                            {{-- thumbnail section --}}
                                            @foreach ($order->details as $k=>$detail)
                                            @php($product=json_decode($detail->product_details,true))
                                                @if($product)
                                                    <td class="col-2 for-tab-img">
                                                        <img class="d-block"
                                                                onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                                src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                                alt="VR Collection" width="60">
                                                    </td>
                                                @endif
                                                @break
                                            @endforeach


                                            <td>{{$order['created_at']}}</td>
                                            <td>
                                                @if($order['order_status']=='failed' || $order['order_status']=='canceled')
                                                    <span class="badge badge-danger text-capitalize" style="color:#fff">
                                                        {{\App\CPU\translate($order['order_status'] =='failed' ? 'Failed To Deliver' : $order['order_status'])}}
                                                    </span>
                                                @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')
                                                    <span class="badge badge-success text-capitalize" style="color:#fff">
                                                        {{\App\CPU\translate($order['order_status']=='processing' ? 'packaging' : $order['order_status'])}}
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning text-capitalize" style="color:#fff">
                                                        {{\App\CPU\translate($order['order_status'])}}
                                                    </span>
                                                @endif
                                            </td>




                                            <td>{{\App\CPU\Helpers::currency_converter($order['order_amount'])}} for {{count($order->details)}} items</td>


                                            <td><a href="{{ route('account-order-details', ['id'=>$order->id]) }}" class="axil-btn view-btn">Details</a></td>
                                            <td><a href="{{route('track-order.result',['order_id'=>$order['id'],'from_order_details'=>1])}}" class="axil-btn view-btn">Track</a></td>
                                            <td><a href="javascript:" onclick="route_alert('./order-cancel/{{$order['id']}}','Want to cancel this order ')" class="axil-btn view-btn cancel">Cancel</a></td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function cancel_message() {
            toastr.info('{{\App\CPU\translate('order_can_be_canceled_only_when_pending.')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endpush
