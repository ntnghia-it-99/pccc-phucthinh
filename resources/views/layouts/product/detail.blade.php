@extends('main')
@section('content')
    <main id="main" class="">
        <div class="shop-container">
            <div class="container">
                <div class="woocommerce-notices-wrapper"></div>
            </div>
            <div id="product-2148"
                class="product type-product post-2148 status-publish first instock product_cat-catalog product_cat-may-bom-diesel product_cat-may-bom-pccc-va-he-thong has-post-thumbnail shipping-taxable product-type-simple">
                <div class="product-container">
                    <div class="product-main">
                        <div class="row mb-0 content-row">
                            @foreach ($product_details as $product)
                            <div class="product-gallery large-5 col">
                                <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                    data-columns="4">
                                    <div class="badge-container is-larger absolute left top z-1">
                                    </div>
                                    <div class="image-tools absolute top show-on-hover right z-3">
                                    </div>
                                    <figure
                                        class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half has-image-zoom"
                                        data-flickity-options='{ 
                                            "cellAlign": "center",
                                            "wrapAround": true,
                                            "autoPlay": false,
                                            "prevNextButtons":true,
                                            "adaptiveHeight": true,
                                            "imagesLoaded": true,
                                            "lazyLoad": 1,
                                            "dragThreshold" : 15,
                                            "pageDots": false,
                                            "rightToLeft": false       
                                        }'>
                                        <div class="woocommerce-product-gallery__image slide first">
                                            <img width="300"
                                                    height="300"
                                                    src="{{URL::to('/images/product/'.$product->image)}}"
                                                    class="wp-post-image skip-lazy" alt="" decoding="async"
                                                    title="Diesel - 01 (DI)" data-caption=""
                                                    data-src="{{URL::to('/images/product/'.$product->image)}}"
                                                    data-large_image="{{URL::to('/images/product/'.$product->image)}}"
                                                    data-large_image_width="900" data-large_image_height="900"
                                                    loading="lazy"
                                                    sizes="(max-width: 300px) 100vw, 300px" /></a></div>
                                        
                                    </figure>
                                </div>
                            </div>

                            <div class="product-info summary col-fit col-divided col entry-summary product-summary text-left">
                                <h1 class="product-title product_title entry-title">
                                   {{ $product->name_product }}</h1>
                                <div class="is-divider small"></div>
                                <div class="price-wrapper">
                                    <p class="price product-page-price ">
                                        <span class="amount">Liên hệ để được giá tốt</span>
                                    </p>
                                </div>
                                <div class="product-short-description">
                                    <ul class="product_info">
                                        <li><b>Bảo hành:</b> {{ $product->warranty}}</li>
                                        <li><b>Hãng sản xuất:</b> Đang cập nhật</li>
                                    </ul>
                                </div>
                                <div class="row row-small" id="row-1807372006">
                                    <div id="col-1546616010" class="col medium-6 small-12 large-6">
                                        <div class="col-inner">
                                            <a rel="noopener noreferrer" href="tel:+84903333718" target="_blank"
                                                class="button success is-normal lowercase expand"
                                                style="border-radius:5px;">
                                                <span>Gọi 0903333718</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-icons share-icons share-row relative"></div>
                            </div>
                            @endforeach
                            <div id="product-sidebar" class="col large-3 hide-for-medium ">
                            </div>
                        </div>
                    </div>

                    <div class="product-footer">
                        <div class="container">
                            <div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
                                <ul class="tabs wc-tabs product-tabs small-nav-collapse nav nav-uppercase nav-line nav-left"
                                    role="tablist">
                                    <li class="description_tab active" id="tab-title-description" role="tab"
                                        aria-controls="tab-description">
                                        <a href="index.html#tab-description">
                                            Mô tả </a>
                                    </li>
                                </ul>
                                <div class="tab-panels">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active"
                                        id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                        <p>{!!$product->description!!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="related related-products-wrapper product-section">
                                <h3
                                    class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                    Sản phẩm tương tự </h3>
                                <div class="row large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                    @foreach ($related_product as $item)
                                    <div class="product-small col has-hover product type-product post-2148 status-publish first instock product_cat-catalog product_cat-may-bom-diesel product_cat-may-bom-pccc-va-he-thong has-post-thumbnail shipping-taxable product-type-simple">
                                        <div class="col-inner">
                                            <div class="badge-container absolute left top z-1">
                                            </div>
                                            <div class="product-small box ">
                                                <div class="box-image">
                                                    <div class="image-zoom">
                                                        <a href="/chi-tiet/{{ $item->product_slug }}">
                                                            <img style="max-height: 290px; height: 290px; width:300px"
                                                                src="{{URL::to('/images/product/'.$item->image)}}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="" decoding="async" loading="lazy"
                                                                sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                                    </div>
                                                    <div class="image-tools is-small top right show-on-hover">
                                                    </div>
                                                    <div
                                                        class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                    </div>
                                                    <div
                                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                    </div>
                                                </div>
    
                                                <div class="box-text box-text-products text-center grid-style-2">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title woocommerce-loop-product__title">
                                                            <a>{{ $item->name_product}}</a>
                                                        </p>
                                                    </div>
                                                    <div class="price-wrapper">
                                                        <span class="price"><span class="amount">Liên hệ báo
                                                                giá</span></span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- shop container -->

        <script nitro-exclude>
            document.cookie = 'nitroCachedPage=' + (!window.NITROPACK_STATE ? '0' : '1') + '; path=/; SameSite=Lax';
        </script>
        <script nitro-exclude>
            if (!window.NITROPACK_STATE || window.NITROPACK_STATE != 'FRESH') {
                var proxyPurgeOnly = 0;
                if (typeof navigator.sendBeacon !== 'undefined') {
                    var nitroData = new FormData();
                    nitroData.append('nitroBeaconUrl',
                        'aHR0cHM6Ly9wY2NjcG5uLmNvbS9zYW4tcGhhbS9tYXktYm9tLWNodWEtY2hheS1iYXNpYy1maXJlLWRpZXNlbC1kaS8=');
                    nitroData.append('nitroBeaconCookies', 'W10=');
                    nitroData.append('nitroBeaconHash',
                        'fac06b60801a4275d80b9af9e0121ba0743b9237269ab21fa91d3f5baf804b798fde018af2c07485e3667417517f25f909d8c93951fea2741a3b220f43c1819a'
                        );
                    nitroData.append('proxyPurgeOnly', '');
                    nitroData.append('layout', 'product');
                    navigator.sendBeacon(location.href, nitroData);
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', location.href, true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send(
                        'nitroBeaconUrl=aHR0cHM6Ly9wY2NjcG5uLmNvbS9zYW4tcGhhbS9tYXktYm9tLWNodWEtY2hheS1iYXNpYy1maXJlLWRpZXNlbC1kaS8=&nitroBeaconCookies=W10=&nitroBeaconHash=fac06b60801a4275d80b9af9e0121ba0743b9237269ab21fa91d3f5baf804b798fde018af2c07485e3667417517f25f909d8c93951fea2741a3b220f43c1819a&proxyPurgeOnly=&layout=product'
                        );
                }
            }
        </script>
    </main>
@endsection
