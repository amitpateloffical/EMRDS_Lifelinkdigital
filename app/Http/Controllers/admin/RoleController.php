<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderByDesc('id')->orderByDesc('id')->get();
        return view('admin.Role.index', compact('roles'));
    }

    public function create(Request $request)
    {
        if (!$request->name) {
            toastr()->info("Role Name not found. Please add a role name.");
        }

        if (!count($request->permission) > 0) {
            toastr()->info("Permission not found. Please add a permission on the role.");
        }

        $data = json_encode($request->permission);
        $role = Role::where('name', $request->name)->first();
        if ($role) {
            toastr()->info('Role name already axist');
        } else {
            $roll = new Role();
            $roll->name = $request->name;
            $roll->permission = $data;
            if ($roll->save()) {
                toastr()->success('New role create successfully');
            } else {
                toastr()->error('Somthing error found!');
            }
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.Role.edit', compact('role'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        if (!$request->name) {
            toastr()->info("Role Name not found. Please add a role name.");
            return redirect()->back();
        }
        if (!$request->id) {
            toastr()->info("Role id not found. Please add a role id.");
            return redirect()->back();
        }

        if (!count($request->permission) > 0) {
            toastr()->info("Permission not found. Please add a permission on the role.");
            return redirect()->back();
        }

        $data = json_encode($request->permission);
        $role = Role::where('id', $request->id)->first();
        if ($role) {
            $erole = Role::where('name', $request->name)->where('id', "!=", $request->id)->first();
            if ($erole) {
                toastr()->error('Role name already exists in the database.');
                return redirect()->back();
            }
            $role->name = $request->name;
            $role->permission = $data;
            if ($role->update()) {
                toastr()->success('Role update successfully');
                return redirect()->route("roles");
            } else {
                toastr()->error('Somthing error found!');

            }
        } else {
            toastr()->error('Role not found.');


        }
        return redirect()->back();
    }

    public function status($id)
    {
        if (!$id) {
            toastr()->info("Role Id not found.");
        }
        $role = Role::where('id', $id)->update(["status" => !Role::where('id', $id)->value("status")]);
        if ($role) {
            toastr()->success('Role update successfully');
        } else {
            toastr()->error('Somthing error found!');
        }
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if (!$request->id) {
            toastr()->info("Role Id not found.");
        }
        $role = Role::where('id', $request->id)->delete();
        if ($role) {
            toastr()->success('Role delete successfully');
        } else {
            toastr()->error('Somthing error found!');
        }
        return redirect()->back();
    }
}
