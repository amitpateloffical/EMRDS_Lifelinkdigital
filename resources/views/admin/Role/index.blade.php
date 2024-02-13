@php
    $mainmenu="Roles";
    $submenu="Role";
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
                                <h3 class="box-title">Roles Management</h3>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#addRole">Create Role</button>
                            </div>
                            <div class="box-body">
                                <table id="example22" class="table table-bordered table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th>Name</th>
                                            <th class='text-center'>Status</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($roles != null)
                                            @foreach ($roles as $data => $value)
                                                <tr>
                                                    <td class="text-center">{{ $data + 1 }}</td>
                                                    <td>{{ $value['name'] }}</td>
                                                        @if ($value['status'] == 1)
                                                            <td class='text-center'>
                                                                <a href="{{ route('roleStatus', $value->id) }}"
                                                                    class="btn btn-success btn-sm"> Active </a>
                                                            </td>
                                                        @else
                                                            <td class='text-center'>
                                                                <a href="{{ route('roleStatus', $value->id) }}"
                                                                    class="btn btn-danger btn-sm"> De - Active </a>
                                                            </td>
                                                        @endif
                                                    <td class="text-center">
                                                        <div class="row text-center">
                                                            <a href="{{ route('roleEdit', $value->id) }}"
                                                                class="btn btn-success btn-sm ">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            {{-- @if ($value->name != 'Administrator')
                                                                <a href=""
                                                                    class="btn btn-sm btn-danger user_dialog ml-2 {{ !in_array('deleteRole', json_decode(Session()->get('permission'), true)) ? 'disabled' : '' }}"
                                                                    data-toggle="modal"
                                                                    data-target-data="{{ $value }}"
                                                                    data-target="#deleteRole"><i class="fa fa-trash"></i>
                                                                </a>
                                                            @endif --}}
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

        <div class="modal fade bd-example-modal-lg" id="addRole" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Role Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <style>
                        .body {
                            height: calc(100vh - 30px);
                            overflow: scroll;
                        }
                    </style>
                    <div class="modal-body body">
                        <form id="myForm" action="{{ route('roleCreate') }}" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" required class="form-control" placeholder="Role Name" name="name"
                                    id="role">
                            </div>
                            <table id="" class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th hidden>Name</th>
                                        <th>Name</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session()->get('permissions') as $permission)
                                        <tr>
                                            <td class="text-left">{{ $permission['name'] }}</td>
                                            <td class="text-left">
                                                @if ($permission['create'] == true)
                                                    <label class="switch">
                                                        <input type="checkbox" name="permission[]" id="permission"
                                                            value={{ 'create' . $permission['name'] }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ($permission['read'] == true)
                                                    <label class="switch">
                                                        <input type="checkbox" name="permission[]" id="permission"
                                                            value={{ 'read' . $permission['name'] }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ($permission['update'] == true)
                                                    <label class="switch">
                                                        <input type="checkbox" name="permission[]" id="permission"
                                                            value={{ 'update' . $permission['name'] }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ($permission['delete'] == true)
                                                    <label class="switch">
                                                        <input type="checkbox" name="permission[]" id="permission"
                                                            value={{ 'delete' . $permission['name'] }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Alert Message!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('roleDelete') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <h4 class="modal-title" id="name"></h4>
                            <input type="text" id="delete_id" hidden name="id">
                            <input style="border: 0" type="text" name="name" id="name">
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
                $("#myForm").submit(function(event) {
                    event.preventDefault(); // prevent form from submitting
                    if ($("#role").val() == "") {
                        toastr.error("Please select Role.");
                        $("#role").focus();
                        return false;
                    }

                    // submit form
                    this.submit();
                });

                $("#deleteRole").on("show.bs.modal", function(e) {
                    var data = $(e.relatedTarget).data('target-data');
                    $('#delete_id').val(data.id);
                    $('#name').text("Do you delete item name of " + data.name);
                });
            });
        </script>
    @endpush
@endsection
