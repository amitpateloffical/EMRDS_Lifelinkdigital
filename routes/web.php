<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\frontend\EmployeeController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\PreEmploymentController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */
// Route::get('/send', function () {
//     Mail::send('components.employeeNotification', ['pre' => 0007],
//     function ($message)   {
//         $message ->subject('Request for Pre- Employment Medical Check Up ')->to('anjali.desai@connexodemo.com');
//     });
//     return 'sent mlai';
// });

Route::get('/', function () {
    return view('frontend.login');
});
// Route::get('/login', function () {
    // return view('frontend.login');
// });
Route::get('/dashboard', function () {
    return view('frontend.dashboard');
});
Route::get('/form-division', function () {
    return view('frontend.form-division');
});

Route::get('/preEmpMedicalCheckUp', function () {
    return view('frontend.preEmpMedicalCheckUp');
});


Route::get('/exit-medical', function () {
    return view('frontend.exit-medical');
});

Route::get('/annual-health', function () {
    return view('frontend.annual-health');
});

Route::get('/biomedical-waste', function () {
    return view('frontend.biomedical-waste');
});

Route::get('/canteen-employees', function () {
    return view('frontend.canteen-employees');
});

Route::get('/chest-x-ray', function () {
    return view('frontend.chest-x-ray');
});

Route::get('/eye-test', function () {
    return view('frontend.eye-test');
});

Route::get('/trainee-medical', function () {
    return view('frontend.tainee-medical');
});

Route::get('/first-aid-box', function () {
    return view('frontend.first-aid-box');
});

Route::get('/medical-checkup-visitors', function () {
    return view('frontend.medical-checkup-visitors');
});

Route::get('/periodic-medical', function () {
    return view('frontend.periodic-medical');
});



Route::get('/pre-employment', [PreEmploymentController::class, "preEmployment"])->name("preEmployment");
Route::post('employeeData', [PreEmploymentController::class, "employeeData"])->name("employeeData");
Route::post('pre-employment/add', [PreEmploymentController::class, "preEmployeeAdd"])->name("preEmployeeAdd");

Route::get('/opd-case-register', function () {
    return view('frontend.opd-case-register');
});

Route::get('/vaccine-consumption', function () {
    return view('frontend.vaccine-consumption');
});

Route::get('/tainee-medical', function () {
    return view('frontend.tainee-mediacal');
});

Route::get('/provision-addtion', function () {
    return view('frontend.provision-addtion');
});

Route::get('/hipBperiodic', function () {
    return view('frontend.hipBperiodic');
});

Route::get('/form-7', function () {
    return view('frontend.form-7');
});

Route::get('/annual-maintenance', function () {
    return view('frontend.annual-maintenance');
});

Route::get('/form-division', function () {
    return view('frontend.form-division');
});
Route::get('/mainDashboard', function () {
    return view('frontend.mainDashboard');
});

Route::get('/allMedTest', function () {
    return view('frontend.allMedTest');
});

Route::get('/oshaform', function () {
    return view('frontend.oshaform');
});

Route::get('/emrdsScopies', function () {
    return view('frontend.emrdsScopies');
});

Route::get('/report', function () {
    return view('frontend.report');
});


Route::get('/employee', function () {
    return view('frontend.employee');
});
Route::get('/notification', function () {
    return view('components.notification');
});

Route::get('/pagination', function () {

    return view('frontend.pagination');
});
Route::get('/pagination2', function () {
    return view('frontend.pagination2');
});
Route::get('/pagination3', function () {
    return view('frontend.pagination3');
});
Route::get('/pagination4', function () {
    return view('frontend.pagination4');
});
// --------------by satish-----------------------
Route::get('/newDashboard', function () {
    return view('frontend.newDashboard');
});
Route::get('/newVisit', function () {
    return view('frontend.newVisit');
});
Route::get('/patientData', function () {
    return view('frontend.patientData');
});
Route::get('/employeeNotification', function () {
    return view('components.employeeNotification');
});
// --------------------------end--------------------
Route::post('/logincheck', [UserLoginController::class, 'logincheck'])->name("logincheck");
Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');


Route::get('email', [UserLoginController::class,'email']);


//------------------Route By Priya

Route::middleware(['admin', 'permission'])->group(function () {

    Route::get('/pre-employment', [PreEmploymentController::class, "preEmployment"])->name("preEmployment");
    Route::post('employeeData', [PreEmploymentController::class, "employeeData"])->name("employeeData");
    Route::post('pre-employment/add', [PreEmploymentController::class, "preEmployeeAdd"])->name("preEmployeeAdd");

    Route::get('dashboard/list', [DashboardController::class, 'index'])->name("dashboard");
    Route::resource('employ', EmployeeController::class);
    Route::get('/pre-employment/view/{id}', [PreEmploymentController::class, "medicalOfficerget"])->name("medicalOfficerget");
    Route::post('/pre-employment/update/{id}', [PreEmploymentController::class, "medicalofficerUpdate"]);
    Route::post('/pre-employment/flow/{id}', [PreEmploymentController::class, "stateChange"]);
    Route::post('/pre-employment/flow', [PreEmploymentController::class, "stateChangeJava"])->name("stateChangeJava");
    Route::post('/pre-employment/nushing/{id}', [PreEmploymentController::class, "nurshingStaffupdate"]);
    Route::post('/pre-employment/abnormal/{id}', [PreEmploymentController::class, "preemploymentupdate"]);
    Route::get('/pre-employment/assisment/{id}', [PreEmploymentController::class, "assismentGet"]);
    Route::post('/pre-employment/asign/{id}', [PreEmploymentController::class, "assignPre"]);
    Route::post('/pre-employment/ohcReview/{id}', [PreEmploymentController::class, "ohcReview"]);
    Route::post('/pre-employment/hrReview/{id}', [PreEmploymentController::class, "hrReview"]);
    Route::get('/pre-employment/pdf/{id}', [PreEmploymentController::class, "single_pdf"]);
    Route::get('/pre-employment/audit/{id}', [PreEmploymentController::class, "auditTrial"]);
    Route::get('/pre-employment/auditinner/{id}', [PreEmploymentController::class, "auditDetails"]);
    Route::get('/pre-employment/auditpdf/{id}', [PreEmploymentController::class, "audit_pdf"]);
    Route::post('/medicalfinalComments/{id}', [PreEmploymentController::class, "medicalfinalComments"])->name("medicalfinalComments");
});

// ------------------------------------
