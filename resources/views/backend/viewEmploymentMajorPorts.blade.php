@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css  ') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ') }}">

    <style>
        table.dataTable>thead .sorting:after {
            display: none;
        }

        table.dataTable>thead .sorting:before {
            display: none;
        }

        table.dataTable>thead>tr>th:not(.sorting_disabled) {
            padding-right: 0;
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
                        <h1>Employment Major Ports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employment Major Ports</li>
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
                                <h3 class="card-title">Employment Major Ports</h3>
                                <div class="float-right">
                                    <a href="{{ route('addEmploymentMajorPorts') }}" class="btn btn-primary">
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
                                            <th rowspan="2">S.No</th>
                                            <th rowspan="2">Year</th>
                                            <th rowspan="2">Month</th>
                                            <th rowspan="2">Port Type</th>
                                            <th rowspan="2">Port Name</th>
                                            <th colspan="2">Number Of Officers</th>
                                            <th colspan="3">Number Of Non-Cargo Handling Workers</th>
                                            <th colspan="2">Number Of Cargo Handling Workers</th>
                                            <th rowspan="2">Shore Worker</th>
                                            <th rowspan="2">Casual Worker</th>
                                            <th rowspan="2">Total</th>
                                            <th rowspan="2">Status</th>
                                            @if (Auth::user()->role_id != 5 && Auth::user()->role_id != 6)
                                            @else
                                                <th rowspan="2">Action</th>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Class I</th>
                                            <th>Class II</th>
                                            <th>Class IIII</th> <!-- Corrected from Class IIII -->
                                            <th>Class IV</th>
                                            <th>Others</th>
                                            <th>Class III</th>
                                            <th>Class IV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getData as $value)
                                            @php
                                                $portCat = \App\Models\PortCategory::where('id', $value['port_type'])
                                                    ->select('category_name')
                                                    ->first();
                                                $portName = \App\Models\Port::where('id', $value['port_id'])
                                                    ->select('port_name')
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
                                                <td>{{ $portName->port_name }}</td>
                                                <td>{{ $value['class_1'] }}</td>
                                                <td>{{ $value['class_2'] }}</td>
                                                <td>{{ $value['class_3'] }}</td>
                                                <td>{{ $value['class_4'] }}</td>
                                                <td>{{ $value['class_5'] }}</td>
                                                <td>{{ $value['class_6'] }}</td>
                                                <td>{{ $value['class_7'] }}</td>
                                                <td>{{ $value['shore_wrk'] }}</td>
                                                <td>{{ $value['casual_work'] }}</td>
                                                <td>{{ $value['total'] }}</td>
                                                {{-- <td>{{ $value['status'] }}</td> --}}
                                                <td scope="col" style="width: 200px;">
                                                    @if (Auth::user()->role_id == 4)
                                                        @if ($value['status'] == 1)
                                                            Approved
                                                        @else
                                                            Pending
                                                        @endif
                                                    @else
                                                        <select rowid="{{ $value['id'] }}" id="rowID{{ $value['id'] }}"
                                                            name="status" class="form-control status">
                                                            @php
                                                                $isRole5 = Auth::user()->role_id == 5;
                                                                $isRole6 = Auth::user()->role_id == 6;
                                                                $isStatus1 = $value['status'] == 1;
                                                                $isStatus3 = $value['status'] == 3;
                                                            @endphp
                                                            <option value="3"
                                                                {{ $isRole5 || $isRole6 || $isStatus1 ? 'hidden' : '' }}
                                                                {{ $value['status'] == 3 ? 'selected' : '' }}>Drafted
                                                            </option>
                                                            <option value="2"
                                                                {{ $isRole5 || $isStatus1 ? 'hidden' : '' }}
                                                                {{ $value['status'] == 2 ? 'selected' : '' }}>Approval
                                                                Awaited</option>
                                                            <option value="1"
                                                                {{ $isRole6 || $isStatus1 ? 'hidden' : '' }}
                                                                {{ $isStatus3 ? 'disabled' : '' }}
                                                                {{ $value['status'] == 1 ? 'selected' : '' }}>Approved
                                                            </option>
                                                        </select>
                                                    @endif

                                                    <input type="hidden" name="updated_by"
                                                        id="updatedby_{{ $value['id'] }}" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="select_month"
                                                        id="selectMonth_{{ $value['id'] }}"
                                                        value="{{ $value['select_month'] }}">
                                                </td>
                                                {{-- @if (Auth::user()->role_id != 5 && Auth::user()->role_id != 6)
                                                    <td><a href="{{ route('editEmploymentMajorPorts', $value['id']) }}">
                                                        <i class="far fa-edit" aria-hidden="true"></i>
                                                    </a></td>
                                                @endif --}}
                                                @if (Auth::user()->role_id != 5 && Auth::user()->role_id != 6)
                                                @else
                                                    <td>
                                                        <a href="{{ route('editEmploymentMajorPorts', $value['id']) }}"
                                                            @if (Auth::user()->role_id == 5 && $value['status'] == 3) onclick="alert('Do Not Edit the data Because of Month Data is not Submitted'); return false;"
    @elseif (Auth::user()->role_id == 6 && $value['status'] == 2)
        onclick="alert('Data is Submitted for Approval Awaited Data'); return false;"
    @elseif ($value['status'] == 1)
        onclick="alert('Data is Submitted'); return false;" @endif>
                                                            <i class="far fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Port Type</th>
                                            <th>Port Name</th>
                                            <th>Class I</th>
                                            <th>Class II</th>
                                            <th>Class IIII</th> <!-- Corrected from Class IIII -->
                                            <th>Class IV</th>
                                            <th>Others</th>
                                            <th>Class III</th>
                                            <th>Class IV</th>
                                            <th>Shore Worker</th>
                                            <th>Casual Worker</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            @if (Auth::user()->role_id != 5 && Auth::user()->role_id != 6)
                                            @else
                                                <th>Action</th>
                                            @endif
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

     <!-- Include your custom JS file -->
     {{-- <script src="{{ asset('backend/js/status.js') }}"></script> --}}

     <script>
        // Set up CSRF token for jQuery Ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Document ready function
        $(document).ready(function() {
            // Attach a change event handler to elements with the class 'status'
            $('.status').on("change", function(e) {
                e.preventDefault();

                // Get values from the DOM elements
                var rowid = $(this).attr('rowid');
                var status = $(this).val();
                var select_month = $('#selectMonth_' + rowid).val();
                var updated_by = $('#updatedby_' + rowid).val();

                // Debugging: Display rowid in an alert
                // alert(select_month);

                // Make an Ajax request to update the status
                $.ajax({
                    type: 'POST',
                    url: '/update-status-employment-major-ports',
                    data: {
                        select_month: select_month,
                        updated_by: updated_by,
                        status: status,
                        rowid: rowid,
                    },
                    success: function(data) {
                        // Handle success, if needed
                        // Check if the response contains the success status
                        if (data.status === 'success') {
                            // Display the success message
                            $('#successMessage').show();
                            location.reload();
                        }
                    },
                    error: function(error) {
                        // Handle error, if needed
                        console.error('Error updating status.');
                    }
                });
            });
        });
    </script>
@endsection
