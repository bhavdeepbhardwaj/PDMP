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
                        <h1>Direct Port Entry / Delivery Related Containers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Direct Port Entry / Delivery Related Containers</li>
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
                        <h3 class="card-title">Direct Port Entry Delivery Related Containers</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('saveDirectPortEntryDeliveryRelatedContainers') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" id="createdBy" value="{{ Auth::user()->id }}"
                                    name="created_by">

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
                                                    {{ old('select_year') == $yearRange ? 'selected' : '' }}>
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
                                                    {{ old('select_month', date('n')) == $monthNumber ? 'selected' : '' }}>
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

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_type') is-invalid @enderror"
                                            name="port_type" id="port_type">
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
                                            <option value='' selected disabled>All State</option>
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
                                            <option value='' selected disabled>All Port</option>
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
                                        <label for="containers">Containers <span style="color: red;">*</span></label>
                                        <input class="form-control @error('containers') is-invalid @enderror"
                                            name="containers" id="containers" placeholder="Enter Containers"
                                            value="{{ old('containers') }}">
                                        @error('containers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="direct_port_entry_of_teu">Direct Port Entry of Teu (No) <span
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('direct_port_entry_of_teu') is-invalid @enderror"
                                            id="direct_port_entry_of_teu" placeholder="Enter Direct Port Entry of Teu (No)"
                                            name="direct_port_entry_of_teu" value="{{ old('direct_port_entry_of_teu') }}">
                                        @error('direct_port_entry_of_teu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="direct_port_delivery">Direct Port Delivery (No) <span
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('direct_port_delivery') is-invalid @enderror"
                                            id="direct_port_delivery" placeholder="Enter Direct Port Delivery (No)"
                                            name="direct_port_delivery" value="{{ old('direct_port_delivery') }}">
                                        @error('direct_port_delivery')
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
    <script src="{{ asset('backend/js/port.js') }}"></script>
@endsection
