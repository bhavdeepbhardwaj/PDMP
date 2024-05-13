@extends('layouts.master')

@section('css')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Major-Nom Major Ports and Capacities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Major-Nom Major Ports and Capacities</li>
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
                        <h3 class="card-title">Major-Nom Major Ports and Capacities</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">View Approved Data For</h3>

                            </div><!-- /.box-header -->
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <th>Report:</th>
                                                <td>M1</td>

                                                <th>Port Type:</th>
                                                <td>MORMUGAO PORT AUTHORITY</td>

                                                <th>State Board</th>
                                                <td>MORMUGAO PORT AUTHORITY</td>

                                                <th>Port Name:</th>
                                                <td>MORMUGAO PORT AUTHORITY</td>

                                                <th>Month &amp; Year:</th>
                                                <td>Apr-2017</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <label class="text-light-blue">Remarks</label><span
                                                    class="asterisk text-red"> </span><label>
                                                </label>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <a href="/pdmp/commodities_data/approved_data_overview"><button type="goBack"
                                                class="btn btn-primary">Back</button></a>

                                    </center>
                                </div>
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-blue">
                                    <tr>
                                        <th width="4%" rowspan="3">S.No.</th>
                                        <th style="text-align: center" rowspan="3">Commodity</th>
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
                                        <th style="text-align: center">IF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">FF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">IF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">FF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">IF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">FF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">IF<span class="asteriskLine text-red">*</span></th>
                                        <th style="text-align: center">FF<span class="asteriskLine text-red">*</span></th>
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <tr class="2">
                                        <td class="text-center text-bold h4">
                                            A </td>
                                        <td class="text-bold h4"> Liquid Bulk</td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                    </tr>

                                    <tr class="2">
                                        <td class="text-center h5">
                                            1 </td>
                                        <td class="h5"> POL-Crude</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][0][commodity_id]"
                                                value="7" id="CommoditiesData0CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][ov_ul_if]"
                                                        class="form-control section1" rel="1" required="required"
                                                        number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0OvUlIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][ov_ul_ff]"
                                                        class="form-control section1" rel="1" required="required"
                                                        number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0OvUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][ov_l_if]"
                                                        class="form-control section1" rel="1" required="required"
                                                        number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0OvLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][ov_l_ff]"
                                                        class="form-control section1" rel="1" required="required"
                                                        number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0OvLFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][ov_total]"
                                                        class="form-control total-section1" rel="1"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0OvTotal" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][co_ul_if]"
                                                        class="form-control section2" rel="1" required="required"
                                                        number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0CoUlIf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][co_ul_ff]"
                                                        class="form-control section2" rel="1" required="required"
                                                        number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0CoUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][co_l_if]"
                                                        class="form-control section2" rel="1" required="required"
                                                        number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0CoLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][co_l_ff]"
                                                        class="form-control section2" rel="1" required="required"
                                                        number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0CoLFf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][co_total]"
                                                        class="form-control total-section2" rel="1"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0CoTotal" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][0][grand_total]"
                                                        class="form-control grand-total" rel="1"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData0GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][0][state_board_id]"
                                                id="CommoditiesData0StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][0][port_board_id]"
                                                value="10" id="CommoditiesData0PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][0][created_by_user_id]" value="60"
                                                id="CommoditiesData0CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][0][data_table_type_id]" value="1"
                                                id="CommoditiesData0DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="2">
                                        <td class="text-center h5">
                                            2 </td>
                                        <td class="h5"> POL-Products</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][1][commodity_id]"
                                                value="8" id="CommoditiesData1CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][ov_ul_if]"
                                                        class="form-control section1" rel="2" required="required"
                                                        number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1OvUlIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][ov_ul_ff]"
                                                        class="form-control section1" rel="2" required="required"
                                                        number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1OvUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][ov_l_if]"
                                                        class="form-control section1" rel="2" required="required"
                                                        number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1OvLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][ov_l_ff]"
                                                        class="form-control section1" rel="2" required="required"
                                                        number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1OvLFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][ov_total]"
                                                        class="form-control total-section1" rel="2"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1OvTotal" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][co_ul_if]"
                                                        class="form-control section2" rel="2" required="required"
                                                        number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1CoUlIf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][co_ul_ff]"
                                                        class="form-control section2" rel="2" required="required"
                                                        number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1CoUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][co_l_if]"
                                                        class="form-control section2" rel="2" required="required"
                                                        number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1CoLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][co_l_ff]"
                                                        class="form-control section2" rel="2" required="required"
                                                        number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1CoLFf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][co_total]"
                                                        class="form-control total-section2" rel="2"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1CoTotal" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][1][grand_total]"
                                                        class="form-control grand-total" rel="2"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData1GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][1][state_board_id]"
                                                id="CommoditiesData1StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][1][port_board_id]"
                                                value="10" id="CommoditiesData1PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][1][created_by_user_id]" value="60"
                                                id="CommoditiesData1CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][1][data_table_type_id]" value="1"
                                                id="CommoditiesData1DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="2">
                                        <td class="text-center h5">
                                            3 </td>
                                        <td class="h5"> Edible Oil</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][2][commodity_id]"
                                                value="10" id="CommoditiesData2CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][ov_ul_if]"
                                                        class="form-control section1" rel="3" required="required"
                                                        number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2OvUlIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][ov_ul_ff]"
                                                        class="form-control section1" rel="3" required="required"
                                                        number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2OvUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][ov_l_if]"
                                                        class="form-control section1" rel="3" required="required"
                                                        number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2OvLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][ov_l_ff]"
                                                        class="form-control section1" rel="3" required="required"
                                                        number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2OvLFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][ov_total]"
                                                        class="form-control total-section1" rel="3"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2OvTotal" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][co_ul_if]"
                                                        class="form-control section2" rel="3" required="required"
                                                        number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2CoUlIf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][co_ul_ff]"
                                                        class="form-control section2" rel="3" required="required"
                                                        number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2CoUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][co_l_if]"
                                                        class="form-control section2" rel="3" required="required"
                                                        number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2CoLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][co_l_ff]"
                                                        class="form-control section2" rel="3" required="required"
                                                        number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2CoLFf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][co_total]"
                                                        class="form-control total-section2" rel="3"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2CoTotal" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][2][grand_total]"
                                                        class="form-control grand-total" rel="3"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData2GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][2][state_board_id]"
                                                id="CommoditiesData2StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][2][port_board_id]"
                                                value="10" id="CommoditiesData2PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][2][created_by_user_id]" value="60"
                                                id="CommoditiesData2CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][2][data_table_type_id]" value="1"
                                                id="CommoditiesData2DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="2">
                                        <td class="text-center h5">
                                            4 </td>
                                        <td class="h5"> FRM-Liquid</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][3][commodity_id]"
                                                value="11" id="CommoditiesData3CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][ov_ul_if]"
                                                        class="form-control section1" rel="4" required="required"
                                                        number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3OvUlIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][ov_ul_ff]"
                                                        class="form-control section1" rel="4" required="required"
                                                        number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3OvUlFf" aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][ov_l_if]"
                                                        class="form-control section1" rel="4" required="required"
                                                        number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3OvLIf" aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][ov_l_ff]"
                                                        class="form-control section1" rel="4"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3OvLFf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][ov_total]"
                                                        class="form-control total-section1" rel="4"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3OvTotal"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][co_ul_if]"
                                                        class="form-control section2" rel="4"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3CoUlIf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][co_ul_ff]"
                                                        class="form-control section2" rel="4"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3CoUlFf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][co_l_if]"
                                                        class="form-control section2" rel="4"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3CoLIf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][co_l_ff]"
                                                        class="form-control section2" rel="4"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3CoLFf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][co_total]"
                                                        class="form-control total-section2" rel="4"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3CoTotal"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][3][grand_total]"
                                                        class="form-control grand-total" rel="4"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData3GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][3][state_board_id]"
                                                id="CommoditiesData3StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][3][port_board_id]"
                                                value="10" id="CommoditiesData3PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][3][created_by_user_id]" value="60"
                                                id="CommoditiesData3CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][3][data_table_type_id]" value="1"
                                                id="CommoditiesData3DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="2">
                                        <td class="text-center h5">
                                            5 </td>
                                        <td class="h5"> Other Liquids</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][4][commodity_id]"
                                                value="25" id="CommoditiesData4CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][ov_ul_if]"
                                                        class="form-control section1" rel="5"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4OvUlIf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][ov_ul_ff]"
                                                        class="form-control section1" rel="5"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4OvUlFf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][ov_l_if]"
                                                        class="form-control section1" rel="5"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4OvLIf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][ov_l_ff]"
                                                        class="form-control section1" rel="5"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4OvLFf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][ov_total]"
                                                        class="form-control total-section1" rel="5"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4OvTotal"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][co_ul_if]"
                                                        class="form-control section2" rel="5"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4CoUlIf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][co_ul_ff]"
                                                        class="form-control section2" rel="5"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4CoUlFf"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][co_l_if]"
                                                        class="form-control section2" rel="5"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4CoLIf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][co_l_ff]"
                                                        class="form-control section2" rel="5"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4CoLFf"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][co_total]"
                                                        class="form-control total-section2" rel="5"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4CoTotal"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][4][grand_total]"
                                                        class="form-control grand-total" rel="5"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData4GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][4][state_board_id]"
                                                id="CommoditiesData4StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][4][port_board_id]"
                                                value="10" id="CommoditiesData4PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][4][created_by_user_id]" value="60"
                                                id="CommoditiesData4CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][4][data_table_type_id]" value="1"
                                                id="CommoditiesData4DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center text-bold h4">
                                            B </td>
                                        <td class="text-bold h4"> Dry Bulk</td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            1 </td>
                                        <td class="h5"> Iron Ore All</td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-right h6">
                                            (a) </td>
                                        <td class="h6"> Pellets</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][5][commodity_id]"
                                                value="14" id="CommoditiesData5CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][ov_ul_if]"
                                                        class="form-control section1" rel="6"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][ov_ul_ff]"
                                                        class="form-control section1" rel="6"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][ov_l_if]"
                                                        class="form-control section1" rel="6"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][ov_l_ff]"
                                                        class="form-control section1" rel="6"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][ov_total]"
                                                        class="form-control total-section1" rel="6"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][co_ul_if]"
                                                        class="form-control section2" rel="6"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][co_ul_ff]"
                                                        class="form-control section2" rel="6"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][co_l_if]"
                                                        class="form-control section2" rel="6"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][co_l_ff]"
                                                        class="form-control section2" rel="6"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][co_total]"
                                                        class="form-control total-section2" rel="6"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][5][grand_total]"
                                                        class="form-control grand-total" rel="6"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData5GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][5][state_board_id]"
                                                id="CommoditiesData5StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][5][port_board_id]"
                                                value="10" id="CommoditiesData5PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][5][created_by_user_id]" value="60"
                                                id="CommoditiesData5CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][5][data_table_type_id]" value="1"
                                                id="CommoditiesData5DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-right h6">
                                            (b) </td>
                                        <td class="h6"> Fine</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][6][commodity_id]"
                                                value="15" id="CommoditiesData6CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][ov_ul_if]"
                                                        class="form-control section1" rel="7"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][ov_ul_ff]"
                                                        class="form-control section1" rel="7"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][ov_l_if]"
                                                        class="form-control section1" rel="7"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][ov_l_ff]"
                                                        class="form-control section1" rel="7"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][ov_total]"
                                                        class="form-control total-section1" rel="7"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][co_ul_if]"
                                                        class="form-control section2" rel="7"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][co_ul_ff]"
                                                        class="form-control section2" rel="7"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][co_l_if]"
                                                        class="form-control section2" rel="7"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][co_l_ff]"
                                                        class="form-control section2" rel="7"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][co_total]"
                                                        class="form-control total-section2" rel="7"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][6][grand_total]"
                                                        class="form-control grand-total" rel="7"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData6GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][6][state_board_id]"
                                                id="CommoditiesData6StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][6][port_board_id]"
                                                value="10" id="CommoditiesData6PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][6][created_by_user_id]" value="60"
                                                id="CommoditiesData6CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][6][data_table_type_id]" value="1"
                                                id="CommoditiesData6DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            2 </td>
                                        <td class="h5"> Other Ores</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][7][commodity_id]"
                                                value="16" id="CommoditiesData7CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][ov_ul_if]"
                                                        class="form-control section1" rel="8"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][ov_ul_ff]"
                                                        class="form-control section1" rel="8"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][ov_l_if]"
                                                        class="form-control section1" rel="8"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][ov_l_ff]"
                                                        class="form-control section1" rel="8"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][ov_total]"
                                                        class="form-control total-section1" rel="8"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][co_ul_if]"
                                                        class="form-control section2" rel="8"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][co_ul_ff]"
                                                        class="form-control section2" rel="8"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][co_l_if]"
                                                        class="form-control section2" rel="8"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][co_l_ff]"
                                                        class="form-control section2" rel="8"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][co_total]"
                                                        class="form-control total-section2" rel="8"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][7][grand_total]"
                                                        class="form-control grand-total" rel="8"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData7GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][7][state_board_id]"
                                                id="CommoditiesData7StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][7][port_board_id]"
                                                value="10" id="CommoditiesData7PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][7][created_by_user_id]" value="60"
                                                id="CommoditiesData7CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][7][data_table_type_id]" value="1"
                                                id="CommoditiesData7DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            3 </td>
                                        <td class="h5"> Thermal Coal</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][8][commodity_id]"
                                                value="17" id="CommoditiesData8CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][ov_ul_if]"
                                                        class="form-control section1" rel="9"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][ov_ul_ff]"
                                                        class="form-control section1" rel="9"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][ov_l_if]"
                                                        class="form-control section1" rel="9"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][ov_l_ff]"
                                                        class="form-control section1" rel="9"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][ov_total]"
                                                        class="form-control total-section1" rel="9"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][co_ul_if]"
                                                        class="form-control section2" rel="9"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][co_ul_ff]"
                                                        class="form-control section2" rel="9"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][co_l_if]"
                                                        class="form-control section2" rel="9"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][co_l_ff]"
                                                        class="form-control section2" rel="9"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][co_total]"
                                                        class="form-control total-section2" rel="9"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][8][grand_total]"
                                                        class="form-control grand-total" rel="9"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData8GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][8][state_board_id]"
                                                id="CommoditiesData8StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][8][port_board_id]"
                                                value="10" id="CommoditiesData8PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][8][created_by_user_id]" value="60"
                                                id="CommoditiesData8CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][8][data_table_type_id]" value="1"
                                                id="CommoditiesData8DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            4 </td>
                                        <td class="h5"> Coking Coal</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][9][commodity_id]"
                                                value="18" id="CommoditiesData9CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][ov_ul_if]"
                                                        class="form-control section1" rel="10"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][ov_ul_ff]"
                                                        class="form-control section1" rel="10"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][ov_l_if]"
                                                        class="form-control section1" rel="10"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][ov_l_ff]"
                                                        class="form-control section1" rel="10"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][ov_total]"
                                                        class="form-control total-section1" rel="10"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][co_ul_if]"
                                                        class="form-control section2" rel="10"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][co_ul_ff]"
                                                        class="form-control section2" rel="10"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][co_l_if]"
                                                        class="form-control section2" rel="10"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][co_l_ff]"
                                                        class="form-control section2" rel="10"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][co_total]"
                                                        class="form-control total-section2" rel="10"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][9][grand_total]"
                                                        class="form-control grand-total" rel="10"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData9GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][9][state_board_id]"
                                                id="CommoditiesData9StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][9][port_board_id]"
                                                value="10" id="CommoditiesData9PortBoardId"> <input type="hidden"
                                                name="data[CommoditiesData][9][created_by_user_id]" value="60"
                                                id="CommoditiesData9CreatedByUserId"> <input type="hidden"
                                                name="data[CommoditiesData][9][data_table_type_id]" value="1"
                                                id="CommoditiesData9DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            5 </td>
                                        <td class="h5"> Fertilizer</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][10][commodity_id]"
                                                value="26" id="CommoditiesData10CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][ov_ul_if]"
                                                        class="form-control section1" rel="11"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][ov_ul_ff]"
                                                        class="form-control section1" rel="11"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][ov_l_if]"
                                                        class="form-control section1" rel="11"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][ov_l_ff]"
                                                        class="form-control section1" rel="11"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][ov_total]"
                                                        class="form-control total-section1" rel="11"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][co_ul_if]"
                                                        class="form-control section2" rel="11"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][co_ul_ff]"
                                                        class="form-control section2" rel="11"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][co_l_if]"
                                                        class="form-control section2" rel="11"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][co_l_ff]"
                                                        class="form-control section2" rel="11"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][co_total]"
                                                        class="form-control total-section2" rel="11"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][10][grand_total]"
                                                        class="form-control grand-total" rel="11"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData10GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][10][state_board_id]"
                                                id="CommoditiesData10StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][10][port_board_id]"
                                                value="10" id="CommoditiesData10PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][10][created_by_user_id]"
                                                value="60" id="CommoditiesData10CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][10][data_table_type_id]"
                                                value="1" id="CommoditiesData10DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            6 </td>
                                        <td class="h5"> Sugar</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][11][commodity_id]"
                                                value="30" id="CommoditiesData11CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][ov_ul_if]"
                                                        class="form-control section1" rel="12"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][ov_ul_ff]"
                                                        class="form-control section1" rel="12"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][ov_l_if]"
                                                        class="form-control section1" rel="12"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][ov_l_ff]"
                                                        class="form-control section1" rel="12"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][ov_total]"
                                                        class="form-control total-section1" rel="12"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][co_ul_if]"
                                                        class="form-control section2" rel="12"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][co_ul_ff]"
                                                        class="form-control section2" rel="12"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][co_l_if]"
                                                        class="form-control section2" rel="12"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][co_l_ff]"
                                                        class="form-control section2" rel="12"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][co_total]"
                                                        class="form-control total-section2" rel="12"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][11][grand_total]"
                                                        class="form-control grand-total" rel="12"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData11GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][11][state_board_id]"
                                                id="CommoditiesData11StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][11][port_board_id]"
                                                value="10" id="CommoditiesData11PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][11][created_by_user_id]"
                                                value="60" id="CommoditiesData11CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][11][data_table_type_id]"
                                                value="1" id="CommoditiesData11DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="3">
                                        <td class="text-center h5">
                                            7 </td>
                                        <td class="h5"> Other Dry Bulk</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][12][commodity_id]"
                                                value="34" id="CommoditiesData12CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][ov_ul_if]"
                                                        class="form-control section1" rel="13"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][ov_ul_ff]"
                                                        class="form-control section1" rel="13"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][ov_l_if]"
                                                        class="form-control section1" rel="13"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][ov_l_ff]"
                                                        class="form-control section1" rel="13"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][ov_total]"
                                                        class="form-control total-section1" rel="13"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][co_ul_if]"
                                                        class="form-control section2" rel="13"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][co_ul_ff]"
                                                        class="form-control section2" rel="13"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][co_l_if]"
                                                        class="form-control section2" rel="13"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][co_l_ff]"
                                                        class="form-control section2" rel="13"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][co_total]"
                                                        class="form-control total-section2" rel="13"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][12][grand_total]"
                                                        class="form-control grand-total" rel="13"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData12GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][12][state_board_id]"
                                                id="CommoditiesData12StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][12][port_board_id]"
                                                value="10" id="CommoditiesData12PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][12][created_by_user_id]"
                                                value="60" id="CommoditiesData12CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][12][data_table_type_id]"
                                                value="1" id="CommoditiesData12DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="4">
                                        <td class="text-center text-bold h4">
                                            C </td>
                                        <td class="text-bold h4"> Break Bulk</td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                    </tr>

                                    <tr class="4">
                                        <td class="text-center h5">
                                            1 </td>
                                        <td class="h5"> Iron and Steel</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][13][commodity_id]"
                                                value="20" id="CommoditiesData13CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][ov_ul_if]"
                                                        class="form-control section1" rel="14"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][ov_ul_ff]"
                                                        class="form-control section1" rel="14"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][ov_l_if]"
                                                        class="form-control section1" rel="14"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][ov_l_ff]"
                                                        class="form-control section1" rel="14"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][ov_total]"
                                                        class="form-control total-section1" rel="14"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][co_ul_if]"
                                                        class="form-control section2" rel="14"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][co_ul_ff]"
                                                        class="form-control section2" rel="14"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][co_l_if]"
                                                        class="form-control section2" rel="14"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][co_l_ff]"
                                                        class="form-control section2" rel="14"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][co_total]"
                                                        class="form-control total-section2" rel="14"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][13][grand_total]"
                                                        class="form-control grand-total" rel="14"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData13GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][13][state_board_id]"
                                                id="CommoditiesData13StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][13][port_board_id]"
                                                value="10" id="CommoditiesData13PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][13][created_by_user_id]"
                                                value="60" id="CommoditiesData13CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][13][data_table_type_id]"
                                                value="1" id="CommoditiesData13DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="4">
                                        <td class="text-center h5">
                                            2 </td>
                                        <td class="h5"> Other Break Bulk</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][14][commodity_id]"
                                                value="43" id="CommoditiesData14CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][ov_ul_if]"
                                                        class="form-control section1" rel="15"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][ov_ul_ff]"
                                                        class="form-control section1" rel="15"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][ov_l_if]"
                                                        class="form-control section1" rel="15"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][ov_l_ff]"
                                                        class="form-control section1" rel="15"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][ov_total]"
                                                        class="form-control total-section1" rel="15"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][co_ul_if]"
                                                        class="form-control section2" rel="15"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][co_ul_ff]"
                                                        class="form-control section2" rel="15"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][co_l_if]"
                                                        class="form-control section2" rel="15"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][co_l_ff]"
                                                        class="form-control section2" rel="15"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][co_total]"
                                                        class="form-control total-section2" rel="15"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][14][grand_total]"
                                                        class="form-control grand-total" rel="15"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData14GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][14][state_board_id]"
                                                id="CommoditiesData14StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][14][port_board_id]"
                                                value="10" id="CommoditiesData14PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][14][created_by_user_id]"
                                                value="60" id="CommoditiesData14CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][14][data_table_type_id]"
                                                value="1" id="CommoditiesData14DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="5">
                                        <td class="text-center text-bold h4">
                                            D </td>
                                        <td class="text-bold h4"> Container</td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">
                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>

                                        <td class="text-center h6">

                                        </td>
                                        <td class="text-center h6">

                                        </td>
                                    </tr>

                                    <tr class="5">
                                        <td class="text-center h5">
                                            1 </td>
                                        <td class="h5"> TEUs</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][15][commodity_id]"
                                                value="22" id="CommoditiesData15CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][ov_ul_if]"
                                                        class="form-control section1" rel="16"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][ov_ul_ff]"
                                                        class="form-control section1" rel="16"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][ov_l_if]"
                                                        class="form-control section1" rel="16"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][ov_l_ff]"
                                                        class="form-control section1" rel="16"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][ov_total]"
                                                        class="form-control total-section1" rel="16"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][co_ul_if]"
                                                        class="form-control section2" rel="16"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][co_ul_ff]"
                                                        class="form-control section2" rel="16"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][co_l_if]"
                                                        class="form-control section2" rel="16"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][co_l_ff]"
                                                        class="form-control section2" rel="16"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][co_total]"
                                                        class="form-control total-section2" rel="16"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][15][grand_total]"
                                                        class="form-control grand-total" rel="16"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData15GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][15][state_board_id]"
                                                id="CommoditiesData15StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][15][port_board_id]"
                                                value="10" id="CommoditiesData15PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][15][created_by_user_id]"
                                                value="60" id="CommoditiesData15CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][15][data_table_type_id]"
                                                value="1" id="CommoditiesData15DataTableTypeId">
                                        </td>
                                    </tr>

                                    <tr class="5">
                                        <td class="text-center h5">
                                            2 </td>
                                        <td class="h5"> Tonnes</td>

                                        <td class="text-center h6">
                                            <input type="hidden" name="data[CommoditiesData][16][commodity_id]"
                                                value="46" id="CommoditiesData16CommodityId">
                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][ov_ul_if]"
                                                        class="form-control section1" rel="17"
                                                        required="required" number="1" placeholder="O_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16OvUlIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][ov_ul_ff]"
                                                        class="form-control section1" rel="17"
                                                        required="required" number="1" placeholder="O_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16OvUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][ov_l_if]"
                                                        class="form-control section1" rel="17"
                                                        required="required" number="1" placeholder="O_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16OvLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][ov_l_ff]"
                                                        class="form-control section1" rel="17"
                                                        required="required" number="1" placeholder="O_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16OvLFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][ov_total]"
                                                        class="form-control total-section1" rel="17"
                                                        required="required" number="1" placeholder="O_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16OvTotal"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][co_ul_if]"
                                                        class="form-control section2" rel="17"
                                                        required="required" number="1" placeholder="C_U_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16CoUlIf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][co_ul_ff]"
                                                        class="form-control section2" rel="17"
                                                        required="required" number="1" placeholder="C_U_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16CoUlFf"
                                                        aria-required="true"></div>
                                            </div>
                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][co_l_if]"
                                                        class="form-control section2" rel="17"
                                                        required="required" number="1" placeholder="C_L_IF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16CoLIf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][co_l_ff]"
                                                        class="form-control section2" rel="17"
                                                        required="required" number="1" placeholder="C_L_FF"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16CoLFf"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>

                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][co_total]"
                                                        class="form-control total-section2" rel="17"
                                                        required="required" number="1" placeholder="C_Total"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16CoTotal"
                                                        aria-required="true"></div>
                                            </div>

                                        </td>
                                        <td class="text-center h6">

                                            <div class="form-group ">
                                                <div class="input text required" aria-required="true"><input
                                                        name="data[CommoditiesData][16][grand_total]"
                                                        class="form-control grand-total" rel="17"
                                                        required="required" number="1" placeholder="Grand"
                                                        readonly="1"
                                                        data-validate="{&quot;messages&quot;:{&quot;number&quot;:&quot;This should be numeric.&quot;},&quot;required&quot;:true,&quot;number&quot;:true}"
                                                        type="text" id="CommoditiesData16GrandTotal"
                                                        aria-required="true"></div>
                                            </div>
                                            <input type="hidden" name="data[CommoditiesData][16][state_board_id]"
                                                id="CommoditiesData16StateBoardId">
                                            <input type="hidden" name="data[CommoditiesData][16][port_board_id]"
                                                value="10" id="CommoditiesData16PortBoardId"> <input
                                                type="hidden" name="data[CommoditiesData][16][created_by_user_id]"
                                                value="60" id="CommoditiesData16CreatedByUserId"> <input
                                                type="hidden" name="data[CommoditiesData][16][data_table_type_id]"
                                                value="1" id="CommoditiesData16DataTableTypeId">
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <div class="col-md-4 pull-right">
                                <div class="form-group ">
                                    <label class="text-light-blue">Enter Any Remarks</label>
                                    <div>
                                        <label>Words Left : </label><span class="text-red safe" id="counter1">50</span>
                                    </div><label>

                                        <div class="input textarea">
                                            <textarea name="data[CommoditiesData][comm_remarks]" alphanumericpunc="1" empty="Enter Remarks"
                                                class="form-control section1" data-validate="[]" cols="30" rows="6"
                                                id="CommoditiesDataCommRemarks"></textarea>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" id="createdBy"
                                    value="{{ Auth::user()->id }}" name="created_by">

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter Name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="role_id">Position / Role</label>
                                        <select class="form-control @error('role_id') is-invalid @enderror"
                                            name="role_id" id="role_id">
                                            <option value=''>---Select--</option>
                                            @foreach ($roleId as $value)
                                                <option value="{{ $value->id }}">{{ $value->role_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="dep_id">Office / Department</label>
                                        <select class="form-control @error('dep_id') is-invalid @enderror"
                                            name="dep_id" id="dep_id">
                                            <option value=''>---Select--</option>
                                            @foreach ($depID as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('dep_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="port_type">Port Type</label>
                                        <select class="form-control" name="port_type" id="port_type">
                                            <option value=''>---Select--</option>
                                            @foreach ($portCatName as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['category_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('port_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group" id="showPortName">
                                        <label for="port_id">Port</label>
                                        <select class="form-control" name="port_id" id="port_id">
                                            <option value=''>---Select--</option>
                                        </select>
                                        @error('port_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="report_to">Report Officer</label>
                                        <select class="form-control" name="report_to" id="report_to">
                                            <option value=''>---Select--</option>
                                            @foreach ($reportList as $key => $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('report_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                            name="status" id="user_status">
                                            <option value=''>---Select--</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="d-flex pb-2 justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                    id="">Add
                                    Records</button>
                            </div>
                        </form>
                    </div>



                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <!-- START ACCORDION & CAROUSEL-->
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                        class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="card" style="width: ;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Special title treatment</h5>
                                                                <p class="card-text">With supporting text below as a
                                                                    natural lead-in to additional content.</p>
                                                                <a href="#" class="btn btn-primary">Go
                                                                    somewhere</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap"
                                                            alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap"
                                                            alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- END ACCORDION & CAROUSEL-->
                            <div class="d-flex pb-2 justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                    id="">Add
                                    Records</button>
                            </div>
                        </form>
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
@endsection
