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
                        <h1>Edit Berth Related Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Berth Related Information</li>
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
                        <h3 class="card-title">Edit Berth Related Information</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('updateBerthRelatedInformation', $editData->id) }}"
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

                            <div class="row">
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
                                        <label for="type_of_berth">Type Of Berth <span style="color: red;">*</span></label>
                                        <input class="form-control @error('type_of_berth') is-invalid @enderror"
                                            name="type_of_berth" id="type_of_berth" placeholder="Enter Type of Berth"
                                            value="{{ $editData['type_of_berth'] }}">
                                        @error('type_of_berth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_of_berth">No of Berth <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('no_of_berth') is-invalid @enderror" id="no_of_berth"
                                            placeholder="Enter No of Berth" name="no_of_berth"
                                            value="{{ $editData['no_of_berth'] }}">
                                        @error('no_of_berth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="public">Public <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('public') is-invalid @enderror"
                                            id="public" placeholder="Enter Public" name="public"
                                            value="{{ $editData['public'] }}">
                                        @error('public')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ppp">PPP <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('ppp') is-invalid @enderror"
                                            id="ppp" placeholder="Enter ppp" name="ppp"
                                            value="{{ $editData['ppp'] }}">
                                        @error('ppp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designed_depth">Designed / Depth (in meters) <span style="color: red;">*</span></label>
                                        <input class="form-control @error('designed_depth') is-invalid @enderror"
                                            name="designed_depth" id="designed_depth"
                                            placeholder="Enter Designed / Depth (in meters)"
                                            value="{{ $editData['designed_depth'] }}">
                                        @error('designed_depth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="permissible_draft">Permissible Draft (in meters) <span style="color: red;">*</span></label>
                                        <input class="form-control @error('permissible_draft') is-invalid @enderror"
                                            name="permissible_draft" id="permissible_draft"
                                            placeholder="Enter Permissible Draft (in meters)"
                                            value="{{ $editData['permissible_draft'] }}">
                                        @error('permissible_draft')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avg_total_draft">Average Total Draft (in meters) <span style="color: red;">*</span></label>
                                        <input class="form-control @error('avg_total_draft') is-invalid @enderror"
                                            name="avg_total_draft" id="avg_total_draft"
                                            placeholder="Enter Avg Total Draft" value="{{ $editData['avg_total_draft'] }}">
                                        @error('avg_total_draft')
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
    {{-- <script src="{{ asset('backend/js/port.js') }}"></script> --}}
@endsection
