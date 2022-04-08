@extends('backend.layouts.master')

@section('title', 'Product Category Management')
@section('page-name', 'Product Category Management')


@section('main-content')
    @csrf


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Category List</h3>
            <span class="float-right">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                    data-target="#addProductCategoryModal">Add</button>
            </span>
        </div>
        <div class="col-md-12">
            @if (Session::has('status'))
                <h2> added sussecful</h2>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="productCategoryTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr id="tr{{ $category['id'] }}">
                            <td>{{ $i }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>
                                <button class="btn btn-primary btn-xs"
                                    onclick="editPromt('{{ $category['id'] }}')">Edit</button>
                                <button class="btn btn-danger btn-xs"
                                    onclick="deleteProductCategory('{{ $category['id'] }}')">Delete</button>

                                @if ($category['view_in_front'] == '1')
                                    <button class="btn btn-warning btn-xs" onclick="viewProductCategory('{{ $category['id'] }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-xs" onclick="viewProductCategory('{{ $category['id'] }}')">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>

                                @endif

                            </td>
                        </tr>

                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Operation</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- add ProductCategory Modal -->
    <div class="modal fade" id="addProductCategoryModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" id="errorDivForAdd">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Product Category Name" name="addProductCategoryName"
                                    id="addProductCategoryName" required><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveProductCategory()">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- add ProductCategory Modal -->

    <!-- edit ProductCategory Modal -->
    <div class="modal fade" id="editProductCategoryModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" id="errorDivForEdit">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="editProductCategoryId" id="editProductCategoryId" value="0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Product Category Name" name="editProductCategoryName"
                                    id="editProductCategoryName" required><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateProductCategory()">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- edit ProductCategory Modal -->


    <!--   View & Hide -->


@endsection


@section('extra-js')
    <script>
        $(document).ready(function() {
            $('#productCategoryTable').DataTable({
                "scrollX": true,
                "autoWidth": false
            });
        });

        function saveProductCategory() {
            showPreloader();
            var name = $('#addProductCategoryName').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                method: "POST",
                url: "{{ route('productCategory.save') }}",
                data: {
                    name: name,
                    _token: _token
                },
                success: function(response) {

                    if (response) {
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Product Category has been Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        hidePreloader();
                        window.setTimeout(
                            function() {
                                location.reload(true)
                            },
                            1000
                        );
                    }

                },

                error: function(xhr, status, error) {
                    hidePreloader();
                    $("#errorDivForAdd").empty();
                    $.each(xhr.responseJSON.errors, function(key, item) {
                        $("#errorDivForAdd").append("<li class='alert alert-danger'>" + item + "</li>")
                    });

                }

            });
        }

        function editPromt(id) {

            showPreloader();
            $("#errorDivForEdit").empty();

            $.get("productCategory-management/details/" + id, function(productCategory) {

                $('#editProductCategoryId').val(productCategory.id);
                $('#editProductCategoryModal').modal('show');
                $('#editProductCategoryName').val(productCategory.name);
                hidePreloader();
            });
        }

        function updateProductCategory() {

            showPreloader();

            var id = $('#editProductCategoryId').val();
            var name = $('#editProductCategoryName').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                method: "POST",
                url: "{{ route('productCategory.update') }}",
                data: {
                    id: id,
                    name: name,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $('#tr' + response.id + ' td:nth-child(2)').text(response.name);
                        $('#editProductCategoryModal').modal('hide');
                        hidePreloader();
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'ProductCategory has been Updated Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }

                },

                error: function(xhr, status, error) {
                    hidePreloader();
                    $("#errorDivForEdit").empty();
                    $.each(xhr.responseJSON.errors, function(key, item) {
                        $("#errorDivForEdit").append("<li class='alert alert-danger'>" + item + "</li>")
                    });

                }
            });
        }

        function deleteProductCategory(id) {
            Swal.fire({
                title: 'Do you want to delete Product Category?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var _token = $('input[name=_token]').val();
                    $.ajax({
                        method: "PUT",
                        url: "{{ route('productCategory.delete') }}",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(response) {
                            if (response) {
                                swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Product Category has been Deleted Successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            window.setTimeout(
                                function() {
                                    location.reload(true)
                                },
                                1000
                            );
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        }


        function viewProductCategory(id) {
            Swal.fire({
                title: 'Do you want to view Product Category in front?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Proceed',
                denyButtonText: `Don't Proceed`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var _token = $('input[name=_token]').val();
                    $.ajax({
                        method: "PUT",
                        url: "{{ route('productCategory.showInFront') }}",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(response) {
                            if (response) {
                                swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Sccessful',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            window.setTimeout(
                                function() {
                                    location.reload(true)
                                },
                                1000
                            );
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        }
    </script>
@endsection