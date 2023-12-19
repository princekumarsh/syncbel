<style>
    .widget-title{
       margin-left: 40px;

    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="col-xl-3 col-md-4">
    <aside class="axil-dashboard-aside">
        <nav class="axil-dashboard-nav">
            <div class="nav nav-tabs" role="tablist">
                <a class="{{Request::is('account-oder*') || Request::is('account-order-details*') ? 'nav-item nav-link active' :'nav-item nav-link'}}"  href="{{route('account-oder') }}" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-shopping-basket"></i>My Orders</a>
                <a class="{{Request::is('loyalty')?'nav-item nav-link active':'nav-item nav-link'}}" href="{{route('loyalty') }}" role="tab" aria-selected="true"><i class="fa-solid fa-coins"></i>My loyality points</a>
                <a class="{{Request::is('track-order*')?'nav-item nav-link active':'nav-item nav-link'}}" href="{{route('track-order.index') }}" role="tab" aria-selected="true"><i class="fa-solid fa-location-dot"></i>Track your order</a>
                <a class="{{Request::is('wishlists*')?'nav-item nav-link active':'nav-item nav-link'}}" href="{{route('wishlists')}}" role="tab" aria-selected="true"><i class="fa-regular fa-heart"></i>Wishlist</a>
                <a class="{{Request::is('user-account*')?'nav-item nav-link active':'nav-item nav-link'}}" href="{{route('user-account')}}" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-user"></i>Account Details</a>
                <a class="{{Request::is('account-address*')?'nav-item nav-link active':'nav-item nav-link'}}" href="{{ route('account-address') }}" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-home"></i>Addresses</a>
                <a class="{{(Request::is('account-ticket*') || Request::is('support-ticket*'))?'nav-item nav-link active':'nav-item nav-link'}}" href="{{ route('account-tickets') }}" role="tab" aria-selected="false" tabindex="-1"><i class="fa-solid fa-ticket"></i>Support ticket</a>
                <a class="{{Request::is('password*')?'nav-item nav-link active':'nav-item nav-link'}}"  href="{{route('password')}}" role="tab" aria-selected="false" tabindex="-1"><i class="fa-solid fa-lock"></i>Change password</a>
                <a class="nav-item nav-link" href="{{ route('customer.auth.logout') }}" aria-selected="false" tabindex="-1" role="tab"><i class="fal fa-sign-out"></i>Logout</a>
            </div>
        </nav>
    </aside>
</div>


















