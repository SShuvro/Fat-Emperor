@extends('backend.layouts.master')

@section('title', 'Product Management')
@section('page-name', 'Product Management')


@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product List</h3>
            <span class="float-right">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                    data-target="#addProductModal">Add</button>
            </span>
        </div>
        <div class="col-md-12">
            @if (Session::has('status'))
                <h2> added sussecful</h2>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="productTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr id="tr{{ $product['id'] }}">
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{{ url('/') }}/public/restaurantImages/{{ $product['image'] }}" alt=""
                                    style="height: 64px; width:auto;">
                            </td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['subcategory'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>
                                <button class="btn btn-primary btn-xs"
                                    onclick="editPromt('{{ $product['id'] }}')">Edit</button>
                                <button class="btn btn-danger btn-xs"
                                    onclick="deleteProduct('{{ $product['id'] }}')">Delete</button>

                                @if ($product['view_in_front'] == '1')
                                    <button class="btn btn-warning btn-xs" onclick="viewProduct('{{ $product['id'] }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-xs" onclick="viewProduct('{{ $product['id'] }}')">
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Operation</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- add ProductCategory Modal -->
    <div class="modal fade" id="addProductModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="errorDivForAdd">

                        </div>
                    </div>
                    <form method="post" id="upload-image-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name"
                                        name="addProductName" id="addProductName" required><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Category for the Products Sub Category</label>

                                    <select class="form-control getSubcategoryFromCategory" class=""
                                        name="addProductCategory" id="addProductCategory" required>
                                        <option selected="true" disabled="disabled">Choose One Category</option>    
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category['id'] }}">
                                                {{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Sub Category</label>

                                    <select class="form-control" name="addProductSubCategory" id="addProductSubCategory"
                                        required>
                                        
                                        {{-- @foreach ($subcategorys as $subcategory)
                                            <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" class="form-control" placeholder="Product Price"
                                        name="addProductPrice" id="addProductPrice" required><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea type="text" class="form-control" placeholder="Product Description"
                                        name="addProductDescription" id="addProductDescription" cols="10" rows="5"
                                        required></textarea><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Product Image</label>
                                <input type="file" accept="image/*" name="addProductImage" id='addProductImage'
                                    onchange="loadFile(event)" class=" justify-content-center">
                                <img id="output" style="height: 192px; width: 350px; margin-top: 35px;" />

                            </div>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- add Product Modal -->

    <!-- edit Product Modal -->
    <div class="modal fade" id="editProductModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="errorDivForEdit">
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
                    <form method="post" enctype="multipart/form-data" id="update-image-form">
                        {{-- @csrf --}}
                        <input type="hidden" name="editProductId" id="editProductId" value="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name"
                                        name="editProductName" id="editProductName" required><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Category for the Products Sub Category</label>

                                    <select class="form-control getSubcategoryFromCategoryEdit" name="editProductCategory" id="editProductCategory"
                                        required>
                                        {{-- <option selected="true" disabled="disabled">Choose One Category</option> --}}
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Sub Category</label>

                                    <select class="form-control" name="editProductSubCategory" id="editProductSubCategory"
                                        required>
                                        @foreach ($subcategorys as $subcategory)
                                            <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" class="form-control" placeholder="Product Price"
                                        name="editProductPrice" id="editProductPrice" required><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea type="text" class="form-control" placeholder="Product Description"
                                        name="editProductDescription" id="editProductDescription" cols="10" rows="5"
                                        required></textarea><br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Product Image</label>
                                <input type="file" accept="image/*" name="editProductImage" id='editProductImage'
                                    onchange="loadFile(event)" class=" justify-content-center">
                                <img id="edit_output" style="height: 192px; width: 350px; margin-top: 35px;" />

                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- edit Product Modal -->


    <!--   View & Hide -->


@endsection


@section('extra-js')
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "scrollX": true,
                "autoWidth": false
            });
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        var loadFileforEdit = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('edit_output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('#upload-image-form').submit(function(e) {
            e.preventDefault();
            showPreloader();
            let formData = new FormData(this);
            // console.log(formData);
            $('#errorDivForAdd').text('');

            $.ajax({
                cache: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('product.save') }}",
                data: formData,

                contentType: false,
                processData: false,
                success: (response) => {
                    if (response) {
                        // console.log('a a '+data);
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Product has been Added Successfully!',
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
                error: function(response) {
                    // console.log('errpr foud!----'+response);
                    // $('#errorDivForaddPhaseFiles').text();
                }
            });
        });

        function editPromt(id) {

            showPreloader();
            $("#errorDivForEdit").empty();

            $.get("product-management/details/" + id, function(product) {

                $('#editProductId').val(product.id);
                $('#editProductName').val(product.name);
                $('#editProductCategory').val(product.category);
                $('#editProductSubCategory').val(product.subcategory);
                $('#editProductDescription').val(product.description);
                $('#editProductPrice').val(product.price);

                var path = "{{ url('/') }}";
                $('#edit_output').attr('src', path + "/public/restaurantImages/" + product.image);
                $('#editProductModal').modal('show');
                hidePreloader();
            });
        }

        $('.getSubcategoryFromCategory').on('change', function() { 
            var id = $(this).find(":selected").val();
            $.get("product-management/subCategorySelect/" + id, function(subCategory) {
                $('#addProductSubCategory').html('');
                $.each(subCategory, function(key, value) {
                    $('#addProductSubCategory').append(`<option value=`+value.id+`>`+value.name+
                                            `</option>`);
                    
                });
            });
        });

        $('.getSubcategoryFromCategoryEdit').on('change', function() { 
            var id = $(this).find(":selected").val();
            $.get("product-management/subCategorySelect/" + id, function(subCategory) {
                $('#editProductSubCategory').html('');
                $.each(subCategory, function(key, value) {
                    $('#editProductSubCategory').append(`<option value=`+value.id+`>`+value.name+
                                            `</option>`);
                    
                });
            });
        });


        $('#update-image-form').submit(function(e) {
            e.preventDefault();
            showPreloader();
            let editformData = new FormData(this);
            // console.log(editformData);
            $('#errorDivForEdit').text('');

            $.ajax({
                cache: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('product.update') }}",
                data: editformData,

                contentType: false,
                processData: false,
                success: (response) => {
                    if (response) {
                        // console.log('a a ' + data);
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Product has been Updated Successfully!',
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
                error: function(response) {
                    console.log('error found!----' + response);
                    // $('#errorDivForaddPhaseFiles').text();
                }
            });
        });

        function deleteProduct(id) {
            Swal.fire({
                title: 'Do you want to delete Product?',
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
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('product.delete') }}",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(response) {
                            if (response) {
                                swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Product has been Deleted Successfully',
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


        function viewProduct(id) {
            Swal.fire({
                title: 'Do you want to view Product in front?',
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
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('product.showInFront') }}",
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
