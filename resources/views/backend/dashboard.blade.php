@extends('layouts.master')

@section('css')
    <!-- Tempusdominus Bootstrap 4 -->
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Auth::check() && Auth::user()->role_id == '1')
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>13234</h3>

                                    <p>Total Port</p>
                                </div>
                                <a href="{{ route('backend.port') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>6</h3>
                                    <p>Port Category</p>
                                </div>
                                <a href="{{ route('backend.port-category') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>443</h3>
                                    <p>Employee Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('backend.user') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>National Waterways Information</p>
                                </div>
                                <a href="{{ route('backend.view-national-waterways-information') }}"
                                    class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                @else
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Major Port Commodities Wise Data Overview (for Current Year)</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More
                                                info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>35611623</h3>
                                                <p>Total Overseas Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More
                                                info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>10875100</h3>
                                                <p>Total Coastal Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More
                                                info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Non Major Port Commodities Wise Data Overview (for Current Year)</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>61929059</h3>
                                                <p>Total Cargo Overview</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>49686484</h3>
                                                <p>Total Overseas Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>443</h3>
                                                <p>Coastal Commodities Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Major Port Cargo Traffic Data Overview (For Current Year)</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>46486723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>35611623</h3>
                                                <p>Total Overseas Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>10875100</h3>
                                                <p>Total Coastal Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Non Major Port Cargo Traffic Data Overview (For Current Year)</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>121680132</h3>
                                                <p>Total Cargo Overview</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>99507152</h3>
                                                <p>Total Overseas Cargo Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>22172980</h3>
                                                <p>Coastal Commodities Data</p>
                                            </div>
                                            <a href="/Cargo-Overview-Data-Report-For-All-Port-Non-Major" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>

                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                    <!-- right col -->
                    <section class="col-lg-6 connectedSortable">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Donut Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- Map card -->
                        <!-- /.info-box -->
                </div>
                <section class="content-header">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1 class="m-0">Performance Dashboard For Major Ports</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Daily Vessel</span>
                                <span class="info-box-number"> 68 At Anchorage</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fas fa-traffic-light"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Traffic</span>
                                <span class="info-box-number">677614 TONNES</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-ship"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TRW Major Port</span>
                                <span class="info-box-number">12 Major Port</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sagarmala project</span>
                                <span class="info-box-number">11 + Upcoming</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
        </section>
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js ') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>
        $(function() {
            // Function to fetch data from the Laravel endpoint
            function fetchData() {
                $.ajax({
                    url: '/chart-data',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response); // Log the entire response object to inspect its structure

                        // Assuming your response contains data in the format {Coastal: 28142486, Overseas: 19388211}
                        var chartData = {
                            labels: Object.keys(response), // Extracting keys as labels
                            datasets: [{
                                data: Object.values(response), // Extracting values as data
                                backgroundColor: ['#f56954',
                                    '#00a65a'
                                ], // Colors for the data
                            }]
                        };

                        var donutOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                        // Updating the doughnut chart
                        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
                        new Chart(donutChartCanvas, {
                            type: 'doughnut',
                            data: chartData,
                            options: donutOptions
                        });

                        // Updating the pie chart
                        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                        var pieOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                        new Chart(pieChartCanvas, {
                            type: 'pie',
                            data: chartData,
                            options: pieOptions
                        });

                        // Configure exporting options
                        Highcharts.setOptions({
                            exporting: {
                                buttons: {
                                    contextButton: {
                                        menuItems: ['downloadPNG', 'downloadJPEG',
                                            'downloadPDF', 'downloadSVG'
                                        ], // Define export options
                                        symbol: 'download', // Set symbol for the context button
                                        symbolStroke: '#666666',
                                        symbolStrokeWidth: 3,
                                        symbolFill: 'white',
                                        align: 'right',
                                        verticalAlign: 'top',
                                        x: -10,
                                        y: 10,
                                        symbolSize: 18,
                                        symbolX: 11,
                                        symbolY: 11,
                                        symbolPosition: 'relative',
                                        text: 'Export', // Text for the context button
                                        theme: {
                                            fill: 'white',
                                            stroke: null,
                                            'stroke-width': 0,
                                            r: 0,
                                            style: {
                                                color: '#666666'
                                            },
                                            states: {
                                                hover: {
                                                    fill: '#efefef'
                                                },
                                                select: {
                                                    fill: '#cccccc'
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Fetch data initially when the page loads
            fetchData();

            // You can also fetch data at regular intervals if it's expected to change
            // setInterval(fetchData, 60000); // Fetch data every minute (for example)
        });
    </script>
@endsection
