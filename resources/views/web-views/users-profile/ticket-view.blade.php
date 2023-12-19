@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Support Ticket'))

@section('content')
    <!-- Page Title-->
    <div class="container rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <h2 class="m-0 headerTitle text-center py-3">{{\App\CPU\translate('Support Ticket Answer')}}</h2>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
            <div class="col-xl-9 col-md-8">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="nav-orders" role="tabpanel">
                        <div class="axil-dashboard-order">
                            <div class="table-responsive"style="border: 1px solid #cbd3d9;border-radius: 6px !important;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date submitted</th>
                                            <th scope="col">Last updated</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Priority</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d')}}
                                            </th>
                                            <td>
                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['updated_at'])->format('Y-m-d')}}
                                            </td>
                                            <td>
                                                {{$ticket['type']}}
                                            </td>
                                            <td>
                                                {{$ticket['priority']}}
                                            </td>
                                            <td>
                                                @if($ticket['status']=='open')
                                                    <span class="badge btn btn-secondary">{{$ticket['status']}}</span>
                                                @else
                                                    <span class="badge btn btn-secondary">{{$ticket['status']}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="">
                                    <div class="container">
                                        <div class="media __incoming-msg">
                                            <img class="rounded-circle __img-40" style="width:70px;text-align: {{Session::get('direction') === "rtl" ? 'left' : 'right'}};"
                                                onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                src="{{asset('storage/app/public/profile')}}/{{auth('customer')->user()->image}}"
                                                alt="{{auth('customer')->user()->f_name}}"/>
                                            <div class="media-body">
                                                <h6 class="font-size-md mb-2">{{auth('customer')->user()->f_name}}</h6>
                                                <p class="font-size-md mb-1">{{$ticket['description']}}</p>
                                                <span class="font-size-ms text-muted">
                                                        <i class="czi-time align-middle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                                    {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')}}
                                                </span>
                                            </div>
                                        </div>
                                        @foreach($ticket->conversations as $conversation)

                                            @if($conversation['customer_message'] == null )
                                                <div class="media __outgoing-msg">
                                                    <div class="media-body">
                                                        @php($admin=\App\Model\Admin::where('id',$conversation['admin_id'])->first())

                                                        <h6 class="font-size-md mb-2">{{$admin['name']}}</h6>
                                                        <p class="font-size-md mb-1">{{$conversation['admin_message']}}</p>
                                                        <span
                                                            class="font-size-ms text-muted"> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['updated_at'])->format('Y-m-d h:i A')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($conversation['admin_message'] == null)
                                                <div class="media __incoming-msg">
                                                    <img class="rounded-circle" height="40" width="40"
                                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                        src="{{asset('storage/app/public/profile')}}/{{auth('customer')->user()->image}}"
                                                        alt="{{auth('customer')->user()->f_name}}"/>
                                                    <div class="media-body">
                                                        <h6 class="font-size-md mb-2">{{auth('customer')->user()->f_name}}</h6>
                                                        <p class="font-size-md mb-1">{{$conversation['customer_message']}}</p>
                                                        <span class="font-size-ms text-muted">
                                                                    <i class="czi-time align-middle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['created_at'])->format('Y-m-d h:i A')}}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="container border-0">
                                        <form class="needs-validation" href="{{route('support-ticket.comment',[$ticket['id']])}}"
                                            method="post" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" rows="8"
                                                        placeholder="{{\App\CPU\translate('Write your message here...')}}" required></textarea>
                                                <div class="invalid-tooltip">{{\App\CPU\translate('Please write the message')}}!</div>
                                            </div>
                                            <div class="container">
                                                <div class="row" style="padding: 4px;">
                                                    <div class="col-6">
                                                        <a href="{{route('support-ticket.close',[$ticket['id']])}}" class="btn btn-lg btn-secondary text-white col-12">{{\App\CPU\translate('close')}}</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <button class="btn btn-lg btn-primary col-6" type="submit">{{\App\CPU\translate('Submit message')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <style>
        .gap-8 {
            gap: 8px;
        }

        .card *, .flex-column * {
            min-height: 0.01px;
        }
        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important;
        }
        .justify-content-end {
            -ms-flex-pack: end !important;
            justify-content: flex-end !important;
        }
        .flex-wrap {
            -ms-flex-wrap: wrap !important;
            flex-wrap: wrap !important;
        }
        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }
    </style> --}}

@endsection

@push('script')

@endpush
