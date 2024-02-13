
<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Support\Facades\Route;


//!---------- start Admin panel ----------------------------//

Route::prefix('admin')->group(function () {
    Route::get('', function(){
        return redirect()->route("login");
    });
    Route::view('login', 'admin.auth.login')->name("login");
    Route::post('login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
    Route::middleware(['admin', 'permission'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name("home");
        Route::resource('department', DepartmentController::class);

        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name("roles");
            Route::post('/create', [RoleController::class, 'create'])->name("roleCreate");
            Route::get('/status/{id}', [RoleController::class, 'status'])->name("roleStatus");
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name("roleEdit");
            Route::post('/update', [RoleController::class, 'update'])->name("roleUpdate");
            Route::post('/delete', [RoleController::class, 'delete'])->name("roleDelete");
        });

        Route::prefix('panel/users')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name("users");
            Route::post('/create', [AdminUserController::class, 'create'])->name("panelUserCreate");
            Route::get('/status/{id}', [AdminUserController::class, 'status'])->name("panelUserStatus");
            Route::post('/update', [AdminUserController::class, 'update'])->name("panelUserUpdate");
            Route::post('/delete', [AdminUserController::class, 'delete'])->name("panelUserDelete");
        });
    });
});
