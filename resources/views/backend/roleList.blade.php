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
                    <h1>Role Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
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
                            <h3 class="card-title">Role Management</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    Add Role
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
                                        <th>Role Name</th>
                                        <th>Role slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value['role_name'] }}</td>
                                        <td>{{ $value['role_slug'] }}</td>
                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#editmodal-lg"
                                                class="edit-role" data-roleID="{{ $value['id'] }}"><i
                                                    class="far fa-edit" aria-hidden="true"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Role Name</th>
                                        <th>Role slug</th>
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <input type="hidden" class="form-control" id="userID" name="created_by"
                            value="{{ Auth::user()->id }}">

                        <div class="card-bod">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="roleName">Role Name</label>
                                        <input type="text" class="form-control roleName" id="roleName"
                                            placeholder="Enter Role Name" name="role_name">
                                        <span class="invalid-feedback role-err" role="alert" id="role-err">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="roleSlug">Role Slug</label>
                                        <input type="text" class="form-control" id="roleSlug" placeholder="Role Slug"
                                            name="role_slug" disabled>
                                    </div>
                                </div>
                            </div>
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

    <!-- /.content -->
    <div class="modal fade" id="editmodal-lg">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <input type="hidden" class="form-control editupdatedby" id="" value="{{ Auth::user()->id }}"
                            name="updated_by">
                            <input type="hidden" class="form-control editroleId" id="roleId" name="roleId">

                        <div class="card-bod">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="editroleName">Role Name</label>
                                        <input type="text" class="form-control editroleName roleName" id="editroleName"
                                            placeholder="Enter Role Name" name="role_name">
                                        <span class="invalid-feedback role-err" role="alert" id="role-err">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="editroleSlug">Role Slug</label>
                                        <input type="text" class="form-control editroleSlug roleSlug" id="editroleSlug"
                                            placeholder="Role Slug" name="role_slug" disabled>
                                    </div>
                                </div>
                            </div>
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
        // Ajex Request For Create Role

        $(".btn-submit").click(function(e) {

            e.preventDefault();

            var role_name = $('#roleName').val();
            var role_slug = $('#roleSlug').val();
            var created_by = $('#userID').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('role.create') }}",
                data: {
                    role_name: role_name,
                    role_slug: role_slug,
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
                console.log("msg = " + msg);
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

        // Edit Ajex Request

        // Use event delegation to capture the click event
        $(document).on("click", ".edit-role", function(e) {
            e.preventDefault();
            var roleID = $(this).data('roleid');

            $.ajax({
                type: 'GET',
                url: '/roleEdit/' + roleID,
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Populate the modal form fields with user data
                        $('#roleId').val(data.id);
                        $('#editroleName').val(data.role_name);
                        $('#editroleSlug').val(data.role_slug);
                        // alert(data.port_id);
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
            var roleId = $('.editroleId').val();
            var role_name = $('.editroleName').val();
            var role_slug = $(".editroleSlug").val();
            var updated_by = $(".editupdatedby").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('role.create') }}",
                data: {
                    id: roleId,
                    role_name: role_name,
                    role_slug: role_slug,
                    updated_by: updated_by
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

{{-- <script type="text/javascript">
    // Use event delegation to capture the click event
        $(document).on("click", ".edit-role", function(e) {
            e.preventDefault();

            // Get the role ID from the clicked element's data attribute
            var roleId = $(this).data('roleid');

            // Define the Ajax request to fetch role data for editing
            $.ajax({
                type: 'GET',
                url: '/role/edit/' + roleId,
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Populate the modal form fields with role data
                        $('#roleIdEdit').val(data.id);
                        $('#roleNameEdit').val(data.role_name);
                        $('#roleSlugEdit').val(data.role_slug);

                        // Update the selected options in dropdowns or perform any other necessary updates
                        // (e.g., updating other fields based on the retrieved data)

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

        // Ajax Request for Edit Role
        $(".btn-edit").click(function(e) {
            e.preventDefault();

            // Get role ID and updated values from the form
            var roleId = $('#roleIdEdit').val();
            var role_name = $('#roleNameEdit').val();
            var role_slug = $('#roleSlugEdit').val();

            // Prepare data for Ajax request
            var requestData = {
                id: roleId,
                role_name: role_name,
                role_slug: role_slug
            };

            // Define the Ajax request for editing role
            $.ajax({
                type: 'POST',
                url: "{{ route('role.edit') }}",
                data: requestData,
                success: function(data) {
                    if (data.success == true && $.isEmptyObject(data.error)) {
                        // If the request is successful and no errors, reload the page after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        // If there are errors, display them
                        printErrorMsg(data.error);
                    }
                }
            });

            // Function to display error messages
            function printErrorMsg(msg) {
                console.log("msg = " + msg);
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

</script> --}}
@endsection
