<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="shortcut icon" href="{{ asset('{{ asset('backend/images/favicon.png') }}" type="text/css"> --}}
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('backend/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/favicon.png') }}">


    <title>{{ config('app.name', 'CAPEX') }}</title>

    <!-- Base Css Files -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('backend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('backend/css/waves-effect.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('backend/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="{{ asset('backend/js/modernizr.min.js') }}"></script>

</head>

<body>
    {{-- Content --}}
    @yield('content')
    {{-- Content --}}
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/waves.js') }}"></script>
    <script src="{{ asset('backend/js/wow.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('backend/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-blockui/jquery.blockUI.js') }}"></script>


    <!-- CUSTOM JS -->
    <script src="{{ asset('backend/js/jquery.app.js') }}"></script>
    @yield('js')


</body>

</html>
