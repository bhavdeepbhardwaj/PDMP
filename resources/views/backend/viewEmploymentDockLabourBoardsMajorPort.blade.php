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
                        <h1>Employment Dock Labour Boards Major Port</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employment Dock Labour Boards Major Port</li>
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
                                <h3 class="card-title">Employment Dock Labour Boards Major Port</h3>
                                <div class="float-right">
                                    <a href="{{ route('addEmploymentDockLabourBoardsMajorPort') }}" class="btn btn-primary">
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
                                            <th colspan="5">Number of DLB Employment</th>
                                            <th colspan="4">Number of Dock Workers</th>
                                            <th rowspan="2">Grand Total</th>
                                            <th rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                            <th>Class I</th>
                                            <th>Class II</th>
                                            <th>Class IIII</th>
                                            <th>Class IV</th>
                                            <th>DLB Employment Total</th>
                                            <th>Registered</th>
                                            <th>Listed</th>
                                            <th>Others</th>
                                            <th>Total</th>
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
                                                <td>{{ $value['total'] }}</td>
                                                <td>{{ $value['registered'] }}</td>
                                                <td>{{ $value['listed'] }}</td>
                                                <td>{{ $value['others'] }}</td>
                                                <td>{{ $value['dwtotal'] }}</td>
                                                <td>{{ $value['grandTotal'] }}</td>
                                                <td><a
                                                        href="{{ route('editEmploymentDockLabourBoardsMajorPort', $value['id']) }}">
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
                                            <th>Port Name</th>
                                            <th>Class 1</th>
                                            <th>Class 2</th>
                                            <th>Class 3</th>
                                            <th>Class 4</th>
                                            <th>Total</th>
                                            <th>Registered</th>
                                            <th>Listed</th>
                                            <th>Others</th>
                                            <th>Total</th>
                                            <th>Grand Total</th>
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
