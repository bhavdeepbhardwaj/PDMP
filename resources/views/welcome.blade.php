<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/favicon.png ') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png ') }}"
        rel="{{ asset('frontend/apple-touch-icon ') }}">

    <!-- Google Fonts -->
    <link href="{{ asset('frontend/assets/fonts/homefonts.css ') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css ') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css ') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css ') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/assets/css/style.css ') }}" rel="stylesheet">

    <!-- Datatable -->
    <link href="{{ asset('frontend/assets/css/datatables.min.css ') }}" rel="stylesheet">

    <style>
        .logo-md-text {
            display: none;
        }

        @media (min-width: 768px) {
            .logo-lg-text {
                display: none;
            }

            .logo-md-text {
                display: inline-block;
            }
        }

        @media (min-width: 1560px) {
            .logo-lg-text {
                display: inline-block;
            }

            .logo-md-text {
                display: none;
            }
        }

        #topbar {
            background-color: #364a65;
        }

        .navbar a,
        .card-header {
            font-weight: 600;
        }

        #header .logo h1 a,
        #header .logo h1 a:hover {
            color: #364a65;
        }

        .box-1 {
            /* background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%) !important; */
            background-color: #6e119d !important;
        }

        .box-2 {
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%) !important;
        }

        .box-3 {
            /* background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%) !important; */
            background-color: #276c9d !important;
        }

        .box-4 {
            background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%) !important;
        }

        .why-us .icon-boxes .icon-box p,
        .icon-box h4,
        .icon-box i {
            color: #fff !important;
        }

        .read-more {
            background: #ff5821;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            transition: 0.2s;
        }

        .read-more:hover {
            background: #ffede7ec;
            color: #ff5821;
            border: 1px solid #ff5821;
        }

        .chart,
        .tab-table {
            width: 100%;
            height: 400px;
        }

        .tab-table thead tr th {
            text-align: center !important;
        }

        .tab-table .pagination {
            justify-content: flex-end;
        }
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@trw.com">contact@trw.com</a></i>
                <!-- <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i> -->
            </div>

            <!--  <div class="cta d-none d-md-flex align-items-center">
        <a href="#about" class="scrollto">Get Started</a>
      </div>-->
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-center">

            <div class="logo">
                <h1>
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets/img/Emblem_of_India.png ') }}" alt=""
                            class="img-fluid">
                        <span class="logo-lg-text">Transport Research Wing (TRW) - MoPSW</span>
                        <span class="logo-md-text">TRW - MoPSW</span>
                    </a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{ asset('frontend/assets/img/logo.png ') }}" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#shippingStatistics">Shipping Statistics</a></li>
                    <li><a class="nav-link scrollto" href="#portStatistics">Port Statistics</a></li>
                    <li><a class="nav-link scrollto " href="#shipBuildingStatistics">Ship Building &
                            Repairing</a></li>
                    <li><a class="nav-link scrollto" href="#inlandWaterwaysStatistics">Inland Waterways</a>
                    </li>
                    <li><a class="nav-link scrollto" href="#publications">Publication</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user())
                                <li><a class="nav-link scrollto" href="{{ route('backend.dashboard') }}"><b> <i class="nav-icon fas fa-th"></i> Dashboard</b></a></li>
                            @endif
                        @else
                            <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    @endif

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container-fluid" data-aos="fade-in">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('frontend/assets/img/port.jpg ') }}" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend/assets/img/vessel2.jpg ') }}" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend/assets/img/vessel1.jpg ') }}" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">

                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="icon-box mt-4 mt-xl-0 bg-secondary text-white">
                                    <i class="bx bxs-ship"></i>
                                    <h4>Indian Shipping Statistics</h4>
                                    <p>
                                        Indian shipping statistics is an annual publication of Transport Research Wing
                                        (TRW) in Ministry of Ports, Shipping & Waterways.
                                        This will give the status of Indian Shipping Sector in terms of different
                                        dimensions like Age, size, Type of Vessels.
                                    </p>
                                    <div class="text-center pt-2">
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="icon-box mt-4 mt-xl-0 bg-warning text-white">
                                    <i class="bx bxs-buildings"></i>
                                    <h4>Basic Port Statistics in India</h4>
                                    <p>
                                        This is a premier source of information on the port performance in the country
                                        (covering both Major & Non Major Ports) and
                                        provides consistent and comparitive time series data in an analytical
                                        perspective.
                                    </p>
                                    <div class="text-center pt-2">
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="icon-box mt-4 mt-xl-0 box-3">
                                    <i class="bx bxs-cube-alt"></i>
                                    <h4>Ship Building & Ship Repairing Statistics</h4>
                                    <p>
                                        Ship Building and Ship Repairing statistics is an annual publication of the
                                        Transport Research Wing (TRW) in the Ministry of Ports,
                                        Shipping & Waterways
                                    </p>
                                    <div class="text-center pt-2">
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="icon-box mt-4 mt-xl-0 box-1">
                                    <i class="bx bx-transfer-alt"></i>
                                    <h4>Inland Waterways Transport Statistics</h4>
                                    <p>
                                        Transport Research Wing (TRW) in the Ministry of Ports, Shipping and Waterways
                                        is the nodal point for providing information/data on
                                        various facets of Shipping and Inland water Transport (IWT)
                                    </p>
                                    <div class="text-center pt-2">
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->



        <!-- ======= Shipping Statistics ======= -->
        <section id="shippingStatistics" class="section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Indian Shipping Statistics</h2>
                    <p>Indian shipping statistics is an annual publication of Transport Research Wing (TRW) in Ministry
                        of Ports, Shipping & Waterways. This will give the status of Indian Shipping Sector in terms of
                        different dimensions like Age, size, Type of Vessels.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Growth of Indian Fleet during 2014-2022</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#fleetChartTab"><i class='bx bxs-bar-chart-alt-2'></i> Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#fleetChartTable"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="fleetChartTab" class="tab-pane active">
                                        <div id="fleetChart" class="chart"></div>
                                    </div>
                                    <div id="fleetChartTable" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="fleetTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Growth of Indian Tonnage during 2014-2022</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#tonnageChartTab"><i class='bx bxs-bar-chart-alt-2'></i> Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#tonnageTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tonnageChartTab" class="tab-pane active">
                                        <div id="tonnageChart" class="chart"></div>
                                    </div>
                                    <div id="tonnageTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="tonnageTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Growth of Indian Fleet by Size of Vessels during 2014-2022</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#fleetSizeChartTab"><i class='bx bxs-bar-chart-alt-2'></i> Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#fleetSizeTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="fleetSizeChartTab" class="tab-pane active">
                                        <div id="fleetSizeChart" class="chart"></div>
                                    </div>
                                    <div id="fleetSizeTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="fleetSizeTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Values Section -->

        <section id="portStatistics" class="services">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Basic Port Statistics</h2>
                    <p>This is a premier source of information on the port performance in the country (covering both
                        Major & Non Major Ports) and provides consistent and comparitive time series data in an
                        analytical perspective.</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Major Ports - Capacity and Traffic (Million Tonnes)</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#capacityTrafficChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#capacityTrafficTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="capacityTrafficChartTab" class="tab-pane active">
                                        <div id="capacityTrafficChart" class="chart"></div>
                                    </div>
                                    <div id="capacityTrafficTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="capacityTrafficTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="card p-0">
                            <div class="card-header">Major Ports & Non -Major Ports - Cargo Traffic (Share %)</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#cargoTrafficChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#cargoTrafficTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="cargoTrafficChartTab" class="tab-pane active">
                                        <div id="cargoTrafficChart" class="chart"></div>
                                    </div>
                                    <div id="cargoTrafficTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="cargoTrafficTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Overseas and Coastal Traffic ( Million Tonnes)</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#trafficChartTab"><i class='bx bxs-bar-chart-alt-2'></i> Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#trafficTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="trafficChartTab" class="tab-pane active">
                                        <div id="trafficChart" class="chart"></div>
                                    </div>
                                    <div id="trafficTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="trafficTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="card p-0">
                            <div class="card-header">Major Ports: Average Turn Round Time (All Vessels)</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#turnAroundChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#turnAroundTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="turnAroundChartTab" class="tab-pane active">
                                        <div id="turnAroundChart" class="chart"></div>
                                    </div>
                                    <div id="turnAroundTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="turnAroundTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Major Ports- Turn Around Time Container Vessels (Hours)</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#turnAroundContainerChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#turnAroundContainerTableTab"><i class='bx bx-table'></i> Table</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="turnAroundContainerChartTab" class="tab-pane active">
                                        <div id="turnAroundContainerChart" class="chart"></div>
                                    </div>
                                    <div id="turnAroundContainerTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="turnAroundContainerTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Values Section -->

        <section id="shipBuildingStatistics" class="section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Ship Building & Ship Repairing Statistics</h2>
                    <p>Ship Building and Ship Repairing statistics is an annual publication of the Transport Research
                        Wing (TRW) in the Ministry of Ports, Shipping & Waterways</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card p-0">
                            <div class="card-header">No. of Ships on Order and Ships Delivered during 2014-15 to
                                2021-22
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#shipOrdersChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#shipOrdersTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="shipOrdersChartTab" class="tab-pane active">
                                        <div id="shipOrdersChart" class="chart"></div>
                                    </div>
                                    <div id="shipOrdersTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="shipOrdersTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Ship Building Order Book by type of Vessels</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#shipBookChartTab"><i class='bx bxs-bar-chart-alt-2'></i> Chart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#shipBookTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="shipBookChartTab" class="tab-pane active">
                                        <div id="shipBookChart" class="chart"></div>
                                    </div>
                                    <div id="shipBookTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="shipBookTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="inlandWaterwaysStatistics" class="services">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Inland Waterways Transport Statistics</h2>
                    <p>Transport Research Wing (TRW) in the Ministry of Ports, Shipping and Waterways is the nodal point
                        for providing information/data on various facets of Shipping and Inland water Transport (IWT)
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card p-0">
                            <div class="card-header">Movement of cargo (in Million Tonnes ) on National Waterways</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#inlandWaterwaysChartTab"><i class='bx bxs-bar-chart-alt-2'></i>
                                            Chart</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#inlandWaterwaysTableTab"><i class='bx bx-table'></i> Table</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="inlandWaterwaysChartTab" class="tab-pane active">
                                        <div id="inlandWaterwaysChart" class="chart"></div>
                                    </div>
                                    <div id="inlandWaterwaysTableTab" class="tab-pane">
                                        <div class="table-responsive pt-2 tab-table">
                                            <table id="inlandWaterwaysTable"
                                                class="table table-bordered table-striped table-hover" width="100%">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section id="publications" class="section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Publications</h2>
                </div>

                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#monthTab">Month</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#yearTab">Year</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#biAnnualTab">Bi-Annual</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#othersTab">Others</a></li>
                </ul>
                <div class="tab-content">
                    <div id="monthTab" class="tab-pane active">
                        <div class="table-responsive pt-2 tab-table">
                            <table class="table table-bordered table-striped table-hover" width="100%"></table>
                        </div>
                    </div>
                    <div id="yearTab" class="tab-pane">
                        <div class="table-responsive pt-2 tab-table">
                            <table class="table table-bordered table-striped table-hover" width="100%"></table>
                        </div>
                    </div>
                    <div id="biAnnualTab" class="tab-pane">
                        <div class="table-responsive pt-2 tab-table">
                            <table class="table table-bordered table-striped table-hover" width="100%"></table>
                        </div>
                    </div>
                    <div id="othersTab" class="tab-pane">
                        <div class="table-responsive pt-2 tab-table">
                            <table class="table table-bordered table-striped table-hover" width="100%"></table>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Contact</h2>
                    <p data-aos="fade-up">Transport Research Wing (TRW), Ministry of Ports,Shipping and Waterways
                        collects, compiles and disseminates time series data on Ports, Shipping, Ship Building and Ship
                        Repairing and Inland Water Transport. Besides, it is also responsible for rendering necessary
                        research and data support to the various wings of the Ministry of Ports,Shipping and Waterways
                        for policy planning in the above mentioned sectors.</p>
                </div>

                <div class="row justify-content-center">

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Parivahan Bhavan 1, Parliament Street New Delhi</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@trw.com<br>contact@trw.com</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+91<br>+91 </p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-xl-9 col-lg-12 mt-4">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>TRW-MoPSW</h3>
                        <p>
                            Parivahan Bhavan 1 <br>
                            Parliament Street New Delhi <br>
                            India<br><br>
                            <strong>Phone:</strong> +91- <br>
                            <strong>Email:</strong> info@pdmp.com<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-12 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p></p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="me-lg-auto text-center text-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>MoPSW 2024</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
                    Designed by <a href=""><strong><span>NIC</span></strong></a>
                </div>
            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js ') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('frontend/assets/js/pdfmake.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/vfs_fonts.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/datatables.min.js ') }}"></script>

    <script src="{{ asset('frontend/assets/js/core.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/charts.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/animated.js ') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js ') }}"></script>

    <script src="{{ asset('frontend/assets/js/lineChart.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/columnChart.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/table.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/chart.js ') }}"></script>



</body>

</html>
