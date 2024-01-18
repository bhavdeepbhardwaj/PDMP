@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css  ') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Port Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Port</li>
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
                            <h3 class="card-title">All Port Management</h3>
                            <div class="float-right">
                                @if ($permissionData->create == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-xl">
                                    Add Port
                                </button>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('backend.component.flush')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Port Type</th>
                                        <th>Port Name</th>
                                        <th>Port Code</th>
                                        <th>Port Data Code</th>
                                        @if ($permissionData->deleted == 1 || $permissionData->edit == 1)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portName as $key => $value)
                                    @php
                                    $portCat = \App\Models\PortCategory::where('id', $value['port_type'])
                                    ->select('category_name')
                                    ->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @if ($portCat->category_name == 'Major Port')
                                            <span class="badge bg-primary p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @elseif($portCat->category_name == 'Non Major Port')
                                            <span class="badge bg-cyan p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @elseif($portCat->category_name == 'Shipping Sector')
                                            <span class="badge bg-purple p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @elseif($portCat->category_name == 'Other Organisations')
                                            <span class="badge bg-pink p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @elseif($portCat->category_name == 'Sagarmala + ALHW Project')
                                            <span class="badge bg-red p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @else
                                            <span class="badge bg-primary p-2" style="font-size: small;">{{
                                                $portCat->category_name }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $value['port_name'] }}</td>
                                        <td>{{ $value['port_code'] }}</td>
                                        <td>{{ $value['port_data_code'] }}</td>
                                        @if ($permissionData->deleted == 1 || $permissionData->edit == 1)
                                        <td class="actions">

                                            @if ($permissionData->edit == 1)
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editmodal-xl"
                                                class="edit-data" data-dataid="{{ $value['id'] }}"><i
                                                    class="far fa-edit" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Port Type</th>
                                        <th>Port Name</th>
                                        <th>Port Code</th>
                                        <th>Port Data Code</th>
                                        @if ($permissionData->deleted == 1 || $permissionData->edit == 1)
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
    <!-- /.content -->
    <!--  -->
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Port</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <input type="hidden" class="form-control" id="userID" name="created_by"
                            value="{{ Auth::user()->id }}">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Port Type</th>
                                        <th>Port Name</th>
                                        <th>Port Code</th>
                                        <th>Port Data Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="port_type" id="port_type">
                                                <option value=''>---Select--</option>
                                                @foreach ($portCatName as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['category_name'] }}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback port_type-err" role="alert"
                                                id="port_type-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="port_name" id="port_name">
                                            <span class="invalid-feedback port_name-err" role="alert"
                                                id="port_name-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="port_code" id="port_code">
                                            <span class="invalid-feedback port_code-err" role="alert"
                                                id="port_code-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="port_data_code"
                                                id="port_data_code">
                                            <span class="invalid-feedback port_data-err" role="alert"
                                                id="port_data-err"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-submit">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!--  -->
    <!--  -->
    <div class="modal fade" id="editmodal-xl">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Port</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <input type="hidden" class="form-control editupdatedby" id="" value="{{ Auth::user()->id }}"
                            name="updated_by">
                        <input type="hidden" class="form-control editdataid" id="editdataid" name="userID">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Port Type</th>
                                        <th>Port Name</th>
                                        <th>Port Code</th>
                                        <th>Port Data Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control editPortType" name="port_type"
                                                id="editPortType">
                                                <option value=''>---Select--</option>
                                                @foreach ($portCatName as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['category_name'] }}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback port_type-err" role="alert"
                                                id="port_type-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control editPortName" name="port_name"
                                                id="editPortName">
                                            <span class="invalid-feedback port_name-err" role="alert"
                                                id="port_name-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control editPortCode" name="port_code"
                                                id="editPortCode">
                                            <span class="invalid-feedback port_code-err" role="alert"
                                                id="port_code-err"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control editPortData" name="port_data_code"
                                                id="editPortData">
                                            <span class="invalid-feedback port_data-err" role="alert"
                                                id="port_data-err"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary editbtn-submit">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL -->
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
<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Ajex Request For Create Role

        $(".btn-submit").click(function(e) {
            e.preventDefault();
            var port_type = $('#port_type').val();
            var port_name = $('#port_name').val();
            var port_code = $('#port_code').val();
            var port_data_code = $('#port_data_code').val();
            var created_by = $('#userID').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('port.create') }}",
                data: {
                    port_type: port_type,
                    port_name: port_name,
                    port_code: port_code,
                    port_data_code: port_data_code,
                    created_by: created_by
                },
                success: function(data) {
                    if (data.success == true && $.isEmptyObject(data.error)) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

            function printErrorMsg(msg) {
                $('.invalid-feedback').css('display', 'none');
                var errMsg = msg;
                var modifiedString = errMsg.substring(4);
                var errKey = modifiedString.split(' ');
                var errKeyFirst = errKey[0];
                var errMsgId = errKeyFirst + '-err';
                $('#' + errMsgId).css('display', 'block');
                $('#' + errMsgId).html(msg);
                // alert(errKeyFirst);
            }
        });

        // Use event delegation to capture the click event
        $(document).on("click", ".edit-data", function(e) {
            e.preventDefault();
            var dataid = $(this).data('dataid');

            $.ajax({
                type: 'GET',
                url: '/portEdit/' + dataid,
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Populate the modal form fields with user data
                        $('#editdataid').val(data.id);
                        $('#editPortName').val(data.port_name);
                        $('#editPortCode').val(data.port_code);
                        $('#editPortData').val(data.port_data_code);
                        // Update the selected options in dropdowns
                        $('#editPortType').find('option[value="' + data.port_type + '"]').prop(
                            'selected',
                            true);
                    } else {
                        // Handle the case where data is not available or not in the expected format
                        console.error('Invalid data received from the server.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors if needed
                    console.error('AJAX Request Failed:', status, error);
                }
            });
        });

        $(".editbtn-submit").click(function(e) {
            e.preventDefault();

            // Retrieve values from form fields
            var dataid = $('.editdataid').val();
            var port_type = $('.editPortType').val();
            var port_name = $('.editPortName').val();
            var port_code = $('.editPortCode').val();
            var port_data_code = $('.editPortData').val();
            var updated_by = $('.editupdatedby').val();

            // AJAX request to update the Port
            $.ajax({
                type: 'POST',
                url: "{{ route('port.create') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: dataid,
                    port_type: port_type,
                    port_name: port_name,
                    port_code: port_code,
                    port_data_code: port_data_code,
                    updated_by: updated_by,
                },
                success: function(data) {
                    // Check if the server response indicates success
                    if (data.success == true && $.isEmptyObject(data.error)) {
                        // Reload the page after a successful update
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        // Handle errors by displaying error messages
                        printErrorMsg(data.error);
                    }
                },
                error: function(xhr) {
                    // Handle AJAX request errors
                    console.error('Error in AJAX request:', xhr.responseText);
                },
            });
            function printErrorMsg(msg) {
                $('.invalid-feedback').css('display', 'none');
                var errMsg = msg;
                var modifiedString = errMsg.substring(4);
                var errKey = modifiedString.split(' ');
                var errKeyFirst = errKey[0];
                var errMsgId = errKeyFirst + '-err';
                $('#' + errMsgId).css('display', 'block');
                $('#' + errMsgId).html(msg);
                // alert(errKeyFirst);
            }
        });
</script>
@endsection
