@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Details'))

@push('css_or_js')
    <style>
        .page-item.active .page-link {
            background-color: {{$web_config['primary_color']}}              !important;
        }

        .amount {
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 60px;

        }

        .w-49{
            width: 49% !important
        }

        a {
            color: {{$web_config['primary_color']}};
        }

        @media (max-width: 360px) {
            .for-glaxy-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px;
            }

        }

        @media (max-width: 600px) {

            .for-glaxy-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px;
            }

            .order_table_info_div_2 {
                text-align: {{Session::get('direction') === "rtl" ? 'left' : 'right'}}          !important;
            }

            .spandHeadO {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 16px;
            }

            .spanTr {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 16px;
            }

            .amount {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0px;
            }

        }
    </style>
@endpush

@section('content')

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
            @include('web-views.partials._profile-aside')

            {{-- Content --}}

            <div class="col-xl-9 col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a class="btn btn-lg btn-primary" href="{{ route('account-oder') }}" style="width: 170px;font-size:18px;">
                            <i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;{{\App\CPU\translate('back')}}
                        </a>
                    </div>
                </div>
                <div class="tab-content">

                    <di class="tab-pane fade active show" id="nav-orders" role="tabpanel">
                        <div class="axil-dashboard-order">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order No.</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Shipping address</th>
                                            <th scope="col">Billing address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$order->id}}</th>
                                            <td>{{date('d M, Y',strtotime($order->created_at))}}</td>


                                            @if($order->shippingAddress)
                                                @php($shipping=$order->shippingAddress)
                                            @else
                                                @php($shipping=json_decode($order['shipping_address_data']))
                                            @endif

                                            <td>@if($shipping)
                                                    {{$shipping->address}},<br>
                                                    {{$shipping->city}}
                                                    , {{$shipping->zip}}

                                                @endif
                                            </td>

                                            @if($order->billingAddress)
                                                @php($billing=$order->billingAddress)
                                            @else
                                                @php($billing=json_decode($order['billing_address_data']))
                                            @endif
                                            <td>
                                                @if($billing)
                                                    {{$billing->address}}, <br>
                                                    {{$billing->city}}
                                                    , {{$billing->zip}}

                                                @else
                                                    {{$shipping->address}},<br>
                                                    {{$shipping->city}}
                                                    , {{$shipping->zip}}
                                                @endif
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                                <table>
                                    @foreach ($order->details as $key=>$detail)
                                        @php($product=json_decode($detail->product_details,true))
                                        @if($product)
                                            <tr>
                                                <td class="col-2 for-tab-img">
                                                    <img class="d-block"
                                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                         src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                         alt="VR Collection" width="60">
                                                </td>
                                                <td class="col-10 for-glaxy-name __vertical-middle">
                                                    <a href="{{route('product',[$product['slug']])}}">
                                                        {{isset($product['name']) ? Str::limit($product['name'],40) : ''}}
                                                    </a>
                                                    @if($detail->refund_request == 1)
                                                        <small> ({{\App\CPU\translate('refund_pending')}}) </small> <br>
                                                    @elseif($detail->refund_request == 2)
                                                        <small> ({{\App\CPU\translate('refund_approved')}}) </small> <br>
                                                    @elseif($detail->refund_request == 3)
                                                        <small> ({{\App\CPU\translate('refund_rejected')}}) </small> <br>
                                                    @elseif($detail->refund_request == 4)
                                                        <small> ({{\App\CPU\translate('refund_refunded')}}) </small> <br>
                                                    @endif<br>
                                                    @if($detail->variant)
                                                        <span>{{\App\CPU\translate('variant')}} : </span>
                                                        {{$detail->variant}}
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td width="100%">
                                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                                        <span
                                                            class="font-weight-bold amount">{{\App\CPU\Helpers::currency_converter($detail->price)}} </span>
                                                        <br>
                                                    <span class="word-nobreak">{{\App\CPU\translate('qty')}}: {{$detail->qty}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @php($summary=\App\CPU\OrderManager::order_summary($order))
                                </table>
                            </div>

                            <div class="row d-flex justify-content-end">
                                <div class="col-md-8 col-lg-5">
                        <table class="table table-borderless">
                            <tbody class="totals">
                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Item')}}</span></div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{$order->details->count()}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Subtotal')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{\App\CPU\Helpers::currency_converter($summary['subtotal'])}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('tax_fee')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{\App\CPU\Helpers::currency_converter($summary['total_tax'])}}</span>
                                    </div>
                                </td>
                            </tr>
                            @if($order->order_type == 'default_type')
                                <tr>
                                    <td>
                                        <div
                                            class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                                class="product-qty ">{{\App\CPU\translate('Shipping')}} {{\App\CPU\translate('Fee')}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                            <span>{{\App\CPU\Helpers::currency_converter($summary['total_shipping_cost'])}}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Discount')}} {{\App\CPU\translate('on_product')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>- {{\App\CPU\Helpers::currency_converter($summary['total_discount_on_product'])}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Coupon')}} {{\App\CPU\translate('Discount')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>- {{\App\CPU\Helpers::currency_converter($order->discount_amount)}}</span>
                                    </div>
                                </td>
                            </tr>

                            @if($order->order_type != 'default_type')
                                <tr>
                                    <td>
                                        <div
                                            class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                                class="product-qty ">{{\App\CPU\translate('extra')}} {{\App\CPU\translate('Discount')}}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                            <span>- {{\App\CPU\Helpers::currency_converter($extra_discount)}}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            <tr class="border-top border-bottom">
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="font-weight-bold">{{\App\CPU\translate('Total')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"><span
                                            class="font-weight-bold amount ">{{\App\CPU\Helpers::currency_converter($order->order_amount)}}</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                            </div>
                            <div class=" row justify-content mt-4 for-mobile-glaxy __gap-6px flex-nowrap">
                                <a href="{{route('generate-invoice',[$order->id])}}" class=" col-6 btn btn-warning btn-lg for-glaxy-mobile w-50" style="font-size:16px;">
                                    {{\App\CPU\translate('generate_invoice')}}
                                </a>
                                <a class=" col-6 btn btn-lg btn-primary text-white w-49" type="button" style="font-size:16px; margin-left:6px;"
                                href="{{route('track-order.result',['order_id'=>$order['id'],'from_order_details'=>1])}}">
                                    {{\App\CPU\translate('Track')}} {{\App\CPU\translate('Order')}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script>
        function review_message() {
            toastr.info('{{\App\CPU\translate('you_can_review_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function refund_message() {
            toastr.info('{{\App\CPU\translate('you_can_refund_request_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '{{route('messages_store')}}',
                data: $('#chat-form').serialize(),
                success: function (respons) {

                    toastr.success('{{\App\CPU\translate('send successfully')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>
@endpush

