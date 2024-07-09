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
                        <h1>Edit & Submit Drafted Data For Approval</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit & Submit Drafted Data For Approval</li>
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
                        <h3 class="card-title">Edit & Submit Drafted Data For Approval</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <div class="row p-2">
                            @php
                                // Port Category
                                $portCat = \App\Models\PortCategory::where('id', $getData->port_type)
                                    ->select('category_name')
                                    ->first();

                                // State ID
                                $portState = \App\Models\State::where('id', $getData->state_id)
                                    ->select('name')
                                    ->first();

                                // State Board ID
                                $portStateBoard = \App\Models\StateBoard::where('id', $getData->state_board)
                                    ->select('name')
                                    ->first();

                                // Port Category
                                $port = \App\Models\Port::where('id', $getData->port_id)
                                    ->select('port_name')
                                    ->first();
                            @endphp
                            <div class="col-md-2">
                                <p>
                                    <strong>State Name :</strong> {{ $portState ? $portState->name : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>
                                    <strong>State Board :</strong> {{ $portStateBoard ? $portStateBoard->name : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>
                                    <strong>Port Type :</strong> {{ $portCat ? $portCat->category_name : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>
                                    <strong>Port Name :</strong> {{ $port ? $port->port_name : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>
                                    <strong>Month & Year :</strong>
                                    {{ date('F', mktime(0, 0, 0, $getData->select_month, 10)) ?? 'N/A' }} -
                                    {{ $getData->select_year ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                @php
                                    if ($getData->status == 1) {
                                        $statusText = 'Approved';
                                    } elseif ($getData->status == 2) {
                                        $statusText = 'Drafted Data For Approval';
                                    } elseif ($getData->status == 3) {
                                        $statusText = 'Drafted';
                                    } else {
                                        $statusText = 'N/A';
                                    }
                                @endphp
                                <p>
                                    <strong>Status:</strong> {{ $statusText }}
                                </p>
                            </div>                            
                        </div>

                        <div class="box-body table-responsive">
                            <form method="POST" action="{{ route('update-drafted-data') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- state_id --}}
                                <input type="hidden" name="state_id" value="{{ $getData->state_id }}"
                                    placeholder="state_id" readonly>
                                {{-- port_type --}}
                                <input type="hidden" name="port_type" value="{{ $getData->port_type }}"
                                    placeholder="port_type" readonly>
                                {{-- state_board --}}
                                <input type="hidden" name="state_board" value="{{ $getData->state_board }}"
                                    placeholder="state_board" readonly>
                                {{-- port_id --}}
                                <input type="hidden" name="port_id" value="{{ $getData->port_id }}" placeholder="port_id"
                                    readonly>
                                {{-- Select Year --}}
                                <input type="hidden" name="select_year" value="{{ $getData->select_year }}"
                                    placeholder="select_year" readonly>
                                {{-- Select Month --}}
                                <input type="hidden" name="select_month" value="{{ $getData->select_month }}"
                                    placeholder="select_month" readonly>
                                {{-- created_by --}}
                                <input type="hidden" name="updated_by" value="{{ Auth::user()->id }}"
                                    placeholder="updated_by" readonly>

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
                                            <th style="text-align: center">IF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">FF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">IF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">FF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">IF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">FF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">IF<span class="asteriskLine text-red">*</span>
                                            </th>
                                            <th style="text-align: center">FF<span class="asteriskLine text-red">*</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="records">
                                        @foreach ($commodityArr as $commodityData)
                                            @foreach ($commodityData['sub'] as $subKey => $subCommodity)
                                                @php
                                                    $mainSub = \App\Models\Commodities::where(
                                                        'parent_id',
                                                        $subCommodity['sub']['id'],
                                                    )
                                                        ->whereRaw('FIND_IN_SET(?, port_id)', [$port_id])
                                                        ->count();
                                                    $azRange = range('A', 'Z');
                                                    // Ensure $subKey is within the valid range for letters
                                                    $letter = $azRange[$subKey % 26];
                                                @endphp
                                                @if ($mainSub > 0)
                                                    <tr class="1">
                                                        <td class="text-center text-bold h4">
                                                            {{ $letter }} </td>
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
                                                    @if (isset($subCommodity['innersub']) && !empty($subCommodity['innersub']))
                                                        @foreach ($subCommodity['innersub'] as $innerKey => $innerSubData)
                                                            @if (isset($innerSubData['innermostsub']) && empty($innerSubData['innermostsub']))
                                                                @php
                                                                    $innerSub = \App\Models\Commodities::where(
                                                                        'id',
                                                                        $innerSubData['innersub']['id'],
                                                                    )
                                                                        ->whereRaw('FIND_IN_SET(?, port_id)', [
                                                                            $port_id,
                                                                        ])
                                                                        ->count();
                                                                    // Ensure $innerKey is within the valid range for letters
                                                                    $azRange = range('a', 'z');
                                                                    $letter = $azRange[$innerKey % 26];
                                                                @endphp
                                                                @if ($innerSub > 0)
                                                                    <tr class="1.2">
                                                                        <td class="text-center h5">
                                                                            {{ ++$innerKey }}
                                                                        </td>

                                                                        <td class="h5">
                                                                            {{ $innerSubData['innersub']['name'] }}
                                                                            <br />
                                                                            {{-- commodity_id --}}
                                                                            <input type="hidden" name="commodity_id[]"
                                                                                value="{{ $innerSubData['innersub']['id'] }}"
                                                                                placeholder="commodity_id" readonly>

                                                                        </td>

                                                                        <td class="text-center">
                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="ov_ul_if[]"
                                                                                        class="form-control @error('ov_ul_if.' . $innerKey) is-invalid @enderror numeric_input ov_ul_if"
                                                                                        placeholder="O_U_IF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['ov_ul_if'] ?? 0 }}"
                                                                                        id="ov_ul_if_{{ $innerKey }}">
                                                                                    @error('ov_ul_if.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="ov_ul_ff[]"
                                                                                        class="form-control @error('ov_ul_ff.' . $innerKey) is-invalid @enderror numeric_input ov_ul_ff"
                                                                                        placeholder="O_U_FF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['ov_ul_ff'] ?? 0 }}"
                                                                                        id="ov_ul_ff_{{ $innerKey }}">
                                                                                    @error('ov_ul_ff.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text" name="ov_l_if[]"
                                                                                        class="form-control @error('ov_l_if.' . $innerKey) is-invalid @enderror numeric_input ov_l_if"
                                                                                        placeholder="O_L_IF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['ov_l_if'] ?? 0 }}"
                                                                                        id="ov_l_if_{{ $innerKey }}">
                                                                                    @error('ov_l_if.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text" name="ov_l_ff[]"
                                                                                        class="form-control @error('ov_l_ff.' . $innerKey) is-invalid @enderror numeric_input ov_l_ff"
                                                                                        placeholder="O_L_FF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['ov_l_ff'] ?? 0 }}"
                                                                                        id="ov_l_ff_{{ $innerKey }}">
                                                                                    @error('ov_l_ff.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="ov_total[]"
                                                                                        class="form-control @error('ov_total.' . $innerKey) is-invalid @enderror numeric_input ov_total"
                                                                                        placeholder="O_Total"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['ov_total'] ?? 0 }}"
                                                                                        id="ov_total_{{ $innerKey }}"
                                                                                        readonly>
                                                                                    @error('ov_total.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group ">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="co_ul_if[]"
                                                                                        class="form-control @error('co_ul_if.' . $innerKey) is-invalid @enderror numeric_input co_ul_if"
                                                                                        placeholder="C_U_IF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['co_ul_if'] ?? 0 }}"
                                                                                        id="co_ul_if_{{ $innerKey }}">
                                                                                    @error('co_ul_if.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="co_ul_ff[]"
                                                                                        class="form-control @error('co_ul_ff.' . $innerKey) is-invalid @enderror numeric_input co_ul_ff"
                                                                                        placeholder="C_U_FF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['co_ul_ff'] ?? 0 }}"
                                                                                        id="co_ul_ff_{{ $innerKey }}">
                                                                                    @error('co_ul_ff.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text" name="co_l_if[]"
                                                                                        class="form-control @error('co_l_if.' . $innerKey) is-invalid @enderror numeric_input co_l_if"
                                                                                        placeholder="C_L_IF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['co_l_if'] ?? 0 }}"
                                                                                        id="co_l_if_{{ $innerKey }}">
                                                                                    @error('co_l_if.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td class="text-center">

                                                                            <div class="form-group ">
                                                                                <div class="">
                                                                                    <input type="text" name="co_l_ff[]"
                                                                                        class="form-control @error('co_l_ff.' . $innerKey) is-invalid @enderror numeric_input co_l_ff"
                                                                                        placeholder="C_L_FF"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['co_l_ff'] ?? 0 }}"
                                                                                        id="co_l_ff_{{ $innerKey }}">
                                                                                    @error('co_l_ff.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </td>

                                                                        <td class="text-center">

                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="co_total[]"
                                                                                        class="form-control @error('co_total.' . $innerKey) is-invalid @enderror numeric_input co_total"
                                                                                        placeholder="C_Total"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['co_total'] ?? 0 }}"
                                                                                        id="co_total_{{ $innerKey }}"
                                                                                        readonly>
                                                                                    @error('co_total.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </td>

                                                                        <td class="text-center h6">

                                                                            <div class="form-group ">
                                                                                <div class="input text required"
                                                                                    aria-required="true">
                                                                                    <input type="text"
                                                                                        name="grand_total[]"
                                                                                        class="form-control @error('grand_total.' . $innerKey) is-invalid @enderror numeric_input grand_total"
                                                                                        placeholder="Grand_Total"
                                                                                        value="{{ $innerSubData['draftDatainnerSubCommodity'][0]['grand_total'] ?? 0 }}"
                                                                                        id="grand_total_{{ $innerKey }}"
                                                                                        readonly>
                                                                                    @error('grand_total.' . $innerKey)
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endif

                                                            @if (isset($innerSubData['innermostsub']) && !empty($innerSubData['innermostsub']))
                                                                @php
                                                                    $innerMostSubHeading = \App\Models\Commodities::where(
                                                                        'parent_id',
                                                                        $innerSubData['innersub']['id'],
                                                                    )
                                                                        ->whereRaw('FIND_IN_SET(?, port_id)', [
                                                                            $port_id,
                                                                        ])
                                                                        ->count();
                                                                @endphp

                                                                @if ($innerMostSubHeading > 0)
                                                                    <tr class="2">
                                                                        <td class="text-center h5">
                                                                            (a)
                                                                        </td>
                                                                        <td class="h5">
                                                                            {{ $innerSubData['innersub']['name'] }}</td>

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
                                                            @if (isset($innerSubData['innermostsub']) && !empty($innerSubData['innermostsub']))
                                                                @foreach ($innerSubData['innermostsub'] as $key => $innermostsub)
                                                                    @php
                                                                        $innerMostSub = \App\Models\Commodities::where(
                                                                            'id',
                                                                            $innermostsub['id'],
                                                                        )
                                                                            ->whereRaw('FIND_IN_SET(?, port_id)', [
                                                                                $port_id,
                                                                            ])
                                                                            ->count();
                                                                        // Ensure $key is within the valid range for letters
                                                                        $azRange = range('a', 'z');
                                                                        $letter = $azRange[$key % 26];
                                                                    @endphp

                                                                    @if ($innerMostSub > 0)
                                                                        <tr class="2.2">
                                                                            <td class="text-right h6">
                                                                                ({{ $letter }})
                                                                            </td>
                                                                            <td class="h6">
                                                                                {{ $innermostsub['name'] }}
                                                                                <br />
                                                                                {{-- commodity_id --}}
                                                                                <input type="hidden"
                                                                                    name="commodity_id[]"
                                                                                    value="{{ $innermostsub['id'] }}"
                                                                                    placeholder="commodity_id" readonly>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <div class="form-group">
                                                                                    <div class=""
                                                                                        aria-required="true">

                                                                                        <input type="text"
                                                                                            name="ov_ul_if[]"
                                                                                            class="form-control @error('ov_ul_if.' . $key) is-invalid @enderror numeric_input ov_ul_if"
                                                                                            placeholder="O_U_IF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['ov_ul_if'] ?? 0 }}"
                                                                                            id="ov_ul_if_{{ $key }}">
                                                                                        @error('ov_ul_if.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="ov_ul_ff[]"
                                                                                            class="form-control @error('ov_ul_ff.' . $key) is-invalid @enderror numeric_input ov_ul_ff"
                                                                                            placeholder="O_U_FF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['ov_ul_ff'] ?? 0 }}"
                                                                                            id="ov_ul_ff_{{ $key }}">
                                                                                        @error('ov_ul_ff.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="ov_l_if[]"
                                                                                            class="form-control @error('ov_l_if.' . $key) is-invalid @enderror numeric_input ov_l_if"
                                                                                            placeholder="O_L_IF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['ov_l_if'] ?? 0 }}"
                                                                                            id="ov_l_if_{{ $key }}">
                                                                                        @error('ov_l_if.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="ov_l_ff[]"
                                                                                            class="form-control @error('ov_l_ff.' . $key) is-invalid @enderror numeric_input ov_l_ff"
                                                                                            placeholder="O_L_FF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['ov_l_ff'] ?? 0 }}"
                                                                                            id="ov_l_ff_{{ $key }}">
                                                                                        @error('ov_l_ff.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="ov_total[]"
                                                                                            class="form-control @error('ov_total.' . $key) is-invalid @enderror numeric_input ov_total"
                                                                                            placeholder="O_Total"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['ov_total'] ?? 0 }}"
                                                                                            id="ov_total_{{ $key }}"
                                                                                            readonly>
                                                                                        @error('ov_total.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group ">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="co_ul_if[]"
                                                                                            class="form-control @error('co_ul_if.' . $key) is-invalid @enderror numeric_input co_ul_if"
                                                                                            placeholder="C_U_IF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['co_ul_if'] ?? 0 }}"
                                                                                            id="co_ul_if_{{ $key }}">
                                                                                        @error('co_ul_if.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="co_ul_ff[]"
                                                                                            class="form-control @error('co_ul_ff.' . $key) is-invalid @enderror numeric_input co_ul_ff"
                                                                                            placeholder="C_U_FF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['co_ul_ff'] ?? 0 }}"
                                                                                            id="co_ul_ff_{{ $key }}">
                                                                                        @error('co_ul_ff.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="co_l_if[]"
                                                                                            class="form-control @error('co_l_if.' . $key) is-invalid @enderror numeric_input co_l_if"
                                                                                            placeholder="C_L_IF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['co_l_if'] ?? 0 }}"
                                                                                            id="co_l_if_{{ $key }}">
                                                                                        @error('co_l_if.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                            <td class="text-center">

                                                                                <div class="form-group ">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="co_l_ff[]"
                                                                                            class="form-control @error('co_l_ff.' . $key) is-invalid @enderror numeric_input co_l_ff"
                                                                                            placeholder="C_L_FF"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['co_l_ff'] ?? 0 }}"
                                                                                            id="co_l_ff_{{ $key }}">
                                                                                        @error('co_l_ff.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </td>

                                                                            <td class="text-center">

                                                                                <div class="form-group">
                                                                                    <div class="">
                                                                                        <input type="text"
                                                                                            name="co_total[]"
                                                                                            class="form-control @error('co_total.' . $key) is-invalid @enderror numeric_input co_total"
                                                                                            placeholder="C_Total"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['co_total'] ?? 0 }}"
                                                                                            id="co_total_{{ $key }}"
                                                                                            readonly>
                                                                                        @error('co_total.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </td>

                                                                            <td class="text-center h6">

                                                                                <div class="form-group ">
                                                                                    <div class="input text required"
                                                                                        aria-required="true">
                                                                                        <input type="text"
                                                                                            name="grand_total[]"
                                                                                            class="form-control @error('grand_total.' . $key) is-invalid @enderror numeric_input grand_total"
                                                                                            placeholder="Grand_Total"
                                                                                            value="{{ $innerSubData['draftDatainnermostsub'][$key][0]['grand_total'] ?? 0 }}"
                                                                                            id="grand_total_{{ $key }}"
                                                                                            readonly>
                                                                                        @error('grand_total.' . $key)
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
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
                                            <label>Words Left : </label><span class="text-red safe"
                                                id="counter1">50</span>
                                        </div><label>

                                            <div class="">
                                                <textarea name="comm_remarks" class="form-control" cols="30" rows="6" id="comm_remarks"
                                                    value="{{ $getData->comm_remarks }}">{{ $getData->comm_remarks }}</textarea>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex pb-2 justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"
                                        id="">Add
                                        Records</button>
                                </div>
                            </form>
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
    <script>
        $(document).ready(function() {
            // Function to calculate the total for each row
            function calcRowTotal($fields, $total) {
                var result = 0;
                $fields.each(function() {
                    var val = parseInt($(this).val(), 10) || 0;
                    result += val;
                });
                if (!isNaN(result)) {
                    $total.val(result);
                }
            }

            // Function to calculate the grand total for each row
            function calcGrandTotal($row) {
                var ov_total = parseInt($row.find('.ov_total').val(), 10) || 0;
                var co_total = parseInt($row.find('.co_total').val(), 10) || 0;
                var grand_total = ov_total + co_total;
                $row.find('.grand_total').val(grand_total);
            }

            // Attach events to input fields
            $(document).on("keydown keyup", '.numeric_input', function() {
                var $row = $(this).closest('tr');

                // Calculate ov_total
                var $ovFields = $row.find('.ov_ul_if, .ov_ul_ff, .ov_l_if, .ov_l_ff');
                calcRowTotal($ovFields, $row.find('.ov_total'));

                // Calculate co_total
                var $coFields = $row.find('.co_ul_if, .co_ul_ff, .co_l_if, .co_l_ff');
                calcRowTotal($coFields, $row.find('.co_total'));

                // Calculate grand total
                calcGrandTotal($row);
            });

            // Ensure only numeric input is allowed
            $(document).on('keyup blur', '.numeric_input', function() {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            // Initial calculation for existing rows
            $('tr').each(function() {
                var $row = $(this);

                // Calculate ov_total
                var $ovFields = $row.find('.ov_ul_if, .ov_ul_ff, .ov_l_if, .ov_l_ff');
                calcRowTotal($ovFields, $row.find('.ov_total'));

                // Calculate co_total
                var $coFields = $row.find('.co_ul_if, .co_ul_ff, .co_l_if, .co_l_ff');
                calcRowTotal($coFields, $row.find('.co_total'));

                // Calculate grand total
                calcGrandTotal($row);
            });
        });
    </script>
@endsection
