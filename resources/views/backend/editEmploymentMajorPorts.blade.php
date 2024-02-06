@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <style>
        hr {
            margin-top: 0;
            margin-bottom: 0;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Employment Major Ports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Employment Major Ports</li>
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
                        <h3 class="card-title">Edit Employment Major Ports</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('updateEmploymentMajorPorts', $editData->id) }}"
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
                                @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_type') is-invalid @enderror port_type"
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


                            </div>

                            {{-- Officer Class 1 --}}
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <h4 style="text-align: center;">Number Of Officers</h4>
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_1">Class I <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_1') is-invalid @enderror"
                                            name="class_1" id="class_1" value="{{ $editData->class_1 }}"
                                            placeholder="Number Of Officers Class I">
                                        @error('class_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_2">Class II <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_2') is-invalid @enderror"
                                            name="class_2" id="class_2" value="{{ $editData->class_2 }}"
                                            placeholder="Number Of Officers Class II">
                                        @error('class_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Non-Cargo Handling Workers --}}
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <h4 style="text-align: center;">Number Of Non-Cargo Handling Workers</h4>
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="class_3">Class IIII <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_3') is-invalid @enderror"
                                            name="class_3" id="class_3" value="{{ $editData->class_3 }}"
                                            placeholder="Number Of Non-Cargo Handling Workers Class IIII">
                                        @error('class_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="class_4">Class IV <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_4') is-invalid @enderror"
                                            name="class_4" id="class_4" value="{{ $editData->class_4 }}"
                                            placeholder="Number Of Non-Cargo Handling Workers Class IV">
                                        @error('class_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="class_5">Other <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_5') is-invalid @enderror"
                                            name="class_5" id="class_5" value="{{ $editData->class_5 }}"
                                            placeholder="Other">
                                        @error('class_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Cargo Handling Workers Other than Shore Workers --}}
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <h4 style="text-align: center;">Number Of Cargo Handling Workers</h4>
                            <hr style="height:3px;border-width:0;color:gray;background-color:gray;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_6">Class III <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_6') is-invalid @enderror"
                                            name="class_6" id="class_6" value="{{ $editData->class_6 }}"
                                            placeholder="Number Of Cargo Handling Workers Class III">
                                        @error('class_6')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_7">Class IV <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('class_7') is-invalid @enderror"
                                            name="class_7" id="class_7" value="{{ $editData->class_7 }}"
                                            placeholder="Number Of Cargo Handling Workers Class IV">
                                        @error('class_7')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="shore_wrk">Shore Worker <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shore_wrk') is-invalid @enderror"
                                            name="shore_wrk" id="shore_wrk" value="{{ $editData->shore_wrk }}"
                                            placeholder="Number Shore Worker">
                                        @error('shore_wrk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="casual_work">Casual Worker <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('casual_work') is-invalid @enderror"
                                            name="casual_work" id="casual_work" value="{{ $editData->casual_work }}"
                                            placeholder="Number Casual Worker">
                                        @error('casual_work')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="total">Total <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('total') is-invalid @enderror"
                                            name="total" id="total" value="{{ $editData->total }}"
                                            placeholder="Total">
                                        @error('total')
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
    <script>
        // Function to calculate and display the total
        function calculateTotal() {
            var class1 = parseFloat(document.getElementById('class_1').value) || 0;
            var class2 = parseFloat(document.getElementById('class_2').value) || 0;
            var class3 = parseFloat(document.getElementById('class_3').value) || 0;
            var class4 = parseFloat(document.getElementById('class_4').value) || 0;
            var class5 = parseFloat(document.getElementById('class_5').value) || 0;
            var class6 = parseFloat(document.getElementById('class_6').value) || 0;
            var class7 = parseFloat(document.getElementById('class_7').value) || 0;
            var shore_wrk = parseFloat(document.getElementById('shore_wrk').value) || 0;
            var casual_work = parseFloat(document.getElementById('casual_work').value) || 0;

            // Calculate the total
            var total = class1 + class2 + class3 + class4 + class5 + class6 + class7 + shore_wrk + casual_work;

            // Display the total in the 'total' input field
            document.getElementById('total').value = total;
        }

        // Attach the calculateTotal function to the 'keyup' event of each input field
        document.querySelectorAll('input').forEach(function(input) {
            input.addEventListener('keyup', calculateTotal);
        });
    </script>
@endsection
