<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\EmployeeInformation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        if (!$request->mobile) {
            toastr()->info("Contact Number not found. Please Add.");
            return redirect()->back()->withInput();
        }

        if ($request->site == "0") {
            toastr()->info("SIte Name is Required.");
            return redirect()->back()->withInput();
        }


        $email = Admin::where("email", $request->email)->first();
        if ($email) { 
            toastr()->info("Email address already exists. Please add a new email address.");
            return redirect()->back()->withInput();
        }
        $mobile = Admin::where("mobile", $request->mobile)->first();
        if ($mobile) {
            toastr()->info("Contact Number already exists. Please add a new Contact Number.");
            return redirect()->back()->withInput();
        }

       

       

        $newAdmin = new Admin();
        $newAdmin->name = $request->name;
        $newAdmin->email = $request->email;
        $newAdmin->role_id = $request->role_id;
        $newAdmin->dob = $request->dob;
        $newAdmin->age = $request->age;
        $newAdmin->mobile = $request->mobile;
        $newAdmin->gender = $request->gender;
        $newAdmin->department = $request->department;
        $newAdmin->civil_status = $request->civil_status;
        $newAdmin->zone = $request->zone;
        $newAdmin->country = $request->country;
        $newAdmin->state = $request->state;
        $newAdmin->reporting_manager = $request->reporting_manager;
        $newAdmin->city = $request->city;
        $newAdmin->site = $request->site;
        $newAdmin->building = $request->building;
        $newAdmin->floor = $request->floor;
        $newAdmin->room = $request->room;
        $newAdmin->blood_group = $request->blood_group;
        $newAdmin->healthCard = $request->healthCard;
        $newAdmin->comment = $request->comment;
        $newAdmin->added_by = Auth::guard('admin')->user()->id;
        $newAdmin->password = Hash::make($request->name . '123');
        if ($request->hasfile('cv')) {

            $image = $request->file('cv');

            $ext = $image->getClientOriginalExtension();

            $image_name = $request->name . '-' . 'CV' . rand() . '.' . $ext;

            $image->move('upload/document/', $image_name);

            $newAdmin->cv = $image_name;
        }
        
        if (!empty($request->other_images)) {
            $files = [];
            if ($request->hasfile('certificate')) {
                foreach ($request->file('certificate') as $file) {
                    $name = $request->name . '-certificate' . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                    $file->move('upload/certificate/', $name);
                    $files[] = $name;
                }
            }


            $newAdmin->certification = json_encode($files);
        }

        if ($request->hasfile('picture')) {

            $image = $request->file('picture');

            $ext = $image->getClientOriginalExtension();

            $image_name = $request->name . '-' . 'picture' . rand() . '.' . $ext;

            $image->move('upload/picture/', $image_name);

            $newAdmin->picture = $image_name;
        }

        if ($newAdmin->save()) {
            $employee = new EmployeeInformation();
            $employee->employee_id = $newAdmin->id;
            if ($request->preEmployement_status) {
                $employee->preEmployement_status = $newAdmin->preEmployement_status;
            }
            if ($request->preEmployement_completion) {
                $employee->preEmployement_completion = $newAdmin->preEmployement_completion;
            }
            if ($request->preEmployement_due) {
                $employee->preEmployement_due = $newAdmin->preEmployement_due;
            }
            if ($request->periodic_status) {
                $employee->periodic_status = $newAdmin->periodic_status;
            }
            if ($request->periodic_completion) {
                $employee->periodic_completion = $newAdmin->periodic_completion;
            }
            if ($request->periodic_due) {
                $employee->periodic_due = $newAdmin->periodic_due;
            }
            if ($request->annualHealth_status) {
                $employee->annualHealth_status = $newAdmin->annualHealth_status;
            }
            if ($request->annualHealth_completion) {
                $employee->annualHealth_completion = $newAdmin->annualHealth_completion;
            }
            if ($request->annualHealth_due) {
                $employee->annualHealth_due = $newAdmin->annualHealth_due;
            }
            if ($request->vaccination_status) {
                $employee->vaccination_status = $newAdmin->vaccination_status;
            }
            if ($request->vaccination_completion) {
                $employee->vaccination_completion = $newAdmin->vaccination_completion;
            }
            if ($request->vaccination_due) {
                $employee->vaccination_due = $newAdmin->vaccination_due;
            }
            if ($request->vaccination_type) {
                $employee->vaccination_type = $newAdmin->vaccination_type;
            }
            if ($request->eyeTest_status) {
                $employee->eyeTest_status = $newAdmin->eyeTest_status;
            }
            if ($request->eyeTest_completion) {
                $employee->eyeTest_completion = $newAdmin->eyeTest_completion;
            }
            if ($request->eyeTest_due) {
                $employee->eyeTest_due = $newAdmin->eyeTest_due;
            }
            if ($request->chestXray_status) {
                $employee->chestXray_status = $newAdmin->chestXray_status;
            }
            if ($request->chestXray_completion) {
                $employee->chestXray_completion = $newAdmin->chestXray_completion;
            }
            if ($request->chestXray_due) {
                $employee->chestXray_due = $newAdmin->chestXray_due;
            }
            if ($request->exitMedical_status) {
                $employee->exitMedical_status = $newAdmin->exitMedical_status;
            }
            if ($request->exitMedical_completion) {
                $employee->exitMedical_completion = $newAdmin->exitMedical_completion;
            }
            if ($request->exitMedical_due) {
                $employee->exitMedical_due = $newAdmin->exitMedical_due;
            }
            if ($request->bioMedical_status) {
                $employee->bioMedical_status = $newAdmin->bioMedical_status;
            }
            if ($request->bioMedical_completion) {
                $employee->bioMedical_completion = $newAdmin->bioMedical_completion;
            }
            if ($request->bioMedical_due) {
                $employee->bioMedical_due = $newAdmin->bioMedical_due;
            }
            if ($request->firstAdd_status) {
                $employee->firstAdd_status = $newAdmin->firstAdd_status;
            }
            if ($request->firstAdd_completion) {
                $employee->firstAdd_completion = $newAdmin->firstAdd_completion;
            }
            if ($request->firstAdd_due) {
                $employee->firstAdd_due = $newAdmin->firstAdd_due;
            }
            if ($request->opd_status) {
                $employee->opd_status = $newAdmin->opd_status;
            }
            if ($request->opd_completion) {
                $employee->opd_completion = $newAdmin->opd_completion;
            }
            if ($request->opd_due) {
                $employee->opd_due = $newAdmin->opd_due;
            }
            if ($request->hepB_status) {
                $employee->hepB_status = $newAdmin->hepB_status;
            }
            if ($request->hepB_completion) {
                $employee->hepB_completion = $newAdmin->hepB_completion;
            }
            if ($request->hepB_due) {
                $employee->hepB_due = $newAdmin->hepB_due;
            }
            $employee->save();


            toastr()->success("Employee saved successfully.");
        } else {
            toastr()->error("Something went wrong.");
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Admin::find($id);
        return view('frontend.employee.view',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
