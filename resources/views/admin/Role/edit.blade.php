@php
    $mainmenu="Roles";
    $submenu="Role Edit";
@endphp

@extends('admin.layout')
@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ $submenu }}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('roles') }}">{{ $mainmenu }}</a></li>
                        <li class="breadcrumb-item active">{{ $submenu }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

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
                                <h3 class="box-title">Role Edit</h3>
                            </div>
                            <div class="box-body">
                                <form action="{{ route('roleUpdate') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$role->id}}">
                                    <div class="input-group mb-3">
                                        <input type="text" required class="form-control" value="{{$role->name}}" placeholder="Role Name"
                                            name="name">
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
                                                                    value={{ 'create' . $permission['name'] }}
                                                                    @if (in_array('create' . $permission['name'], json_decode($role->permission))) checked @endif>
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
                                                                value={{ 'read' . $permission['name'] }}
                                                                @if (in_array('read' . $permission['name'], json_decode($role->permission))) checked @endif>
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
                                                                value={{ 'update' . $permission['name'] }}
                                                                @if (in_array('update' . $permission['name'], json_decode($role->permission))) checked @endif>
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
                                                                value={{ 'delete' . $permission['name'] }}
                                                                @if (in_array('delete' . $permission['name'], json_decode($role->permission))) checked @endif>
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

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $permissions = [
                [
                    'name' => 'Dashboard',
                    'create' => false,
                    'read' => true,
                    'update' => false,
                    'delete' => false,
                ],
            ];
        @endphp

    </section>
@endsection
