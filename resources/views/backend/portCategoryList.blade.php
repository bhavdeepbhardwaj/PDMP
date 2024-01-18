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
                    <h1>All Port Category Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Port Category</li>
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
                            <h3 class="card-title">All Port Category Management</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    Add Category
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('backend.component.flush')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portCatData as $key => $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value['category_name'] }}</td>
                                        <td>{{ $value['slug'] }}</td>
                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#editmodal-xl"
                                                class="edit-data" data-dataid="{{ $value['id'] }}"><i
                                                    class="far fa-edit" aria-hidden="true"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
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
                                        <label for="categoryName">Name</label>
                                        <input type="text" class="form-control categoryName" id="categoryName"
                                            placeholder="Enter Category Name" name="category_name">
                                        <span class="invalid-feedback category-err" role="alert" id="category-err">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Enter Slug Name"
                                            name="slug" disabled>
                                        <span class="invalid-feedback slug-err" role="alert" id="slug-err">
                                        </span>
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
    <div class="modal fade" id="editmodal-xl">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <input type="hidden" name="userId" id="editdataid" class="form-control editdataid">
                        <input type="hidden" class="form-control editupdatedby" id="" name="updated_by"
                            value="{{ Auth::user()->id }}">
                        <div class="card-bod">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="editname">Name</label>
                                        <input type="text" class="form-control editname categoryName" id="editname"
                                            placeholder="Enter Category Name" name="category_name">
                                        <span class="invalid-feedback category-err" role="alert" id="category-err">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="editslug">Slug</label>
                                        <input type="text" class="form-control editslug slug" id="editslug"
                                            placeholder="Enter Slug Name" name="slug" disabled>
                                        <span class="invalid-feedback slug-err" role="alert" id="slug-err">
                                        </span>
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
<script>
    $(document).ready(function() {
            $('.categoryName').keyup(function() {
                var categoryName = $(this).val();
                var regex = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
                var text = categoryName.toLowerCase().replace(/[^a-z]+/g, "-");
                $('#slug').val(text);
                $('.slug').val(text);
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
            var categoryName = $('#categoryName').val();
            var slug = $('#slug').val();
            var created_by = $('#userID').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('portCategory.create') }}",
                data: {
                    category_name: categoryName,
                    slug: slug,
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

        // Use event delegation to capture the click event
        $(document).on("click", ".edit-data", function(e) {
            e.preventDefault();
            var dataid = $(this).data('dataid');

            $.ajax({
                type: 'GET',
                url: '/portCategoryEdit/' + dataid,
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Populate the modal form fields with user data
                        $('#editdataid').val(data.id);
                        $('#editname').val(data.category_name);
                        $('#editslug').val(data.slug);
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

            var dataid = $('.editdataid').val();
            var category_name = $('.editname').val();
            var slug = $('.editslug').val();
            var updated_by = $('.editupdatedby').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('portCategory.create') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: dataid,
                    category_name: category_name,
                    slug: slug,
                    updated_by: updated_by,
                },
                success: function(data) {
                    if (data.success == true && $.isEmptyObject(data.error)) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        printErrorMsg(data.error);
                    }
                },
            });
        });
</script>
@endsection
