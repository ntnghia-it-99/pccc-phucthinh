@extends('main')
@section('content')
<main id="main" class="">
    <div class="row category-page-row">
        <div class="col large-12">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-2-hover" style="padding-top: 20px">
                @foreach ($product as $item)
                    <div class="product-small col has-hover product type-product post-5251 status-publish first instock product_cat-may-bom-chua-chay-pentax product_cat-may-bom-pccc-va-he-thong has-post-thumbnail shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-zoom">
                                        <a href="/chi-tiet/{{ $item->product_slug }}">
                                            <img style="max-height: 290px; height: 290px; width:300px"
                                                src="images/product/{{ $item->image }}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                alt="" decoding="async" loading="lazy"
                                                sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div
                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>

                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title woocommerce-loop-product__title"><a
                                            href="/chi-tiet/{{ $item->product_slug }}">{{ $item->name_product }}</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span
                                                class="woocommerce-Price-amount amount"><bdi>Liên hệ báo giá&nbsp;</bdi></span></span>
                                    </div>
                                    <div class="add-to-cart-button"><a
                                        href="/chi-tiet/{{ $item->product_slug }}"
                                        data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple is-outline"
                                        data-product_id="2148" data-product_sku=""
                                        rel="nofollow">Đọc tiếp</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div><!-- row -->
                <div class="container">
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers nav-pagination links text-center">
                            {{$product->links()}}
                        </ul>
                    </nav>
                </div>
            </div><!-- shop container -->
        </div>
    </div>

    <script nitro-exclude>
        document.cookie = 'nitroCachedPage=' + (!window.NITROPACK_STATE ? '0' : '1') + '; path=/; SameSite=Lax';
    </script>
    <script nitro-exclude>
        if (!window.NITROPACK_STATE || window.NITROPACK_STATE != 'FRESH') {
            var proxyPurgeOnly = 0;
            if (typeof navigator.sendBeacon !== 'undefined') {
                var nitroData = new FormData(); nitroData.append('nitroBeaconUrl', 'aHR0cHM6Ly9wY2NjcG5uLmNvbS9jdWEtaGFuZy8='); nitroData.append('nitroBeaconCookies', 'W10='); nitroData.append('nitroBeaconHash', 'f4e92e2b1acda695c132a11375c4448d0363ef4e7c24a001519db01d9fe5a65284c75b53b0655709514826ad66fd43dbbe20784ce8962c6b9ef45f3012c39766'); nitroData.append('proxyPurgeOnly', ''); nitroData.append('layout', 'archive'); navigator.sendBeacon(location.href, nitroData);
            } else {
                var xhr = new XMLHttpRequest(); xhr.open('POST', location.href, true); xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); xhr.send('nitroBeaconUrl=aHR0cHM6Ly9wY2NjcG5uLmNvbS9jdWEtaGFuZy8=&nitroBeaconCookies=W10=&nitroBeaconHash=f4e92e2b1acda695c132a11375c4448d0363ef4e7c24a001519db01d9fe5a65284c75b53b0655709514826ad66fd43dbbe20784ce8962c6b9ef45f3012c39766&proxyPurgeOnly=&layout=archive');
            }
        }
    </script>
</main>
@endsection