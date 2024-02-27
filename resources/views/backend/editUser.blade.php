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
                        <h1>Add User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add User</li>
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
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('updateUser', $editData->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @php
                                // PortCategory
                                $portCat = \App\Models\PortCategory::where('id', $editData['port_type'])
                                    ->select('category_name')
                                    ->first();
                                // Port
                                $portName = \App\Models\Port::where('id', $editData['port_id'])
                                    ->select('port_name')
                                    ->first();
                                // dd($editData['port_id']);
                                // Role
                                $roleName = \App\Models\Role::where('id', $editData['role_id'])
                                    ->select('role_name')
                                    ->first();
                                // Department
                                $depName = \App\Models\Department::where('id', $editData['dep_id'])
                                    ->select('name')
                                    ->first();
                                // Report
                                // $reportList = User::where('is_deleted', 0)->whereIn('role_id', [1, 2])->get()->toArray();
                                // $repName = \App\Models\User::where('id', [1,2,3,4])
                                $reportList = \App\Models\User::where('id', $editData['report_to'])
                                    ->select('name','id')
                                    ->get();
                                // dd($editData['report_to']);
                            @endphp
                            <div class="row">
                                <input type="hidden" class="form-control" id="createdBy" value="{{ Auth::user()->id }}"
                                    name="updated_by">

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="name">Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter Name" name="name"
                                            value="{{ $editData['name'] }}">
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
                                        <label for="email">Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Enter Email"
                                            value="{{ $editData['email'] }}">
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
                                        <label for="role_id">Position / Role <span style="color: red;">*</span></label>
                                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id"
                                            id="role_id">
                                            <option value="{{ $editData['role_id'] }}" selected>
                                                {{ $roleName['role_name'] }}
                                            </option>
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
                                        <label for="dep_id">Office / Department <span style="color: red;">*</span></label>
                                        <select class="form-control @error('dep_id') is-invalid @enderror" name="dep_id"
                                            id="dep_id">
                                            <option value="{{ $editData['dep_id'] }}" selected>
                                                {{ $depName['name'] }}
                                            </option>
                                        </select>
                                        @error('dep_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!--<div class="col-md-6">
                                                {{-- Add the form tag with an id for easier selection --}}
                                                <div class="form-group">
                                                    <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                                    <select class="form-control @error('port_type') is-invalid @enderror"
                                                        name="port_type" id="port_type">
                                                        <option value="{{ $editData['port_type'] }}" selected>
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

                                            <div class="col-md-6">
                                                {{-- Add the form tag with an id for easier selection --}}
                                                <div class="form-group" id="showPortName">
                                                    <label for="port_id">Port <span style="color: red;">*</span></label>
                                                    <select class="form-control @error('port_id') is-invalid @enderror" name="port_id"
                                                        id="port_id">
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
                                            </div> -->

                                <div class="col-md-6">
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

                                <div class="col-md-6" id="startBoard_div">
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

                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="report_to">Report Officer <span style="color: red;">*</span></label>
                                        <select class="form-control @error('report_to') is-invalid @enderror"
                                            name="report_to" id="report_to" required>
                                            <option value="" disabled>Select Report Officer</option>
                                            {{-- {{ dd($$reportList); }} --}}
                                            @foreach ($reportList as $report)
                                                <option value="{{ $report->id }}">{{ $report->name }}</option>
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
                                        <label for="status">Status <span style="color: red;">*</span></label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                            id="status">
                                            <option value="1" {{ $editData['status'] == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $editData['status'] == 0 ? 'selected' : '' }}>
                                                Inactive</option>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="port_type"]').on('change', function() {
                var porttypeID = $(this).val();
                if (porttypeID == 0) {
                    porttypeID = -1;
                }
                $.ajax({
                    url: '/portName/' + porttypeID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#showPortName').html('');
                        $('#showPortName').append(data.html);
                    }
                });
            });
        });
    </script>
@endsection
