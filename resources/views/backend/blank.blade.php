@extends('layouts.master')

@section('css')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Major-Nom Major Ports and Capacities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Major-Nom Major Ports and Capacities</li>
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
                        <h3 class="card-title">Major-Nom Major Ports and Capacities</h3>
                    </div>
                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" id="createdBy" value="{{ Auth::user()->id }}"
                                    name="created_by">

                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                            name="name" value="{{ old('name') }}">
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
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email">
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
                                        <label for="role_id">Position / Role</label>
                                        <select class="form-control @error('role_id') is-invalid @enderror"
                                            name="role_id" id="role_id">
                                            <option value=''>---Select--</option>
                                            @foreach ($roleId as $value)
                                                <option value="{{ $value->id }}">{{ $value->role_name }}
                                                </option>
                                            @endforeach
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
                                        <label for="dep_id">Office / Department</label>
                                        <select class="form-control @error('dep_id') is-invalid @enderror"
                                            name="dep_id" id="dep_id">
                                            <option value=''>---Select--</option>
                                            @foreach ($depID as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('dep_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Add the form tag with an id for easier selection --}}
                                    <div class="form-group">
                                        <label for="port_type">Port Type</label>
                                        <select class="form-control" name="port_type" id="port_type">
                                            <option value=''>---Select--</option>
                                            @foreach ($portCatName as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['category_name'] }}</option>
                                            @endforeach
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
                                        <label for="port_id">Port</label>
                                        <select class="form-control" name="port_id" id="port_id">
                                            <option value=''>---Select--</option>
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
                                        <label for="report_to">Report Officer</label>
                                        <select class="form-control" name="report_to" id="report_to">
                                            <option value=''>---Select--</option>
                                            @foreach ($reportList as $key => $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                </option>
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
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                            name="status" id="user_status">
                                            <option value=''>---Select--</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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



                    <div class="card-body">
                        {{-- Form Respone --}}
                        @include('backend.component.flush')

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <!-- START ACCORDION & CAROUSEL-->
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                        class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="card" style="width: ;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Special title treatment</h5>
                                                                <p class="card-text">With supporting text below as a
                                                                    natural lead-in to additional content.</p>
                                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap"
                                                            alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap"
                                                            alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- END ACCORDION & CAROUSEL-->
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

    <!-- MODAL -->
@endsection

@section('js')
    <!-- jQuery -->
@endsection
