@extends('components.main')
@section('container')
    <style>
        #step-form>div {
            display: none
        }

        #step-form>div:nth-child(1) {
            display: block;
        }

        #step-form>div {
            display: none;
        }

        #step-form>div:nth-child(1) {
            display: block;
        }

        #productTable,
        #materialTable {
            display: none;
        }

        .swal2-container.swal2-center.swal2-backdrop-show .swal2-icon.swal2-error.swal2-icon-show,
        .swal2-container.swal2-center.swal2-backdrop-show .selectize-control.swal2-select.single {
            display: none !important;
        }

        .swal2-container.swal2-center.swal2-backdrop-show #swal2-title {
            text-align: center;
            font-size: 1.5rem !important;
        }

        .swal2-container.swal2-center.swal2-backdrop-show .swal2-html-container.my-html-class {
            text-transform: capitalize !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">


    {{-- ======================================
                PRE EMPLOYMENT VIEW
    ======================================= --}}
    <div id="change-control-view">
        <div class="container-fluid">
            <div class="inner-block state-block">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="main-head">Record Workflow </div>
                    <div class="d-flex" style="gap:20px;">
                        <button id="button-effect" class="button_theme1" class="new-doc-btn"> <a class="text-white"
                                target="__blank" href="{{ url('pre-employment/pdf', $preEmployment->id) }}"> Print
                            </a></button>
                        {{--  <button class="button_theme1"> <a class="text-white" href="{{ url('send-notification', $preEmployment->id) }}"> Send Notification </a> </button>  --}}

                        <button class="button_theme1"> <a class="text-white"
                                href="{{ url('pre-employment/audit', $preEmployment->id) }}"> Audit Trail
                            </a> </button>

                        <button id="button-effect" class="button_theme1"> <a class="text-white"
                                href="{{ url('dashboard/list') }}"> Exit
                            </a> </button>
                    </div>
                </div>


                <div class="status">
                    <div class="head">Current Status</div>
                    @if ($preEmployment->stage == 0)
                        <div class="progress-bars">
                            <div class="bg-danger">Closed-Cancelled</div>
                        </div>
                    @else
                        <div class="progress-bars">
                            @if ($preEmployment->stage == 1)
                                <div class="bg-warning">Pending Pre-Employment Medical Check Up</div>
                            @elseif ($preEmployment->stage >= 1)
                                <div class="active">Pending Pre-Employment Medical Check Up </div>
                            @else
                                <div class="">Pending Pre-Employment Medical Check Up </div>
                            @endif
                            @if ($preEmployment->stage == 2)
                                <div class="bg-warning">Pending Nursing Staff Update</div>
                            @elseif ($preEmployment->stage >= 2)
                                <div class="active">Pending Nursing Staff Update </div>
                            @else
                                <div class="">Pending Nursing Staff Update</div>
                            @endif
                            @if ($preEmployment->stage == 3)
                                <div class="bg-warning">Pending Pre- Employment Check Up Examination </div>
                            @elseif ($preEmployment->stage >= 3)
                                <div class="active">Pending Pre-Employment Check Up Examination </div>
                            @else
                                <div class="">Pending Pre- Employment Check Up Examination </div>
                            @endif
                            {{-- @if ($preEmployment->stage >= 4)
                                <div class="active">Under Review by OHC Head </div>
                            @else
                                <div class="">Under Review by OHC Head </div>
                            @endif --}}
                            {{--  @if ($preEmployment->stage == 5)
                            <div class="bg-warning"> Pending Follow Up by Medical officer </div>
                                @elseif ($preEmployment->stage >= 5)
                                 <div class="active">Pending Follow Up by Medical officer </div>

                            @else
                                <div class="">Pending Follow Up by Medical officer </div>
                            @endif  --}}

                            @if ($preEmployment->stage == 4)
                                <div class="bg-warning">Under Review by OHC Head </div>
                            @elseif ($preEmployment->stage >= 4)
                                <div class="active">Under Review by OHC Head </div>
                            @else
                                <div class="">Under Review by OHC Head </div>
                            @endif
                            {{-- @if ($preEmployment->stage >= 6)
                                <div class="active"> Under Review by OHC Head </div>
                            @else
                                <div class=""> Under Review by OHC Head </div>
                            @endif --}}
                            @if ($preEmployment->stage == 5)
                                <div class="bg-warning"> Pending Follow Up by Medical officer </div>
                            @elseif($preEmployment->stage >= 5)
                                <div class="active">Pending Follow Up by Medical officer</div>
                            @else
                                <div class="">Pending Follow Up by Medical officer</div>
                            @endif

                            @if ($preEmployment->stage == 6)
                                <div class="bg-warning">Pending HR Review </div>
                            @elseif($preEmployment->stage >= 6)
                                <div class="active">Pending HR Review</div>
                            @else
                                <div class="">Pending HR Review</div>
                            @endif

                            @if ($preEmployment->stage == 7)
                                <div class="bg-danger">Closed - Done</div>
                            @elseif ($preEmployment->stage >= 7)
                                <div class="bg-danger">Closed - Done</div>
                            @else
                                <div class="">Closed - Done</div>
                            @endif
                    @endif



                </div>

            </div>

            @php
                $users = DB::table('admins')
                    ->where('id', '!=', 1)
                    ->get();
                $medical = DB::table('admins')
                    ->where('role_id', 3)
                    ->get();
                $nurshing = DB::table('admins')
                    ->where('role_id', 4)
                    ->get();
            @endphp
            <div id="change-control-fields">
                <div class="container-fluid">
                    <div class="cctab">
                        @if (Helpers::checkPermission('readGeneralInformation'))
                            <button class="cctablinks" id="CCForm1B" onclick="openCity(event, 'CCForm1')">General
                                Information</button>
                        @endif
                        @if (Helpers::checkPermission('readMedicalCheckUp'))
                            <button id="CCForm3B" class="cctablinks" onclick="openCity(event, 'CCForm3')"> Medical
                                Check Up
                            </button>
                        @endif
                        @if (Helpers::checkPermission('readNurshingStaffUpdate'))
                            <button id="CCForm4B" class="cctablinks" onclick="openCity(event, 'CCForm4')">Pending Nurshing
                                Staff Update
                            </button>
                        @endif
                        @if (Helpers::checkPermission('readPreEmploymentCheckUpEx'))
                            <button id="CCForm5B" class="cctablinks" onclick="openCity(event, 'CCForm5')">Pending
                                Pre-Employment Check Up
                                Examination</button>
                        @endif
                        @if (Helpers::checkPermission('readOHCHeadReview'))
                            <button id="CCForm8B" class="cctablinks" onclick="openCity(event, 'CCForm8')"> OHC Head
                                Review</button>
                        @endif
                        @if (Helpers::checkPermission('readOHCHeadReview'))
                            <button id="CCForm11B" class="cctablinks" onclick="openCity(event, 'CCForm11')"> Medical Officer
                                Final Review</button>
                        @endif
                        @if (Helpers::checkPermission('readHRReview'))
                            <button id="CCForm9B" class="cctablinks" onclick="openCity(event, 'CCForm9')"> HR
                                Review</button>
                        @endif
                        @if (Helpers::checkPermission('readActivityLog'))
                            <button id="CCForm10B" class="cctablinks" onclick="openCity(event, 'CCForm10')">Activity
                                Log</button>
                        @endif
                    </div>
                    <style>
                        #change-control-fields .cctabcontent#CCForm1 {
                            display: none;
                        }
                    </style>

                    <div id="step-form">
                        @if (Helpers::checkPermission('readGeneralInformation'))
                            <form action="{{ route('preEmployeeAdd') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="CCForm1" class="inner-block cctabcontent">
                                    <div class="inner-block-content">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="Initiator">
                                                        Initiator
                                                    </label>
                                                    <div class="static">{{ Auth::guard('admin')->user()->name }}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="date_initiation">Date Time of Initiation</label>
                                                    <div class="static">{{ $preEmployment->initiation_date }}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="group-input">
                                                    <label for="due-date">Due Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" id="txtDate"
                                                        value="{{ $preEmployment->due_date }}" required name="due_date"
                                                        disabled>
                                                    @error('due_date')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="risk_level">Short Description <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" required
                                                        value="{{ $preEmployment->short_description }}"
                                                        name="short_description" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="doc-detail" style="margin-bottom: 20px;">
                                                    Candidate/Employee Information<button type="button"
                                                        name="ann" id="canDetailbtn">+</button>
                                                </label>
                                                <div class="group-input"
                                                    style="overflow-x: scroll;
                                                width: 100%;
                                                text-align: center;">

                                                    <table class="table-bordered table" id="can-detail" style="width: 195%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No.</th>
                                                                <th>Employee Id</th>
                                                                <th>Site</th>
                                                                <th>Name</th>
                                                                <th>DOB</th>
                                                                <th>Gender</th>
                                                                <th>Dept. Name</th>
                                                                <th>Job Title</th>
                                                                <th>Candidate/Employee Email</th>
                                                                <th>Contact Number</th>
                                                                <th>Age</th>
                                                                <th>Civil Status</th>
                                                                <th>Reporting Manager</th>
                                                                <th>Reporting Manager Email</th>
                                                                <th>Purpose</th>
                                                                <th>External Medical Reports</th>
                                                                <th>Medical Officer</th>
                                                                <th>Medical Officer Email</th>
                                                                <th>HR Comments</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" value="1" name="srn"
                                                                        disabled>
                                                                </td>
                                                                <td>
                                                                    <select class="employees" name="employee_id[]"
                                                                        id="employee_1" disabled>
                                                                        <option value="">Select Employee</option>
                                                                        @foreach ($employees as $employee)
                                                                            <option value="{{ $employee->id }}"
                                                                                @if ($preEmployment->canditate_id == $employee->id) selected @endif>
                                                                                {{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="site_1">{{ $userData->site }}</td>
                                                                <td id="name_1">{{ $userData->name }}</td>
                                                                <td id="dob_1">{{ $userData->dob }}</td>
                                                                <td id="gender_1">{{ $userData->gender }}</td>
                                                                <td id="dept_name_1">{{ $userData->department }}</td>
                                                                <td id="job_title_1">{{ $role->name }}</td>
                                                                <td id="employee_mail_1">{{ $userData->email }}</td>
                                                                <td id="contact_number_1">{{ $userData->mobile }}</td>
                                                                <td id="age_1">{{ $userData->age }}</td>
                                                                <td id="civil_status_1">{{ $userData->civil_status }}</td>
                                                                <td id="reporting_manager_1">
                                                                    {{ $userData->reporting_manager_name }}

                                                                </td>
                                                                <td id="reporting_manager_mail_1">
                                                                    {{ $userData->reporting_manager_email }}</td>
                                                                <td>
                                                                    <select class="purposes" disabled id="purpose_1"
                                                                        name="purpose[]" disabled>
                                                                        <option value="">Select Purpose</option>
                                                                        @foreach ($purposes as $purpose)
                                                                            <option value="{{ $purpose }}"
                                                                                @if ($preEmployment->purpose == $purpose) selected @endif>
                                                                                {{ $purpose }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    @if ($preEmployment->external_attachment)
                                                                    @foreach (json_decode($preEmployment->external_attachment) as $data => $value)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                                        </p>
                                                                    @endforeach
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <select class="medical_officers" disabled
                                                                        id="medical_officer_1" name="medical_officer[]">
                                                                        <option value="">Select Medical Officer
                                                                        </option>
                                                                        @foreach ($medicalOfficers as $medicalOfficer)
                                                                            <option data-mail={{ $medicalOfficer->email }}
                                                                                value="{{ $medicalOfficer->id }}"
                                                                                @if ($preEmployment->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                                {{ $medicalOfficer->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="medical_officer_mail_1">{{ $medicalofficeremail }}
                                                                </td>
                                                                <td id="hr_comments_1">{{ $preEmployment->HR_comments }}
                                                                </td>
                                                            </tr>

                                                            <div id="candetaildiv"></div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-block">
                                            {{-- <button type="submit" class="saveButton">Save</button> --}}
                                            <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                            <button type="button"> <a class="text-white"
                                                    href="{{ url('dashboard/list') }}">
                                                    Exit </a> </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif


                        @if (Helpers::checkPermission('readMedicalCheckUp'))
                            <form id="medicalCheckUpForm" action="{{ url('pre-employment/update', $preEmployment->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="CCForm3" class="inner-block cctabcontent">
                                    {{-- <p>This is start form tab</p> --}}
                                    <div class="sub-head">
                                        Pending Medical Check Up
                                    </div>
                                    <div class="inner-block-content">
                                        <div class="mtab">
                                            <div class="mtab2" id="bloodPressure"
                                                style="background-color: gray; color: white;">Blood Pressure Test</div>

                                            <div class="mtab2" id="vitalSigns"
                                                style="background-color: gray; color: white;">Vital Signs
                                                Calculator</div>

                                            <div class="mtab2" id="bmiB"
                                                style="background-color: gray; color: white;">BMI</div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div id="bloodPressureBox" style="display: none;" class="mtab2_box">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="type_change">Systolic (mmHg)<span class="text-danger"
                                                                id="blood_pressure_alert">*</span>
                                                            :</label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" id="systolic"
                                                                value="{{ old('systolic') ? old('systolic') : $preEmployment->systolic }}"
                                                                name="systolic">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->systolic }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Diastolic (mmHg)<span class="text-danger"
                                                                id="temperature_alert"> *</span> :
                                                        </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" id="diastolic"
                                                                value="{{ old('diastolic') ? old('diastolic') : $preEmployment->diastolic }}"
                                                                name="diastolic">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->diastolic }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2" id="blood_pressure_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Blood Pressure Result : <span
                                                            id="blood_pressure_result"></span></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="vitalSignsBox" style="display: none;" class="mtab2_box">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="type_change">Heart Rate (bpm)<span class="text-danger"
                                                                id="heart_rate_alert">*</span>
                                                            :</label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="heart_rate"
                                                                value="{{ old('heart_rate') ? old('heart_rate') : $preEmployment->heart_rate }}"
                                                                id="heart_rate">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->blood_pressure }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Respiratory Rate (per minute)<span
                                                                class="text-danger" id="respiratory_rate_alert"> *</span>
                                                            :
                                                        </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="respiratory_rate"
                                                                value="{{ old('respiratory_rate') ? old('respiratory_rate') : $preEmployment->respiratory_rate }}"
                                                                id="respiratory_rate">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->respiratory_rate }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Systolic (mmHg)<span class="text-danger"
                                                                id="systolic2_alert"> *</span> :
                                                        </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="systolic"
                                                                value="{{ old('systolic') ? old('systolic') : $preEmployment->systolic }}"
                                                                id="systolic2">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->systolic }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Diastolic (mmHg)<span class="text-danger"
                                                                id="diastolic2_alert"> *</span> :
                                                        </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="diastolic"
                                                                value="{{ old('diastolic') ? old('diastolic') : $preEmployment->diastolic }}"
                                                                id="diastolic">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->diastolic }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="group-input">
                                                        <label for="qa_head">Temperature (°F)<span class="text-danger"
                                                                id="temperature_alert"> *</span> :
                                                        </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="temperature"
                                                                value="{{ old('temperature') ? old('temperature') : $preEmployment->temperature }}"
                                                                id="temperature">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->temperature }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2" id="vital_result_box" style="display: none;">
                                                    <strong for="qa_head">Final Result : <span
                                                            id="vital_result"></span></strong>
                                                </div>
                                                <div class="col-12 mb-2" id="heart_rate_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Heart Rate Result : <span
                                                            id="heart_rate_result"></span></strong>
                                                </div>
                                                <div class="col-12 mb-2" id="respiratory_rate_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Respiratory Rate Result : <span
                                                            id="respiratory_rate_result"></span></strong>
                                                </div>
                                                <div class="col-12 mb-2" id="temperature_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Temperature Result : <span
                                                            id="temperature_result"></span></strong>
                                                </div>
                                                <div class="col-12 mb-2" id="systolic2_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Systolic Blood Pressure Result : <span
                                                            id="systolic2_result"></span></strong>
                                                </div>
                                                <div class="col-12 mb-2" id="diastolic2_result_box"
                                                    style="display: none;">
                                                    <strong for="qa_head">Diastolic Blood Pressure Result : <span
                                                            id="diastolic2_result"></span></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="bmiBBox" style="display: none;" class="mtab2_box">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Height (ft)<span class="text-danger"
                                                                id="weight_alert">
                                                                *</span> : </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="height"
                                                                value="{{ old('height') ? old('height') : $preEmployment->height }}"
                                                                id="height">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->height }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="group-input">
                                                        <label for="qa_head">Weight (kg)<span class="text-danger"
                                                                id="weight_alert">
                                                                *</span> : </label>
                                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                            <input type="text" name="weight"
                                                                value="{{ old('weight') ? old('weight') : $preEmployment->weight }}"
                                                                id="weight">
                                                        @else
                                                            <p class="mb-2">{{ $preEmployment->weight }}</p>
                                                        @endif
                                                    </div>
                                                    {{-- <p>This is end of form</p> --}}
                                                </div>
                                                <div class="col-12 mb-2" id="bmi_result_box">
                                                    <strong>BMI Test Result : <span id="bmi_result_alert"></span></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="group-input">
                                                    <label for="qa_head">Notes:</label>
                                                    @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                        <input type="text"
                                                            value="{{ old('notes') ? old('notes') : $preEmployment->notes }}"
                                                            name="notes">
                                                    @else
                                                        <p class="mb-2">{{ $preEmployment->notes }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="group-input">
                                                    <label for="qa_head">Inventigation Request:</label>
                                                    @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                                        <input type="text"
                                                            value="{{ old('investigation_request') ? old('investigation_request') : $preEmployment->investigation_request }}"
                                                            name="investigation_request">
                                                    @else
                                                        <p class="mb-2">{{ $preEmployment->investigation_request }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="group-input" style="overflow-x: scroll;
                                                width: 100%;">
                                                    <label for="doc-detail">
                                                        Test Results <button type="button"
                                                        name="ann" id="testResult">+</button>
                                                    </label>
                                                    <table class="table-bordered table" id="test-detail">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Organ/Sys.<span id="Organ"
                                                                    class="text-danger">*</span></th>
                                                                <th>Details/ Test/ Examination<span id="details"
                                                                        class="text-danger">*</span></th>
                                                                <th>Standards<span id="Standards" class="text-danger">*</span>
                                                                </th>
                                                                <th>Observation</th>
                                                                <th>Result</th>
                                                                <th>Nursing Staff Comments</th>
                                                                <th>Criteria for Disqualification</th>
                                                                <th>Medical Officer Comments<th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" value="1" name="sn">
                                                                </td>
                                                                <td>
                                                                   <select class="Organ_select" name="organ[]">
                                                                    <option value="">Select</option>
                                                                    <option value="General Examination">General Examination </option>
                                                                    <option value="Ear">Ear</option>
                                                                    <option value="Nose">Nose</option>
                                                                   </select>
                                                                </td>
                                                                <td>
                                                                    <select class="detail_select" name="detail[]">
                                                                     <option value="">Select</option>
                                                                     <option value="Height Weight BMI">Height Weight BMI</option>
                                                                     <option value="Chest">Chest</option>
                                                                     <option value="Glands & others">Glands & others</option>
                                                                     <option value="Blood">Blood</option>
                                                                    </select>
                                                                    <p class="measurment"></p>
                                                                    <p class="text-container"></p>
                                                                 </td>

                                                                 <td class="standurd_fill"></td>
                                                                 <td id="">-
                                                                 <td>
                                                                   -
                                                                </td>
                                                                 <td class="nurshing_staff_comments">-</td>
                                                                 <td ></td>
                                                                 <td id="grid_medical_comment">-</td>


                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="group-input" style="overflow-x: scroll;
                                                width: 100%;">
                                                    <label for="doc-detail">
                                                        Test Results
                                                    </label>
                                                    <table class="table-bordered table">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Organ/Sys.<span id="Organ"
                                                                    class="text-danger">*</span></th>
                                                                <th>Details/ Test/ Examination<span id="details"
                                                                        class="text-danger">*</span></th>
                                                                <th>Standards<span id="Standards" class="text-danger">*</span>
                                                                </th>
                                                                <th>Observation</th>
                                                                <th>Result</th>
                                                                <th>Nursing Staff Comments</th>
                                                                <th>Criteria for Disqualification</th>
                                                                <th>Medical Officer Comments<th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($preEmployment->organ)
                                                            @foreach($organ as $key => $temp)
                                                            <tr>
                                                                <td><input type="text" value="{{$key+1}}" name="sn">
                                                                </td>
                                                                <td>
                                                                   <p>{{ $temp }}</p>
                                                                </td>
                                                                <td>
                                                                    @if(json_decode($preEmployment->organ)[$key])
                                                                    @if(json_decode($preEmployment->organ )[$key] == "EAR")
                                                                    <p>Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the ear
                                                                        under examination facing him. He will use the whispering voice.</p>
                                                                    @elseif(json_decode($preEmployment->organ )[$key] == "NOSE")
                                                                    <p>General examination</p>
                                                                    @else
                                                                    <p>{{ json_decode($preEmployment->detail )[$key] ?? "-" }}</p>
                                                                    @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                    @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] == "Chest")
                                                                    <p>Measurement</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                    <p>Physical examination</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                    <p>Sugar</p>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                 </td>

                                                                 <td>  @if(json_decode($preEmployment->organ )[$key])
                                                                    @if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                    <p>Candidate  should  be  free  from  any  active disease   of   ear   and   should   be   able   to reproduce the whisper.</p>
                                                                    @elseif(json_decode($preEmployment->organ )[$key] == "Nose")
                                                                    <p>Should be free from active disease of nose.</p>
                                                                    @else
                                                                    @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                    @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI")
                                                                    <p>Minimum height requirement for drivers is 162 cms.
                                                                        Age up to 35 yrs- BMI max-30 kg/m2
                                                                        Age above 35 yrs- BMI max-32 kg/m2</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] == "Chest")
                                                                    <p>Minimum    in    full    expiration    79    cm (relaxable    by    5    cm)    and    minimum expansion  5  cm.  The  range  of  expansion upto  4  cm  i.e.  deviation  of  20%  will  be acceptable.    Not    applicable    to    female candidate</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                    <p>Thyroid    should    be    normal    with    no evidence of hypo or hyper thyroidism or Generalized enlargement of lymph glands. Scars,  if  any  of  the  previous  removal  of tubercular glands should be normal and there   must   not   have   been   any   active disease in last five years</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                    <p>Within normal limits</p>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endif</td>
                                                                 <td id="">{{ json_decode($preEmployment->observation )[$key] ?? "-" }}</td>
                                                                 <td>
                                                                    {{ json_decode($preEmployment->result)[$key] ?? "-" }}
                                                                </td>
                                                                 <td class="nurshing_staff_comments">{{ json_decode($preEmployment->nurshing_staff_comments)[$key] ?? "-" }}</td>
                                                                 <td>
                                                                    @if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                    <p>Candidate who fails to hear whispering voice separately in both ears at a distance of 2 feet in a quiet room.</p>
                                                                    @endif
                                                                    @if(json_decode($preEmployment->detail )[$key] ?? "-" == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] ?? "-" == "Chest" )
                                                                    <p>Medical   Authority   should   use   his   clinical discretion for  abnormal  height,  weight  & BMI for   further   clinical   evaluation   for   medical fitness. Significant  underweight/  overweight  &  height more than 200 cms needs further investigations before declaring FIT.
                                                                        BMI   above   the   maximum   limit   will   be   a disqualification</p>
                                                                    @elseif(json_decode($preEmployment->detail )[$key] ?? "-" == "Glands & others" || json_decode($preEmployment->detail )[$key] ?? "-" == "Blood" )
                                                                    <p>Any    lymphadenopathy    to    be    thoroughly investigated  to  rule  out  chronic  granulomatous disease like tuberculosis, sarcoidosis and blood dyscrasias.<br>Individuals  with  diabetes  will  be  temporarily unfit for max. 21 days if their blood sugar level is not in normal  limit. HbA1C should be at or less  than  7.0.    If  after  21  days,  it  is  still  in abnormal  range  or  HbA1C  is  above  7.0  then they will be Unfit.<br>Diabetics  with  any  target  organ  involvement
                                                                        e.g.  nephropathy,  retinopathy,  neuropathy  etc. will be declared Unfit.</p>
                                                                    @endif
                                                                </td>
                                                                 <td id="grid_medical_comment">{{ json_decode($preEmployment->grid_medical_comment)[$key] ?? "-" }}</td>


                                                            </tr>
                                                            @endforeach
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endif


                                    </div>
                                    <div class="button-block">
                                        @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 1)
                                            <button id="saveMedicalCheckUpButton" class="saveButton">Pre-Employment
                                                Medical
                                                Check Up Completed
                                            </button>
                                        @endif
                                        <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                        <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                        <button type="button"> <a class="text-white"
                                                href="{{ url('dashboard/list') }}">
                                                Exit </a> </button>
                                    </div>
                                </div>
                                <div id="CCForm3" class="inner-block cctabcontent">
                                    <label for="">Systolic</label>
                                    {{-- <input type="text" id="systolic" name="systolic"> --}}

                                    <label for="">Diastolic</label>
                                    {{-- <input type="text" id="diastolic" name="diastolic"> --}}
                                </div>
                            </form>
                        @endif
                    </div>

                    @if (Helpers::checkPermission('readNurshingStaffUpdate'))
                        <form id="nurshingStaff" action="{{ url('pre-employment/nushing', $preEmployment->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="CCForm4" class="inner-block cctabcontent">
                                <div class="inner-block-content">
                                    <div class="col-12">
                                        <label for="doc-detail" style="margin-bottom: 20px;">
                                            Candidate/Employee Information
                                        </label>
                                        <div class="group-input"
                                            style="overflow-x: scroll;
                                            width: 100%;
                                            text-align: center;">

                                            <table class="table-bordered table" id="can-detail" style="width: 195%;">
                                                <thead style="vertical-align: middle">
                                                    <tr>
                                                        <th>Sr.No.</th>
                                                        <th>Employee Id</th>
                                                        <th>Site</th>
                                                        <th>Name</th>
                                                        <th>DOB</th>
                                                        <th>Gender</th>
                                                        <th>Dept. Name</th>
                                                        <th>Job Title</th>
                                                        <th>Candidate/Employee Email</th>
                                                        <th>Contact Number</th>
                                                        <th>Age</th>
                                                        <th>Civil Status</th>
                                                        <th>Reporting Manager</th>
                                                        <th>Reporting Manager Email</th>
                                                        <th>Purpose</th>
                                                        <th>External Medical Reports</th>
                                                        <th>Medical Officer</th>
                                                        <th>Medical Officer Email</th>
                                                        <th>HR Comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td><input type="text" value="1" name="srn" disabled>
                                                        </td>
                                                        <td>
                                                            <select class="employees" name="employee_id[]"
                                                                id="employee_1" disabled>
                                                                <option value="">Select Employee</option>
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                        @if ($preEmployment->canditate_id == $employee->id) selected @endif>
                                                                        {{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td id="site_1">{{ $userData->site }}</td>
                                                        <td id="name_1">{{ $userData->name }}</td>
                                                        <td id="dob_1">{{ $userData->dob }}</td>
                                                        <td id="gender_1">{{ $userData->gender }}</td>
                                                        <td id="dept_name_1">{{ $userData->department }}</td>
                                                        <td id="job_title_1">{{ $role->name }}</td>
                                                        <td id="employee_mail_1">{{ $userData->email }}</td>
                                                        <td id="contact_number_1">{{ $userData->mobile }}</td>
                                                        <td id="age_1">{{ $userData->age }}</td>
                                                        <td id="civil_status_1">{{ $userData->civil_status }}</td>
                                                        <td id="reporting_manager_1">
                                                            {{ $userData->reporting_manager_name }}
                                                        </td>
                                                        <td id="reporting_manager_mail_1">
                                                            {{ $userData->reporting_manager_email }}</td>
                                                        <td>
                                                            <select class="purposes" disabled id="purpose_1"
                                                                name="purpose[]" disabled>
                                                                <option value="">Select Purpose</option>
                                                                @foreach ($purposes as $purpose)
                                                                    <option value="{{ $purpose }}"
                                                                        @if ($preEmployment->purpose == $purpose) selected @endif>
                                                                        {{ $purpose }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <!-- <td>
                                                            @if ($preEmployment->external_medical_report)
                                                            <td> @foreach ($report as $data =>$value)
                                                               <p><a
                                                                   href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                           </p>
                                                           @endforeach

                                                            @endif
                                                        </td> -->

                                                        <td>
                                                                    @if ($preEmployment->external_attachment)
                                                                    @foreach (json_decode($preEmployment->external_attachment) as $data => $value)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                                        </p>
                                                                    @endforeach
                                                                    @endif
                                                                </td>
                                                        <td>
                                                            <select class="medical_officers" disabled
                                                                id="medical_officer_1" name="medical_officer[]">
                                                                <option value="">Select Medical Officer
                                                                </option>
                                                                @foreach ($medicalOfficers as $medicalOfficer)
                                                                    <option data-mail={{ $medicalOfficer->email }}
                                                                        value="{{ $medicalOfficer->id }}"
                                                                        @if ($preEmployment->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                        {{ $medicalOfficer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td id="medical_officer_mail_1">{{ $medicalofficeremail }}
                                                        </td>
                                                        <td id="hr_comments_1">{{ $preEmployment->HR_comments }}</td>
                                                    </tr>

                                                    <div id="candetaildiv"></div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="sub-head">
                                        Investigation Request
                                    </div>
                                    <label for="" style="margin-bottom: 30px"><b>Investigation Request
                                            Data:</b>{{ $preEmployment->investigation_request }}</label>

                                    <div class="sub-head">
                                        Pending Nurshing Staff Update
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="group-input">
                                                <label for="doc-detail">
                                                    Nursing Staff Information
                                                </label>
                                                <table class="table-bordered table" id="nur-detail">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Nursing Staff Name</th>
                                                            <th>Medical History<span id="medical_history_alert"
                                                                    class="text-danger">*</span></th>
                                                            <th>BMI<span id="bmi_alert" class="text-danger">*</span>
                                                            </th>
                                                            <th>Vision Test<span id="vision_test_alert"
                                                                    class="text-danger">*</span></th>
                                                            <th>Blood Reports<span id="blood_reports_alert"
                                                                    class="text-danger">*</span></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" value="1" name="sn">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="Nurshing_staff_name"
                                                                    value="{{ $name }}">
                                                            </td>
                                                            <td>
                                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                                    <input type="text"
                                                                        value="{{ old('medical_history') ? old('medical_history') : $preEmployment->medical_history }}"
                                                                        name="medical_history" id="medical_history">
                                                                @else
                                                                    <input readonly type="text" name="medical_history"
                                                                        value="{{ $preEmployment->medical_history }}"
                                                                        id="medical_history">
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                                    <input type="number" name="bmi"
                                                                        value="{{ old('bmi') ? old('bmi') : $preEmployment->bmi }}"
                                                                        id="bmi">
                                                                @else
                                                                    <p><a
                                                                            href="{{ asset('images/external_medical_report/' . $preEmployment->blood_reports) }}">{{ $preEmployment->blood_reports }}</a>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                            <td>

                                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                                    <input type="text" name="vision_test"
                                                                        value="{{ old('vision_test') ? old('vision_test') : $preEmployment->vision_test }}"
                                                                        id="vision_test">
                                                                @else
                                                                    <input type="text" readonly name="vision_test"
                                                                        value="{{ $preEmployment->vision_test }}"
                                                                        id="vision_test">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                                    <input type="file" name="blood_reports"
                                                                        value="{{ old('blood_reports') ? old('blood_reports') : $preEmployment->blood_reports }}"
                                                                        id="blood_reports">
                                                                @else
                                                                    <p><a
                                                                            href="{{ asset('images/external_medical_report/' . $preEmployment->blood_reports) }}">{{ $preEmployment->blood_reports }}</a>
                                                                    </p>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                        <div id="nurdetaildiv"></div>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Other Medical Reports
                                                </label>
                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                    <input type="file"
                                                        value="{{ old('other_reports') ? old('other_reports') : $preEmployment->other_reports }}"
                                                        name="other_reports" id="other_reports">
                                                @else
                                                    <p class="mb-2">{{ $preEmployment->other_reports }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="comments">Medical Comments</label>
                                                @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                                    <input type="text" name="Nurshing_staff_medicalComment"
                                                        value="{{ old('Nurshing_staff_medicalComment') ? old('Nurshing_staff_medicalComment') : $preEmployment->Nurshing_staff_medicalComment }}"
                                                        id="Nurshing_staff_medicalComment">
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->Nurshing_staff_medicalComment }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    @if (Helpers::checkPermission('updateNurshingStaffUpdate') && $preEmployment->stage == 2)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="group-input" style="overflow-x: scroll;
                                            width: 100%;">
                                                <label for="doc-detail">
                                                    Test Results
                                                </label>
                                                <table class="table-bordered table"  id="test-detail">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Organ/Sys.<span id="Organ"
                                                                class="text-danger">*</span></th>
                                                            <th>Details/ Test/ Examination<span id="details"
                                                                    class="text-danger">*</span></th>
                                                            <th>Standards<span id="Standards" class="text-danger">*</span>
                                                            </th>
                                                            <th>Observation</th>
                                                            <th>Result</th>
                                                            <th>Nursing Staff Comments</th>
                                                            <th>Criteria for Disqualification</th>
                                                            <th>Medical Officer Comments<th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($preEmployment->organ)
                                                        @foreach($organ as $key => $temp)
                                                        <tr>
                                                            <td><input type="text" value="{{$key+1}}" name="sn">
                                                            </td>
                                                            <td>
                                                               <p id="temp">{{ $temp }}</p>
                                                            </td>
                                                            <td>
                                                                @if(json_decode($preEmployment->organ)[$key])
                                                                @if(json_decode($preEmployment->organ )[$key] == "EAR")
                                                                <p>Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the ear
                                                                    under examination facing him. He will use the whispering voice.</p>
                                                                @elseif(json_decode($preEmployment->organ )[$key] == "NOSE")
                                                                <p>General examination</p>
                                                                @else
                                                                <p id="deta">{{ json_decode($preEmployment->detail )[$key] ?? "-" }}</p>
                                                                @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] == "Chest")
                                                                <p>Measurement</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                <p>Physical examination</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                <p>Sugar</p>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endif
                                                             </td>

                                                             <td>  @if(json_decode($preEmployment->organ )[$key])
                                                                @if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                <p>Candidate  should  be  free  from  any  active disease   of   ear   and   should   be   able   to reproduce the whisper.</p>
                                                                @elseif(json_decode($preEmployment->organ )[$key] == "Nose")
                                                                <p>Should be free from active disease of nose.</p>
                                                                @else
                                                                @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI")
                                                                <p>Minimum height requirement for drivers is 162 cms.
                                                                    Age up to 35 yrs- BMI max-30 kg/m2
                                                                    Age above 35 yrs- BMI max-32 kg/m2</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Chest")
                                                                <p>Minimum    in    full    expiration    79    cm (relaxable    by    5    cm)    and    minimum expansion  5  cm.  The  range  of  expansion upto  4  cm  i.e.  deviation  of  20%  will  be acceptable.    Not    applicable    to    female candidate</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                <p>Thyroid    should    be    normal    with    no evidence of hypo or hyper thyroidism or Generalized enlargement of lymph glands. Scars,  if  any  of  the  previous  removal  of tubercular glands should be normal and there   must   not   have   been   any   active disease in last five years</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                <p>Within normal limits</p>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endif</td>
                                                                <td id=""><input type="text" name="observation[]"></td>
                                                                <td>
                                                                   <select class="result" name="result[]">
                                                                       <option value="">Select</option>
                                                                       <option value="Qualified">Qualified</option>
                                                                       <option value="Disqualified">Disqualified</option>
                                                                   </select>
                                                               </td>
                                                                <td class="nurshing_staff_comments"><input type="text" name="nurshing_staff_comments[]"></td>
                                                                <td class="criteria"></td>
                                                             <td id="grid_medical_comment">{{ json_decode($preEmployment->grid_medical_comment)[$key] ?? "-" }}</td>


                                                        </tr>
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="group-input" style="overflow-x: scroll;
                                            width: 100%;">
                                                <label for="doc-detail">
                                                    Test Results
                                                </label>
                                                <table class="table-bordered table" >
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Organ/Sys.<span id="Organ"
                                                                class="text-danger">*</span></th>
                                                            <th>Details/ Test/ Examination<span id="details"
                                                                    class="text-danger">*</span></th>
                                                            <th>Standards<span id="Standards" class="text-danger">*</span>
                                                            </th>
                                                            <th>Observation</th>
                                                            <th>Result</th>
                                                            <th>Nursing Staff Comments</th>
                                                            <th>Criteria for Disqualification</th>
                                                            <th>Medical Officer Comments<th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($preEmployment->organ)
                                                        @foreach($organ as $key => $temp)
                                                        <tr>
                                                            <td><input type="text" value="{{$key+1}}" name="sn">
                                                            </td>
                                                            <td>
                                                               <p>{{ $temp }}</p>
                                                            </td>
                                                            <td>
                                                                @if(json_decode($preEmployment->organ)[$key])
                                                                @if(json_decode($preEmployment->organ )[$key] == "EAR")
                                                                <p>Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the ear
                                                                    under examination facing him. He will use the whispering voice.</p>
                                                                @elseif(json_decode($preEmployment->organ )[$key] == "NOSE")
                                                                <p>General examination</p>
                                                                @else
                                                                <p>{{ json_decode($preEmployment->detail )[$key] ?? "-" }}</p>
                                                                @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] == "Chest")
                                                                <p>Measurement</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                <p>Physical examination</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                <p>Sugar</p>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endif
                                                             </td>

                                                             <td>  @if(json_decode($preEmployment->organ )[$key])
                                                                @if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                <p>Candidate  should  be  free  from  any  active disease   of   ear   and   should   be   able   to reproduce the whisper.</p>
                                                                @elseif(json_decode($preEmployment->organ )[$key] == "Nose")
                                                                <p>Should be free from active disease of nose.</p>
                                                                @else
                                                                @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI")
                                                                <p>Minimum height requirement for drivers is 162 cms.
                                                                    Age up to 35 yrs- BMI max-30 kg/m2
                                                                    Age above 35 yrs- BMI max-32 kg/m2</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Chest")
                                                                <p>Minimum    in    full    expiration    79    cm (relaxable    by    5    cm)    and    minimum expansion  5  cm.  The  range  of  expansion upto  4  cm  i.e.  deviation  of  20%  will  be acceptable.    Not    applicable    to    female candidate</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                <p>Thyroid    should    be    normal    with    no evidence of hypo or hyper thyroidism or Generalized enlargement of lymph glands. Scars,  if  any  of  the  previous  removal  of tubercular glands should be normal and there   must   not   have   been   any   active disease in last five years</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                <p>Within normal limits</p>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endif</td>
                                                             <td id="">{{ json_decode($preEmployment->observation )[$key] ?? "-" }}</td>
                                                             <td>
                                                                {{ json_decode($preEmployment->result)[$key] ?? "-" }}
                                                            </td>
                                                             <td class="nurshing_staff_comments">{{ json_decode($preEmployment->nurshing_staff_comments)[$key] ?? "-" }}</td>
                                                             <td>@if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                <p>Candidate who fails to hear whispering voice separately in both ears at a distance of 2 feet in a quiet room.</p>
                                                                @endif
                                                                @if(json_decode($preEmployment->detail )[$key] ?? "-" == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] ?? "-" == "Chest" )
                                                                <p>Medical   Authority   should   use   his   clinical discretion for  abnormal  height,  weight  & BMI for   further   clinical   evaluation   for   medical fitness. Significant  underweight/  overweight  &  height more than 200 cms needs further investigations before declaring FIT.
                                                                    BMI   above   the   maximum   limit   will   be   a disqualification</p>
                                                                @elseif(json_decode($preEmployment->detail )[$key] ?? "-" == "Glands & others" || json_decode($preEmployment->detail )[$key] ?? "-" == "Blood" )
                                                                <p>Any    lymphadenopathy    to    be    thoroughly investigated  to  rule  out  chronic  granulomatous disease like tuberculosis, sarcoidosis and blood dyscrasias.<br>Individuals  with  diabetes  will  be  temporarily unfit for max. 21 days if their blood sugar level is not in normal  limit. HbA1C should be at or less  than  7.0.    If  after  21  days,  it  is  still  in abnormal  range  or  HbA1C  is  above  7.0  then they will be Unfit.<br>Diabetics  with  any  target  organ  involvement
                                                                    e.g.  nephropathy,  retinopathy,  neuropathy  etc. will be declared Unfit.</p>
                                                                @endif</td>
                                                             <td id="grid_medical_comment">{{ json_decode($preEmployment->grid_medical_comment)[$key] ?? "-" }}</td>


                                                        </tr>
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    <div class="button-block">
                                        @if (Helpers::checkPermission('updateNurshingStaffUpdate')  && $preEmployment->stage == 2)
                                            <button id="saveNurshingstaffButton" class="saveButton">Updated
                                            </button>
                                        @endif
                                        <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                        <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                        <button type="button"> <a class="text-white"
                                                href="{{ url('dashboard/list') }}">
                                                Exit </a> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    @if (Helpers::checkPermission('readPreEmploymentCheckUpEx'))
                        <form id="preEmploymentCheckUpEx"
                            action="{{ url('pre-employment/abnormal', $preEmployment->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="CCForm5" class="inner-block cctabcontent">
                                <div class="inner-block-content">
                                    <div class="col-12">
                                        <label for="doc-detail" style="margin-bottom: 20px;">
                                            Candidate/Employee Information
                                            {{-- <button type="button"
                                                        name="ann" id="canDetailbtn">+</button> --}}
                                        </label>
                                        <div class="group-input"
                                            style="overflow-x: scroll;
                                            width: 100%;
                                            text-align: center;">

                                            <table class="table-bordered table" id="can-detail" style="width: 195%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No.</th>
                                                        <th>Employee Id</th>
                                                        <th>Site</th>
                                                        <th>Name</th>
                                                        <th>DOB</th>
                                                        <th>Gender</th>
                                                        <th>Dept. Name</th>
                                                        <th>Job Title</th>
                                                        <th>Candidate/Employee Email</th>
                                                        <th>Contact Number</th>
                                                        <th>Age</th>
                                                        <th>Civil Status</th>
                                                        <th>Reporting Manager</th>
                                                        <th>Reporting Manager Email</th>
                                                        <th>Purpose</th>
                                                        <th>External Medical Reports</th>
                                                        <th>Medical Officer</th>
                                                        <th>Medical Officer Email</th>
                                                        <th>HR Comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td><input type="text" value="1" name="srn" disabled>
                                                        </td>
                                                        <td>
                                                            <select class="employees" name="employee_id[]"
                                                                id="employee_1" disabled>
                                                                <option value="">Select Employee</option>
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                        @if ($preEmployment->canditate_id == $employee->id) selected @endif>
                                                                        {{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td id="site_1">{{ $userData->site }}</td>
                                                        <td id="name_1">{{ $userData->name }}</td>
                                                        <td id="dob_1">{{ $userData->dob }}</td>
                                                        <td id="gender_1">{{ $userData->gender }}</td>
                                                        <td id="dept_name_1">{{ $userData->department }}</td>
                                                        <td id="job_title_1">{{ $role->name }}</td>
                                                        <td id="employee_mail_1">{{ $userData->email }}</td>
                                                        <td id="contact_number_1">{{ $userData->mobile }}</td>
                                                        <td id="age_1">{{ $userData->age }}</td>
                                                        <td id="civil_status_1">{{ $userData->civil_status }}</td>
                                                        <td id="reporting_manager_1">
                                                            {{ $userData->reporting_manager_name }}
                                                        </td>
                                                        <td id="reporting_manager_mail_1">
                                                            {{ $userData->reporting_manager_email }}</td>
                                                        <td>
                                                            <select class="purposes" disabled id="purpose_1"
                                                                name="purpose[]" disabled>
                                                                <option value="">Select Purpose</option>
                                                                @foreach ($purposes as $purpose)
                                                                    <option value="{{ $purpose }}"
                                                                        @if ($preEmployment->purpose == $purpose) selected @endif>
                                                                        {{ $purpose }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                                    @if ($preEmployment->external_attachment)
                                                                    @foreach (json_decode($preEmployment->external_attachment) as $data => $value)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                                        </p>
                                                                    @endforeach
                                                                    @endif
                                                                </td>
                                                        <td>
                                                            <select class="medical_officers" disabled
                                                                id="medical_officer_1" name="medical_officer[]">
                                                                <option value="">Select Medical Officer
                                                                </option>
                                                                @foreach ($medicalOfficers as $medicalOfficer)
                                                                    <option data-mail={{ $medicalOfficer->email }}
                                                                        value="{{ $medicalOfficer->id }}"
                                                                        @if ($preEmployment->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                        {{ $medicalOfficer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td id="medical_officer_mail_1">{{ $medicalofficeremail }}
                                                        </td>
                                                        <td id="hr_comments_1">{{ $preEmployment->HR_comments }}</td>
                                                    </tr>

                                                    <div id="candetaildiv"></div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="sub-head">
                                        Pending Pre-Employment Check Up Examination
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="group-input">
                                                <label for="doc-detail">
                                                    Test Results Abnormality Review.
                                                    <button type="button" id="preDetailbtn">+</button>
                                                </label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <table class="table-bordered table" id="pre-detail">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Abnormality Description<span
                                                                        id="abnormal_finding_alert"
                                                                        class="text-danger">*</span></th>
                                                                <th>Comment<span id="abnormal_comment_alert"
                                                                        class="text-danger">*</span></th>
                                                                <th>Status<span id="pre_imployement_physicalExam_alert"
                                                                        class="text-danger">*</span></th>
                                                                <th>Follow Up Needed<span id="Followup_action_alert"
                                                                        class="text-danger">*</span></th>
                                                                <th>Follow Up Comment<span id="Followup_Comments_alert"
                                                                        class="text-danger">*</span></th>
                                                                <th>Follow Up Due Date<span id="Followup_dueDate_alert"
                                                                        class="text-danger">*</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input readonly type="text" value="1"
                                                                        name="sn">
                                                                </td>
                                                                <td>


                                                                    <input type="text" name="abnormal_finding[]"
                                                                        id="abnormal_finding">



                                                                </td>
                                                                <td>

                                                                    <input type="text"
                                                                        value="{{ old('abnormal_comment') ? old('abnormal_comment') : $preEmployment->abnormal_comment }}"
                                                                        name="abnormal_comment[]" id="abnormal_comment">

                                                                </td>
                                                                <td>

                                                                    <select name="pre_imployement_physicalExam[]"
                                                                        id="pre_imployement_physicalExam">
                                                                        <option value="">-- Select --</option>
                                                                        <option
                                                                            @if ($preEmployment->pre_imployement_physicalExam == 'Satifactory') selected @endif
                                                                            value="Satifactory">Satifactory </option>
                                                                        <option
                                                                            @if ($preEmployment->pre_imployement_physicalExam == 'Not Satifactory') selected @endif
                                                                            value="Not Satifactory">Not Satifactory
                                                                        </option>
                                                                    </select>

                                                                </td>
                                                                <td>

                                                                    <select name="Followup_action[]" id="Followup_action">
                                                                        <option value="">-- Select --</option>
                                                                        <option
                                                                            @if ($preEmployment->Followup_action == 'Yes') selected @endif
                                                                            value="Yes">Yes</option>
                                                                        <option
                                                                            @if ($preEmployment->Followup_action == 'No') selected @endif
                                                                            value="No">No
                                                                        </option>
                                                                    </select>

                                                                </td>
                                                                <td>

                                                                    <input type="text"
                                                                        value="{{ old('Followup_Comment') ? old('Followup_Comment') : $preEmployment->Followup_Comment }}"
                                                                        name="Followup_Comment[]">

                                                                </td>
                                                                <td>

                                                                    <input type="date"
                                                                        value="{{ old('Followup_dueDate') ? old('Followup_dueDate') : $preEmployment->Followup_dueDate }}"
                                                                        name="Followup_dueDate[]" id="Followup_dueDate">

                                                                </td>
                                                            </tr>
                                                            <div id="predetaildiv"></div>
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <table class="table-bordered table">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Abnormality Description<span
                                                                        class="text-danger">*</span></th>
                                                                <th>Comment<span class="text-danger">*</span></th>
                                                                <th>Status<span class="text-danger">*</span></th>
                                                                <th>Follow Up Needed<span class="text-danger">*</span>
                                                                </th>
                                                                <th>Follow Up Comment<span class="text-danger">*</span>
                                                                </th>
                                                                <th>Follow Up Due Date<span class="text-danger">*</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if ($preEmployment->abnormal_finding)
                                                                @foreach ($annnexuredata as $key => $value)
                                                                    <tr>
                                                                        <td>
                                                                            <input readonly type="text"
                                                                                value="{{ $key + 1 }}"
                                                                                name="sn">
                                                                        </td>
                                                                        <td>


                                                                            <input readonly type="text"
                                                                                value="{{ $value }}">

                                                                        </td>
                                                                        <td>



                                                                            <input readonly type="text"
                                                                                value="{{ json_decode($preEmployment->abnormal_finding_Comment)[$key] ?? '' }}">

                                                                        </td>
                                                                        <td>

                                                                            <input readonly type="text"
                                                                                value="{{ json_decode($preEmployment->pre_imployement_physicalExam)[$key] ?? '' }}">

                                                                        </td>
                                                                        <td>

                                                                            <input readonly type="text"
                                                                                value="{{ json_decode($preEmployment->Followup_action)[$key] ?? '' }}">

                                                                        </td>
                                                                        <td>

                                                                            <input readonly type="text"
                                                                                value="{{ json_decode($preEmployment->Followup_Comments)[$key] ?? '' }}">

                                                                        </td>
                                                                        <td>

                                                                            <input readonly type="text"
                                                                                value="{{ json_decode($preEmployment->Followup_dueDate)[$key] ?? '' }}">

                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            <div id="predetaildiv"></div>
                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="group-input" style="overflow-x: scroll;
                                                    width: 100%;">
                                                        <label for="doc-detail">
                                                            Test Results
                                                        </label>
                                                        <table class="table-bordered table" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. No.</th>
                                                                    <th>Organ/Sys.<span id="Organ"
                                                                        class="text-danger">*</span></th>
                                                                    <th>Details/ Test/ Examination<span id="details"
                                                                            class="text-danger">*</span></th>
                                                                    <th>Standards<span id="Standards" class="text-danger">*</span>
                                                                    </th>
                                                                    <th>Observation</th>
                                                                    <th>Result</th>
                                                                    <th>Nursing Staff Comments</th>
                                                                    <th>Criteria for Disqualification</th>
                                                                    <th>Medical Officer Comments<th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if($preEmployment->organ)
                                                                @foreach($organ as $key => $temp)
                                                                <tr>
                                                                    <td><input type="text" value="{{$key+1}}" name="sn">
                                                                    </td>
                                                                    <td>
                                                                       <p>{{ $temp }}</p>
                                                                    </td>
                                                                    <td>
                                                                        @if(json_decode($preEmployment->organ)[$key])
                                                                        @if(json_decode($preEmployment->organ )[$key] == "EAR")
                                                                        <p>Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the ear
                                                                            under examination facing him. He will use the whispering voice.</p>
                                                                        @elseif(json_decode($preEmployment->organ )[$key] == "NOSE")
                                                                        <p>General examination</p>
                                                                        @else
                                                                        <p>{{ json_decode($preEmployment->detail )[$key] ?? "-" }}</p>
                                                                        @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                        @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] == "Chest")
                                                                        <p>Measurement</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                        <p>Physical examination</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                        <p>Sugar</p>
                                                                        @endif
                                                                        @endif
                                                                        @endif
                                                                        @endif
                                                                     </td>

                                                                     <td>  @if(json_decode($preEmployment->organ )[$key])
                                                                        @if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                        <p>Candidate  should  be  free  from  any  active disease   of   ear   and   should   be   able   to reproduce the whisper.</p>
                                                                        @elseif(json_decode($preEmployment->organ )[$key] == "Nose")
                                                                        <p>Should be free from active disease of nose.</p>
                                                                        @else
                                                                        @if(json_decode($preEmployment->detail )[$key] ?? "-" != "-")
                                                                        @if(json_decode($preEmployment->detail )[$key] == "Height Weight BMI")
                                                                        <p>Minimum height requirement for drivers is 162 cms.
                                                                            Age up to 35 yrs- BMI max-30 kg/m2
                                                                            Age above 35 yrs- BMI max-32 kg/m2</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] == "Chest")
                                                                        <p>Minimum    in    full    expiration    79    cm (relaxable    by    5    cm)    and    minimum expansion  5  cm.  The  range  of  expansion upto  4  cm  i.e.  deviation  of  20%  will  be acceptable.    Not    applicable    to    female candidate</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] == "Glands & others")
                                                                        <p>Thyroid    should    be    normal    with    no evidence of hypo or hyper thyroidism or Generalized enlargement of lymph glands. Scars,  if  any  of  the  previous  removal  of tubercular glands should be normal and there   must   not   have   been   any   active disease in last five years</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] == "Blood")
                                                                        <p>Within normal limits</p>
                                                                        @endif
                                                                        @endif
                                                                        @endif
                                                                        @endif</td>
                                                                     <td id="">{{ json_decode($preEmployment->observation )[$key] ?? "-" }}</td>
                                                                     <td>
                                                                        {{ json_decode($preEmployment->result)[$key] ?? "-" }}
                                                                    </td>
                                                                     <td class="nurshing_staff_comments">{{ json_decode($preEmployment->nurshing_staff_comments)[$key] ?? "-" }}</td>
                                                                     <td>@if(json_decode($preEmployment->organ )[$key] == "Ear")
                                                                        <p>Candidate who fails to hear whispering voice separately in both ears at a distance of 2 feet in a quiet room.</p>
                                                                        @endif
                                                                        @if(json_decode($preEmployment->detail )[$key] ?? "-" == "Height Weight BMI" || json_decode($preEmployment->detail )[$key] ?? "-" == "Chest" )
                                                                        <p>Medical   Authority   should   use   his   clinical discretion for  abnormal  height,  weight  & BMI for   further   clinical   evaluation   for   medical fitness. Significant  underweight/  overweight  &  height more than 200 cms needs further investigations before declaring FIT.
                                                                            BMI   above   the   maximum   limit   will   be   a disqualification</p>
                                                                        @elseif(json_decode($preEmployment->detail )[$key] ?? "-" == "Glands & others" || json_decode($preEmployment->detail )[$key] ?? "-" == "Blood" )
                                                                        <p>Any    lymphadenopathy    to    be    thoroughly investigated  to  rule  out  chronic  granulomatous disease like tuberculosis, sarcoidosis and blood dyscrasias.<br>Individuals  with  diabetes  will  be  temporarily unfit for max. 21 days if their blood sugar level is not in normal  limit. HbA1C should be at or less  than  7.0.    If  after  21  days,  it  is  still  in abnormal  range  or  HbA1C  is  above  7.0  then they will be Unfit.<br>Diabetics  with  any  target  organ  involvement
                                                                            e.g.  nephropathy,  retinopathy,  neuropathy  etc. will be declared Unfit.</p>
                                                                        @endif</td>
                                                                     <td id="grid_medical_comment">
                                                                        @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                                        <input type="text" name="grid_medical_comment[]">
                                                                        @else
                                                                        {{ json_decode($preEmployment->grid_medical_comment)[$key] ?? "-" }}
                                                                        @endif
                                                                    </td>


                                                                </tr>
                                                                @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Medical officer remarks
                                                </label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <select name="medicalOfficerRemarks" id="myfile">
                                                        <option value="0">--Select--</option>
                                                        <option
                                                            {{ $preEmployment->medicalOfficerRemarks == 'Satisfactory' ? 'selected' : '' }}
                                                            value="Satisfactory">Satisfactory</option>
                                                        <option
                                                            {{ $preEmployment->medicalOfficerRemarks == 'Unsatisfactory' ? 'selected' : '' }}
                                                            value="Unsatisfactory">Unsatisfactory</option>

                                                    </select>
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->medicalOfficerRemarks }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Follow Up Required
                                                </label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <select name="FollowUpRequired" id="myfile">
                                                        <option value="0">--Select--</option>
                                                        <option
                                                            {{ $preEmployment->FollowUpRequired == 'Yes' ? 'selected' : '' }}
                                                            value="Yes">Yes</option>
                                                        <option
                                                            {{ $preEmployment->FollowUpRequired == 'No' ? 'selected' : '' }}
                                                            value="No">No</option>

                                                    </select>
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->FollowUpRequired }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="">Follow Up Comment</label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <textarea name="MediFollowUpComment" id="myfile">{{ old('MediFollowUpComment') ? old('MediFollowUpComment') : $preEmployment->MediFollowUpComment }}</textarea>
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->MediFollowUpComment }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="">Follow Up Due Date <span class="text-danger"
                                                        id="myfile">
                                                        *</span></label>
                                                @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 3)
                                                    <input type="date" id="medical_final_comments"
                                                        name="medicalFollwoDueDate"
                                                        value="{{ old('medicalFollwoDueDate') ? old('medicalFollwoDueDate') : $preEmployment->medicalFollwoDueDate }}">
                                                @else
                                                    <p class="mb-2"> {{ $preEmployment->medicalFollwoDueDate }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Pre-emloyment Check up report
                                                </label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <input type="file"
                                                        value="{{ old('pre_imployement_checkup_report') ? old('pre_imployement_checkup_report') : $preEmployment->pre_imployement_checkup_report }}"
                                                        name="pre_imployement_checkup_report" id="myfile">
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->pre_imployement_checkup_report }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Medical Officer Comment
                                                </label>
                                                @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                                    <input type="text" id="myfile"
                                                        value="{{ old('medical_officer_comment') ? old('medical_officer_comment') : $preEmployment->medical_officer_comment }}"
                                                        name="medical_officer_comment" />
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->medical_officer_comment }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-block">
                                        @if (Helpers::checkPermission('updatePreEmploymentCheckUpEx') && $preEmployment->stage == 3)
                                            <button id="abnormallyButton" class="saveButton">Satisfactory</button>
                                        @endif
                                        <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                        <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                        <button type="button"> <a class="text-white"
                                                href="{{ url('dashboard/list') }}">
                                                Exit </a> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    @if (Helpers::checkPermission('readOHCHeadReview'))
                        <form id="oHCHeadReview" action="{{ url('pre-employment/ohcReview', $preEmployment->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="CCForm8" class="inner-block cctabcontent">
                                <div class="col-12">
                                    <label for="doc-detail" style="margin-bottom: 20px;">
                                        Candidate/Employee Information
                                        {{-- <button type="button"
                                                        name="ann" id="canDetailbtn">+</button> --}}
                                    </label>
                                    <div class="group-input"
                                        style="overflow-x: scroll;
                                                width: 100%;
                                                text-align: center;">

                                        {{-- <table class="table-bordered table" id="can-detail" style="width: 176%;">
                                            <thead style="vertical-align: middle">
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Employee Id</th>
                                                    <th>Site</th>
                                                    <th>Name</th>
                                                    <th>DOB</th>
                                                    <th>Gender</th>
                                                    <th>Dept. Name</th>
                                                    <th>Job Title</th>
                                                    <th>Candidate/Employee E Mail</th>
                                                    <th>Contact Number</th>
                                                    <th>Age</th>
                                                    <th>Civil Status</th>
                                                    <th>Reporting Manager</th>
                                                    <th>Reporting Manager E Mail</th>
                                                    <th>Purpose</th>
                                                    <th>External Medical Reports</th>
                                                    <th>Medical Officer</th>
                                                    <th>Medical Officer E Mail</th>
                                                    <th>HR Comments</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                <tr>
                                                    <td><input type="text" value="1" name="srn" disabled>
                                                    </td>
                                                    <td>
                                                        <select class="employees" name="employee_id[]" id="employee_1"
                                                            disabled>
                                                            <option value="">Select Employee</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}"
                                                                    @if ($preEmployment->canditate_id == $employee->id) selected @endif>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td id="site_1">{{ $userData->site }}</td>
                                                    <td id="name_1">{{ $userData->name }}</td>
                                                    <td id="dob_1">{{ $userData->dob }}</td>
                                                    <td id="gender_1">{{ $userData->gender }}</td>
                                                    <td id="dept_name_1">{{ $userData->department }}</td>
                                                    <td id="job_title_1">{{ $role->name }}</td>
                                                    <td id="employee_mail_1">{{ $userData->email }}</td>
                                                    <td id="contact_number_1">{{ $userData->mobile }}</td>
                                                    <td id="age_1">{{ $userData->age }}</td>
                                                    <td id="civil_status_1">{{ $userData->civil_status }}</td>
                                                    <td id="reporting_manager_1">{{ $userData->reporting_manager_name }}
                                                    </td>                                            
                                                    <td id="reporting_manager_mail_1">
                                                        {{ $userData->reporting_manager_email }}</td>
                                                    <td>
                                                        <select class="purposes" disabled id="purpose_1" name="purpose[]"
                                                            disabled>
                                                            <option value="">Select Purpose</option>
                                                            @foreach ($purposes as $purpose)
                                                                <option value="{{ $purpose }}"
                                                                    @if ($preEmployment->purpose == $purpose) selected @endif>
                                                                    {{ $purpose }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                         <!-- @if ($preEmployment->external_medical_report)
                                                         <td> @foreach ($report as $data =>$value)
                                                            <p><a
                                                                href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                        </p>
                                                        @endforeach

                                                         @endif

                                                    </td> -->

                                                    <td>
                                                                    @if ($preEmployment->external_attachment)
                                                                    @foreach (json_decode($preEmployment->external_attachment) as $data => $value)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                                        </p>
                                                                    @endforeach
                                                                    @endif
                                                                </td>
                                                        <td>
                                                            <select class="medical_officers" disabled
                                                                id="medical_officer_1" name="medical_officer[]">
                                                                <option value="">Select Medical Officer
                                                                </option>
                                                                @foreach ($medicalOfficers as $medicalOfficer)
                                                                    <option data-mail={{ $medicalOfficer->email }}
                                                                        value="{{ $medicalOfficer->id }}"
                                                                        @if ($preEmployment->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                        {{ $medicalOfficer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    <td id="medical_officer_mail_1">{{ $medicalofficeremail }}</td>
                                                    <td id="hr_comments_1">{{ $preEmployment->HR_comments }}</td>
                                                </tr>

                                                <div id="candetaildiv"></div>
                                            </tbody>
                                        </table>
                                         --}}

                                         {{-- ------------------------------ --}}

                                         <table class="table-bordered table" id="can-detail" style="width: 195%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No.</th>
                                                                <th>Employee Id</th>
                                                                <th>Site</th>
                                                                <th>Name</th>
                                                                <th>DOB</th>
                                                                <th>Gender</th>
                                                                <th>Dept. Name</th>
                                                                <th>Job Title</th>
                                                                <th>Candidate/Employee Email</th>
                                                                <th>Contact Number</th>
                                                                <th>Age</th>
                                                                <th>Civil Status</th>
                                                                <th>Reporting Manager</th>
                                                                <th>Reporting Manager Email</th>
                                                                <th>Purpose</th>
                                                                <th>External Medical Reports</th>
                                                                <th>Medical Officer</th>
                                                                <th>Medical Officer Email</th>
                                                                <th>HR Comments</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" value="1" name="srn"
                                                                        disabled>
                                                                </td>
                                                                <td>
                                                                    <select class="employees" name="employee_id[]"
                                                                        id="employee_1" disabled>
                                                                        <option value="">Select Employee</option>
                                                                        @foreach ($employees as $employee)
                                                                            <option value="{{ $employee->id }}"
                                                                                @if ($preEmployment->canditate_id == $employee->id) selected @endif>
                                                                                {{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="site_1">{{ $userData->site }}</td>
                                                                <td id="name_1">{{ $userData->name }}</td>
                                                                <td id="dob_1">{{ $userData->dob }}</td>
                                                                <td id="gender_1">{{ $userData->gender }}</td>
                                                                <td id="dept_name_1">{{ $userData->department }}</td>
                                                                <td id="job_title_1">{{ $role->name }}</td>
                                                                <td id="employee_mail_1">{{ $userData->email }}</td>
                                                                <td id="contact_number_1">{{ $userData->mobile }}</td>
                                                                <td id="age_1">{{ $userData->age }}</td>
                                                                <td id="civil_status_1">{{ $userData->civil_status }}</td>
                                                                <td id="reporting_manager_1">
                                                                    {{ $userData->reporting_manager_name }}

                                                                </td>
                                                                <td id="reporting_manager_mail_1">
                                                                    {{ $userData->reporting_manager_email }}</td>
                                                                <td>
                                                                    <select class="purposes" disabled id="purpose_1"
                                                                        name="purpose[]" disabled>
                                                                        <option value="">Select Purpose</option>
                                                                        @foreach ($purposes as $purpose)
                                                                            <option value="{{ $purpose }}"
                                                                                @if ($preEmployment->purpose == $purpose) selected @endif>
                                                                                {{ $purpose }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    @if ($preEmployment->external_attachment)
                                                                    @foreach (json_decode($preEmployment->external_attachment) as $data => $value)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $value) }}">{{ $value ?? '' }}</a>
                                                                        </p>
                                                                    @endforeach
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <select class="medical_officers" disabled
                                                                        id="medical_officer_1" name="medical_officer[]">
                                                                        <option value="">Select Medical Officer
                                                                        </option>
                                                                        @foreach ($medicalOfficers as $medicalOfficer)
                                                                            <option data-mail={{ $medicalOfficer->email }}
                                                                                value="{{ $medicalOfficer->id }}"
                                                                                @if ($preEmployment->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                                {{ $medicalOfficer->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="medical_officer_mail_1">{{ $medicalofficeremail }}
                                                                </td>
                                                                <td id="hr_comments_1">{{ $preEmployment->HR_comments }}
                                                                </td>
                                                            </tr>

                                                            <div id="candetaildiv"></div>
                                                        </tbody>
                                                    </table>
                                         {{-- ---------------------------------------- --}}
                                    </div>
                                </div>
                                <div class="inner-block-content">
                                    <div class="sub-head">
                                        Pending OHC Head Review
                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="">OHC Head Remarks</label>
                                                @if (Helpers::checkPermission('updateOHCHeadReview') && $preEmployment->stage == 4)
                                                    <select name="OHCHeadRemarks" id="">
                                                        <option value="0">--Select--</option>
                                                        <option
                                                            {{ $preEmployment->OHCHeadRemarks == 'Fit' ? 'selected' : '' }}
                                                            value="Fit">Fit</option>
                                                        <option
                                                            {{ $preEmployment->OHCHeadRemarks == 'Unfit' ? 'selected' : '' }}
                                                            value="Unfit">Unfit</option>

                                                    </select>
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->OHCHeadRemarks }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="group-input">
                                                <label for="">OHC Head Comments</label>
                                                @if (Helpers::checkPermission('updateOHCHeadReview') && $preEmployment->stage == 4)
                                                    <textarea name="OHCHeadComment" id="">{{ old('OHCHeadComment') ? old('OHCHeadComment') : $preEmployment->OHCHeadComment }}</textarea>
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->OHCHeadComment }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    @if (Helpers::checkPermission('updateOHCHeadReview') && $preEmployment->stage == 4)
                                        <button type="submit" class="saveButton">Fit for Employment</button>
                                    @endif
                                    <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                    <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                    <button type="button"> <a class="text-white" href="{{ url('dashboard/list') }}">
                                            Exit </a> </button>

                                </div>
                            </div>
                        </form>
                    @endif

                    @if (Helpers::checkPermission('readMedicalCheckUp'))
                        <form id="medicalOfficerFinalForm"
                            action="{{ url('medicalfinalComments', $preEmployment->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="CCForm11" class="inner-block cctabcontent">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="group-input">
                                            <label for="">Medical Officer Final Comment <span class="text-danger"
                                                    id="medical_final_comments_alert">
                                                    *</span></label>
                                            @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 5)
                                                <textarea id="medical_final_comments" name="medicalComment">{{ old('medicalComment') ? old('medicalComment') : $preEmployment->medicalComment }}</textarea>
                                            @else
                                                <p class="mb-2"> {{ $preEmployment->medicalComment }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="group-input">
                                            <label for="">Follow Up Due Date <span class="text-danger"
                                                    id="medical_final_comments_alert">
                                                    *</span></label>
                                            @if (Helpers::checkPermission('updateMedicalCheckUp')  && $preEmployment->stage == 5)
                                                <input type="date" id="medical_final_comments" name="medicalDate"
                                                    value="{{ old('medicalDate') ? old('medicalDate') : $preEmployment->medicalDate }}">
                                            @else
                                                <p class="mb-2"> {{ $preEmployment->medicalDate }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="group-input">
                                            <label for="">Medical Officer Remarks<span class="text-danger"
                                                    id="medical_final_comments_alert">
                                                    *</span></label>
                                            @if (Helpers::checkPermission('updateMedicalCheckUp')  && $preEmployment->stage == 5)
                                                <select name="medicalRemark" id="">
                                                    <option value="0">--Select--</option>
                                                    <option
                                                        {{ $preEmployment->medicalRemark == 'Satisfactory' ? 'selected' : '' }}
                                                        value="Satisfactory">Satisfactory</option>
                                                    <option
                                                        {{ $preEmployment->medicalRemark == 'Unsatisfactory' ? 'selected' : '' }}
                                                        value="Unsatisfactory">Unsatisfactory</option>
                                                </select>
                                            @else
                                                <p class="mb-2"> {{ $preEmployment->medicalRemark }}</p>
                                            @endif
                                        </div>
                                    </div>


                                    {{-- <div class="col-6">
                                        <div class="group-input">
                                            <label for="">Follow Up Comment</label>
                                            @if (Helpers::checkPermission('updateMedicalCheckUp')  && $preEmployment->stage == 5)
                                                <textarea name="medFollowUpComment" id="">{{ old('medFollowUpComment') ? old('medFollowUpComment') : $preEmployment->medFollowUpComment }}</textarea>
                                            @else
                                                <p class="mb-2">
                                                    {{ $preEmployment->medFollowUpComment }}</p>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-6">
                                        <div class="group-input">
                                            <label for="">Follow Up Comment<span class="text-danger"
                                                    id="medical_final_comments_alert">
                                                    *</span></label>
                                            @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 5)
                                                <textarea id="medical_final_comments" name="medicalFollowComment">{{ old('medicalFollowComment') ? old('medicalFollowComment') : $preEmployment->medicalFollowComment }}</textarea>
                                            @else
                                                <p class="mb-2"> {{ $preEmployment->medicalFollowComment }}</p>
                                            @endif
                                            <div class="button-block">
                                                @if (Helpers::checkPermission('updateMedicalCheckUp') && $preEmployment->stage == 5)
                                                    <button type="submit" id="medicalOfficerFinalButton"
                                                        class="saveButton">Send To HR/P Admin Final
                                                        Review</button>
                                                @endif
                                                <button type="button" class="backButton"
                                                    onclick="previousStep()">Back</button>
                                                <button type="button" class="nextButton"
                                                    onclick="nextStep()">Next</button>
                                                <button type="button"> <a class="text-white"
                                                        href="{{ url('dashboard/list') }}">
                                                        Exit </a> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif

                    @if (Helpers::checkPermission('readHRReview'))
                        <form id="hRReview" action="{{ url('pre-employment/hrReview', $preEmployment->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="CCForm9" class="inner-block cctabcontent">
                                <div class="inner-block-content">
                                    <div class="sub-head">
                                        Pending HR Review
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="Detection">HR Comment</label>
                                                @if (Helpers::checkPermission('updateHRReview')  && $preEmployment->stage == 6)
                                                    <input type="text"
                                                        value="{{ old('HR_Final_comments') ? old('HR_Final_comments') : $preEmployment->HR_Final_comments }}"
                                                        name="HR_Final_comments">
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->HR_Final_comments }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="Deviation Attachments">
                                                    Attachments if any

                                                </label>
                                                @if (Helpers::checkPermission('updateHRReview')  && $preEmployment->stage == 6)
                                                    <input type="file" id="myfile" name="clouser_attachment"
                                                        value="{{ old('clouser_attachment') ? old('clouser_attachment') : $preEmployment->clouser_attachment }}">
                                                @else
                                                    <p class="mb-2">
                                                        {{ $preEmployment->clouser_attachment }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="row">
                                            <div class="sub-head">
                                                Closure
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="Detection">Closure Comments</label>
                                                    @if (Helpers::checkPermission('updateHRReview'))
                                                        <input type="text" name="clouser_comment"
                                                            value="{{ old('clouser_comment') ? old('clouser_comment') : $preEmployment->clouser_comment }}">
                                                    @else
                                                        <p class="mb-2">
                                                            {{ $preEmployment->clouser_comment }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="Deviation Attachments">
                                                        Attachments if any

                                                    </label>
                                                    @if (Helpers::checkPermission('updateHRReview'))
                                                        <input type="file" id="myfile" name="clouser_attachment"
                                                            value="{{ old('clouser_attachment') ? old('clouser_attachment') : $preEmployment->clouser_attachment }}">
                                                    @else
                                                        <p class="mb-2">
                                                            {{ $preEmployment->clouser_attachment }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>  --}}
                                    <div class="button-block">
                                        @if (Helpers::checkPermission('updateHRReview')  && $preEmployment->stage == 6)
                                            <button type="submit" class="saveButton">HR Review Completed
                                            </button>
                                        @endif
                                        <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                        <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                        <button type="button"> <a class="text-white"
                                                href="{{ url('dashboard/list') }}">
                                                Exit </a> </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    @if (Helpers::checkPermission('readActivityLog'))
                        <div id="CCForm10" class="inner-block cctabcontent">
                            <div class="inner-block-content">
                                <div class="sub-head">
                                    Activity Logs
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Pre-Employment Medical
                                                Check Up Completed</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 2)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }
                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Updated By</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 3)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }
                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Satisfactory By</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 4)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }
                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Fit for Employment By</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 5)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }

                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Send for OHC Head Approval By</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 6)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }
                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">HR Review Completed By</label>
                                            @php
                                                $submit = DB::table('stage_histories')
                                                    ->where('type', 'Pre Employment Checkup')
                                                    ->where('doc_id', $preEmployment->id)
                                                    ->where('stage_id', 7)
                                                    ->get();
                                                foreach ($submit as $key => $value) {
                                                    $value->create = Carbon\Carbon::parse($value->created_at)->format('d-M-Y h:i A');
                                                }
                                            @endphp
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->user_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Performed On</label>
                                            @if ($submit)
                                                @foreach ($submit as $temp)
                                                    <div class="static">{{ $temp->create }}</div>
                                                @endforeach
                                            @else
                                                <div class="static">-</div>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="button-block">
                                    <button type="submit" value="save" name="submit"
                                        class="saveButton">Save</button>
                                    <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                    <button type="button"> <a class="text-white" href="{{ url('dashboard/list') }}">
                                            Exit </a> </button>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="signature-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">E-Signature</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-justify">
                        Please select a meaning and a outcome for this task and enter your username
                        and password for this task. You are performing an electronic signature,
                        which is legally binding equivalent of a hand written signature.
                    </div>
                    <div class="group-input">
                        <label for="username">Username</label>
                        <input type="hidden" id="filTtype" name="type" required>
                        <input type="text" id="username" name="username" required>
                        <input type="hidden" id="pre_employment_id" name="pre_employment_id"
                            value="{{ $preEmployment->id }}" required>
                    </div>
                    <div class="group-input">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="group-input">
                        <label for="comment">Comment</label>
                        <input type="comment" id="comment" name="comment">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="signatureModalButton">Submit</button>
                    <button>Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
                $('#testResult').click(function(e) {
                        function generateTableRow(serialNumber) {
                            var html =
                            '<tr>' +
                            '<td><input type="text" value="' + serialNumber + '"></td>' +
                            '<td><select class="Organ_select" name="organ[]"><option value="">Select</option><option value="General Examination">General Examination </option><option value="Ear">Ear</option><option value="Nose">Nose</option></select></td>' +
                            '<td> <select class="detail_select" name="detail[]"><option value="">Select</option></select><p class="measurment"></p><p class="text-container"></p></td>' +
                            '<td class="standurd_fill"></td>' +
                            '<td>--</td>' +
                            '<td>--</td>' +
                            '<td>--</td>' +
                            '<td></td>' +
                            '<td>-</td>' +
                            '</tr>';
                            return html;
                            }
                            var tableBody = $('#test-detail tbody');
                            var rowCount = tableBody.children('tr').length;
                            var newRow = generateTableRow(rowCount + 1);
                            tableBody.append(newRow);
                });
                $('#test-detail').on('change', '.Organ_select', function () {
                    var $city = $(this).closest('tr').find('.detail_select');
                    var $textContainer = $(this).closest('tr').find('.text-container');
                    var $measurment = $(this).closest('tr').find('.measurment');
                    var $standurd_fill = $(this).closest('tr').find('.standurd_fill');
                    var selectedCountry = $(this).val();
                    var citiesByCountry = {
                        "General Examination": ["-","Height Weight BMI", "Chest", "Glands & others","Blood"],
                        "Ear": ["Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the earunder examination facing him. He will use the whispering voice", "Vancouver", "Montreal"],
                        "Nose" :["General examination", "Vancoufgfgver", "fff"],
                    };
                    $city.empty();
                    $textContainer.text('');
                    $measurment.text('');
                    $standurd_fill.text('');

                    if (selectedCountry) {
                        var cities = citiesByCountry[selectedCountry];
                        for (var i = 0; i < cities.length; i++) {
                            $city.append("<option value='" + cities[i] + "'>" + cities[i] + "</option>");
                        }
                    }
                    if (selectedCountry === "Ear") {
                            $city.hide();
                            $textContainer.text("Hearing  standards  will  be  tested  in  a  quiet room.  Doctor  and  candidate  will  stand  at  a distance  of  20  ft.  from  each  other.  Both  the ear  will  be  examined  separately.  The  ear  not being  tested  will  be  marked  by  a  masking apparatus  or  by  rubbing  a  piece  of  paper against  pinne  by  an  attendant.  The  candidate will face at right angles the doctor with the earunder examination facing him. He will use the whispering voice.");
                            $standurd_fill.text("Candidate  should  be  free  from  any  active disease   of   ear   and   should   be   able   to reproduce the whisper.");
                        }
                        if(selectedCountry === "Nose") {
                            $city.hide();
                            $textContainer.text("General examination.");
                            $standurd_fill.text("Should be free from active disease of nose.");

                        }

                });

                $('#test-detail').on('change', '.detail_select', function () {
                    var selectedCity = $(this).val();

                        if (selectedCity === "Height Weight BMI") {
                            $(this).closest('tr').find('.measurment').text("Measurement");
                            $(this).closest('tr').find('.standurd_fill').text("Minimum height requirement for drivers is 162 cms.Age up to 35 yrs- BMI max-30 kg/m2Age above 35 yrs- BMI max-32 kg/m2");
                        }
                        if (selectedCity === "Chest") {
                            $(this).closest('tr').find('.measurment').text("Measurement");
                            $(this).closest('tr').find('.standurd_fill').text("Minimum    in    full    expiration    79    cm (relaxable    by    5    cm)    and    minimum expansion  5  cm.  The  range  of  expansion upto  4  cm  i.e.  deviation  of  20%  will  be acceptable.    Not    applicable    to    female candidate");
                        }
                        if (selectedCity === "Glands & others") {
                            $(this).closest('tr').find('.measurment').text("Physical examination");
                            $(this).closest('tr').find('.standurd_fill').text("Thyroid    should    be    normal    with    no evidence of hypo or hyper thyroidism or Generalized enlargement of lymph glands. Scars,  if  any  of  the  previous  removal  of tubercular glands should be normal and there   must   not   have   been   any   active disease in last five years");

                        }
                        if (selectedCity === "Blood") {
                            $(this).closest('tr').find('.measurment').text("Sugar");
                            $(this).closest('tr').find('.standurd_fill').text("Within normal limits");
                        }
                });

                $('#test-detail').on('change', '.result', function () {
                   var organData = $(this).closest('tr').find('#temp').text();
                   var detailData = $(this).closest('tr').find('#deta').text();

                    var selectedResult = $(this).val();
                       if(detailData === "Height Weight BMI"){
                            if (selectedResult === "Disqualified") {
                                $(this).closest('tr').find('.criteria').text("Medical   Authority   should   use   his   clinical discretion for  abnormal  height,  weight  & BMI for   further   clinical   evaluation   for   medical fitness.Significant  underweight/  overweight  &  height more than 200 cms needs further investigations before declaring FIT.BMI   above   the   maximum   limit   will   be   a disqualification.");
                            }
                            else{
                                $(this).closest('tr').find('.criteria').text("NA");
                            }
                       }
                       if(detailData === "Chest"){
                            if (selectedResult === "Disqualified") {
                                $(this).closest('tr').find('.criteria').text("Medical   Authority   should   use   his   clinical discretion for  abnormal  height,  weight  & BMI for   further   clinical   evaluation   for   medical fitness.Significant  underweight/  overweight  &  height more than 200 cms needs further investigations before declaring FIT.BMI   above   the   maximum   limit   will   be   a disqualification.");
                            }
                            else{
                                $(this).closest('tr').find('.criteria').text("NA");
                            }
                        }

                        if(detailData === "Glands & others"){
                            if (selectedResult === "Disqualified") {
                                $(this).closest('tr').find('.criteria').text("Any    lymphadenopathy    to    be    thoroughly investigated  to  rule  out  chronic  granulomatous disease like tuberculosis, sarcoidosis and blood dyscrasias.Individuals  with  diabetes  will  be  temporarily unfit for max. 21 days if their blood sugar level is not in normal  limit. HbA1C should be at or less  than  7.0.    If  after  21  days,  it  is  still  in abnormal  range  or  HbA1C  is  above  7.0  then they will be Unfit.Diabetics  with  any  target  organ  involvemente.g.  nephropathy,  retinopathy,  neuropathy  etc. will be declared Unfit.");
                            }
                            else{
                                $(this).closest('tr').find('.criteria').text("NA");
                            }
                        }
                        if(detailData === "Blood"){
                            if (selectedResult === "Disqualified") {
                                $(this).closest('tr').find('.criteria').text("Any    lymphadenopathy    to    be    thoroughly investigated  to  rule  out  chronic  granulomatous disease like tuberculosis, sarcoidosis and blood dyscrasias.Individuals  with  diabetes  will  be  temporarily unfit for max. 21 days if their blood sugar level is not in normal  limit. HbA1C should be at or less  than  7.0.    If  after  21  days,  it  is  still  in abnormal  range  or  HbA1C  is  above  7.0  then they will be Unfit.Diabetics  with  any  target  organ  involvemente.g.  nephropathy,  retinopathy,  neuropathy  etc. will be declared Unfit.");
                            }
                            else{
                                $(this).closest('tr').find('.criteria').text("NA");
                            }
                        }
                        if(organData === "Ear"){
                            if (selectedResult === "Disqualified") {
                                $(this).closest('tr').find('.criteria').text("Candidate  who  fails  to  hear  whispering  voice separately in both ears at a distance of 2 feet in a quiet room.");
                            }
                            else{
                                $(this).closest('tr').find('.criteria').text("NA");
                            }
                        }

                });

        });

    </script>

    <script>
        $(document).ready(function() {
            $(".mtab2").click(function() {
                $(".mtab2_" + "box").hide();
                $("#" + $(this).attr('id') + "Box").show();
            });
            $("#bloodPressureBox").show();
        });

        $(document).ready(function() {
            $('#heart_rate, #respiratory_rate, #temperature, #systolic2, #diastolic2').on('input', function() {
                var value = $(this).val();
                value = value.replace(/[^0-9.]/g, '');
                var decimalCount = value.split('.').length - 1;
                if (decimalCount > 1) {
                    value = value.substring(0, value.lastIndexOf('.'));
                }
                $(this).val(value);

                $("#vital_result_box").hide();
                var heartRate = $("#heart_rate").val();
                var respiratoryRate = $("#respiratory_rate").val();
                var systolicPressure = $("#systolic2").val();
                var diastolicPressure = $("#diastolic2").val();
                var temperature = $("#temperature").val();

                if (
                    heartRate === "" ||
                    respiratoryRate === "" ||
                    systolicPressure === "" ||
                    diastolicPressure === "" ||
                    temperature === ""
                ) {
                    $("#vital_result").text("Please enter all vital sign values.")
                        .addClass('text-danger')
                        .removeClass('text-success');
                    $("#vital_result_box").show();
                    $("#heart_rate_result_box").hide();
                    $("#respiratory_rate_result_box").hide();
                    $("#systolic2_result_box").hide();
                    $("#diastolic2_result_box").hide();
                    $("#temperature_result_box").hide();
                } else {
                    heartRate = parseInt(heartRate);
                    respiratoryRate = parseInt(respiratoryRate);
                    systolicPressure = parseInt(systolicPressure);
                    diastolicPressure = parseInt(diastolicPressure);
                    temperature = parseFloat(temperature);

                    if (heartRate < 60 || heartRate > 100) {
                        resultMessage = "Abnormal Heart Rate";
                        $('#heart_rate_result').text(resultMessage).addClass('text-danger').removeClass(
                            'text-success');
                        $("#heart_rate_result_box").show();
                    } else {
                        resultMessage = "Normal";
                        $('#heart_rate_result')
                            .text(resultMessage)
                            .addClass('text-success')
                            .removeClass('text-danger');
                        $("#heart_rate_result_box").show();
                    }

                    if (respiratoryRate < 12 || respiratoryRate > 18) {
                        resultMessage = "Abnormal Respiratory Rate";
                        $('#respiratory_rate_result').text(resultMessage).addClass('text-danger')
                            .removeClass('text-success');
                        $("#respiratory_rate_result_box").show();
                    } else {
                        resultMessage = "Normal";
                        $('#respiratory_rate_result')
                            .text(resultMessage)
                            .addClass('text-success')
                            .removeClass('text-danger');
                        $("#respiratory_rate_result_box").show();
                    }

                    if (systolicPressure < 96 || systolicPressure > 140) {
                        resultMessage = "Abnoral Systolic Blood Pressure";
                        $('#systolic2_result').text(resultMessage).addClass('text-danger').removeClass(
                            'text-success');
                        $("#systolic2_result_box").show();
                    } else {
                        resultMessage = "Normal";
                        $('#systolic2_result')
                            .text(resultMessage)
                            .addClass('text-success')
                            .removeClass('text-danger');
                        $("#systolic2_result_box").show();
                    }

                    if (diastolicPressure < 60 || diastolicPressure > 90) {
                        resultMessage = "Abnormal Diastlic Blood Pressure";
                        $('#diastolic2_result').text(resultMessage).addClass('text-danger').removeClass(
                            'text-success');
                        $("#diastolic2_result_box").show();
                    } else {
                        resultMessage = "Normal";
                        $('#diastolic2_result')
                            .text(resultMessage)
                            .addClass('text-success')
                            .removeClass('text-danger');
                        $("#diastolic2_result_box").show();
                    }

                    if (temperature < 97.34 || temperature > 98.96) {
                        resultMessage = "Abnormal Temperatre";
                        $('#temperature_result').text(resultMessage);
                        $('#temperature_result').addClass('text-danger').removeClass('text-success');
                        $("#temperature_result_box").show();
                    } else {
                        resultMessage = "Normal";
                        $('#temperature_result')
                            .text(resultMessage)
                            .addClass('text-success')
                            .removeClass('text-danger');
                        $("#temperature_result_box").show();
                    }



                }
            });
        });



        $(document).ready(function() {
            $('#systolic, #diastolic').on('input', function() {
                var value = $(this).val();
                value = value.replace(/[^0-9.]/g, '');
                var decimalCount = value.split('.').length - 1;
                if (decimalCount > 1) {
                    value = value.substring(0, value.lastIndexOf('.'));
                }
                $(this).val(value);

                var systolic = $("#systolic").val();
                var diastolic = $("#diastolic").val();
                $("#systolic2").val(systolic);
                $("#diastolic2").val(diastolic);

                if (systolic === "" || diastolic === "") {
                    $("#blood_pressure_result_box").hide();
                    $("#blood_pressure_result").text("Please enter both systolic and diastolic values.");
                } else {
                    systolic = parseInt(systolic);
                    diastolic = parseInt(diastolic);

                    $("#blood_pressure_result_box").show();
                    if (systolic < 90 || diastolic < 60) {
                        $("#blood_pressure_result").text("Low Blood Pressure");
                        $('#blood_pressure_result').addClass('text-danger').removeClass('text-success');
                    } else if (systolic >= 90 && systolic <= 120 && diastolic >= 60 && diastolic <= 80) {
                        $("#blood_pressure_result").text("Normal Blood Pressure");
                        $('#blood_pressure_result').addClass('text-success').removeClass('text-danger');
                    } else if (systolic > 120 || diastolic > 80) {
                        $("#blood_pressure_result").text("High Blood Pressure");
                        $('#blood_pressure_result').addClass('text-danger').removeClass('text-success');
                    }
                }
            });

            if ($("#systolic").val() < 90 || $("#diastolic").val() < 60) {
                $("#blood_pressure_result").text("Low Blood Pressure");
                $('#blood_pressure_result').addClass('text-danger').removeClass('text-success');
            } else if ($("#systolic").val() >= 90 && $("#systolic").val() <= 120 && $("#diastolic").val() >= 60 &&
                $("#diastolic").val() <= 80) {
                $("#blood_pressure_result").text("Normal Blood Pressure");
                $('#blood_pressure_result').addClass('text-success').removeClass('text-danger');
            } else if ($("#systolic").val() > 120 || diastolic > 80) {
                $("#blood_pressure_result").text("High Blood Pressure");
                $('#blood_pressure_result').addClass('text-danger').removeClass('text-success');
            }
        });

        $(document).ready(function() {
            $("#bmi_result_box").hide();
            $('#weight, #height').on('input', function() {
                var value = $(this).val();
                value = value.replace(/[^0-9.]/g, '');
                var decimalCount = value.split('.').length - 1;
                if (decimalCount > 1) {
                    value = value.substring(0, value.lastIndexOf('.'));
                }
                $(this).val(value);

                console.log($(this).val());
                var weight = parseFloat($('#weight').val());
                var height = parseFloat($('#height').val());
                console.log(weight, height);

                if (!isNaN(weight) && !isNaN(height)) {
                    var heightMeters = heightFeetToMeters(height);
                    var bmi = calculateBMI(weight, heightMeters);
                    $("#bmi_result_alert").text(displayResult(bmi));
                    $("#bmi_result_alert").text(displayResult(bmi));

                    $("#bmi_result_box").show();
                } else {
                    $('#bmi_result_alert').text('Please enter valid weight and height.');
                }
            });

            function heightFeetToMeters(feet) {
                return feet * 0.3048;
            }

            function calculateBMI(weight, height) {
                return (weight / (height * height)).toFixed(2);
            }

            function displayResult(bmi) {
                var resultText = 'Your BMI is ' + bmi + ' - ';
                if (bmi < 18.5) {
                    resultText += 'Underweight';
                    $('#bmi_result_alert').addClass('text-danger').removeClass('text-success');
                } else if (bmi >= 18.5 && bmi < 24.9) {
                    resultText += 'Normal weight';
                    $('#bmi_result_alert').addClass("text-success").removeClass('text-danger');
                } else if (bmi >= 25 && bmi < 29.9) {
                    resultText += 'Overweight';
                    $('#bmi_result_alert').addClass('text-danger').removeClass('text-success');
                } else {
                    resultText += 'Obesity';
                    $('#bmi_result_alert').addClass('text-danger').removeClass('text-success');
                }

                $('#bmi_result_alert').text(resultText);
            }

            if (!isNaN($('#weight').val()) && !isNaN($('#height').val())) {
                var heightMeters = heightFeetToMeters($('#height').val());
                var bmi = calculateBMI($('#weight').val(), heightMeters);
                $("#bmi_result_alert").text(displayResult(bmi));
                $("#bmi_result_alert").text(displayResult(bmi));
                $("#bmi_result_box").show();
            } else {
                $('#bmi_result_alert').text('Please enter valid weight and height.');
            }
        });

        function clearAlert() {
            setTimeout(function() {
                $("#blood_pressure_alert").text(" *");
                $("#height_alert").text(" *");
                $("#temperature_alert").text(" *");
                $("#pulse_alert").text(" *");
                $("#oxygen_alert").text(" *");
                $("#weight_alert").text(" *");
                $("#height_alert").text(" *");
                $("#nurshing_staff_alert").text(" *");
                $("#medical_history_alert").text(" *");
                $("#bmi_alert").text(" *");
                $("#vision_test_alert").text(" *");
                $("#blood_reports_alert").text(" *");
                $("#abnormal_finding_alert").text(" *");
                $("#abnormal_comment_alert").text(" *");
                $("#pre_imployement_physicalExam_alert").text(" *");
                $("#Followup_action_alert").text(" *");
                $("#Followup_Comment_alert").text(" *");
                $("#Followup_dueDate_alert").text(" *");
                $("#medical_final_comments_alert").text(" *");
            }, 6000);

        }

        $("#signatureModalButton").click(function(event) {
            event.preventDefault();
            console.log("signatureModalButton");

            var data = {
                username: $("#username").val(),
                password: $("#password").val(),
                pre_employment_id: $("#pre_employment_id").val(),
                comment: $("#comment").val(),
                type: $("#filTtype").val(),
            };
            fetch("{{ route('stateChangeJava') }}", {
                    method: 'POST',
                    headers: header,
                    body: JSON.stringify(data)
                })
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Network error');
                    }
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    if (!data.error) {
                        $(this).attr("disabled", false);
                        $("#signature-modal").modal("hide");
                        if (data.type == "3") {
                            $("#medicalCheckUpForm").submit();
                        } else if (data.type == "4") {
                            $("#nurshingStaff").submit();
                        } else if (data.type == "5") {
                            $("#preEmploymentCheckUpEx").submit();
                        } else if (data.type == "8") {
                            $("#oHCHeadReview").submit();
                        } else if (data.type == "9") {
                            $("#hRReview").submit();
                        } else if (data.type == "11") {
                            $("#medicalOfficerFinalForm").submit();
                        }
                    }
                    $(this).attr("disabled", false);
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        });

        $("#saveMedicalCheckUpButton").click(function() {
            if ($("#blood_pressure").val() == "") {
                $("#blood_pressure").focus();
                $("#blood_pressure_alert").text("  Please add blood pressure.");
                clearAlert();
                return false;
            }

            if ($("#height").val() == "") {
                $("#height").focus();
                $("#height_alert").text("  Please add height.");
                clearAlert();
                return false;
            }


            if ($("#temperature").val() == "") {
                $("#temperature").focus();
                $("#temperature_alert").text("  Please add temperature.");
                clearAlert();
                return false;
            }

            if ($("#pulse").val() == "") {
                $("#pulse").focus();
                $("#pulse_alert").text("  Please add pulse.");
                clearAlert();
                return false;
            }

            if ($("#oxygen").val() == "") {
                $("#oxygen").focus();
                $("#oxygen_alert").text("  Please add oxygen.");
                clearAlert();
                return false;
            }

            if ($("#weight").val() == "") {
                $("#weight").focus();
                $("#weight_alert").text("  Please add weight.");
                clearAlert();
                return false;
            }

            if ($("#nurshing_staff").val() == "0") {
                $("#nurshing_staff").focus();
                $("#nurshing_staff_alert").text("  Please add Nurshing Staff.");
                clearAlert();
                return false;
            }

            $("#signature-modal").modal("hide");
            setTimeout(function() {
                $("#signature-modal").modal("show");
            }, 500);
            return false;
        });


        $("#saveNurshingstaffButton").click(function() {
            console.log($("#medical_history").val());
            if ($("#medical_history").val() == "") {
                $("#medical_history").focus();
                $("#medical_history_alert").text("  Please add Medical History.");
                clearAlert();
                return false;
            }

            if ($("#bmi").val() == "") {
                $("#bmi").focus();
                $("#bmi_alert").text("  Please add BMI.");
                clearAlert();
                return false;
            }


            if ($("#vision_test").val() == "") {
                $("#vision_test").focus();
                $("#vision_test_alert").text("  Please add vision test.");
                clearAlert();
                return false;
            }

            if ($("#blood_reports").val() == "") {
                $("#blood_reports").focus();
                $("#blood_reports_alert").text("  Please add blood reports.");
                clearAlert();
                return false;
            }


            $("#signature-modal").modal("show");
            return false;
        });


        $("#abnormallyButton").click(function() {
            console.log($("#abnormal_finding").val());
            if ($("#abnormal_finding").val() == "") {
                $("#abnormal_finding").focus();
                $("#abnormal_finding_alert").text("  Please add Abnormal info.");
                clearAlert();
                return false;
            }

            if ($("#abnormal_comment").val() == "") {
                $("#abnormal_comment").focus();
                $("#abnormal_comment_alert").text("  Please add Comment.");
                clearAlert();
                return false;
            }


            if ($("#pre_imployement_physicalExam").val() == "") {
                $("#pre_imployement_physicalExam").focus();
                $("#pre_imployement_physicalExam_alert").text("  Please add Satisfactory.");
                clearAlert();
                return false;
            }

            if ($("#Followup_Comments").val() == "") {
                $("#Followup_Comments").focus();
                $("#Followup_Comments_alert").text("  Please add Follow Up Comments.");
                clearAlert();
                return false;
            }
            if ($("#Followup_action").val() == "") {
                $("#Followup_action").focus();
                $("#Followup_action_alert").text("  Please add Follow Up Action.");
                clearAlert();
                return false;
            }

            if ($("#Followup_dueDate").val() == "") {
                $("#Followup_dueDate").focus();
                $("#Followup_dueDate_alert").text("  Please add Follow Up Due Date.");
                clearAlert();
                return false;
            }


            $("#signature-modal").modal("show");
            return false;
        });

        $("#medicalOfficerFinalButton").click(function() {
            console.log($("#medical_final_comments").val());
            if ($("#medical_final_comments").val() == "") {
                $("#medical_final_comments").focus();
                $("#medical_final_comments_alert").text("  Please add Medical Officer Final Comments");
                clearAlert();
                return false;
            }

            $("#signature-modal").modal("show");
            return false;
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (Helpers::checkPermission('readActivityLog'))
                $("#CCForm10B").click();
            @endif
            @if (Helpers::checkPermission('readHRReview'))
                $("#CCForm9B").click();
            @endif
            @if (Helpers::checkPermission('readPreEmploymentCheckUpEx'))
                $("#CCForm5B").click();
            @endif
            @if (Helpers::checkPermission('readNurshingStaffUpdate'))
                $("#CCForm4B").click();
            @endif
            @if (Helpers::checkPermission('readOHCHeadReview'))
                $("#CCForm8B").click();
            @endif
            @if (Helpers::checkPermission('readMedicalCheckUp'))
                $("#CCForm3B").click();
            @else
                $("#CCForm3C").click();
            @endif
            @if (Helpers::checkPermission('readGeneralInformation'))
                $("#CCForm1B").click();
            @endif
            @if (Helpers::checkPermission('readMedicalCheckUp'))
                $("#CCForm11B").click();
            @endif



            $('#canDetailbtn').click(function(e) {
                function generateTableRow(serialNumber) {
                    var employees = @json($employees);
                    var html = $('<tr>').append(
                        $('<td>').append(
                            $('<input>').attr('type', 'text').val(serialNumber).attr("name",
                                serialNumber)
                        ),
                        $('<td>').append(
                            $('<select>').append(
                                $('<option>').attr('value', '0').text('Select Employee'),
                                $.map(employees, function(employee) {
                                    return $('<option>').text(employee.name).attr('value', employee
                                        .id);
                                })
                            ).attr("id", "employee_" + serialNumber)
                            .attr("name", "employee_id[]")
                            .addClass("employees")
                        ),
                        $('<td>').append().attr("id", "site_" + serialNumber),
                        $('<td>').append().attr("id", "name_" + serialNumber),
                        $('<td>').append().attr("id", "dob_" + serialNumber),
                        $('<td>').append().attr("id", "gender_" + serialNumber),
                        $('<td>').append().attr("id", "dept_name_" + serialNumber),
                        $('<td>').append().attr("id", "job_title_" + serialNumber),
                        $('<td>').append().attr("id", "employee_mail_" + serialNumber),
                        $('<td>').append().attr("id", "contact_number_" + serialNumber),
                        $('<td>').append().attr("id", "age_" + serialNumber),
                        $('<td>').append().attr("id", "civil_status_" + serialNumber),
                        $('<td>').append().attr("id", "reporting_manager_" + serialNumber),
                        $('<td>').append().attr("id", "reporting_manager_mail_" + serialNumber),
                        $('<td>').append().attr("id", "purpose_" + serialNumber),
                        $('<td>').append().attr("id", "external_medical_reports_" + serialNumber),
                        $('<td>').append().attr("id", "medical_officer_" + serialNumber),
                        $('<td>').append().attr("id", "medical_officer_mail_" + serialNumber),
                        $('<td>').append().attr("id", "hr_comments_" + serialNumber).text(),
                    );

                    return html;
                }
                var tableBody = $('#can-detail tbody');
                var rowCount = tableBody.children('tr').length;
                var newRow = generateTableRow(rowCount + 1);
                tableBody.append(newRow);
            });

            $(document).on('click', '.employees', function() {
                var id = $(this).attr('id');
                id = id.replace("employee_", "")
                var employee_id = $("#employee_" + id).val();
                if (employee_id != 0) {
                    fetch("{{ route('employeeData') }}", {
                            method: 'POST',
                            headers: header,
                            body: JSON.stringify({
                                employee_id: employee_id
                            })
                        })
                        .then(function(response) {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(function(data) {
                            console.log('API response: ' + id, data.data.site);
                            $("#site_" + id).text(data.data.site);
                            $("#name_" + id).text(data.data.name);
                            $("#dob_" + id).text(data.data.dob);
                            $("#gender_" + id).text(data.data.gender);
                            $("#dept_name_" + id).text(data.data.department);
                            $("#job_title_" + id).text();
                            $("#employee_mail_" + id).text(data.data.email);
                            $("#contact_number_" + id).text(data.data.mobile);
                            $("#age_" + id).text(data.data.age);
                            $("#civil_status_" + id).text(data.data.civil_status);
                            $("#reporting_manager_" + id).text();
                            $("#reporting_manager_mail_" + id).text();
                            $("#purpose_" + id).text();
                            $("#external_medical_reports_" + id).text();
                            $("#medical_officer_" + id).text();
                            $("#medical_officer_mail_" + id).text();
                            $("#hr_comments_" + id).text();
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                } else {
                    clear(id);
                }
            });

            function clear(id) {
                $("#site_" + id).text("");
                $("#name_" + id).text("");
                $("#dob_" + id).text("");
                $("#gender_" + id).text("");
                $("#dept_name_" + id).text("");
                $("#job_title_" + id).text("");
                $("#employee_mail_" + id).text("");
                $("#contact_number_" + id).text("");
                $("#age_" + id).text("");
                $("#civil_status_" + id).text("");
                $("#reporting_manager_" + id).text("");
                $("#reporting_manager_mail_" + id).text("");
                $("#purpose_" + id).text("");
                $("#external_medical_reports_" + id).text("");
                $("#medical_officer_" + id).text("");
                $("#medical_officer_mail_" + id).text("");
                $("#hr_comments_" + id).text("");
            }
        });
    </script>

    <script>
        function openCity(evt, name) {
            var cctabcontent = $(".cctabcontent");
            var cctablinks = $(".cctablinks");

            cctabcontent.hide();
            cctablinks.removeClass("active");

            $("#" + name).show();
            $(evt.currentTarget).addClass("active");
            var index = $(cctablinks).index(evt.currentTarget);
            console.log(name);
            if (name == "CCForm1") {
                $("#filTtype").val("1")
            }
            if (name == "CCForm3") {
                $("#filTtype").val("3")
            }
            if (name == "CCForm4") {
                $("#filTtype").val("4")
            }
            if (name == "CCForm5") {
                $("#filTtype").val("5")
            }
            if (name == "CCForm8") {
                $("#filTtype").val("8")
            }
            if (name == "CCForm9") {
                $("#filTtype").val("9")
            }
            if (name == "CCForm10") {
                $("#filTtype").val("10")
            }
            if (name == "CCForm11") {
                $("#filTtype").val("11")
            }
            currentStep = index;
        }

        const saveButtons = document.querySelectorAll(".saveButton");
        const nextButtons = document.querySelectorAll(".nextButton");
        const form = document.getElementById("step-form");
        const stepButtons = document.querySelectorAll(".cctablinks");
        const steps = document.querySelectorAll(".cctabcontent");
        let currentStep = 0;

        function nextStep() {
            // Check if there is a next step
            if (currentStep < steps.length - 1) {
                // Hide current step
                steps[currentStep].style.display = "none";

                // Show next step
                steps[currentStep + 1].style.display = "block";

                // Add active class to next button
                stepButtons[currentStep + 1].classList.add("active");

                // Remove active class from current button
                stepButtons[currentStep].classList.remove("active");

                // Update current step
                currentStep++;
            }
        }

        function previousStep() {
            // Check if there is a previous step
            if (currentStep > 0) {
                // Hide current step
                steps[currentStep].style.display = "none";

                // Show previous step
                steps[currentStep - 1].style.display = "block";

                // Add active class to previous button
                stepButtons[currentStep - 1].classList.add("active");

                // Remove active class from current button
                stepButtons[currentStep].classList.remove("active");

                // Update current step
                currentStep--;
            }
        }
    </script>

    <!-- Example Blade View -->
    @if ($errors->any())
        <script>
            var errorMessages = [];
            @foreach ($errors->all() as $error)
                errorMessages.push("{{ $error }}");
            @endforeach


            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: errorMessages.join('<br>'),
                showCloseButton: true,
                customClass: {
                    title: 'my-title-class',
                    htmlContainer: 'my-html-class text-danger',
                },
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

@endpush
