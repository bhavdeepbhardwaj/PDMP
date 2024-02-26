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
                        <h1>User Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Data</li>
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
                                <h3 class="card-title">User Management</h3>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-xl">
                                        <i class="fas fa-plus"></i> Add User
                                    </button>
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
                                            <th>Name</th>
                                            <th>Position / Role</th>
                                            <th>Office / Department</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Status (Active / Inactive)</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userList as $key => $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value['name'] }}</td>
                                                <td>
                                                    <?php $roleName = \App\Models\Role::where('id', $value['role_id'])
                                                        ->first()
                                                        ->toArray(); ?>
                                                    {{ $roleName['role_name'] }}
                                                </td>
                                                <td><?php $depName = \App\Models\Department::where('id', $value['dep_id'])
                                                    ->first()
                                                    ->toArray(); ?>
                                                    {{ $depName['name'] }}
                                                </td>
                                                <td>{{ $value['email'] }}</td>
                                                <td>{{ $value['username'] }}</td>
                                                <td>
                                                    @if ($value['is_deleted'] == '0')
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ date('jS \of F Y h:i:s A', strtotime($value['created_at'])) }}
                                                </td>
                                                <td>{{ date('jS \of F Y h:i:s A', strtotime($value['updated_at'])) }}
                                                </td>
                                                <td class="">
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#editmodal-xl" class="edit-user"
                                                        data-UserId="{{ $value['id'] }}"><i class="far fa-edit"
                                                            aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Position / Role</th>
                                            <th>Office / Department</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Status (Active / Inactive)</th>
                                            <th>Created</th>
                                            <th>Updated</th>
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
        <!-- /.content -->
        <!--  -->
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="content">
                            {{-- <form> --}}
                            <div class="container-fluid">
                                <div class="row">
                                    <input type="hidden" class="form-control" id="createdBy"
                                        value="{{ Auth::user()->id }}" name="created_by">
                                    <div class="col-md-6">
                                        <div class="card-primary">
                                            <div class="card-body">
                                                {{-- Add the form tag with an id for easier selection --}}
                                                <form id="userForm">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Enter Name" name="name"
                                                            value="{{ old('name') }}">
                                                        <span class="invalid-feedback name-err" role="alert"
                                                            id="name-err"></span>
                                                    </div>
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
                                                        <span class="invalid-feedback department-err" role="alert"
                                                            id="department-err"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="port_type">Port Type</label>
                                                        <select class="form-control" name="port_type" id="port_type">
                                                            <option value=''>---Select--</option>
                                                            @foreach ($portCatName as $key => $value)
                                                                <option value="{{ $value['id'] }}">
                                                                    {{ $value['category_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="invalid-feedback porttype-err" role="alert"
                                                            id="porttype-err"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="report_to">Report Officer</label>
                                                        <select class="form-control" name="report_to" id="reportTo">
                                                            <option value=''>---Select--</option>
                                                            @foreach ($reportList as $key => $value)
                                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="invalid-feedback report-err" role="alert"
                                                            id="report-err"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card-primary">
                                            <div class="card-body">
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
                                                    <span class="invalid-feedback role-err" role="alert"
                                                        id="role-err"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="email" placeholder="Enter Email">
                                                    <span class="invalid-feedback email-err" role="alert"
                                                        id="email-err"></span>
                                                </div>
                                                <div class="form-group" id="showPortName">
                                                    <label for="port_id">Port</label>
                                                    <select class="form-control" name="port_id" id="port_id">
                                                        <option value=''>---Select--</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control @error('status') is-invalid @enderror"
                                                        name="status" id="user_status">
                                                        <option value=''>---Select--</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="invalid-feedback status-err" role="alert"
                                                        id="status-err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary btn-submit">Save changes</button>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </section>

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
                        <h4 class="modal-title">Edit User Detials</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <section class="content">
                            {{-- <form> --}}
                            <div class="container-fluid">

                                <input type="hidden" class="form-control editcreatedby" id="createdByedit"
                                    value="{{ Auth::user()->id }}" name="created_by">
                                <input type="hidden" name="userId" id="userId" class="form-control edituserid">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-primary">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="userName">Name</label>
                                                    <input type="text" class="form-control editUsername"
                                                        id="userName" placeholder="Enter Name" name="name"
                                                        value="{{ old('name') }}">
                                                    <span class="invalid-feedback name-err" role="alert"
                                                        id="name-err">
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dep_idEdit">Office / Department</label>
                                                    <select
                                                        class="form-control @error('dep_id') is-invalid @enderror editdepid"
                                                        name="dep_id" id="dep_idEdit">
                                                        <option value=''>---Select--</option>
                                                        @foreach ($depID as $dep)
                                                            <option value="{{ $dep->id }}">{{ $dep->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback department-err" role="alert"
                                                        id="department-err">
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="portTypeEdit">Port Type</label>
                                                    <select class="form-control editportType" name="port_type"
                                                        id="portTypeEdit">
                                                        <option value=''>---Select--</option>
                                                        @foreach ($portCatName as $key => $value)
                                                            {{-- {{dd($portCatName);}} --}}
                                                            <option value="{{ $value['id'] }}">
                                                                {{ $value['category_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback porttype-err" role="alert"
                                                        id="porttype-err">
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reportIdEdit">Report Officer</label>
                                                    <select class="form-control editreportId" name="report_to"
                                                        id="reportIdEdit">
                                                        <option value=''>---Select--</option>
                                                        @foreach ($reportList as $key => $value)
                                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback report-err" role="alert"
                                                        id="report-err">
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card-primary">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="role_idEdit">Position / Role</label>
                                                    <select
                                                        class="form-control @error('role_id') is-invalid @enderror editroleid"
                                                        name="role_id" id="role_idEdit">
                                                        <option value=''>---Select--</option>
                                                        @foreach ($roleId as $value)
                                                            <option value="{{ $value->id }}">{{ $value->role_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback role-err" role="alert"
                                                        id="role-err">
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailId">Email</label>
                                                    <input type="email" class="form-control editemail" name="email"
                                                        id="emailId" placeholder="Enter Email">
                                                    <span class="invalid-feedback email-err" role="alert"
                                                        id="email-err">
                                                    </span>
                                                </div>
                                                <div class="form-group" id="showPortName">
                                                    <label for="portIdEdit">Port</label>
                                                    <select class="form-control editportId" name="port_id"
                                                        id="portIdEdit">
                                                        <option value=''>---Select--</option>
                                                        @foreach ($portName as $pname)
                                                            <option value="{{ $pname->id }}">{{ $pname->port_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="statusIdEdit">Status (Active / Inactive)</label>
                                                    <select
                                                        class="form-control @error('status') is-invalid @enderror editstatus"
                                                        name="status" id="statusIdEdit">
                                                        <option value=''>---Select--</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="invalid-feedback status-err" role="alert"
                                                        id="status-err">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- </form> --}}

                        </section>
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
        <!--  -->
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

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit").click(function(e) {
            e.preventDefault();

            var name = $("input[name=name]").val();
            var role_id = $('#role_id').val();
            var dep_id = $('#dep_id').val();
            var status = $('#user_status').val();
            var email = $("input[name=email]").val();
            var port_id = $('#port_id').val();
            var port_type = $('#port_type').val();
            var report_to = $('#reportTo').val();
            var created_by = $('#createdBy').val();


            $.ajax({
                type: 'POST',
                url: "{{ route('user.create') }}",
                data: {
                    name: name,
                    role_id: role_id,
                    dep_id: dep_id,
                    status: status,
                    email: email,
                    port_id: port_id,
                    port_type: port_type,
                    report_to: report_to,
                    created_by: created_by,
                },
                success: function(data) {
                    if (data.success && $.isEmptyObject(data.error)) {
                        // showSuccessToast(data.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

            // function showSuccessToast(message) {
            //     var Toast = Swal.mixin({
            //         toast: true,
            //         position: 'top-end',
            //         showConfirmButton: false,
            //         timer: 3000
            //     });
            //     Toast.fire({
            //         icon: 'success',
            //         title: message
            //     });
            // }

            function printErrorMsg(msg) {
                $('.invalid-feedback').css('display', 'none');
                var errMsg = msg.substring(4);
                var errKey = errMsg.split(' ')[0];
                var errMsgId = errKey + '-err';
                $('#' + errMsgId).css('display', 'block').html(msg);
            }
        });

        // Use event delegation to capture the click event
        $(document).on("click", ".edit-user", function(e) {
            e.preventDefault();
            var userId = $(this).data('userid');

            $.ajax({
                type: 'GET',
                url: '/useredit/' + userId,
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Populate the modal form fields with user data
                        $('#userId').val(data.id);
                        $('#uname').val(data.username);
                        $('#userName').val(data.name);
                        $('#emailId').val(data.email);
                        $('#role_idEdit').val(data.role_id);
                        $('#dep_idEdit').val(data.dep_id);
                        $('#statusIdEdit').val(data.status);
                        $('#portTypeEdit').val(data.port_type);
                        $('#portIdEdit').val(data.port_id);
                        $('#reportIdEdit').val(data.report_to);
                        // alert(data.port_id);

                        // Update the selected options in dropdowns
                        $('#role_idEdit').find('option[value="' + data.role_id + '"]').prop('selected',
                            true);
                        $('#statusIdEdit').find('option[value="' + data.status + '"]').prop('selected',
                            true);
                        $('#portTypeEdit').find('option[value="' + data.port_type + '"]').prop(
                            'selected',
                            true);
                        $('#portIdEdit').find('option[value="' + data.port_id + '"]').prop('selected',
                            true);
                        $('#reportIdEdit').find('option[value="' + data.report_to + '"]').prop(
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
            var uid = $('.edituserid').val();
            var username = $('.edituname').val();
            var name = $(".editUsername").val();
            var email = $('.editemail').val();
            var role_id = $('.editroleid').val();
            var dep_id = $('.editdepid').val();
            var status = $('.editstatus').val();
            var port_type = $('.editportType').val();
            var port_id = $('.editportId').val();
            // alert(port_id);
            var report_to = $('.editreportId').val();
            var created_by = $('.editcreatedby').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('user.create') }}",
                data: {
                    id: uid,
                    username: username,
                    name: name,
                    role_id: role_id,
                    dep_id: dep_id,
                    status: status,
                    email: email,
                    port_type: port_type,
                    port_id: port_id,
                    report_to: report_to,
                    created_by: created_by,

                },
                success: function(data) {
                    if (data.success == true && $.isEmptyObject(data.error)) {

                        // var Toast = Swal.mixin({
                        //     toast: true,
                        //     position: 'top-end',
                        //     showConfirmButton: false,
                        //     timer: 3000
                        // });
                        // Toast.fire({
                        //     icon: 'info',
                        //     title: "User Updated!!"
                        // });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

            function printErrorMsg(msg) {
                // $(".print-error-msg").find("ul").html('');
                // $(".print-error-msg").css('display', 'block');
                // $.each(msg, function(key, value) {
                //     console.log("value = "+value);
                //     console.log("key = "+key);
                //     $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                // });
                // $('.invalid-feedback').css('display', 'none');
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
