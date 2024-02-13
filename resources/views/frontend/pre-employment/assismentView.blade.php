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
                        <button class="button_theme1" class="new-doc-btn"> <a class="text-white" target="__blank"
                                href="{{ url('assisment-pdf', $preEmployment[0]->parent) }}"> Print
                            </a></button>
                        {{--  <button class="button_theme1"> <a class="text-white" href="{{ url('send-notification', $preEmployment[0]->parent) }}"> Send Notification </a> </button>  --}}

                        <button class="button_theme1"> <a class="text-white"
                                href="{{ url('assisment-trial', $preEmployment[0]->parent) }}"> Audit Trail
                            </a> </button>

                            @php
                            $submit = DB::table('stage_histories')->where('doc_id',$preEmployment[0]->parent)->get();
                           @endphp
                           @if(count($submit)==0)
                            <button class="button_theme1" data-bs-toggle="modal" data-bs-target="#signature-modal">
                                Assignment Completed
                            </button>
                           @endif

                        <button class="button_theme1"> <a class="text-white" href="{{ url('dashboard/list') }}"> Exit
                            </a> </button>
                    </div>
                </div>


                <div class="status">
                    <div class="head">Current Status</div>



                        <div class="progress-bars">
                                <div class="active">Initiation</div>

                                @if(count($submit)>0)
                                <div class="active">Assigned</div>
                                @else
                                 <div class="active">Assigned</div>
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
                            <button class="cctablinks active" onclick="openCity(event, 'CCForm1')">General
                                Information</button>

                            {{-- <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Pending Medical Check Up
                            </button>
                            <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Pending Nurshing Staff Update
                            </button>
                            <button class="cctablinks" onclick="openCity(event, 'CCForm5')">Pending Pre-Employment Check Up
                                Ex.</button>

                            <button class="cctablinks" onclick="openCity(event, 'CCForm8')"> OHC Head Review</button>
                            <button class="cctablinks" onclick="openCity(event, 'CCForm9')"> HR Review</button> --}}
                            <button class="cctablinks" onclick="openCity(event, 'CCForm10')">Activity Log</button>
                        </div>

                        <div id="step-form">
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
                                                    <div class="static">{{ $preEmployment[0]->initiation_date }}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="group-input">
                                                    <label for="due-date">Due Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" id="txtDate" required name="due_date" value="{{$preEmployment[0]->due_date}}">
                                                    @error('due_date')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-input">
                                                    <label for="risk_level">Short Description <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" required name="short_description" value="{{$preEmployment[0]->short_description}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="group-input">
                                                    <label for="doc-detail">
                                                        Candidate/Employee Information<button type="button"
                                                            name="ann" id="canDetailbtn">+</button>
                                                    </label>
                                                    <table class="table-bordered table" id="can-detail">
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
                                                            @foreach($preEmployment as $key => $value)
                                                            @php
                                                            $emp = DB::table('admins')->where('id',$value->canditate_id)->first();
                                                            $role= DB::table('roles')->where('id',$emp->role_id)->first();
                                                            $medical= DB::table('admins')->where('id',$value->medical_officer_name)->first();
                                                            @endphp
                                                            <tr>
                                                                <td><input type="text" value="{{$key+1}}" name="srn">
                                                                </td>
                                                                <td>
                                                                    <select class="employees" name="employee_id[]"
                                                                        id="employee_1">
                                                                        <option value="">Select Employee</option>
                                                                        @foreach ($employees as $employee)
                                                                            <option value="{{ $employee->id }}" @if($value->canditate_id == $employee->id) selected @endif>
                                                                                {{ $employee->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="site_1">{{$emp->site}}</td>
                                                                <td id="name_1">{{$emp->name}}</td>
                                                                <td id="dob_1">{{$emp->dob}}</td>
                                                                <td id="gender_1">{{$emp->gender}}</td>
                                                                <td id="dept_name_1">{{$emp->department}}</td>
                                                                <td id="job_title_1">{{$role->name}}</td>
                                                                <td id="employee_mail_1">{{$emp->email}}</td>
                                                                <td id="contact_number_1">{{$emp->mobile}}</td>
                                                                <td id="age_1">{{$emp->age}}</td>
                                                                <td id="civil_status_1">{{$emp->civil_status}}</td>
                                                                <td id="reporting_manager_1">{{Helpers::adminName($emp->reporting_manager)}}</td>
                                                                <td id="reporting_manager_mail_1">{{Helpers::adminEmail($emp->reporting_manager)}}</td>
                                                                <td>
                                                                    <select class="purposes" disabled id="purpose_1"
                                                                        name="purpose[]">
                                                                        <option value="">Select Purpose</option>
                                                                        @foreach ($purposes as $purpose)
                                                                            <option value="{{ $purpose }}"  @if($value->purpose == $purpose) selected @endif>
                                                                                {{ $purpose }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    @if ($value->external_attachment)
                                                                    @foreach (json_decode($value->external_attachment) as $data => $img)
                                                                       <p>
                                                                        <a target="_blank" href="{{ asset('images/external_medical_report/' . $img) }}">{{ $img ?? '' }}</a>
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
                                                                                value="{{ $medicalOfficer->id }}" @if($value->medical_officer_name == $medicalOfficer->id) selected @endif>
                                                                                {{ $medicalOfficer->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td id="medical_officer_mail_1" >{{$medical->email}}</td>
                                                                <td id="hr_comments_1">{{$value->HR_comments}}</td>
                                                            </tr>
                                                            @endforeach
                                                            <div id="candetaildiv"></div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-block">
                                            <button type="submit" class="saveButton">Save</button>
                                            <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                            <button type="button"> <a class="text-white"
                                                    href="{{ url('dashboard/list') }}">
                                                    Exit </a> </button>

                                        </div>
                                    </div>
                                </div>
                            </form>


                        <div id="CCForm10" class="inner-block cctabcontent">
                            <div class="inner-block-content">
                                <div class="sub-head">
                                    Activity Logs
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Initiate By</label>
                                            <div class="static">Amit Guru</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Initiate On</label>
                                            <div class="static">{{date('d-M-Y')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Assigned By</label>
                                            <div class="static">Amit Guru</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="submitted">Assigned On</label>
                                            <div class="static">{{date('d-M-Y')}}</div>
                                        </div>
                                    </div>



                                </div>
                                <div class="button-block">
                                    {{-- <button type="submit" value="save" name="submit"
                                        class="saveButton">Save</button> --}}
                                    <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                    <button type="button"> <a class="text-white"
                                            href="{{ url('dashboard/list') }}">
                                            Exit </a> </button>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
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
                <form action="{{ url('pre-employment/asign', $preEmployment[0]->parent) }}" method="POST">
                    @csrf

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 text-justify">
                            Please select a meaning and a outcome for this task and enter your username
                            and password for this task. You are performing an electronic signature,
                            which is legally binding equivalent of a hand written signature.
                        </div>
                        <div class="group-input">
                            <label for="username">Username</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="group-input">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="group-input">
                            <label for="comment">Comment</label>
                            <input type="comment" name="comment">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" data-bs-dismiss="modal">Submit</button>
                        <button>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
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
            }, 6000);

        }
        $("#saveMedicalCheckUpButton").click(function() {
            console.log($("#blood_pressure").val());
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

            $("#signature-modal").modal("show");
            return false;
        });


        //----------------NurshingForm--------------
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


        //-------------Abnormal data Form-----------

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

    </script>
    <script>
        $(document).ready(function() {
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
