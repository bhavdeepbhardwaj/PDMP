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
                        <h1>Edit Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Role</li>
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
                        <h3 class="card-title">Edit Role</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        {{-- <form method="POST" action="{{ route('saveRole') }}" enctype="multipart/form-data"> --}}
                        <form method="POST" action="{{ route('backend.updateRole', $editData->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" class="form-control editupdatedby" id=""
                                    value="{{ Auth::user()->id }}" name="updated_by">

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="editroleName">Role Name <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control editroleName roleName @error('role_name') is-invalid @enderror"
                                            id="editroleName" placeholder="Enter Role Name" name="role_name"
                                            value="{{ $editData['role_name'] }}">
                                        @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="editroleSlug">Role Slug <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control editroleSlug  roleSlug @error('role_slug') is-invalid @enderror "
                                            id="editroleSlug" placeholder="Enter Role Slug" name="role_slug" readonly
                                            value="{{ $editData['role_slug'] }}">
                                        @error('role_slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="editroleLevel">Level <span style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('level') is-invalid @enderror editroleLevel"
                                            name="" id="editroleLevel" placeholder="Enter Role Level"
                                            value="{{ $editData['level'] }}" readonly>
                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="editroleEmployeeRole">Employee Role Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control @error('employee_role') is-invalid @enderror editroleEmployeeRole"
                                            name="employee_role" id="editroleEmployeeRole"
                                            placeholder="Enter Employee Role Name" value="{{ $editData['employee_role'] }}">
                                        @error('employee_role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex pb-2 justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="">Add
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
        $(document).ready(function() {
            $('.roleName').keyup(function() {

                var roleName = $(this).val();
                var regex = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
                // // alert(roleName);
                // if (regex.test(roleName)) {
                //     errorText.textContent = ""; // Clear any previous error message
                // } else {
                //     errorText.textContent = "Invalid input. Please use only letters and spaces.";
                // }
                var text = roleName.toLowerCase().replace(/[^a-z]+/g, "-");
                // console.log(text);
                $('#roleSlug').val(text);
                $('.roleSlug').val(text);
            });
        });
    </script>

@endsection
