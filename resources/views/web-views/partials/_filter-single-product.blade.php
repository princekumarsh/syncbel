@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))



<div class="axil-product product-style-one mb--30">
    <div class="thumbnail">
        <a href="{{ route('product', [$product->slug]) }}">
            <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                data-sal-delay="100" data-sal-duration="800" loading="lazy"
                src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                alt="Product Images">
        </a>
        @if ($product->discount != 0)

            <div class="label-block label-right">
                <div class="product-badget">
                    @if ($product->discount_type == 'percent')
                        {{ round($product->discount) }}%
                    @elseif($product->discount_type == 'flat')
                        {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                    @endif
                    {{ \App\CPU\translate('off') }}
                </div>
            </div>
        @endif
        <div class="product-hover-action">
            <ul class="cart-action">

                <li class="select-option"><a href="{{ route('product', $product->slug) }}">Buy
                        now</a></li>

            </ul>
        </div>
    </div>
    <div class="product-content">
        <div class="inner">
            <h5 class="title"><a href="{{ route('product', $product->slug) }}">{{ Str::limit($product->name, 23) }}</a>
            </h5>
            <div class="product-price-variant">
                @if ($product->discount > 0)
                    <span
                        class="price old-price">{{ \App\CPU\Helpers::currency_converter($product->unit_price) }}</span>
                @endif
                <span class="price current-price">
                    {{ \App\CPU\Helpers::currency_converter(
                        $product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price),
                    ) }}
                </span>
            </div>
        </div>
    </div>
</div>
