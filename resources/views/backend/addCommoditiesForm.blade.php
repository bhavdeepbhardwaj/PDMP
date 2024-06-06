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
                        <h1>Add Commodities Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Commodities Form</li>
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
                        <h3 class="card-title">Add Commodities Form</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <div class="box box-primary">
                            <div class="box-header">
                                {{-- <h3 class="box-title">View Approved Data For</h3> --}}

                            </div><!-- /.box-header -->
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                {{-- <th>Report:</th>
                                                <td>M1</td> --}}

                                                <th>Port Type:</th>
                                                <td>{{$userData->port_type}}</td>
        
                                                <th>State Board</th>
                                                <td>{{$userData->state_board}}</td>
        
                                                <th>Port Name:</th>
                                                <td>{{$userData->port_id}}</td>

                                                {{-- <th>Month &amp; Year:</th>
                                                <td>Apr-2017</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
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
                                    @foreach ($commodityArr as $commodityData)
                                    @foreach ($commodityData['sub'] as $subKey => $subCommodity)
                                    @php
                                        $mainSub = \App\Models\Commodities::where('parent_id',$subCommodity['sub']['id'])->whereRaw('FIND_IN_SET(?, port_id)', [$port_id])->count();
                                    @endphp
                                    @if($mainSub > 0)
                                    <tr class="2">
                                        <td class="text-center text-bold h4">
                                            {{++$subKey}} </td>
                                        <td class="text-bold h4"> {{ $subCommodity['sub']['name'] }}</td>
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
                                        <td class="text-center h6"></td>
                                    </tr>
                                    @if(isset($subCommodity['innersub']) && (!empty($subCommodity['innersub'])))
                                    @foreach ($subCommodity['innersub'] as $innerKey => $innerSubData)

                                    @if(isset($innerSubData['innermostsub']) && (empty($innerSubData['innermostsub'])))

                                    @php
                                        $innerSub = \App\Models\Commodities::where('id',$innerSubData['innersub']['id'])->whereRaw('FIND_IN_SET(?, port_id)', [$port_id])->count();
                                    @endphp
                                    @if($innerSub > 0)
                                    <tr class="2">
                                        <td class="text-center h5">
                                            {{++$innerKey}} </td>
                                        
                                        <td class="h5">{{ $innerSubData['innersub']['name'] }}</td>
                                        <td class="text-center h6">
                                            <input type="" name="data[CommoditiesData][0][commodity_id]"
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
                                    @endif
                                    @endif

                                    @if(isset($innerSubData['innermostsub']) && (!empty($innerSubData['innermostsub'])))

                                    @php
                                        $innerMostSubHeading = \App\Models\Commodities::where('parent_id',$innerSubData['innersub']['id'])->whereRaw('FIND_IN_SET(?, port_id)', [$port_id])->count();
                                    @endphp

                                    @if($innerMostSubHeading > 0)
                                    <tr class="3">
                                        <td class="text-center h5">
                                            1 </td>
                                        <td class="h5"> {{$innerSubData['innersub']['name']}}</td>

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
                                        <td class="text-center h6"></td>
                                    </tr>
                                    @endif
                                    @endif
                                    @if(isset($innerSubData['innermostsub']) && (!empty($innerSubData['innermostsub'])))

                                    @foreach($innerSubData['innermostsub'] as $key => $innermostsub)
                                    
                                    @php
                                        $innerMostSub = \App\Models\Commodities::where('id',$innermostsub['id'])->whereRaw('FIND_IN_SET(?, port_id)', [$port_id])->count();
                                    @endphp
                                    @if($innerMostSub > 0)
                                    <tr class="3">
                                        <td class="text-right h6">
                                            {{++$key}} </td>
                                        <td class="h6"> {{$innermostsub['name']}}</td>

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
                                    @endif
                                    @endforeach
                                    @endif

                                    @endforeach
                                    @endif
                                    @endif

                                    @endforeach
                                    @endforeach
                                
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
