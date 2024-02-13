@extends('components.main')
@section('container')
    <style>
        header .header_rcms_bottom {
            display: none;
        }
    </style>
    <div id="change-control-view">
        <div class="inner-block state-block">
            <div class="d-flex justify-content-between align-items-center">
                <div class="main-head">Record Workflow </div>
                <div class="d-flex" style="gap:20px;">
                </div>
            </div>


            <div class="status">
                <div class="progress-bars">
                    <div class="active">Initiation</div>
                    <div class="">Assigned</div>
                </div>
            </div>
        </div>


        {{-- ======================================
                    DATA FIELDS
    ======================================= --}}
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
                <!-- Tab links -->
                <div class="cctab">
                    @if (Helpers::checkPermission('createGeneralInformation'))
                        <button class="cctablinks active" onclick="openCity(event, 'CCForm1')">General Information</button>
                    @endif
                    @if (Helpers::checkPermission('createMedicalCheckUp'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Pending Medical Check Up </button>
                    @endif
                    @if (Helpers::checkPermission('createNurshingStaffUpdate'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Pending Nurshing Staff Update
                        </button>
                    @endif
                    @if (Helpers::checkPermission('createPreEmploymentCheckUpEx'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm5')">Pending Pre-Employment Check Up
                            Ex.</button>
                    @endif
                    {{-- @if (Helpers::checkPermission('createOHCHeadReview'))
                    <button class="cctablinks" onclick="openCity(event, 'CCForm6')">OHC Head Review</button>
                @endif --}}
                    @if (Helpers::checkPermission('createFollowUpByMedicalOfficer'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm7')">Pending Follow Up By Medical
                            Officer</button>
                    @endif
                    {{-- @if (Helpers::checkPermission('createOHCHeadReview'))
                    <button class="cctablinks" onclick="openCity(event, 'CCForm8')">Pending OHC Head Review</button>
                @endif --}}
                    @if (Helpers::checkPermission('createHRReview'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm9')">Pending HR Review</button>
                    @endif
                    @if (Helpers::checkPermission('createActivityLog'))
                        <button class="cctablinks" onclick="openCity(event, 'CCForm10')">Activity Log</button>
                    @endif
                </div>
                <form action="{{ route('preEmployeeAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="step-form">
                        @if (Helpers::checkPermission('createGeneralInformation'))
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
                                                <input name="initiation_date" style="border: none; padding: 0; margin: 0;" readonly class="static" id="current-time"></input>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="group-input">
                                                <label for="due-date">Due Date <span class="text-danger">*</span></label>
                                                <input type="date" id="txtDate" required name="due_date">
                                                <input type="hidden" id="parent" required name="parent"
                                                    value="{{ $generateparentId }}">
                                                @error('due_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="risk_level">Short Description <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required name="short_description">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="doc-detail" style="margin-bottom: 20px;">
                                                Candidate/Employee Information<button type="button" name="ann"
                                                    id="canDetailbtn">+</button>
                                            </label>
                                            <div class="group-input"
                                                style="    overflow-x: scroll;
                                        width: 100%;
                                        text-align: center;">
                                                
                                                <table class="table-bordered table" id="can-detail" style="width: 195%">
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
                                                            <td class="text-center"><input type="text" value="1"
                                                                    name="srn"></td>
                                                            <td>
                                                                <select class="employees" name="employee_id[]"
                                                                    id="employee_1">
                                                                    <option value="0">Select Employee</option>
                                                                    @foreach ($employees as $employee)
                                                                        <option value="{{ $employee->id }}">
                                                                            {{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td id="site_1"></td>
                                                            <td id="name_1"></td>
                                                            <td id="dob_1"></td>
                                                            <td id="gender_1"></td>
                                                            <td id="dept_name_1"></td>
                                                            <td id="job_title_1"></td>
                                                            <td id="employee_mail_1"></td>
                                                            <td id="contact_number_1"></td>
                                                            <td id="age_1"></td>
                                                            <td id="civil_status_1"></td>
                                                            <td id="reporting_manager_1"></td>
                                                            <td id="reporting_manager_mail_1"></td>
                                                            <td>
                                                                <select class="purposes" disabled id="purpose_1"
                                                                    name="purpose[]">
                                                                    <option value="">Select Purpose</option>
                                                                    @foreach ($purposes as $purpose)
                                                                        <option value="{{ $purpose }}"
                                                                            title="{{ $purpose }}">{{ $purpose }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <style>
                                                                .external_medical {
                                                                    background-color: gray;
                                                                    color: white;
                                                                    transition: 1s;
                                                                    margin: 0;
                                                                    width: 100%;
                                                                }

                                                                .external_medical.disabled {
                                                                    background-color: gray;
                                                                    color: white;
                                                                    pointer-events: none;
                                                                    cursor: not-allowed;
                                                                }

                                                                .external_medical:hover {
                                                                    background-color: rgb(78, 78, 78);
                                                                    color: white;
                                                                    transition: 1s;
                                                                }

                                                                .external_medical_list {
                                                                    list-style: none;
                                                                }

                                                                .external_medical_list {
                                                                    list-style-type: none;
                                                                    padding: 0;
                                                                }

                                                                .external_medical_list li {
                                                                    margin: 3px 0;
                                                                    padding: 5px;
                                                                    cursor: pointer;
                                                                    background-color: #f0f0f0;
                                                                    display: flex;
                                                                    justify-content: space-between;
                                                                    align-items: center;
                                                                    white-space: nowrap;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;
                                                                }

                                                                .remove-icon {
                                                                    color: red;
                                                                    cursor: pointer;
                                                                    margin-left: 10px;
                                                                }

                                                                .remove-icon:hover {
                                                                    color: darkred;
                                                                }
                                                            </style>
                                                            <td class="external_medical_box">
                                                                <input hidden type="file" multiple
                                                                    id="external_medical_reports_1" accept=".pdf, image/*"
                                                                    name="external_medical_report[]">
                                                                <ul class="external_medical_list"
                                                                    id="external_medical_list_1"></ul>
                                                                <div class="btn btn-sm external_medical disabled"
                                                                    id="external_medical_1">ChooseFile</div>
                                                            </td>
                                                            <td>
                                                                <select class="medical_officers" disabled
                                                                    id="medical_officer_1" name="medical_officers[]">
                                                                    <option value="">Select Medical Officer</option>
                                                                    @foreach ($medicalOfficers as $medicalOfficer)
                                                                        <option data-mail={{ $medicalOfficer->email }}
                                                                            value="{{ $medicalOfficer->id }}">
                                                                            {{ $medicalOfficer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td id="medical_officer_mail_1"></td>
                                                            <td>
                                                                <textarea id="hr_comments_1" name="hr_comments[]" disabled rows="3"></textarea>
                                                            </td>
                                                        </tr>
                                                        <div id="candetaildiv"></div>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-block">
                                        <button type="submit" class="saveButton">Assignment Completed</button>
                                        <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                        <button type="button"> <a class="text-white"
                                                href="{{ url('rcms/qms-dashboard') }}">
                                                Exit </a> </button>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
            </div>
            </form>
        </div>

        <div class="modal fade" id="fileModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="file_name"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <style>
                        .image-body {
                            text-align: center;
                            /* Center the image horizontally */
                        }

                        .image-body img {
                            width: 100%;
                            height: auto;
                            max-height: 80vh;
                            display: none;
                            margin: 0 auto;
                        }

                        .image-body iframe {
                            width: 100%;
                            height: 600px;
                            max-height: 80vh;
                            display: none;
                            margin: 0 auto;
                        }
                    </style>
                    <div class="modal-body image-body">
                        <div class="file-viewer">
                            <img src="" id="image" alt="" style="display: none;">
                            <iframe src="" id="pdfViewer" frameborder="0" style="display: none;"></iframe>
                        </div>
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
    @endsection

    @push('scripts')
    <script>
        $(document).ready(function() {
          function updateIndianTime() {
            const now = new Date();
            now.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' });

            const options = {
              year: 'numeric',
              month: 'short',
              day: '2-digit',
              hour: '2-digit',
              minute: '2-digit',
              second: '2-digit',
              hour12: true
            };

            const indianTime = now.toLocaleString('en-US', options);
            $('#current-time').val(indianTime);
          }
          updateIndianTime();
          setInterval(updateIndianTime, 1000);
        });
        </script>
        <script>
            $(document).ready(function() {
                var selectedFiles = [];
                $(document).on('click', '.external_medical', function() {
                    var id = $(this).attr('id');
                    id = id.replace("external_medical_", "");
                    $("#external_medical_reports_" + id).click();
                    $("#external_medical_reports_" + id).change(function() {
                        var fileList = this.files;
                        var ul = $("#external_medical_list_" + id);

                        for (var i = 0; i < fileList.length; i++) {
                            var fileName = fileList[i].name;
                            var fileExtension = fileName.split('.').pop().toLowerCase();
                            var isDuplicate = false;
                            for (var j = 0; j < selectedFiles.length; j++) {
                                if (selectedFiles[j].name === fileName) {
                                    isDuplicate = true;
                                    break;
                                }
                            }

                            if (!isDuplicate) {
                                selectedFiles.push(fileList[i]);
                                var listItem = $('<li>' + fileName +
                                    ' <span class="remove-icon"><i class="fas fa-close"></i></span></li>'
                                );
                                ul.append(listItem);
                                listItem.click(function() {
                                    var index = $(this).index();
                                    var modal = $('#fileModal');
                                    var file = selectedFiles[index];

                                    $('#file_name').text(file.name);
                                    if (fileExtension === 'pdf') {
                                        $('.file-viewer > img').hide();
                                        $('.file-viewer > iframe').show();
                                        $('#pdfViewer').attr('src', URL.createObjectURL(file));
                                    } else {
                                        $('.file-viewer > img').show();
                                        $('.file-viewer > iframe').hide();
                                        $('#image').attr('src', URL.createObjectURL(file));
                                    }

                                    modal.modal('show');
                                });

                                listItem.find(".remove-icon").click(function() {
                                    var index = $(this).parent().index();
                                    selectedFiles.splice(index, 1);
                                    $(this).parent().remove();
                                });

                                var fileInput = $(
                                    '<input type="hidden"  name="selected_files[]" value="' +
                                    fileName + '">');
                            } else {
                                console.log("File with the same name already exists: " + fileName);
                            }
                        }
                    });
                });

                $(document).on('change', '.purposes', function() {
                    $(this).attr('title', $(this).val());
                });

                $('#canDetailbtn').click(function(e) {
                    function generateTableRow(serialNumber) {
                        var employees = @json($employees);
                        var medicalOfficers = @json($medicalOfficers);
                        var purposes = @json($purposes);
                        var html = $('<tr>').append(
                            $('<td>').append(
                                $('<input>').attr('type', 'text').val(serialNumber).attr("name",
                                    serialNumber)
                            ),
                            $('<td>').append(
                                $('<select>').append(
                                    $('<option>').attr('value', '0').text('Select Employee'),
                                    $.map(employees, function(employee) {
                                        return $('<option>').text(String(employee.id).padStart(4, '0'))
                                            .attr('value', employee.id);
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
                            $('<td>').append().append(
                                $('<select>').append(
                                    $('<option>').attr('value', '0').text('Select Purpose'),
                                    $.map(purposes, function(purpose) {
                                        return $('<option>').text(purpose).attr('value', purpose);
                                    })
                                ).attr("id", "purpose_" + serialNumber)
                                .attr("name", "purpose[]")
                                .addClass("purposes")
                                .prop('disabled', true)
                            ),
                            $('<td>')
                            .addClass('external_medical_box')
                            .append(
                                $('<input>')
                                .attr('type', 'file')
                                .attr('multiple', true)
                                .attr('id', 'external_medical_reports_' + serialNumber)
                                .attr('name', 'external_medical_report[]')
                                .attr('accept', '.pdf, image/*')
                                .prop('hidden', true)
                            )
                            .append(
                                $('<ul>').addClass('external_medical_list').attr('id',
                                    'external_medical_list_' + serialNumber)
                            )
                            .append(
                                $('<div>')
                                .addClass('btn btn-sm external_medical disabled')
                                .attr('id', 'external_medical_' + serialNumber)
                                .text('Choose File')
                            ),
                            $('<td>').append().append(
                                $('<select>').append(
                                    $('<option>').attr('value', '0').text('Select Medical Officer'),
                                    $.map(medicalOfficers, function(medicalOfficer) {
                                        return $('<option>').text(medicalOfficer.name).attr('value',
                                                medicalOfficer
                                                .id)
                                            .data('mail', medicalOfficer.email);
                                    })
                                ).attr("id", "medical_officer_" + serialNumber)
                                .attr("name", "medical_officers[]")
                                .addClass("medical_officers")
                                .prop('disabled', true)
                            ),
                            $('<td>').append().attr("id", "medical_officer_mail_" + serialNumber),
                            $('<td>').append(
                                $('<textarea>')
                                .attr("name", "hr_comments[]")
                                .attr("rows", 3)
                                .attr("id", "hr_comments_" + serialNumber)
                                .val("")
                                .prop('disabled', true)
                            ),
                        );

                        return html;
                    }
                    var tableBody = $('#can-detail tbody');
                    var rowCount = tableBody.children('tr').length;
                    var newRow = generateTableRow(rowCount + 1);
                    tableBody.append(newRow);
                });

                $(document).on('click', '.medical_officers', function() {
                    var id = $(this).attr('id');
                    id = id.replace("medical_officer_", "")
                    var mailValue = $('#medical_officer_' + id).find('option:selected').data('mail');
                    $('#medical_officer_mail_' + id).text(mailValue);
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
                                console.log('API response: ' + id, data.data);
                                $("#site_" + id).text(data.data.site);
                                $("#name_" + id).text(data.data.name);
                                $("#dob_" + id).text(data.data.dob);
                                $("#gender_" + id).text(data.data.gender);
                                $("#dept_name_" + id).text(data.data.department);
                                $("#job_title_" + id).text(data.data.job_title);
                                $("#employee_mail_" + id).text(data.data.email);
                                $("#contact_number_" + id).text(data.data.mobile);
                                $("#age_" + id).text(data.data.age);
                                $("#civil_status_" + id).text(data.data.civil_status);
                                $("#reporting_manager_" + id).text(data.data.reportingManagerName);
                                $("#reporting_manager_mail_" + id).text(data.data.reportingManagerMail);

                                $("#purpose_" + id).prop('disabled', false);
                                $("#external_medical_reports_" + id).prop('disabled', false);
                                $("#medical_officer_" + id).prop('disabled', false);
                                $("#hr_comments_" + id).prop("disabled", false);
                                $('#external_medical_' + id).removeClass('disabled');
                                $('#external_medical_reports_' + id).attr('name',
                                    'external_medical_reports_' + employee_id + '[]');
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
                    // $("#purpose_" + id).text("");
                    // $("#external_medical_reports_" + id).text("");
                    // $("#medical_officer_" + id).text("");
                    // $("#medical_officer_mail_" + id).text("");
                    // $("#hr_comments_" + id).text("");
                    $("#purpose_" + id).prop('disabled', true);
                    $("#external_medical_reports_" + id).prop('disabled', true);
                    $("#medical_officer_" + id).prop('disabled', true);
                    $("#hr_comments_" + id).text("").prop('disabled', true);
                }
            });
        </script>
    @endpush
