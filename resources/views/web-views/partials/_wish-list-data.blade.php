<div class="axil-wishlist-area axil-section-gap">
    <div class="container">
        <div class="product-table-heading">
            <h4 class="title">My Wish List</h4>
        </div>
        <div class="table-responsive" style="border: 1px solid #CBD3D9;border-radius: 6px !important;">
            <table class="table axil-product-table axil-wishlist-table">
                <thead>
                    <tr>
                        <th scope="col" class="product-remove"></th>
                        <th scope="col" class="product-thumbnail">Product</th>
                        <th scope="col" class="product-title"></th>
                        <th scope="col" class="product-price">Unit Price</th>
                        <th scope="col" class="product-stock-status">Stock Status</th>
                        <th scope="col" class="product-add-cart"></th>
                    </tr>
                </thead>
                @if ($wishlists->count() > 0)
                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            @php($product = $wishlist->product_full_info)
                            @if ($wishlist->product_full_info)
                                <tr style="margin-left:10px;">
                                    <td class="product-remove">
                                        <a href="javascript:" onclick="removeWishlist('{{$product['id']}}')" class="remove-wishlist text-danger" ><i
                                                class="fal fa-times"></i></a></td>
                                    <td class="product-thumbnail"><a href="{{route('product',$product->slug)}}" class="d-block h-100">
                                    <img class="__img-full" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" alt="wishlist"
                                        >
                                </a></td>
                                    <td class="product-title"><a href="{{route('product',$product['slug'])}}">{{$product['name']}}</a></td>
                                    <td class="product-price" data-title="Price">@if($product->discount > 0)
                                    <strike style="color: #E96A6A;" class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'}}">
                                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                    </strike>
                                @endif
                                <span
                                    class="font-weight-bold amount">{{\App\CPU\Helpers::get_price_range($product) }}</span></td>
                                    <td class="product-stock-status" data-title="Status">In Stock</td>
                                    <td class="product-add-cart"><a href="{{route('product',$product['slug'])}}"  class="axil-btn btn-outline">Buy Now</a></td>
                                </tr>
                            @else
                                <span class="badge badge-danger">{{ \App\CPU\translate('item_removed') }}</span>
                            @endif
                        @endforeach
                    </tbody>
                @else
                    <center>
                        <h6 class="text-muted">
                            {{ \App\CPU\translate('No data found') }}.
                        </h6>
                    </center>
                @endif
            </table>
        </div>
    </div>
</div>
