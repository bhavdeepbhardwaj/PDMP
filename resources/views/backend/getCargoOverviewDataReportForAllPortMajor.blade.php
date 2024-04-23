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
                            <li class="breadcrumb-item"><a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major">Home</a>
                            </li>
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
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">DEENDAYAL PORT
                                                        AUTHORITY</h4>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">MUMBAI PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">JAWAHARLAL NEHRU PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">MORMUGAO PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">NEW MANGALORE PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">COCHIN PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">V O CHIDAMBARANAR PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">CHENNAI PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">KAMARAJAR PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">VISAKHAPATNAM PORT AUTHORITY	</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">DEENDAYAL PORT
                                                        AUTHORITY</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">DEENDAYAL PORT
                                                        AUTHORITY</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            {{-- <div class="inner">
                                                <h3>46484723</h3>
                                                <p>Total Cargo Overview</p>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 text-center"
                                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <h4 class="" style="padding: 10px; margin: 10px;">DEENDAYAL PORT
                                                        AUTHORITY</h4>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Overseas</h4>
                                                            <h5 class="info-box-number">141542540</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box"
                                                        style="background-color:#28A745; box-shadow: 0 0 0 0!important;;">
                                                        <span class="info-box-icon bg-success"><i
                                                                class="far fa-"></i></span>
                                                        <div class="info-box-content">
                                                            <h4 class="info-box-text">Coastal</h4>
                                                            <h5 class="info-box-number">15655410</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/view-Cargo-Overview-Data-Report-For-All-Port-Major"
                                                class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

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
