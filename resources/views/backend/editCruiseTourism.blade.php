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
                        <h1>Edit Cruise Tourism</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Cruise Tourism</li>
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
                        <h3 class="card-title">Edit Cruise Tourism</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('updateCruiseTourism', $editData->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" class="form-control" id="createdBy" value="{{ Auth::user()->id }}"
                                    name="updated_by">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select_year">Year <span style="color: red;">*</span></label>
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
                                                    {{ (isset($editData) && $editData->select_year == $yearRange) || old('select_year') == $yearRange
                                                        ? 'selected'
                                                        : '' }}>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select_month">Month <span style="color: red;">*</span></label>
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

                            </div>

                            @php
                                $portCat = \App\Models\PortCategory::where('id', $editData['port_type'])
                                    ->select('category_name')
                                    ->first();
                                $portName = \App\Models\Port::where('id', $editData['port_id'])
                                    ->select('port_name')
                                    ->first();
                                // dd($editData['port_id']);
                                $stateboard = \App\Models\StateBoard::where('id', $editData['state_board'])
                                    ->select('name')
                                    ->first();
                            @endphp

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_type') is-invalid @enderror"
                                            name="port_type" id="port_type">
                                            <option value="{{ $editData->port_type }}" selected>
                                                {{ $portCat['category_name'] }}
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
                                        <select class="form-control @error('state_board') is-invalid @enderror"
                                            name="state_board" id="state_board" value="{{ old('state_board') }}">
                                            <option value="{{ $editData->state_board }}" selected>
                                                {{ $stateboard['name'] ?? 'N/A' }}
                                            </option>
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
                                        <select class="form-control @error('port_id') is-invalid @enderror" name="port_id"
                                            id="port_name" value="{{ old('port_id') }}">
                                            <option value="{{ $editData['port_id'] }}" selected>
                                                {{ $portName['port_name'] }}
                                            </option>
                                        </select>
                                        @error('port_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_of_cruise_terminals">No of Cruise Terminals</label>
                                        <input class="form-control @error('no_of_cruise_terminals') is-invalid @enderror"
                                            name="no_of_cruise_terminals" id="no_of_cruise_terminals"
                                            placeholder="Enter No of Cruise Terminals"
                                            value="{{ $editData['no_of_cruise_terminals'] }}">
                                        @error('no_of_cruise_terminals')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="total_cruise_calls">Total Cruise Calls</label>
                                        <input type="text"
                                            class="form-control @error('total_cruise_calls') is-invalid @enderror"
                                            id="total_cruise_calls" placeholder="Enter Total Cruise Calls"
                                            name="total_cruise_calls" value="{{ $editData['total_cruise_calls'] }}">
                                        @error('total_cruise_calls')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_of_cruise_passengers">No of Cruise Passengers</label>
                                        <input type="text"
                                            class="form-control @error('no_of_cruise_passengers') is-invalid @enderror"
                                            id="no_of_cruise_passengers" placeholder="Enter No of Cruise Passengers"
                                            name="no_of_cruise_passengers" value="{{ $editData['no_of_cruise_passengers'] }}">
                                        @error('no_of_cruise_passengers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cruise_berth_charges">Cruise Berth Charges (In Rupees)</label>
                                        <input type="text"
                                            class="form-control @error('cruise_berth_charges') is-invalid @enderror"
                                            id="cruise_berth_charges" placeholder="Enter Cruise Berth Charges In Rupees"
                                            name="cruise_berth_charges" value="{{ $editData['cruise_berth_charges'] }}">
                                        @error('cruise_berth_charges')
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
@endsection
