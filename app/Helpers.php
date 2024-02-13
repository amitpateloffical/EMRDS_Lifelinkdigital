
<?php

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Helpers
{

    public static function test()
    {
        return 'helpers';
    }

    public static function  adminName($id)
    {
        return Admin::name($id);
    }
    public static function roleName(){
        return Role::name(Auth::guard('admin')->user()->role_id);
    }

    public static function checkPermission($value)
    {
        if (in_array($value, json_decode(Session::get('permission'), true))) {
            return true;
        } else {
            return false;
        }
    }

    public static function  adminEmail($id)
    {
        return Admin::email($id);
    }
}
