<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Trang quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/logo-1.png" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/admin/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ URL::to('/') }}/admin/css/style.css" rel='stylesheet' type='text/css' />
    <link href="{{ URL::to('/') }}/admin/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/admin/css/font.css" type="text/css" />
    <link href="{{ URL::to('/') }}/admin/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/admin/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/admin/css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{ URL::to('/') }}/admin/js/jquery2.0.3.min.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/raphael-min.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/morris.js"></script>
    <script src="{{ URL::to('/') }}/admin/ckeditor/ckeditor.js"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    VISITORS
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ URL::to('/') }}/images/a4.jpeg">
                            <span class="username"><?php
                                $name = Session::get('name');
                                if($name){
                                    echo $name;
                                    
                                }
                                ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="/logout"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <?php 
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        $first_part = $components[1];
        ?>
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="<?php if ($first_part=="dashboard") {echo "active"; }?>" href="/dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if ($first_part=="them-san-pham") {echo "active"; }?>" href="/them-san-pham">Thêm Sản phẩm</a></li>
                                <li><a class="<?php if ($first_part=="danh-sach-sp") {echo "active"; }?>" href="/danh-sach-sp">Danh sách Sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Danh mục</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if ($first_part=="them-the-loai") {echo "active"; }?>" href="/them-the-loai">Thêm danh mục</a></li>
                                <li><a class="<?php if ($first_part=="danh-sach-the-loai") {echo "active"; }?>" href="/danh-sach-the-loai">Danh sách danh mục</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Thương hiệu</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if ($first_part=="them-thuong-hieu") {echo "active"; }?>" href="/them-thuong-hieu">Thêm thương hiệu</a></li>
                                <li><a class="<?php if ($first_part=="danh-sach-thuong-hieu") {echo "active"; }?>" href="/danh-sach-thuong-hieu">Danh sách thương hiệu</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Dịch vụ</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if ($first_part=="them-dich-vu") {echo "active"; }?>" href="/them-dich-vu">Thêm dịch vụ</a></li>
                                <li><a class="<?php if ($first_part=="danh-sach-dich-vu") {echo "active"; }?>" href="/danh-sach-dich-vu">Danh sách dịch vụ</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Dự án</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if ($first_part=="them-du-an") {echo "active"; }?>" href="/them-du-an">Thêm dự án</a></li>
                                <li><a class="<?php if ($first_part=="danh-sach-du-an") {echo "active"; }?>" href="/danh-sach-du-an">Danh sách dự án</a></li>
                            </ul>
                        </li>
                
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub">
                                <li><a href="google_map.html">Google Map</a></li>
                                <li><a href="vector_map.html">Vector Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2023 Design by PHUCTHINH. All rights reserved </a>
                    </p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="{{ URL::to('/') }}/admin/js/bootstrap.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/scripts.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.slimscroll.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ URL::to('/') }}/admin/js/flot-chart/excanvas.min.js">
    </script><![endif]-->
    <script src="{{ URL::to('/') }}/admin/js/jquery.scrollTo.js"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
     <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
         CKEDITOR.replace('ckeditor');
         CKEDITOR.replace('service');
 </script>
    <!-- calendar -->
    <script type="text/javascript" src="{{ URL::to('/') }}/admin/js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load(function() {

            $('#mycalendar').monthly({
                mode: 'event',

            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    // running on a server, should be good.
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }

        });
    </script>
    <!-- //calendar -->
</body>

</html>
