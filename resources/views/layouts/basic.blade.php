<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--!, shrink-to-fit=no-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
    <!-- Bootstrap CSS -->
    <?php
    $resources_path = env('RESOURCES_LOCATION');
    ?>
    <link rel="stylesheet" href="{{$resources_path}}assets/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{$resources_path}}assets/fontawesome-free-5.1.0-web/css/all.css">
    <link rel="stylesheet" href="{{$resources_path}}assets/theme/css/style.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{Config::get('constant.JWL_FAVICON_URL16')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{Config::get('constant.JWL_FAVICON_URL32')}}">
    {{--<link rel="stylesheet" href="{{$resources_path}}assets/theme/css/style.css">--}}
    <!--<link rel="stylesheet/less" href="css/style.less">-->

</head>
<body class="mt-xl-0 mt-lg-0 mt-5 bg-white">
<!-- Include Header section -->


@yield('content')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{$resources_path}}assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="{{$resources_path}}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{$resources_path}}assets/js/less.min.js"></script>
<script src="{{$resources_path}}assets/js/sweetalert.min.js"></script>
<script src="{{$resources_path}}assets/js/jquery.min.js"></script>
{{--Footer js Section Start--}}
@yield('footerjs')

</body>
</html>