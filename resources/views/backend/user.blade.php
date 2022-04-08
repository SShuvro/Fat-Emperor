@extends('backend.layouts.master')

@section('title', 'User Management')
@section('page-name', 'User Management')


@section('main-content')
    @csrf

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
            <span class="float-right">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                    data-target="#addUserModal">Add</button>
            </span>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>User Type</th>
                        <th>Details</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr id="tr{{ $user['id'] }}">
                            <td>{{ $i }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['designation'] }}</td>
                            <td>{{ $user['user_type_name'] }}</td>
                            <td>
                                Created By: {{ $user['created_by'] }} <br>
                                Created At: {{ $user['created_at'] }} <br>
                                Deleted By: {{ $user['deleted_by'] }} <br>
                                Deleted At: {{ $user['deleted_at'] }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-xs"
                                    onclick="editPromt('{{ $user['id'] }}')">Edit</button>
                                <button class="btn btn-danger btn-xs"
                                    onclick="deleteUser('{{ $user['id'] }}')">Delete</button>
                            </td>
                        </tr>user

                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>User Type</th>
                        <th>Details</th>
                        <th>Operation</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- add User Modal -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="User Name" name="addUserName"
                                    id="addUserName" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="User Email" name="addUserEmail"
                                    id="addUserEmail" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="User Phone Number"
                                    name="addUserPhone" id="addUserPhone" required><br>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" placeholder="User Designation"
                                    name="addUserDesignation" id="addUserDesignation" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select User Type</label>
                                <select id="addUserUserType" class="form-control" name="addUserUserType">
                                    <option value="null" selected disabled>--Select A Type--</option>
                                    @foreach ($usertypes as $userType)
                                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="User Password"
                                    name="addUserPassword" id="addUserPassword" required><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUser()">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- add User Modal -->

    <!-- edit User Modal -->
    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
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
                    <input type="hidden" name="editUserId" id="editUserId" value="0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="User Name" name="editUserName"
                                    id="editUserName" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="User Email" name="editUserEmail"
                                    id="editUserEmail" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="User Phone Number"
                                    name="editUserPhone" id="editUserPhone" required><br>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" placeholder="User Designation"
                                    name="editUserDesignation" id="editUserDesignation" required><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select User Type</label>
                                <select id="editUserType" class="form-control" name="editUserType">
                                    <option value="null" selected disabled>--Select A Type--</option>

                                    @foreach ($usertypes as $userType)
                                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"
                                    placeholder="Type If You Need to Update The Password !" name="editUserPassword"
                                    id="editUserPassword" required><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateUser()">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- edit User Modal -->
@endsection


@section('extra-js')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "scrollX": true,
                "autoWidth": false
            });
        });


        function saveUser() {
            showPreloader();
            var name = $('#addUserName').val();
            var email = $('#addUserEmail').val();
            var phone = $('#addUserPhone').val();
            var designation = $('#addUserDesignation').val();
            var usertype = $('#addUserUserType').val();
            var password = $('#addUserPassword').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                method: "POST",
                url: "{{ route('user.save') }}",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    designation: designation,
                    usertype: usertype,
                    password: password,
                    _token: _token
                },
                success: function(response) {

                    if (response) {
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User has been Added Successfully',
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

            $.get("user-management/details/" + id, function(user) {

                $('#editUserId').val(user.id);
                $('#editUserName').val(user.name);
                $('#editUserEmail').val(user.email);
                $('#editUserPhone').val(user.phone);
                $('#editUserDesignation').val(user.designation);
                $('#editUserType').val(user.user_type);
                $('#editUserPassword').val("");
                $('#editUserModal').modal('show');
                hidePreloader();
            });
        }

        function updateUser() {

            showPreloader();

            var id = $('#editUserId').val();
            var name = $('#editUserName').val();
            var email = $('#editUserEmail').val();
            var phone = $('#editUserPhone').val();
            var designation = $('#editUserDesignation').val();
            var usertype = $('#editUserType').val();
            var password = $('#editUserPassword').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                method: "PUT",
                url: "{{ route('user.update') }}",
                data: {
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    designation: designation,
                    usertype: usertype,
                    password: password,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $('#tr' + response.id + ' td:nth-child(2)').text(response.name);
                        $('#tr' + response.id + ' td:nth-child(3)').text(response.email);
                        $('#tr' + response.id + ' td:nth-child(4)').text(response.phone);
                        $('#tr' + response.id + ' td:nth-child(5)').text(response.designation);
                        $('#tr' + response.id + ' td:nth-child(6)').text(response.user_type_name);

                        $('#editUserModal').modal('hide');
                        hidePreloader();
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User has been Updated Successfully',
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

        function deleteUser(id) {
            if (confirm("Do You Really Want To Delete The User ?")) {

                showPreloader();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    method: "PUT",
                    url: "{{ route('user.delete') }}",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            $("#userTable").DataTable().rows($("#tr" + id)).remove();
                            $("#userTable").DataTable().draw();
                            hidePreloader();
                            swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'User has been Deleted Successfully',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                });
            }
        }
    </script>
@endsection