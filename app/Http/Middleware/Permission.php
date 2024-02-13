<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Role;
use Closure;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $permissions = [
            [
                'name' => 'GeneralInformation',
                'create' => true,
                'read' => true,
                'update' => false,
                'delete' => false,
            ],
            [
                'name' => 'MedicalCheckUp',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
            [
                'name' => 'NurshingStaffUpdate',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
            [
                'name' => 'PreEmploymentCheckUpEx',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
            [
                'name' => 'OHCHeadReview',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
            [
                'name' => 'HRReview',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
            [
                'name' => 'ActivityLog',
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false,
            ],
        ];

        $role_id = Admin::where('id', Auth::guard('admin')->id())->value('role_id');
        $permission = Role::where('id', $role_id)->value("permission");
        $request->session()->forget('permission');
        $request->session()->put('permission', $permission);
        $request->session()->put('role_id', $role_id);
        $request->session()->put('permissions', $permissions);
        return $next($request);
    }
}
