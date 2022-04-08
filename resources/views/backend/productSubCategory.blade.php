@extends('backend.layouts.master')

@section('title', 'Product Sub Category Management')
@section('page-name', 'Product Sub Category Management')


@section('main-content')
    @csrf


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Sub Category List</h3>
            <span class="float-right">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                    data-target="#addProductSubCategoryModal">Add</button>
            </span>
        </div>
        <div class="col-md-12">
            @if (Session::has('status'))
                <h2> added sussecful</h2>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="productSubCategoryTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
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

                            <td>{{ $category['category'] }}</td>

                            <td>
                                <button class="btn btn-primary btn-xs"
                                    onclick="editPromt('{{ $category['id'] }}')">Edit</button>
                                <button class="btn btn-danger btn-xs"
                                    onclick="deleteProductSubCategory('{{ $category['id'] }}')">Delete</button>

                                @if ($category['view_in_front'] == '1')
                                    <button class="btn btn-warning btn-xs"
                                        onclick="viewProductSubCategory('{{ $category['id'] }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-xs"
                                        onclick="viewProductSubCategory('{{ $category['id'] }}')">
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
                        <th>Category</th>
                        <th>Operation</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- add ProductCategory Modal -->
    <div class="modal fade" id="addProductSubCategoryModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="errorDivForAdd">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Sub Category Name</label>
                                <input type="text" class="form-control" placeholder="Product Sub Category Name"
                                    name="addProductName" id="addProductName" required><br>
                            </div>
                        </div>
            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select A Category for the Product Sub Category</label>

                                <select class="form-control" name="addProductCategory" id="addProductCategory" required>
                                    @foreach ($categorys as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSubProductCategory()">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- add ProductCategory Modal -->

    <!-- edit ProductCategory Modal -->
    <div class="modal fade" id="editProductSubCategoryModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Sub Category</h4>
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
                    <input type="hidden" name="editProductSubCategoryId" id="editProductSubCategoryId" value="0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Product Category Name"
                                    name="editProductName" id="editProductName" required><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select A Category for the Products Sub Category</label>

                                <select class="form-control" name="editProductCategory" id="editProductCategory" required>
                                    @foreach ($categorys as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateProductSubCategory()">Save</button>
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
            $('#productSubCategoryTable').DataTable({
                "scrollX": true,
                "autoWidth": false
            });
        });


        function saveSubProductCategory() {
            showPreloader();
            var name = $('#addProductName').val();
            var category = $('#addProductCategory').val();
 
            var _token = $('input[name=_token]').val();

            $.ajax({
                method: "POST",
                url: "{{ route('productSubCategory.save') }}",
                data: {
                    name: name,
                    category: category,
                    _token: _token
                },
                success: function(response) {

                    if (response) {
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Product Sub Category has been Added Successfully',
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

            $.get("productSubCategory-management/details/" + id, function(productSubCategory) {

                $('#editProductSubCategoryId').val(productSubCategory.id);
                $('#editProductSubCategoryModal').modal('show');
                $('#editProductName').val(productSubCategory.name);
                $('#editProductCategory').val(productSubCategory.category);
                hidePreloader();
            });
        }

        function updateProductSubCategory() {

            showPreloader();

            var id = $('#editProductSubCategoryId').val();
            var name = $('#editProductName').val();
            var category = $('#editProductCategory').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                method: "POST",
                url: "{{ route('productSubCategory.update') }}",
                data: {
                    id: id,
                    name: name,
                    category: category,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        // console.log(response);
                        $('#tr' + response.id + ' td:nth-child(1)').text(response.name);
                        $('#tr' + response.id + ' td:nth-child(2)').text(response.category);
                        $('#editProductSubCategoryModal').modal('hide');
                        hidePreloader();
                        window.setTimeout(
                            function() {
                                location.reload(true)
                            },
                            1000
                        );
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Product Sub Category has been Updated Successfully',
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

        function deleteProductSubCategory(id) {
            Swal.fire({
                title: 'Do you want to delete Product Sub Category?',
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
                        url: "{{ route('productSubCategory.delete') }}",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(response) {
                            if (response) {
                                swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Product Sub Category has been Deleted Successfully',
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


        function viewProductSubCategory(id) {
            Swal.fire({
                title: 'Do you want to view Product Sub Category in front?',
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
                        url: "{{ route('productSubCategory.showInFront') }}",
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
