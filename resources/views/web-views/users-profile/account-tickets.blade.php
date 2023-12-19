@extends('layouts.front-end.app')
<style>
    .axil-dashboard-order .table tbody tr td, .axil-dashboard-order .table tbody tr th {
    padding: 20px 11px !important;
}
</style>
@section('title',\App\CPU\translate('My Support Tickets'))
@section('content')

    <div class="modal fade rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" id="open-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5
                                class="modal-title font-nameA ">{{\App\CPU\translate('submit_new_ticket')}}</h5></div>
                        <div class="col-md-12 text-black mt-3">
                            <span>{{\App\CPU\translate('you_will_get_response')}}.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="mt-3" method="post" action="{{route('ticket-submit')}}" id="open-ticket">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstName">{{\App\CPU\translate('Subject')}}</label>
                                <input type="text" class="form-control" id="ticket-subject" name="ticket_subject"
                                       required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect">{{\App\CPU\translate('Type')}}</label>
                                    <select class="custom-select " id="ticket-type" name="ticket_type" required>
                                        <option
                                            value="Website problem">{{\App\CPU\translate('Website')}} {{\App\CPU\translate('problem')}}</option>
                                        <option value="Partner request">{{\App\CPU\translate('partner_request')}}</option>
                                        <option value="Complaint">{{\App\CPU\translate('Complaint')}}</option>
                                        <option
                                            value="Info inquiry">{{\App\CPU\translate('Info')}} {{\App\CPU\translate('inquiry')}} </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect">{{\App\CPU\translate('Priority')}}</label>
                                    <select class="form-control custom-select" id="ticket-priority"
                                            name="ticket_priority" required>
                                        <option value>{{\App\CPU\translate('choose_priority')}}</option>
                                        <option value="Urgent">{{\App\CPU\translate('Urgent')}}</option>
                                        <option value="High">{{\App\CPU\translate('High')}}</option>
                                        <option value="Medium">{{\App\CPU\translate('Medium')}}</option>
                                        <option value="Low">{{\App\CPU\translate('Low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="detaaddressils">{{\App\CPU\translate('describe_your_issue')}}</label>
                                <textarea class="form-control" rows="6" id="ticket-description"
                                          name="ticket_description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer p-0 border-0">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{\App\CPU\translate('close')}}</button>
                            <button type="submit" class="btn btn--primary">{{\App\CPU\translate('submit_a_ticket')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title-->
    <div class="container rtl">
        <h3 class="headerTitle text-center py-3 mb-0">{{\App\CPU\translate('support_ticket')}}</h3>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->

            <div class="col-xl-9 col-md-8">
                @php($allTickets =App\Model\SupportTicket::where('customer_id', auth('customer')->id())->get())
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="nav-orders" role="tabpanel">
                        <div class="axil-dashboard-order">
                            <div class="table-responsive"style="border: 1px solid #cbd3d9;border-radius: 6px !important;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Topic</th>
                                            <th scope="col">Submission date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allTickets as $ticket)
                                            <tr>
                                                <th scope="row"><span class="marl">{{$ticket['subject']}}</span></th>
                                                <td><span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')}}</span></td>
                                                <td><span class="">{{\App\CPU\translate($ticket['type'])}}</span></td>
                                                <td><span class="">{{\App\CPU\translate($ticket['status'])}}</span></td>
                                                <td><a href="{{route('support-ticket.index',$ticket['id'])}}" class="axil-btn view-btn">Details</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <button onclick="window.location.href='{{route('addticket')}}'" class="btn btn-lg btn-primary float-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                        style="width:160px; font-size:18px;">
                                        {{\App\CPU\translate('add_new_ticket')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
