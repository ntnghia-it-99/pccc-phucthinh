<div class="header-wrapper">
    <div id="masthead" class="header-main hide-for-sticky" style="height: 155px">
        <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
            <!-- Logo -->
            <div id="logo" class="flex-col logo" style="padding: 0px;width: 270px">
                <!-- Header logo -->
                <a href="/" title="PCCC Phúc Thịnh - Phòng cháy an toàn, có Phúc Thịnh" rel="home"
                    style="display:flex">
                    <img width="150" height="150" src="{{ asset('/images/logo-1.png') }}" class="header_logo header-logo"
                        alt="PCCC Phúc Thịnh" style="padding: 0px !important;max-height:150px !important"/>
                    {{-- <p style="font-size:25px;margin-top:70px;margin-left:5px">PHÚC THỊNH</p> --}}
                </a>
            </div>
            <!-- Mobile Left Elements -->
            <div class="flex-col show-for-medium flex-left">
                <ul class="mobile-nav nav nav-left ">
                    <li class="nav-icon has-icon">
                        <a href="#" data-open="#main-menu" data-pos="center" data-bg="main-menu-overlay" data-color=""
                            class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Left Elements -->
            <div class="flex-col hide-for-medium flex-left flex-grow">
                <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                    <li class="header-block">
                        <div class="header-block-block-1">
                            <div class="row row-small" id="row-841457295">
                                <div id="col-2094755282" class="col medium-7 small-12 large-7">
                                    <div class="col-inner text-left">
                                        <div id="gap-212308509" class="gap-element clearfix"
                                            style="display:block; height:auto;">

                                            <style>
                                                #gap-212308509 {
                                                    padding-top: 26px;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>
                                <div id="col-507618877" class="col hide-for-medium medium-5 small-12 large-5">
                                    <div class="col-inner text-center">
                                        <a rel="noopener noreferrer" href="tel:+84903333718" target="_blank"
                                            class="button primary lowercase expand" style="border-radius:99px;">
                                            <span>Hotline: 0903333718</span>
                                        </a>
                                        <p>Địa chỉ: 64 Đường số 4 - Khu dân cư Hiệp Thành III - Thủ dầu một - Bình Dương
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Right Elements -->
            <div class="flex-col hide-for-medium flex-right">
                <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                </ul>
            </div>
            <!-- Mobile Right Elements -->
        </div>
    </div>
    <div id="wide-nav" class="header-bottom wide-nav hide-for-sticky flex-has-center hide-for-medium">
        <div class="flex-row container">
            {{-- <div class="flex-col hide-for-medium flex-left">
                <ul class="nav header-nav header-bottom-nav nav-left  nav-size-large nav-spacing-large nav-uppercase">
                    <div id="mega-menu-wrap" class="ot-vm-click">
                        <div id="mega-menu-title">
                            <i class="fa fa-bars"></i> DANH MỤC SẢN PHẨM
                        </div>
                        <ul id="mega_menu" class="sf-menu sf-vertical">
                            <li id="menu-item-1477"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-1477">
                                <a href="">Máy Bơm
                                    PCCC và hệ thống</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div> --}}
            <?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
            <div class="flex-col hide-for-medium flex-center">
                <ul class="nav header-nav header-bottom-nav nav-center  nav-size-large nav-spacing-large nav-uppercase">
                    <li id="menu-item-62"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-62 <?php if ($first_part=="") {echo "active"; }?>">
                        <a href="/" aria-current="page" class="nav-top-link">Trang chủ</a>
                    </li>
                    <li id="menu-item-1375"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1375 <?php if ($first_part=="gioi-thieu") {echo "active"; }?>"><a
                            href="/gioi-thieu/" class="nav-top-link">Giới thiệu</a></li>
                    <li id="menu-item-697"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-697 <?php if ($first_part=="san-pham" || $first_part=="chi-tiet") {echo "active"; }?>"><a
                            href="/san-pham" class="nav-top-link">Sản phẩm</a></li>
                    <li id="menu-item-1078"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1078 has-dropdown <?php if ($first_part=="detail") {echo "active"; }?>">
                        <a class="nav-top-link">Dịch vụ<i
                                class="fa fa-sort-down" style="margin-bottom:5px;margin-left:2px"></i></a>
                        <ul class="sub-menu nav-dropdown nav-dropdown-default">
                            @foreach($service as $key => $item)
                            <li id="menu-item-3802"
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-3802">
                                <a href="/detail/{{$item->service_slug}}">{{$item->name_service}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li id="menu-item-1331"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1331 <?php if ($first_part=="du-an" || $first_part=="chi-tiet") {echo "active"; }?>"><a
                            href="/du-an/" class="nav-top-link">Dự án</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-bg-container fill">
        <div class="header-bg-image fill"></div>
        <div class="header-bg-color fill"></div>
    </div>
</div>