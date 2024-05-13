@extends('layouts.master')

@section('css')
{{--  --}}
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
</style>
{{--  --}}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Report Commodities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">View Report Commodities</li>
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
                        <h3 class="card-title">View Report Commodities</h3>
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
@endsection
