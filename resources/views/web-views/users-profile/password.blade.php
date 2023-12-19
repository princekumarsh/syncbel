@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Change password'))

@section('content')

<div class="container pb-5 mb-2 mb-md-4 rtl __account-address" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <h2 class="text-center py-3 m-0 headerTitle">{{\App\CPU\translate('Change_password')}}</h2>
    <div class="row">
        <!-- Sidebar-->
    @include('web-views.partials._profile-aside')
    <div class="col-xl-9 col-md-8">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="nav-account" role="tabpanel">
                <div class="col-lg-9">
                    <div class="axil-dashboard-account">

                        <form class="account-details-form" action="{{route('changepassword')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" name="password" type="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" name="confirm_password" type="password" id="confirm_password" required>
                                    </div>
                                    <div class="form-group mb--0">
                                        <input type="submit" class="axil-btn" value="Save Changes" required>
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

@endsection
