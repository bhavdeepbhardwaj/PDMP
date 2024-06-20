@extends('layouts.master')

@section('css')
    {{-- --}}
    <style>
        .h4,
        h4 {
            font-size: 18px;
        }

        .h5,
        h5 {
            font-size: 14px;
        }

        .h6,
        h6 {
            font-size: 12px;
        }
        .dropdown-menu {
            width: 300px;
        }
        .year-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0ad4e;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .months-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 10px;
        }
        .month-item {
            padding: 10px;
            text-align: center;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }
        .month-item:hover, .month-item.active {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
        }
    </style>
    {{-- --}}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {{-- <form> --}}
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Commodity Wise and Category Wise Cargo Traffic Handled At Ports-Port Wise
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                    <select class="form-control @error('port_type') is-invalid @enderror" name="port_type"
                                        id="port_type">
                                    </select>
                                    @error('port_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2" id="startBoard_div">
                                <div class="form-group">
                                    <label for="state_board">State Board <span style="color: red;">*</span></label>
                                    <select class="form-control @error('state_board') is-invalid @enderror"
                                        name="state_board" id="state_board" value="{{ old('state_board') }}">
                                        <option value='' selected disabled>All State</option>
                                    </select>
                                    @error('state_board')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="port_name">Port Name <span style="color: red;">*</span></label>
                                    <select class="form-control @error('port_name') is-invalid @enderror"
                                        name="port_name" id="port_name" value="{{ old('port_name') }}">
                                        <option value='' selected disabled>All Port</option>
                                    </select>
                                    @error('port_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monthYearSelect">Select Month and Year:</label>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="monthYearDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Month and Year
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="monthYearDropdown">
                                            <div class="year-nav">
                                                <button id="prevYear" class="btn btn-link text-white">❮</button>
                                                <span id="currentYear">Year 2024</span>
                                                <button id="nextYear" class="btn btn-link text-white">❯</button>
                                            </div>
                                            <div class="months-grid">
                                                <div class="month-item" data-month="01">Jan.</div>
                                                <div class="month-item" data-month="02">Feb.</div>
                                                <div class="month-item" data-month="03">Mar.</div>
                                                <div class="month-item" data-month="04">Apr.</div>
                                                <div class="month-item" data-month="05">May</div>
                                                <div class="month-item" data-month="06">June</div>
                                                <div class="month-item" data-month="07">July</div>
                                                <div class="month-item" data-month="08">Aug.</div>
                                                <div class="month-item" data-month="09">Sep.</div>
                                                <div class="month-item" data-month="10">Oct.</div>
                                                <div class="month-item" data-month="11">Nov.</div>
                                                <div class="month-item" data-month="12">Dec.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Error handling example (assuming Laravel blade syntax) -->
                                    @error('port_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="port_name">Port Name <span style="color: red;">*</span></label>
                                    <select class="form-control @error('port_name') is-invalid @enderror"
                                        name="port_name" id="port_name" value="{{ old('port_name') }}">
                                        <option value='' selected disabled>All Port</option>
                                    </select>
                                    @error('port_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover dataTable table-striped">
                                        <thead class="bg-blue">
                                            <tr>
                                                <th width="4%" rowspan="3">S.No.</th>
                                                <th style="text-align: center" rowspan="3">Commodity Name</th>
                                                <th colspan="5">
                                                    <center>Overseas (in Tonnes)</center>
                                                </th>
                                                <th colspan="5">
                                                    <center>Coastal (in Tonnes)</center>
                                                </th>
                                                <th rowspan="3">Grand <br> Total <br>(in Tonnes)</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">
                                                    <center>Unloaded</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Loaded</center>
                                                </th>
                                                <th rowspan="2">
                                                    <center>Total</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Unloaded</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Loaded</center>
                                                </th>
                                                <th rowspan="2">
                                                    <center>Total</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                            </tr>
                                        </thead>
                                        <tbody id="records">
                                            <tr class="2">
                                                <td class="text-center text-bold h4">
                                                    A </td>
                                                <td class="text-bold h4"> Liquid Bulk</td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6">
                                                </td>




                                            </tr>





                                            <tr class="2">
                                                <td class="text-center h5">
                                                    1 </td>
                                                <td class="h5"> POL-Products</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">49759</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">49759</td>
                                                <td class="text-center h6">
                                                    49759 </td>




                                            </tr>





                                            <tr class="2">
                                                <td class="text-center h5">
                                                    2 </td>
                                                <td class="h5"> Edible Oil</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    0 </td>




                                            </tr>





                                            <tr class="2">
                                                <td class="text-center h5">
                                                    3 </td>
                                                <td class="h5"> FRM-Liquid</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">42231</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">42231</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    42231 </td>




                                            </tr>





                                            <tr class="2">
                                                <td class="text-center h5">
                                                    4 </td>
                                                <td class="h5"> Other Liquids</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">6501</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">6501</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    6501 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center text-bold h4">
                                                    B </td>
                                                <td class="text-bold h4"> Dry Bulk</td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6">
                                                </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    1 </td>
                                                <td class="h5"> Iron Ore All</td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6">
                                                </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-right h6">
                                                    (a) </td>
                                                <td class="h6"> Pellets</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    0 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-right h6">
                                                    (b) </td>
                                                <td class="h6"> Fine</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">151701</td>
                                                <td class="text-center h6">1981534</td>
                                                <td class="text-center h6">2133235</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    2133235 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    2 </td>
                                                <td class="h5"> Other Ores</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    0 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    3 </td>
                                                <td class="h5"> Thermal Coal</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">199232</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">199232</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    199232 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    4 </td>
                                                <td class="h5"> Coking Coal</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">777857</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">777857</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    777857 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    5 </td>
                                                <td class="h5"> Fertilizer</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">1472</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">1472</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    1472 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    6 </td>
                                                <td class="h5"> Sugar</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    0 </td>




                                            </tr>





                                            <tr class="3">
                                                <td class="text-center h5">
                                                    7 </td>
                                                <td class="h5"> Other Dry Bulk</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">158912</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">38817</td>
                                                <td class="text-center h6">197729</td>
                                                <td class="text-center h6">1800</td>
                                                <td class="text-center h6">6903</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">8703</td>
                                                <td class="text-center h6">
                                                    206432 </td>




                                            </tr>





                                            <tr class="4">
                                                <td class="text-center text-bold h4">
                                                    C </td>
                                                <td class="text-bold h4"> Break Bulk</td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6">
                                                </td>




                                            </tr>





                                            <tr class="4">
                                                <td class="text-center h5">
                                                    1 </td>
                                                <td class="h5"> Iron and Steel</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">35493</td>
                                                <td class="text-center h6">35493</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">
                                                    35493 </td>




                                            </tr>





                                            <tr class="4">
                                                <td class="text-center h5">
                                                    2 </td>
                                                <td class="h5"> Other Break Bulk</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">138092</td>
                                                <td class="text-center h6">138092</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">7888</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">7888</td>
                                                <td class="text-center h6">
                                                    145980 </td>




                                            </tr>





                                            <tr class="5">
                                                <td class="text-center text-bold h4">
                                                    D </td>
                                                <td class="text-bold h4"> Container</td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6"></td>
                                                <td class="text-center h6">
                                                </td>




                                            </tr>





                                            <tr class="5">
                                                <td class="text-center h5">
                                                    1 </td>
                                                <td class="h5"> TEUs</td>
                                                <td class="text-center h6">34</td>
                                                <td class="text-center h6">919</td>
                                                <td class="text-center h6">117</td>
                                                <td class="text-center h6">771</td>
                                                <td class="text-center h6">1841</td>
                                                <td class="text-center h6">109</td>
                                                <td class="text-center h6">103</td>
                                                <td class="text-center h6">1</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">213</td>
                                                <td class="text-center h6">
                                                    2054 </td>




                                            </tr>





                                            <tr class="5">
                                                <td class="text-center h5">
                                                    2 </td>
                                                <td class="h5"> Tonnes</td>
                                                <td class="text-center h6">363</td>
                                                <td class="text-center h6">15699</td>
                                                <td class="text-center h6">431</td>
                                                <td class="text-center h6">8763</td>
                                                <td class="text-center h6">25256</td>
                                                <td class="text-center h6">3272</td>
                                                <td class="text-center h6">3080</td>
                                                <td class="text-center h6">24</td>
                                                <td class="text-center h6">0</td>
                                                <td class="text-center h6">6376</td>
                                                <td class="text-center h6">
                                                    31632 </td>




                                            </tr>





                                            <tr>
                                                <td class="text-center">

                                                </td>
                                                <td class="text-bold">
                                                    Total (in Tonnes)
                                                </td>
                                                <td class="text-center text-bold">
                                                    363 </td>
                                                <td class="text-center text-bold">
                                                    1201904 </td>
                                                <td class="text-center text-bold">
                                                    152132 </td>
                                                <td class="text-center text-bold">
                                                    2202699 </td>
                                                <td class="text-center text-bold">
                                                    3557098 </td>
                                                <td class="text-center text-bold">
                                                    54831 </td>
                                                <td class="text-center text-bold">
                                                    9983 </td>
                                                <td class="text-center text-bold">
                                                    7912 </td>
                                                <td class="text-center text-bold">
                                                    0 </td>
                                                <td class="text-center text-bold">
                                                    72726 </td>
                                                <td class="text-center text-bold">
                                                    3629824 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-md-4 pull-right">
                                        <div class="form-group">
                                            <label class="text-light-blue">Remarks</label><span class="asterisk text-red">
                                            </span><label>
                                            </label>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--
        </form> --}}

        </section>
        <!--  -->
    </div>
    <!-- /.content-wrapper -->

    <!-- MODAL -->
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('backend/js/port.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentYearElement = document.getElementById('currentYear');
            const monthItems = document.querySelectorAll('.month-item');
            const dropdownToggle = document.getElementById('monthYearDropdown');
            let currentYear = new Date().getFullYear();
            
            function updateYearDisplay() {
                currentYearElement.textContent = `Year ${currentYear}`;
            }
            
            document.getElementById('prevYear').addEventListener('click', function() {
                currentYear--;
                updateYearDisplay();
            });
            
            document.getElementById('nextYear').addEventListener('click', function() {
                currentYear++;
                updateYearDisplay();
            });
            
            monthItems.forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelector('.month-item.active')?.classList.remove('active');
                    this.classList.add('active');
                    const selectedMonth = this.getAttribute('data-month');
                    const selectedYear = currentYear;
                    dropdownToggle.textContent = `${this.textContent} ${selectedYear}`;
                    // You can perform further actions with selectedMonth and selectedYear, e.g., send to server via AJAX
                });
            });
            
            updateYearDisplay();
        });
    </script>
    
@endsection
