<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>PCCC Phúc Thịnh</title>
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
    <!-- //font-awesome icons -->
    <script src="{{ URL::to('/') }}/admin/js/jquery2.0.3.min.js"></script>
</head>

<body style="overflow: hidden">
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng nhập với quyền quản trị viên</h2>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="width: 100%;padding-bottom: 10px;color:red;">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <form action="{{ URL::to('/login') }}" method="post">
                @foreach ($errors->all() as $val)
                    <ul>
                        <li>{{ $val }}</li>
                    </ul>
                @endforeach
                {{ csrf_field() }}
                <div class="imgcontainer" style="width: 40%;margin-left:auto;margin-right:auto">
                    <img src="{{ URL::to('/') }}/images/a4.jpeg" alt="Avatar" class="avatar" style="width: 100%">
                </div>
                <input type="email" class="ggg" name="email" placeholder="E-MAIL" required=""
                    value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}">
                <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
                <span><a href="/">Về Trang chủ</a></span>
                <h6><a>Quên mật khẩu?</a>Hãy hỏi ny bạn :v</h6>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
            </form>
        </div>
    </div>
    <script src="{{ URL::to('/') }}/admin/js/bootstrap.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/scripts.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.slimscroll.js"></script>
    <script src="{{ URL::to('/') }}/admin/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ URL::to('/') }}/admin/js/flot-chart/excanvas.min.js">
    </script><![endif]-->
    <script src="{{ URL::to('/') }}/admin/js/jquery.scrollTo.js"></script>
</body>

</html>
