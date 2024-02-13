<?php

namespace App\Models;
use App\Models\PreEmployment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class Admin extends Authenticatable
{
    use Notifiable;
    use Main;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function adminId()
    {
        return session()->get("admin_id");
    }

    public static function employees()
    {
        return Admin::active()->get();
    }

    public static function name($id)
    {
        return Admin::where("id", $id)->value("name");
    }
    public static function email($id)
    {
        return Admin::where("id", $id)->value("email");
    }

    public static function medicalOfficer()
    {
        return Admin::where("role_id", 3)->active()->get();
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    public static function employeeData($employee_id)
    {
        return Admin::where("id", $employee_id)->first();
    }

    public static function dob($id)
    {
        return Admin::where("id", $id)->value("dob");
    }
    public static function sendMail($id,$parentID)
    {
       $user = Self::where('id',$id)->first();

        Mail::send('components.notification', ['pre' => $parentID],
        function ($message) use($user)  {
            $message ->subject('Request for Pre- Employment Medical Check Up ')->to($user->email);

        });
    }
    public static function sendMailEmployee($parentID)
    {
    //    $user = Self::where('id',$id)->first();

        Mail::send('components.employeeNotification', ['pre' => 0007],
        function ($message)   {
            $message ->subject('Request for Pre- Employment Medical Check Up ')->to('anjali.desai@lifelinkdigital.com');

        });
    }
}