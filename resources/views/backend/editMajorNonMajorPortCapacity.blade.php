@extends('layouts.master')

@section('css')
    <!-- DataTables -->
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Major Non Major Ports and Capacities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Major Non Major Ports and Capacities</li>
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
                        <h3 class="card-title">Edit Major Non Major Ports and Capacities</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('updateMajorNonMajorPortCapacity', $editData->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <input type="hidden" class="form-control" id="createdBy" value="{{ Auth::user()->id }}"
                                    name="updated_by">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year <span style="color: red;">*</span></label>
                                        <select name="select_year" id="select_year"
                                            class="form-control @error('select_year') is-invalid @enderror">
                                            <option value="">-- Select Year --</option>
                                            @php
                                                $currentYear = date('Y');
                                            @endphp
                                            {{-- Loop to generate options --}}
                                            @for ($i = $currentYear; $i >= $currentYear - 12; $i--)
                                                @php
                                                    $startYear = $i;
                                                    $endYear = $startYear + 1;
                                                    $yearRange = $startYear;
                                                @endphp
                                                <option value="{{ $yearRange }}"
                                                    {{ (isset($editData) && $editData->select_year == $yearRange) || old('select_year') == $yearRange ? 'selected' : '' }}>
                                                    {{ $yearRange }}
                                                </option>
                                            @endfor
                                        </select>

                                        @error('select_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Month <span style="color: red;">*</span></label>
                                        <select name="select_month" id="select_month"
                                            class="form-control @error('select_month') is-invalid @enderror">
                                            <option value="">-- Select Month --</option>
                                            {{-- Loop to generate options --}}
                                            @foreach (range(1, 12) as $monthNumber)
                                                @php
                                                    $month = date('F', mktime(0, 0, 0, $monthNumber, 1));
                                                @endphp
                                                <option value="{{ $monthNumber }}"
                                                    {{ isset($editData) && $editData->select_month == $monthNumber ? 'selected' : '' }}>
                                                    {{ $month }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('select_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--
                            </div> --}}
                                @php
                                    $portCat = \App\Models\PortCategory::where('id', $editData['port_type'])
                                        ->select('category_name')
                                        ->first();
                                    $portName = \App\Models\Port::where('id', $editData['port_name'])
                                        ->select('port_name')
                                        ->first();
                                    $stateboard = \App\Models\StateBoard::where('id', $editData['state_board'])
                                        ->select('name')
                                        ->first();
                                @endphp

                                {{-- <div class="row"> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_type') is-invalid @enderror port_type"
                                            name="port_type" id="port_type">
                                            <option value="{{ $editData->port_type }}" selected>{{ $portCat['category_name'] }}
                                            </option>
                                        </select>
                                        @error('port_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4" id="startBoard_div">
                                    <div class="form-group">
                                        <label for="state_board">State Board <span style="color: red;">*</span></label>
                                        {{-- {{ dd($editData->state_board); }} --}}
                                        <select class="form-control @error('state_board') is-invalid @enderror"
                                            name="state_board" id="state_board">
                                            {{-- @if($editData && $stateboard)
                                                <option value="{{ $editData->state_board }}" selected>
                                                    {{ isset($stateboard['name']) ? $stateboard['name'] : '' }}
                                                </option>
                                            @endif --}}
                                            @if($editData && $stateboard)
                                                <option value="{{ $editData->state_board }}" selected>
                                                    {{ isset($stateboard['name']) ? $stateboard['name'] : '' }}
                                                </option>
                                            @else
                                            <option value="0" selected>
                                                N/A
                                            </option>
                                            @endif
                                        </select>
                                        @error('state_board')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="port_name">Port Name <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_name') is-invalid @enderror"
                                            name="port_name" id="port_name">
                                            <option value="{{ $editData->port_name }}" selected>{{ $portName['port_name'] }}
                                            </option>
                                        </select>
                                        @error('port_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="operational">Operational <span style="color: red;">*</span></label>
                                        <select class="form-control @error('operational') is-invalid @enderror"
                                            name="operational" id="operational">
                                            <option value=''>-- Select Operational --</option>
                                            <option value="operational"
                                                {{ (isset($editData) && $editData->operational == 'operational') || old('operational') == 'operational' ? 'selected' : '' }}>
                                                Operational
                                            </option>
                                            <option value="Non-Operational"
                                                {{ (isset($editData) && $editData->operational == 'Non-Operational') || old('operational') == 'Non-Operational' ? 'selected' : '' }}>
                                                Non-Operational
                                            </option>
                                        </select>
                                        @error('operational')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="capacity">Capacity ( IN MILLION METRIC TONNES) <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                                            id="capacity" placeholder="Enter Capacity" name="capacity"
                                            value="{{ $editData->capacity }}">
                                        @error('capacity')
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
                </div>
            </div>
            {{--
        </form> --}}

        </section>
        <!--  -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- jQuery -->
    <script>
    //     $.get('/get-port-types', function (data) {
    //     var portTypes = data.portTypes;
    //     // $('#port_type').html('<option value="">-- Select Type --</option>');
    //     $.each(portTypes, function (index, portType) {
    //         $('.port_type').append('<option value="' + portType.id + '">' + portType
    //             .category_name + '</option>');
    //     });
    // });
    </script>
    {{-- <script src="{{ asset('backend/js/port.js') }}"></script> --}}
@endsection
