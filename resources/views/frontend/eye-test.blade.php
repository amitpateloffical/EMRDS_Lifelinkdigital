@extends('components.main')
@section('container')
    <style>
        header .header_rcms_bottom {
            display: none;
        }
    </style>
    <div id="rcms_form-head">
        <div class="container-fluid">
            <div class="inner-block">
                <div class="head"></div>
                <div class="slogan">
                    <strong>Division: Pune, Maharashtra / Project: Eye test of employees</strong>

                </div>
            </div>
        </div>
    </div>
    {{-- ======================================
                    DATA FIELDS
    ======================================= --}}
    @php
        $users = DB::table('admins')->where('id', '!=', 1)->get();
    @endphp
    <div id="change-control-fields">
        <div class="container-fluid">

            <!-- Tab links -->
            <div class="cctab">
                <button class="cctablinks active" onclick="openCity(event, 'CCForm1')">General Information</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm2')">Employee Information</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Assignment of Employee</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Attendance & Eye Test</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm5')">Result Entry</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm6')">Screening of Reports</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm7')">Asses Fit/Unfit</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm8')">Activity Logs</button>
            </div>
            <form action="{{ route('EyeTest.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <!-- Tab content -->
                <div id="step-form">

                    <div id="CCForm1" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Initiator">Initiator</label>
                                        <div class="static">{{ Auth::guard('admin')->name }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="date_initiation">Date of Initiation</label>
                                        <div class="static">{{ date('d-M-Y') }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="initiator-group">Short Description <span
                                                class="text-danger" >*</span></label>
                                        <input type="text" name="short_description">
                                        @error('initiatorGroup')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="initiator-code">Due Date</label>
                                        <input type="date" id="txtDate" name="due_date">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="short-desc">Assignee<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">Select Person</option>
                                            @foreach($users as $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach

                                        </select>
                                        @error('assign_to')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="support-doc">Comments</label>
                                        <textarea name="comments" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Cuurent Eye Test Status</label>
                                        <select id="select-state" placeholder="Select..." name="cuurent_eye_test_status">
                                            <option value="0">Select</option>
                                            <option value="1">Scheduled </option>
                                            <option value="2">In Progress</option>
                                            <option value="3">Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Last Eye Test Date</label>
                                        <input type="date" id="txtDate" name="last_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Fit Status</label>
                                        <select id="select-state" placeholder="Select..." name="fit_status">
                                            <option value="0">Select </option>
                                            <option value="1">Fit </option>
                                            <option value="2">Fit with Spectacles</option>
                                            <option value="3">Unfit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Actions</label>
                                        <input type="text" name="actions">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Login Credentials</label>
                                        <input type="text" name="login_credentials">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="short-desc">Responsible Person<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="responsible_person">
                                            <option value="0">Select Person</option>
                                            @foreach($users as $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('responsible_person')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="support-doc">Reason for Not Attending Exit Medical</label>
                                        <textarea name="attending_exit_medical" id="short_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>

                            </div>
                        </div>
                    </div>

                    <div id="CCForm2" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Employee Name
                                        </label>
                                        <input type="text" name="employee_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Employee Contact Number
                                        </label>
                                        <input type="text" name="employee_contact_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Employee ID
                                        </label>
                                        <input type="text" name="employee_id">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Department
                                        </label>
                                        <input type="text" name="department">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            E-Mail Address
                                        </label>
                                        <input type="text" name="email_address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Job Title
                                        </label>
                                        <input type="text" name="job_title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Date of Birth
                                        </label>
                                        <input type="date" id="txtDate" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Address
                                        </label>
                                        <textarea name="address" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Attachment
                                        </label>
                                        <input type="file" name="attachement" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>

                            </div>
                        </div>
                    </div>

                    <div id="CCForm3" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Assignment of Employee
                                        </label>
                                        <input type="date" id="txtDate" name="assignment_of_employee">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Assignment Details
                                        </label>
                                        <input type="text" name="assignment_details">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Assignment Comments
                                        </label>
                                        <textarea name="assignment_comment" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Assignment Attachments
                                        </label>
                                        <input type="file" name="assignment_attachments" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm4" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Eye Test Schedule
                                        </label>
                                        <input type="date" id="txtDate" name="eye_test_schedule">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Eye Test Report
                                        </label>
                                        <input type="text" name="eye_test_report">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Eye Test Comments
                                        </label>
                                        <textarea name="eye_test_comments" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Eye Test Attachments
                                        </label>
                                        <input type="file" name="eye_test_attachments" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm5" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Completing Eye Test Date
                                        </label>
                                        <input type="datetime" name="completing_eye_test">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Department
                                        </label>
                                        <input type="text" name="dept">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Pending Task Closur/Completion Comment
                                        </label>
                                        <textarea name="pending_task" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Result Attachments
                                        </label>
                                        <input type="file" name="result_attachments" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm6" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Results Screening
                                        </label>
                                        <input type="text" name="results_screening">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Screen Reports
                                        </label>
                                        <input type="text" name="screen_reports">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Report Comment
                                        </label>
                                        <textarea name="report_comment" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Report Attachments
                                        </label>
                                        <input type="file" name="report_attachments" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm7" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Certification
                                        </label>
                                        <input type="text" name="certification">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Fitness Status</label>
                                        <select id="select-state" placeholder="Select..." name="fitness_status">
                                            <option value="0">Select </option>
                                            <option value="1">Fit </option>
                                            <option value="2">Fit with Spectacles</option>
                                            <option value="3">Unfit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="short-desc">Approved By<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="approved_by">
                                            <option value="0">Select </option>
                                            @foreach($users as $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('approved_by')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Task Closur/Completion Comment
                                        </label>
                                        <textarea name="task_closur" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Fitness Attachments
                                        </label>
                                        <input type="file" name="fitness_attchments" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm8" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="sub-head">
                                Activity Logs
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Propose Eye test Schedule By</label>
                                         <div class="static">Amit Patel</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Propose Eye test Schedule On</label>
                                         <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Include employee By</label>
                                         <div class="static">Amit Patel</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Include employee On</label>
                                         <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Assign employee By</label>
                                         <div class="static">Amit Patel</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Assign employee On</label>
                                         <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Record Attendance & Eye Test By</label>
                                         <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Record Attendance & Eye Test 0n</label>
                                         <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Enter Results By</label>
                                         <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Enter Results On</label>
                                         <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">it / Unfit Assessmen By</label>
                                         <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">it / Unfit Assessmen On</label>
                                         <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" value="save" name="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button"> <a class="text-white" href="{{ url('rcms/qms-dashboard') }}">
                                        Exit </a> </button>
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
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
                </style>

                <script>
                    const productSelect = document.getElementById('productSelect');
                    const productTable = document.getElementById('productTable');
                    const materialSelect = document.getElementById('materialSelect');
                    const materialTable = document.getElementById('materialTable');

                    materialSelect.addEventListener('change', function() {
                        if (materialSelect.value === 'yes') {
                            materialTable.style.display = 'block';
                        } else {
                            materialTable.style.display = 'none';
                        }
                    });

                    productSelect.addEventListener('change', function() {
                        if (productSelect.value === 'yes') {
                            productTable.style.display = 'block';
                        } else {
                            productTable.style.display = 'none';
                        }
                    });
                </script>

                <script>
                    VirtualSelect.init({
                        ele: '#related_records, #cft_reviewer'
                    });

                    function openCity(evt, cityName) {
                        var i, cctabcontent, cctablinks;
                        cctabcontent = document.getElementsByClassName("cctabcontent");
                        for (i = 0; i < cctabcontent.length; i++) {
                            cctabcontent[i].style.display = "none";
                        }
                        cctablinks = document.getElementsByClassName("cctablinks");
                        for (i = 0; i < cctablinks.length; i++) {
                            cctablinks[i].className = cctablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";

                        // Find the index of the clicked tab button
                        const index = Array.from(cctablinks).findIndex(button => button === evt.currentTarget);

                        // Update the currentStep to the index of the clicked tab
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
                <!-- Add this in your HTML layout or view -->
                <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

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



                <script>
                    $(document).ready(function() {
                        var aiText = $('.ai_text');


                        $('#short_description').on('input', function() {
                            var description = $(this).val().toLowerCase();
                            var riskLevelSelectize = $('#risk_level')[0].selectize;
                            // var aiText = $('#ai_text');

                            var foundRiskLevel = false;
                            for (var i = 0; i < riskData.length; i++) {
                                if (description.includes(riskData[i].keyword.toLowerCase())) {
                                    riskLevelSelectize.setValue(riskData[i].risk_level, true);
                                    aiText.show();
                                    foundRiskLevel = true;
                                    console.log(riskData[i].keyword);
                                    break;
                                }
                            }
                            if (!foundRiskLevel) {
                                riskLevelSelectize.setValue('0', true);
                                aiText.hide();
                            }
                        });

                        $('#risk_level').on('change', function() {
                            if ($(this).val() !== '0') {
                                aiText.hide();
                            }
                        });
                    });
                </script>

                <style>
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

        </div>
    </div>
@endsection
