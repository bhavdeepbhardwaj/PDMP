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
                                            @php
                                                // Port Category
                                                $portCat = \App\Models\PortCategory::where('id', $userData->port_type)
                                                    ->select('category_name')
                                                    ->first();

                                                // State ID
                                                $portState = \App\Models\State::where('id', $userData->state_id)
                                                    ->select('name')
                                                    ->first();

                                                // State Board ID
                                                $portStateBoard = \App\Models\StateBoard::where(
                                                    'id',
                                                    $userData->state_board,
                                                )
                                                    ->select('name')
                                                    ->first();

                                                // Port Category
                                                $port = \App\Models\Port::where('id', $userData->port_id)
                                                    ->select('port_name')
                                                    ->first();
                                            @endphp
                                            <tr>
                                                <th>State Name:</th>
                                                <td>{{ $portState->name }}</td>

                                                <th>Port Type:</th>
                                                <td>{{ $portCat->category_name }}</td>

                                                <th>State Board</th>
                                                <td>{{ $portStateBoard->name }}</td>

                                                <th>Port Name:</th>
                                                <td>{{ $port->port_name }}</td>

                                                {{-- <th>Month &amp; Year:</th>
                                                <td>Apr-2017</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="box-body table-responsive">
                            <form method="POST" action="{{ route('backend.storeCommodity') }}"
                                enctype="multipart/form-data">
                                @csrf



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
                                                            {{ $letter }} {{ ++$subKey }} </td>
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
                                                                @endphp
                                                                @if ($innerSub > 0)
                                                                    <tr class="1.2">
                                                                        <td class="text-center h5">
                                                                            {{ ++$innerKey }} </td>

                                                                        <td class="h5">
                                                                            {{ $innerSubData['innersub']['name'] }}
                                                                            <br />
                                                                            {{-- commodity_id --}}
                                                                            <input type="" name="commodity_id[]"
                                                                                id="commodity_id"
                                                                                value="{{ $innerSubData['innersub']['id'] }}"
                                                                                placeholder="commodity_id" readonly>
                                                                            {{-- state_id --}}
                                                                            <input type="" name="state_id[]"
                                                                                id="state_id"
                                                                                value="{{ $userData->state_id }}"
                                                                                placeholder="state_id" readonly>
                                                                            {{-- port_type --}}
                                                                            <input type="" name="port_type[]"
                                                                                id="port_type"
                                                                                value="{{ $userData->port_type }}"
                                                                                placeholder="port_type" readonly>
                                                                            {{-- state_board --}}
                                                                            <input type="" name="state_board[]"
                                                                                id="state_board"
                                                                                value="{{ $userData->state_board }}"
                                                                                placeholder="state_board" readonly>
                                                                            {{-- port_id --}}
                                                                            <input type="" name="port_id[]"
                                                                                id="port_id"
                                                                                value="{{ $userData->port_id }}"
                                                                                placeholder="port_id" readonly>
                                                                            {{-- created_by --}}
                                                                            <input type="" name="created_by[]"
                                                                                id="created_by"
                                                                                value="{{ Auth::user()->id }}"
                                                                                placeholder="created_by" readonly>
                                                                        </td>

                                                                        <td class="text-center">
                                                                            <div class="form-group">
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        name="ov_ul_if[]"
                                                                                        class="form-control @error('ov_ul_if.' . $innerKey) is-invalid @enderror numeric_input ov_ul_if"
                                                                                        placeholder="O_U_IF"
                                                                                        value="{{ old('ov_ul_if.' . $innerKey) }}"
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
                                                                                        value="{{ old('ov_ul_ff.' . $innerKey) }}"
                                                                                        id="ov_ul_ff_{{ $innerKey }}">
                                                                                    @error('ov_ul_ff_.' . $innerKey)
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
                                                                                        value="{{ old('ov_l_if.' . $innerKey) }}"
                                                                                        id="ov_l_if_{{ $innerKey }}">
                                                                                    @error('ov_l_if_.' . $innerKey)
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
                                                                                        value="{{ old('ov_l_ff.' . $innerKey) }}"
                                                                                        id="ov_l_ff_{{ $innerKey }}">
                                                                                    @error('ov_l_ff_.' . $innerKey)
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
                                                                                        value="{{ old('ov_total.' . $innerKey) }}"
                                                                                        id="ov_total_{{ $innerKey }}"
                                                                                        readonly>
                                                                                    @error('ov_total_.' . $innerKey)
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
                                                                                        value="{{ old('co_ul_if.' . $innerKey) }}"
                                                                                        id="co_ul_if_{{ $innerKey }}">
                                                                                    @error('co_ul_if_.' . $innerKey)
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
                                                                                        value="{{ old('co_ul_ff.' . $innerKey) }}"
                                                                                        id="co_ul_ff_{{ $innerKey }}">
                                                                                    @error('co_ul_ff_.' . $innerKey)
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
                                                                                        value="{{ old('co_l_if.' . $innerKey) }}"
                                                                                        id="co_l_if_{{ $innerKey }}">
                                                                                    @error('co_l_if_.' . $innerKey)
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
                                                                                        value="{{ old('co_l_ff.' . $innerKey) }}"
                                                                                        id="co_l_ff_{{ $innerKey }}">
                                                                                    @error('co_l_ff_.' . $innerKey)
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
                                                                                        value="{{ old('co_total.' . $innerKey) }}"
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
                                                                                        value="{{ old('grand_total.' . $innerKey) }}"
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
                                                                            1 </td>
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
                                                                    @endphp
                                                                    @if ($innerMostSub > 0)
                                                                        <tr class="2.2">
                                                                            <td class="text-right h6">
                                                                                {{ ++$key }} </td>
                                                                            <td class="h6">
                                                                                {{ $innermostsub['name'] }}
                                                                                <br />
                                                                                {{-- commodity_id --}}
                                                                                <input type=""
                                                                                    name="commodity_id[]"
                                                                                    id="commodity_id"
                                                                                    value="{{ $innermostsub['id'] }}"
                                                                                    placeholder="commodity_id" readonly>
                                                                                {{-- state_id --}}
                                                                                <input type="" name="state_id[]"
                                                                                    id="state_id"
                                                                                    value="{{ $userData->state_id }}"
                                                                                    placeholder="state_id" readonly>
                                                                                {{-- port_type --}}
                                                                                <input type="" name="port_type[]"
                                                                                    id="port_type"
                                                                                    value="{{ $userData->port_type }}"
                                                                                    placeholder="port_type" readonly>
                                                                                {{-- state_board --}}
                                                                                <input type="" name="state_board[]"
                                                                                    id="state_board"
                                                                                    value="{{ $userData->state_board }}"
                                                                                    placeholder="state_board" readonly>
                                                                                {{-- port_id --}}
                                                                                <input type="" name="port_id[]"
                                                                                    id="port_id"
                                                                                    value="{{ $userData->port_id }}"
                                                                                    placeholder="port_id" readonly>
                                                                                {{-- created_by --}}
                                                                                <input type="" name="created_by[]"
                                                                                    id="created_by"
                                                                                    value="{{ Auth::user()->id }}"
                                                                                    placeholder="created_by" readonly>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <div class="form-group">
                                                                                    <div class=""
                                                                                        aria-required="true">
                                                                                        <input type="text"
                                                                                            name="ov_ul_if[]"
                                                                                            class="form-control @error('ov_ul_if.' . $key) is-invalid @enderror numeric_input ov_ul_if"
                                                                                            placeholder="O_U_IF"
                                                                                            value="{{ old('ov_ul_if.' . $innerKey) }}"
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
                                                                                            value="{{ old('ov_ul_ff.' . $innerKey) }}"
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
                                                                                            value="{{ old('ov_l_if.' . $innerKey) }}"
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
                                                                                            value="{{ old('ov_l_ff.' . $innerKey) }}"
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
                                                                                            value="{{ old('ov_total.' . $innerKey) }}"
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
                                                                                            value="{{ old('co_ul_if.' . $innerKey) }}"
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
                                                                                            value="{{ old('co_ul_ff.' . $innerKey) }}"
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
                                                                                            value="{{ old('co_l_if.' . $innerKey) }}"
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
                                                                                            value="{{ old('co_l_ff.' . $innerKey) }}"
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
                                                                                            value="{{ old('co_total.' . $innerKey) }}"
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
                                                                                            value="{{ old('grand_total.' . $innerKey) }}"
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
                                                <textarea name="comm_remarks" class="form-control" cols="30" rows="6" id="comm_remarks"></textarea>
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
            $('.numeric_input').on("keydown keyup", function() {
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
            $('.numeric_input').bind('keyup blur', function() {
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
