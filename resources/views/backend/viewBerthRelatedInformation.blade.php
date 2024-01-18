@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css  ') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Berth Related Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Berth Related Information</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Berth Related Information</h3>
                                <div class="float-right">
                                    <a href="{{ route('addBerthRelatedInformation') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add</a>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                {{-- Form Respone --}}
                                @include('backend.component.flush')
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Port Type</th>
                                            <th>State Board</th>
                                            <th>Port Name</th>
                                            <th>Type of Berth</th>
                                            <th>No Of Berth</th>
                                            <th>Public</th>
                                            <th>PPP</th>
                                            <th>Designed Depth</th>
                                            <th>Permissible Draft</th>
                                            <th>Avg Total Draft</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getData as $value)
                                            @php
                                                $portCat = \App\Models\PortCategory::where('id', $value['port_type'])
                                                    ->select('category_name')
                                                    ->first();
                                                $portName = \App\Models\Port::where('id', $value['id'])
                                                    ->select('port_name')
                                                    ->first();
                                                $stateboard = \App\Models\StateBoard::where('id', $value['state_board'])
                                                    ->select('name')
                                                    ->first();
                                                $numericMonth = $value['select_month'];
                                                $monthName = \Carbon\Carbon::create()
                                                    ->month($numericMonth)
                                                    ->format('F');
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value['select_year'] }}</td>
                                                <td>{{ $monthName }}</td>
                                                <td>{{ $portCat->category_name }}</td>
                                                <td>{{ $stateboard ? $stateboard->name : 'N/A' }}</td>
                                                <td>{{ $portName->port_name }}</td>
                                                <td>{{ $value['type_of_berth'] }}</td>
                                                <td>{{ $value['no_of_berth'] }}</td>
                                                <td>{{ $value['public'] }}</td>
                                                <td>{{ $value['ppp'] }}</td>
                                                <td>{{ $value['designed_depth'] }}</td>
                                                <td>{{ $value['permissible_draft'] }}</td>
                                                <td>{{ $value['avg_total_draft'] }}</td>
                                                <td><a href="{{ route('editBerthRelatedInformation', $value['id']) }}">
                                                        <i class="far fa-edit" aria-hidden="true"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Port Type</th>
                                            <th>State Board</th>
                                            <th>Port Name</th>
                                            <th>Type of Berth</th>
                                            <th>No Of Berth</th>
                                            <th>Public</th>
                                            <th>PPP</th>
                                            <th>Designed Depth</th>
                                            <th>Permissible Draft</th>
                                            <th>Avg Total Draft</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!--  -->
    </div>
    <!-- /.content-wrapper -->

    <!-- MODAL -->
    <!--  -->
    <div class="modal fade" id="editmodal-xl">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Detials</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <section class="content">
                        <form>
                            <div class="container-fluid">

                                <div class="row">
                                    <input type="hidden" class="form-control editupdatedby" id=""
                                        value="{{ Auth::user()->id }}" name="updated_by">
                                    <input type="hidden" name="userId" id="editdataid" class="form-control editdataid">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="editselectmonth">Month <span style="color: red;">*</span></label>
                                            <select name="select_month" id="editselectmonth"
                                                class="form-control editselectmonth @error('select_month') is-invalid @enderror">
                                                <option value="">--Select Month--</option>

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
                                            <label for="editportType">Port Type</label>
                                            <select
                                                class="form-control editportType @error('port_type') is-invalid @enderror"
                                                name="port_type" id="editportType">
                                                <option value=''>---Select--</option>
                                                <option value='1'>Major</option>
                                                <option value='2'>Non Major</option>
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
                                            <label for="editportName">Port Name</label>
                                            <input type="text"
                                                class="form-control editportName @error('port_name') is-invalid @enderror"
                                                id="editportName" placeholder="Enter Port Name" name="port_name"
                                                value="{{ old('port_name') }}">
                                            @error('port_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editTypeOfBerth">Type Of Berth</label>
                                            <input
                                                class="form-control editTypeOfBerth @error('type_of_berth') is-invalid @enderror"
                                                name="type_of_berth" id="editTypeOfBerth"
                                                placeholder="Enter Type of Berth" value="{{ old('type_of_berth') }}">
                                            @error('type_of_berth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editNoOfBerth">No of Berth</label>
                                            <input type="text"
                                                class="form-control editNoOfBerth @error('no_of_berth') is-invalid @enderror"
                                                id="editNoOfBerth" placeholder="Enter No of Berth" name="no_of_berth"
                                                value="{{ old('no_of_berth') }}">
                                            @error('no_of_berth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editPublic">Public</label>
                                            <input type="text"
                                                class="form-control editPublic @error('public') is-invalid @enderror"
                                                id="editPublic" placeholder="Enter Public" name="public"
                                                value="{{ old('public') }}">
                                            @error('public')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editppp">PPP</label>
                                            <input type="text"
                                                class="form-control editppp @error('ppp') is-invalid @enderror"
                                                id="editppp" placeholder="Enter ppp" name="ppp"
                                                value="{{ old('ppp') }}">
                                            @error('ppp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editDesignedDepth">Designed / Depth (in meters)</label>
                                            <input
                                                class="form-control editDesignedDepth @error('designed_depth') is-invalid @enderror"
                                                name="designed_depth" id="editDesignedDepth"
                                                placeholder="Enter Designed / Depth (in meters)"
                                                value="{{ old('designed_depth') }}">
                                            @error('designed_depth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editPermissibleDraft">Permissible Draft (in meters)</label>
                                            <input
                                                class="form-control editPermissibleDraft @error('permissible_draft') is-invalid @enderror"
                                                name="permissible_draft" id="editPermissibleDraft"
                                                placeholder="Enter Permissible Draft (in meters)"
                                                value="{{ old('permissible_draft') }}">
                                            @error('permissible_draft')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editAvgTotalDraft">Average Total Draft (in meters)</label>
                                            <input
                                                class="form-control editAvgTotalDraft @error('avg_total_draft') is-invalid @enderror"
                                                name="avg_total_draft" id="editAvgTotalDraft"
                                                placeholder="Enter Avg Total Draft" value="{{ old('avg_total_draft') }}">
                                            @error('avg_total_draft')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="d-flex pb-2 justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                    id="">Add
                                    Records</button>
                            </div> --}}

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary editbtn-submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js ') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js ') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js ') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js ') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
