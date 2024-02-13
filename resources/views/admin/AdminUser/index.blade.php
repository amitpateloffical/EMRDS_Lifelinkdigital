@php
    $mainmenu="Staffs";
    $submenu="Staff";
@endphp
@extends('admin.layout')

@section('container')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 col-xs-12">
                        <div class="box">
                            <style>
                                .box-header {
                                    display: flex;
                                    justify-content: space-between;
                                    margin-bottom: 3px;
                                }
                            </style>
                            <div class="box-header">
                                <h3 class="box-title">Staffs Management</h3>
                                @if (in_array('createUser', json_decode(Session()->get('permission'), true)))
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#addStaff">Create User</button>
                                @endif
                            </div>
                            <div class="box-body">
                                <table id="example22" class="table table-bordered table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th>Name</th>
                                            <th>Staff Name</th>
                                            <th class='text-center'>Status</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users != null)
                                            @foreach ($users as $data => $value)
                                                <tr>
                                                    <td class="text-center">{{ $data + 1 }}</td>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>{{ $value['role_name'] }}
                                                    @if (in_array('updateUser', json_decode(Session()->get('permission'), true)))
                                                        @if ($value['status'] == 1)
                                                            <td class='text-center'>
                                                                <a href="{{ route('panelUserStatus', $value->id) }}"
                                                                    class="btn btn-success btn-sm"> Active </a>
                                                            </td>
                                                        @else
                                                            <td class='text-center'>
                                                                <a href="{{ route('panelUserStatus', $value->id) }}"
                                                                    class="btn btn-danger btn-sm"> De - Active </a>
                                                            </td>
                                                        @endif
                                                    @else
                                                        @if ($value['status'] == 1)
                                                            <td class='text-center'>
                                                                <a href="{{ route('panelUserStatus', $value->id) }}"
                                                                    class="btn btn-success btn-sm disabled"> Active </a>
                                                            </td>
                                                        @else
                                                            <td class='text-center'>
                                                                <a href="{{ route('panelUserStatus', $value->id) }}"
                                                                    class="btn btn-danger btn-sm disabled"> De - Active </a>
                                                            </td>
                                                        @endif
                                                    @endif
                                                    <td class="text-center">
                                                        <div class="row text-center">
                                                            <a data-toggle="modal" data-target-data="{{ $value }}"
                                                            data-target="#editStaff"
                                                                class="btn btn-success btn-sm {{ !in_array('updateUser', json_decode(Session()->get('permission'), true)) ? 'disabled' : '' }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            <a href=""
                                                                class="btn btn-sm btn-danger user_dialog ml-2 {{ !in_array('deleteUser', json_decode(Session()->get('permission'), true)) ? 'disabled' : '' }}"
                                                                data-toggle="modal" data-target-data="{{ $value }}"
                                                                data-target="#deleteStaff"><i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td>Empty list</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="addStaff" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Staff Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('panelUserCreate') }}" autocomplete="off" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <select name="role_id" id="roles" class=" form-control">
                                    <option value="">Select Role</option>
                                    {{ $roles }}
                                    @foreach ($roles as $role)
                                        <option {{old('role_id') ? 'selected' : ''}}  value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="basic-url">Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Name" aria-label="Email address"
                                    aria-describedby="basic-addon1">
                            </div>

                            <label for="basic-url">Email address</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Email</span>
                                </div>
                                <input type="email" class="form-control" value="{{old('email')}}" name="email" required placeholder="Email address"
                                    aria-label="Email address" aria-describedby="basic-addon1">
                            </div>
                            <label for="basic-url">Phone Number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Phone</span>
                                </div>
                                <input type="tel" class="form-control" maxlength="10"
                                maxlength="10"   value="{{old('mobile')}}" name="mobile" required placeholder="Phone Number"
                                    aria-label="Email address" aria-describedby="basic-addon1">
                            </div>

                            <label for="basic-url">User Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                </div>
                                <input type="password" class="form-control" value="{{old('password')}}" name="password" required placeholder="Password"
                                    aria-label="Email address" aria-describedby="basic-addon1">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="editStaff" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Staff Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('panelUserUpdate') }}" autocomplete="off" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden value="" name="id" id="edit_id">
                            <div class="input-group mb-3">
                                <select name="role_id" id="edit_roles" class="form-control">
                                    <option value="">Select Role</option>
                                    {{ $roles }}
                                    @foreach ($roles as $role)
                                        <option {{old('role_id') ? 'selected' : ''}}  value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="basic-url">Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" class="form-control" id="edit_name" value="{{old('name')}}" name="name" required placeholder="Name" aria-label="Email address"
                                    aria-describedby="basic-addon1">
                            </div>

                            <label for="basic-url">Email address</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Email</span>
                                </div>
                                <input type="email" class="form-control" id="edit_email" value="{{old('email')}}" name="email" required placeholder="Email address"
                                    aria-label="Email address" aria-describedby="basic-addon1">
                            </div>

                            <label for="basic-url">Phone Number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Phone</span>
                                </div>
                                <input type="tel" class="form-control" maxlength="10"
                                maxlength="10"  id="edit_mobile" value="{{old('mobile')}}" name="mobile" required placeholder="Phone Number"
                                    aria-label="Mobile number" aria-describedby="basic-addon1">
                            </div>

                            <label for="basic-url">User Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                </div>
                                <input type="password" class="form-control"  value="{{old('password')}}" name="password" placeholder="Password"
                                    aria-label="Email address" aria-describedby="basic-addon1">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Alert Message!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('panelUserDelete') }}" method="post">
                        @csrf
                        <input type="text" name="id" hidden id="delete_id">
                        <div class="modal-body">
                            <h4 class="modal-title" id="name"></h4>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('jQuery')
        <script>
            $(document).ready(function() {
                $("#editStaff").on("show.bs.modal", function(e) {
                    var data = $(e.relatedTarget).data('target-data');
                    $('#edit_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_email').val(data.email);
                    $('#edit_mobile').val(data.mobile);
                    $('#edit_roles').val(data.role_id);
                });

                $("#deleteStaff").on("show.bs.modal", function(e) {
                    var data = $(e.relatedTarget).data('target-data');
                    $('#delete_id').val(data.id);
                    $('#name').text("Do you delete item name of " + data.name);
                });
            });


        </script>
    @endpush
@endsection
