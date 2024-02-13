<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminData;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function index()
    {
        $roles = Role::where('id', '!=', 1)->orderByDesc('id')->get();
        $users = Admin::leftJoin('roles', 'admins.role_id', '=', 'roles.id')
            ->where('admins.role_id', '!=', 1)
            ->orderByDesc('admins.id')
            ->select('admins.*', 'roles.name as role_name', 'roles.id as role_id')
            ->get();
        return view('admin.AdminUser.index', compact('roles', 'users'));
    }

    public function create(Request $request)
    {
        if (!$request->name) {
            toastr()->info("Name not found. Please add a name.");
            return redirect()->back()->withInput();
        }

        if (!$request->email) {
            toastr()->info("Email not found. Please add a email.");
            return redirect()->back()->withInput();
        }

        if (!$request->role_id) {
            toastr()->info("Role ID not found. Please select role.");
            return redirect()->back()->withInput();
        }

        if (!$request->password) {
            toastr()->info("Password not found. Please add password.");
            return redirect()->back()->withInput();
        }
        $email = Admin::where("email", $request->email)->first();
        if ($email) {
            toastr()->info("Email address already exists. Please add a new email address.");
            return redirect()->back()->withInput();
        }
        $newAdmin = new Admin();
        $newAdmin->name = $request->name;
        $newAdmin->email = $request->email;
        $newAdmin->role_id = $request->role_id;
        $newAdmin->password = Hash::make($request->password);
        if ($newAdmin->save()) {
            
            toastr()->success("User saved successfully.");
        } else {
            toastr()->error("Something went wrong.");
        }

        return redirect()->back()->withInput();
    }


    public function update(Request $request)
    {
        if (!$request->name) {
            toastr()->info("Name not found. Please add a name.");
        }
        if (!$request->id) {
            toastr()->info("User Id not found.");
        }

        if (!$request->email) {
            toastr()->info("Email not found. Please add a email.");
        }

        if (!$request->role_id) {
            toastr()->info("Role ID not found. Please select role.");
        }

        $admin = Admin::where("id", $request->id)->first();
        if (!$admin) {
            toastr()->info("Email address not found. Please add a new email address.");
        } else {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->role_id = $request->role_id;
            $admin->password = Hash::make($request->password);
            if ($admin->update()) {
                toastr()->success("User has been updated successfully.");
            } else {
                toastr()->error("Something went wrong.");
            }
        }
        return redirect()->back()->withInput();
    }

    public function status($id)
    {
        if (!$id) {
            toastr()->info("User Id not found.");
        }
        $user = Admin::where('id', $id)->update(["status" => !Admin::where('id', $id)->value("status")]);
        if ($user) {
            toastr()->success('User update successfully');
        } else {
            toastr()->error('Somthing error found!');
        }
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if (!$request->id) {
            toastr()->info("User Id not found.");
        }
        $user = Admin::where('id', $request->id)->delete();
        if ($user) {
            toastr()->success('User delete successfully');
        } else {
            toastr()->error('Somthing error found!');
        }
        return redirect()->back();
    }
}
