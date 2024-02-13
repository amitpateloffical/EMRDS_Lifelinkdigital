<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AuditTrial;
use App\Models\Department;
use App\Models\PreEmployment;
use App\Models\Record;
use App\Models\Role;
use App\Models\StageHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;

class PreEmploymentController extends Controller
{
    public function preEmployment()
    {
        $employees = Admin::employees();
        $medicalOfficers = Admin::medicalOfficer();
        $purposes = [
            'Employee',
            'Pre-Employment Medical Check-Up',
            'Periodic Medical Check-Up',
            'Annual Health Check-Up',
            'Vaccination Of Employees',
            'Eye Test Of Employees',
            'Chest X-ray Test Of Employees',
            'Exit Medical Check-Up Of Employees',
            'Biomedical Waste Record',
            'First Aid & First Aid Boxes',
            'OPD Case Register',
            'Vaccine Consumption Record',
            'Medical Check-Up Of Visitors / Auditors',
            "SIIPL Canteen Employee's Medical Check-Up",
            'Trainee Medical Check-Up',
            'Hep-B Periodic Health Check-Up',
            'Form No-7',
            'Annual Maintenance Record',
            'Provision For Addition Of Any New Workflow',
        ];
        $generateparentId = PreEmployment::generateparentId();

        return view('frontend.pre-employment', compact('employees', 'medicalOfficers', 'purposes', 'generateparentId'));
    }

    public function employeeData(Request $request)
    {
        $data = Admin::employeeData($request->employee_id);
        $data->reportingManagerName = Admin::name($data->reporting_manager);
        $data->reportingManagerMail = Admin::email($data->reporting_manager);
        $data->department = Department::name($data->department);
        $data->job_title = Role::name($data->role_id);


        return response()->json(['error' => false, 'data' => $data, 'message' => 'Employee found']);
    }

    public function preEmployeeAdd(Request $request)
    {
        $pre_employ = new PreEmployment();
        if ($request->due_date) {
            $pre_employ->due_date = Carbon::parse($request->due_date)->format('d-M-Y');
        }
        if ($request->short_description) {
            $pre_employ->short_description = $request->short_description;
        }
        $pre_employ->record = Record::id();

        if ($request->employee_id) {
            $pre_employ->canditate_id = json_encode($request->employee_id);
        }
        if ($request->purpose) {
            $pre_employ->purpose = json_encode($request->purpose);
        }
        if ($request->medical_officers) {
            $pre_employ->medical_officer_name = json_encode($request->medical_officers);
        }
        $pre_employ->initiation_date = $request->initiation_date;
        if ($request->hr_comments) {
            $pre_employ->HR_comments = json_encode($request->hr_comments);
        }
        $pre_employ->save();
        foreach ($request->employee_id as $key => $employee_id) {
            $pre_employee = new PreEmployment();
            if ($request->due_date) {
                $pre_employee->due_date = Carbon::parse($request->due_date)->format('d-M-Y');
            }
            if ($request->short_description) {
                $pre_employee->short_description = $request->short_description;
            }
            $pre_employee->record = Record::id();
            if ($pre_employ->id) {
                $pre_employee->parent = $pre_employ->id;
            }
            if ($request->employee_id) {
                $pre_employee->canditate_id = $employee_id;
            }
            if ($request->purpose) {
                $pre_employee->purpose = $request->purpose[$key];
            }
            if ($request->medical_officers) {
                $pre_employee->medical_officer_name = $request->medical_officers[$key];
            }
            if ($request->hr_comments) {
                $pre_employee->HR_comments = $request->hr_comments[$key];
            }
            $pre_employee->initiation_date = $request->initiation_date;
            if ($request->hasfile('external_medical_reports_' . $employee_id)) {
                $imagePaths = [];
                foreach ($request->file('external_medical_reports_' . $employee_id) as $file) {
                    $imagePaths[] = $pre_employee->storeImage($file,public_path('images/external_medical_report'));
                }
                $pre_employee->external_attachment = json_encode($imagePaths);
            }

            $pre_employee->save();

            if ($request->due_date) {
                $audit = new AuditTrial();
                $audit->type = 'Due Date';
                $audit->doc_id = $pre_employee->id;
                $audit->previous = 'NULL';
                $audit->new = $pre_employee->due_date;
                $audit->origin_state = 'Pending Pre-Employment
            Medical Check Up';
                $audit->change_by = 'HR';
                $audit->user_name = Auth::guard('admin')->user()->name;
                $audit->save();
            }
            if ($request->short_description) {
                $audit = new AuditTrial();
                $audit->type = 'Short Description';
                $audit->doc_id = $pre_employee->id;
                $audit->previous = 'NULL';
                $audit->new = $pre_employee->short_description;
                $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
                $audit->change_by = 'HR';
                $audit->user_name = Auth::guard('admin')->user()->name;
                $audit->save();
            }
            if ($request->employee_id) {
                $audit = new AuditTrial();
                $audit->type = 'Short Description';
                $audit->doc_id = $pre_employee->id;
                $audit->previous = 'NULL';
                $audit->new = $pre_employee->canditate_at;
                $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
                $audit->change_by = 'HR';
                $audit->user_name = Auth::guard('admin')->user()->name;
                $audit->save();
            }
            if ($request->purpose) {
                $audit = new AuditTrial();
                $audit->type = 'Purpose';
                $audit->doc_id = $pre_employee->id;
                $audit->previous = 'NULL';
                $audit->new = $pre_employee->purpose;
                $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
                $audit->change_by = 'HR';
                $audit->user_name = Auth::guard('admin')->user()->name;
                $audit->save();
            }
        }
        Admin::sendMail(3, $request->parent);
        Mail::send(
            'components.employeeNotification',
            ['pre' => 0007],
            function ($message) {
                $message->subject('Request for Pre- Employment Medical Check Up ')->to('anjali.desai@connexodemo.com');
            }
        );
        toastr()->success('Pre Employee saved successfully.');

        return redirect('dashboard/list');
    }

    public function medicalOfficerget($id)
    {
        $employees = Admin::employees();

        $preEmployment = PreEmployment::find($id);
        // dd($preEmployment);
        $name = Admin::name($preEmployment->nurshing_staff);
        $medicalOfficers = Admin::medicalOfficer();
        $medicalofficeremail = Admin::email($preEmployment->medical_officer_name);
        $annnexuredata = json_decode($preEmployment->abnormal_finding);
        $organ = json_decode($preEmployment->organ);
        // return $report;
        $purposes = [
            'Pre-Employment Medical Check-Up',
            'Periodic Medical Check-Up',
            'Annual Health Check-Up',
            'Vaccination Of Employees',
            'Eye Test Of Employees',
            'Chest X-ray Test Of Employees',
            'Exit Medical Check-Up Of Employees',
            'Biomedical Waste Record',
            'First Aid & First Aid Boxes',
            'OPD Case Register',
            'Vaccine Consumption Record',
            'Medical Check-Up Of Visitors / Auditors',
            "SIIPL Canteen Employee's Medical Check-Up",
            'Trainee Medical Check-Up',
            'Hep-B Periodic Health Check-Up',
            'Form No-7',
            'Annual Maintenance Record',
            'Provision For Addition Of Any New Workflow',
        ];
        $userData = Admin::find($preEmployment->canditate_id);
        $userData->reporting_manager_name = Admin::where('id',$userData->reporting_manager)->value('name');
        $userData->reporting_manager_email = Admin::where('id',$userData->reporting_manager)->value('email');
        $role = DB::table('roles')->where('id', $userData->role_id)->first();
        $userData->department = DB::table('departments')->where('id', $userData->department)->value('name');
        // return $userData;
        $medicals = DB::table('admins')->where('id', $preEmployment->medical_officer_name)->first();


        return view('frontend.pre-employment.view', compact('employees', 'preEmployment', 'name', 'purposes', 'medicalOfficers', 'userData', 'role', 'medicals', 'medicalofficeremail', 'annnexuredata', 'organ'));
    }

    public function assismentGet($id)
    {
        $employees = Admin::employees();
        $ID = $id;
        $preEmployment = PreEmployment::where('parent', $id)->get();

        $medicalOfficers = Admin::medicalOfficer();
        $purposes = [
            'Pre-Employment Medical Check-Up',
            'Periodic Medical Check-Up',
            'Annual Health Check-Up',
            'Vaccination Of Employees',
            'Eye Test Of Employees',
            'Chest X-ray Test Of Employees',
            'Exit Medical Check-Up Of Employees',
            'Biomedical Waste Record',
            'First Aid & First Aid Boxes',
            'OPD Case Register',
            'Vaccine Consumption Record',
            'Medical Check-Up Of Visitors / Auditors',
            "SIIPL Canteen Employee's Medical Check-Up",
            'Trainee Medical Check-Up',
            'Hep-B Periodic Health Check-Up',
            'Form No-7',
            'Annual Maintenance Record',
            'Provision For Addition Of Any New Workflow',
        ];

        return view('frontend.pre-employment.assismentView', compact('employees', 'preEmployment', 'purposes', 'ID', 'medicalOfficers'));
    }

    public function assignPre(Request $request, $id)
    {
        if ($request->username == Auth::guard('admin')->user()->email && Hash::check($request->password, Auth::guard('admin')->user()->password)) {

            $history = new StageHistory();
            $history->type = 'Pre Employment Assignment';
            $history->doc_id = $id;
            $history->user_id = Auth::guard('admin')->user()->id;
            $history->user_name = Auth::guard('admin')->user()->name;
            $history->stage_id = 1;
            $history->save();
            toastr()->success('Document Sent');

            return back();
        } else {
            toastr()->error('E-signature Not match');

            return back();
        }
    }

    public function medicalofficerUpdate(Request $request, $id)
    {
        // return $request;
        $pre_employee = PreEmployment::find($id);
        if ($request->systolic) {
            $pre_employee->systolic = $request->systolic;
        }
        if ($request->height) {
            $pre_employee->height = $request->height;
        }
        if ($request->temperature) {
            $pre_employee->temperature = $request->temperature;
        }
        if ($request->diastolic) {
            $pre_employee->diastolic = $request->diastolic;
        }
        if ($request->heart_rate) {
            $pre_employee->heart_rate = $request->heart_rate;
        }
        if ($request->weight) {
            $pre_employee->weight = $request->weight;
        }
        if ($request->notes) {
            $pre_employee->notes = $request->notes;
        }
        if ($request->investigation_request) {
            $pre_employee->investigation_request = $request->investigation_request;
        }
        if ($request->respiratory_rate) {
            $pre_employee->respiratory_rate = $request->respiratory_rate;
        }
        if ($request->organ) {
            $pre_employee->organ = json_encode($request->organ);
        }
        if ($request->detail) {
            $pre_employee->detail = json_encode($request->detail);
        }



        $pre_employee->stage = '2';
        $pre_employee->update();
        if ($request->blood_pressure) {
            $audit = new AuditTrial();
            $audit->type = 'blood pressure';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->blood_pressure;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->height) {
            $audit = new AuditTrial();
            $audit->type = 'Height';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->height;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->weight) {
            $audit = new AuditTrial();
            $audit->type = 'weight';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->weight;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->temperature) {
            $audit = new AuditTrial();
            $audit->type = 'Temperature';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->temperature;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->pulse) {
            $audit = new AuditTrial();
            $audit->type = 'Pulse';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->pulse;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        $history = new StageHistory();
        $history->type = 'Pre Employment Checkup';
        $history->doc_id = $id;
        $history->user_id = Auth::guard('admin')->user()->id;
        $history->user_name = Auth::guard('admin')->user()->name;
        $history->stage_id = $pre_employee->stage;
        $history->save();
        toastr()->success('Medical Officer Form Submited successfully');

        return back()->withInput();
    }

    public function nurshingStaffupdate(Request $request, $id)
    {
        $pre_employee = PreEmployment::find($id);
        if ($request->medical_history) {
            $pre_employee->medical_history = $request->medical_history;
        }
        if ($request->bmi) {
            $pre_employee->bmi = $request->bmi;
        }
        if ($request->vision_test) {
            $pre_employee->vision_test = $request->vision_test;
        }
        if ($request->observation) {
            $pre_employee->observation = $request->observation;
        }
        if ($request->result) {
            $pre_employee->result = $request->result;
        }
        if ($request->nurshing_staff_comments) {
            $pre_employee->nurshing_staff_comments = $request->nurshing_staff_comments;
        }
        if ($request->hasfile('blood_reports')) {
            $pre_employee->blood_reports = $pre_employee->storeImage($request->file('blood_reports'), 'images/blood_reports');
        }
        if ($request->hasfile('other_reports')) {
            $pre_employee->other_reports = $pre_employee->storeImage($request->file('other_reports'), 'images/other_reports');
        }
        $pre_employee->stage = '3';
        $pre_employee->update();
        if ($request->medical_history) {
            $audit = new AuditTrial();
            $audit->type = 'medical history';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->medical_history;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Nurshing Staff';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->bmi) {
            $audit = new AuditTrial();
            $audit->type = 'BMI';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->bmi;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Nurshing Staff';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->vision_test) {
            $audit = new AuditTrial();
            $audit->type = 'vision test';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->vision_test;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Nurshing Staff';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        $history = new StageHistory();
        $history->type = 'Pre Employment Checkup';
        $history->doc_id = $id;
        $history->user_id = Auth::guard('admin')->user()->id;
        $history->user_name = Auth::guard('admin')->user()->name;
        $history->stage_id = $pre_employee->stage;
        $history->save();
        toastr()->success('Nurshing staff Form Submited successfully');

        return back();
    }

    public function preemploymentupdate(Request $request, $id)
    {
        $pre_employee = PreEmployment::find($id);
        if ($request->abnormal_finding) {
            $pre_employee->abnormal_finding = json_encode($request->abnormal_finding);
        }
        if ($request->pre_imployement_physicalExam) {
            $pre_employee->pre_imployement_physicalExam = json_encode($request->pre_imployement_physicalExam);
        }
        if ($request->Followup_action) {
            $pre_employee->Followup_action = json_encode($request->Followup_action);
        }
        if ($request->Followup_Comment) {
            $pre_employee->Followup_Comments = json_encode($request->Followup_Comment);
        }
        if ($request->Followup_dueDate) {
            $pre_employee->Followup_dueDate = json_encode($request->Followup_dueDate);
        }
        if ($request->abnormal_comment) {
            $pre_employee->abnormal_finding_Comments = json_encode($request->abnormal_comment);
        }
        if ($request->grid_medical_comment) {
            $pre_employee->grid_medical_comment = json_encode($request->grid_medical_comment);
        }
        $pre_employee->medicalOfficerRemarks = $request->medicalOfficerRemarks;
        $pre_employee->FollowUpRequired = $request->FollowUpRequired;
        $pre_employee->MediFollowUpComment = $request->MediFollowUpComment;
        $pre_employee->medicalFollwoDueDate = $request->medicalFollwoDueDate;
        // return $pre_employee;
        $pre_employee->stage = '4';
        $pre_employee->update();
        if ($request->abnormal_finding) {
            $audit = new AuditTrial();
            $audit->type = 'abnormal finding';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->abnormal_finding;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->pre_imployement_physicalExam) {
            $audit = new AuditTrial();
            $audit->type = 'Satisfactory';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->pre_imployement_physicalExam;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->Followup_action) {
            $audit = new AuditTrial();
            $audit->type = 'Followup action';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->Followup_action;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }

        if ($request->Followup_Comments) {
            $audit = new AuditTrial();
            $audit->type = 'Followup Comments';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->Followup_Comments;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->Followup_dueDate) {
            $audit = new AuditTrial();
            $audit->type = 'Followup Due date';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->Followup_dueDate;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'Medical Officer';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }

        $history = new StageHistory();
        $history->type = 'Pre Employment Checkup';
        $history->doc_id = $id;
        $history->user_id = Auth::guard('admin')->user()->id;
        $history->user_name = Auth::guard('admin')->user()->name;
        $history->stage_id = $pre_employee->stage;
        $history->save();
        toastr()->success('Pre-Employment Check Up Form Updated successfully');

        return back();
    }

    public function ohcReview(Request $request, $id)
    {
        $pre_employee = PreEmployment::find($id);
        if ($request->HOD_approval_status) {
            $pre_employee->HOD_approval_status = $request->HOD_approval_status;
        }
        if ($request->HOD_name) {
            $pre_employee->HOD_name = $request->HOD_name;
        }
        if ($request->HOD_comments) {
            $pre_employee->HOD_comments = $request->HOD_comments;
        }
        $pre_employee->OHCHeadRemarks = $request->OHCHeadRemarks;
        $pre_employee->OHCHeadComment = $request->OHCHeadComment;

        $pre_employee->stage = '5';
        $pre_employee->update();
        if ($request->HOD_approval_status) {
            $audit = new AuditTrial();
            $audit->type = 'OHC approval status';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->HOD_approval_status;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'OHC Head';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->HOD_comments) {
            $audit = new AuditTrial();
            $audit->type = 'OHC Comments';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->HOD_comments;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'OHC Head';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        $history = new StageHistory();
        $history->type = 'Pre Employment Checkup';
        $history->doc_id = $id;
        $history->user_id = Auth::guard('admin')->user()->id;
        $history->user_name = Auth::guard('admin')->user()->name;
        $history->stage_id = $pre_employee->stage;
        $history->save();
        toastr()->success('Pre-Employment Check Up Form Updated successfully');

        return back();
    }

    public function hrReview(Request $request, $id)
    {
        $pre_employee = PreEmployment::find($id);
        if ($request->HR_Final_comments) {
            $pre_employee->HR_Final_comments = $request->HR_Final_comments;
        }
        if ($request->clouser_attachment) {
            $pre_employee->clouser_attachment = $pre_employee->storeImage($request->file('clouser_attachment'), 'images/external_medical_report');
        }
        if ($request->clouser_comment) {
            $pre_employee->clouser_comment = $request->clouser_comment;
        }

        $pre_employee->stage = '7';
        $pre_employee->update();
        if ($request->HR_Final_comments) {
            $audit = new AuditTrial();
            $audit->type = 'HR Comments';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->HR_Final_comments;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'HR';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        if ($request->clouser_comment) {
            $audit = new AuditTrial();
            $audit->type = 'Clouser Comment';
            $audit->doc_id = $pre_employee->id;
            $audit->previous = 'NULL';
            $audit->new = $pre_employee->clouser_comment;
            $audit->origin_state = 'Pending Pre-Employment
                Medical Check Up';
            $audit->change_by = 'HR';
            $audit->user_name = Auth::guard('admin')->user()->name;
            $audit->save();
        }
        $history = new StageHistory();
        $history->type = 'Pre Employment Checkup';
        $history->doc_id = $id;
        $history->user_id = Auth::guard('admin')->user()->id;
        $history->user_name = Auth::guard('admin')->user()->name;
        $history->stage_id = $pre_employee->stage;
        $history->save();
        toastr()->success('Pre-Employment Check Up Form Updated successfully');

        return back();
    }

    public function stateChange(Request $request, $id)
    {
        if ($request->username == Auth::guard('admin')->user()->email && Hash::check($request->password, Auth::guard('admin')->user()->password)) {
        } else {
            toastr()->error('E-signature Not match');

            return back();
        }
    }

    public function stateChangeJava(Request $request)
    {
        $id = $request->pre_employment_id;
        if ($request->username == Auth::guard('admin')->user()->email && Hash::check($request->password, Auth::guard('admin')->user()->password)) {
            return response()->json(['error' => false, 'type' => $request->type, 'message' => 'Please enter a stage name']);
        } else {
            return response()->json(['error' => true, 'type' => $request->type, 'message' => 'Please enter a stage name']);
        }
    }

    public function single_pdf($id)
    {
        $data = PreEmployment::find($id);
        $emp = Admin::where('id', $data->canditate_id)->first();
        $medical = Admin::where('id', $data->medical_officer_name)->first();
        $nursh = Admin::where('id', $data->nurshing_staff)->first();
        if (!empty($data)) {
            $data->originator = Admin::where('id', $data->initiator)->value('name');
            $pdf = App::make('dompdf.wrapper');
            $time = Carbon::now();
            $pdf = PDF::loadview('frontend.pre-employment.summery', compact(
                'data',
                'emp',
                'medical',
                'nursh'
            ))
                ->setOptions([
                    'defaultFont' => 'sans-serif',
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'isPhpEnabled' => true,
                ]);
            $pdf->setPaper('A4');
            $pdf->render();
            $canvas = $pdf->getDomPDF()->getCanvas();
            $height = $canvas->get_height();
            $width = $canvas->get_width();
            $canvas->page_script('$pdf->set_opacity(0.1,"Multiply");');

            return $pdf->stream('Summery' . $id . '.pdf');
        }
    }

    public function auditTrial($id)
    {

        $audit = AuditTrial::where('doc_id', $id)->orderByDESC('id')->get()->unique('type');
        foreach ($audit as $temp) {
            $temp->create = Carbon::parse($temp->created_at)->format('d-M-Y h:i A');
        }
        $today = Carbon::now()->format('d-m-y');
        $document = PreEmployment::where('id', $id)->first();

        return view('frontend.pre-employment.audit-trial', compact('audit', 'document', 'today'));
    }

    public function auditDetails($id)
    {
        $detail = AuditTrial::find($id);

        $detail_data = AuditTrial::where('type', $detail->type)->where('doc_id', $detail->doc_id)->latest()->get();
        foreach ($detail_data as $temp) {
            $temp->create = Carbon::parse($temp->created_at)->format('d-M-Y h:i A');
        }
        $doc = PreEmployment::where('id', $detail->doc_id)->first();

        return view('frontend.pre-employment.audit-inner', compact('detail', 'doc', 'detail_data'));
    }

    public function audit_pdf($id)
    {
        $doc = PreEmployment::find($id);
        $doc->create = Carbon::parse($doc->created_at)->format('d-M-Y h:i A');

        $data = AuditTrial::where('doc_id', $doc->id)->orderByDesc('id')->get();
        foreach ($data as $temp) {
            $temp->creates = Carbon::parse($temp->created_at)->format('d-M-Y h:i A');
        }
        $pdf = App::make('dompdf.wrapper');
        $time = Carbon::now();
        $pdf = PDF::loadview('frontend.pre-employment.audit-pdf', compact('data', 'doc'))
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'isPhpEnabled' => true,
            ]);
        $pdf->setPaper('A4');
        $pdf->render();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->page_script('$pdf->set_opacity(0.1,"Multiply");');

        return $pdf->stream('audit-pre' . $id . '.pdf');
    }

    public function medicalfinalComments(Request $request, $id)
    {
        $medicalfinalComments = PreEmployment::find($id);
        $medicalfinalComments->medicalComment = $request->medicalComment;
        $medicalfinalComments->medicalDate = $request->medicalDate;
        $medicalfinalComments->medicalRemark = $request->medicalRemark;
        $medicalfinalComments->medicalFollowUpReq = $request->medicalFollowUpReq;
        $medicalfinalComments->medicalFollowComment = $request->medicalFollowComment;
        $medicalfinalComments->stage = '6';
        //  return $medicalfinalComments;
        $medicalfinalComments->update();

        return back();
    }
}
