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
                    <strong>Division: Pune, Maharashtra / Project: OPD Case Register</strong>
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
                <button class="cctablinks" onclick="openCity(event, 'CCForm2')">Medical Examination</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Medical Fitness Certificate</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Activity Logs</button>


            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tab content -->
                <div id="step-form">

                    <div id="CCForm1" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Initiator">Initiator</label>
                                        <div class="static">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="date_initiation">Date of Initiation</label>
                                        <div class="static">{{ date('d-M-Y') }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="initiator-group">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="short_description" id="short_description"></textarea>
                                        @error('initiatorGroup')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="initiator-code">Due Date</label>
                                        <input type="date" id="txtDate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="short-desc">Assignee<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">Select Person</option>
                                            <option value="">Person1 </option>
                                            <option value="">Person2</option>
                                        </select>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="short-desc">Health Issue Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="doc-detail">
                                            Emloyee/Vendor Details<button type="button" name="ann"
                                                id="DocDetailbtn">+</button>
                                        </label>
                                        <table class="table-bordered table" id="doc-detail">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Employee ID</th>
                                                    <th>Vendor ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text"></td>
                                                    <td><input type="text"></td>
                                                    <td><input type="text"></td>
                                                    <td><input type="text"></td>
                                                    <td><input type="text"></td>
                                                </tr>
                                                <div id="docdetaildiv"></div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="div_code">Comments</label>
                                        <textarea name=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="support-doc">Responsible Person</label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">Select Person</option>
                                            <option value="">Person1 </option>
                                            <option value="">Person2</option>
                                        </select>
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
                                            Patient ID
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Diagnosis
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Prescribed Medicines
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Referral to Higher
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Follow-up Dates
                                        </label>
                                        <input type="date" id="txtDate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Medical Advice
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="support-doc">Medical Certificate Status</label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">-- Select --</option>
                                            <option value="">Fit </option>
                                            <option value="">Unfit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="qa_comments">Employee Wise Medicine Consumption Record</label>
                                        <textarea name=""></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="qa_comments">Pending Task Closure/Completion</label>
                                        <textarea name=""></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="related_records">Examination Attachment</label>
                                        <input type="file">
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
                                        <label for="type_change">Medical Fitness Certificate Status</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="qa_head">Certificate Date</label>
                                        <input type="date" id="txtDate" name="qa_head">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="qa_comments">Description</label>
                                        <textarea name=""></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="related_records">Certificate Attachment</label>
                                        <input type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="sub-head">Reporting</div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Department
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Employee ID
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Employee Health Report
                                        </label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Exit Medical Data
                                        </label>
                                        <input type="date" id="txtDate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Reporting Attachment
                                        </label>
                                        <input type="file">
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
                            <div class="sub-head">
                                Activity Logs
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Report By</label>
                                        <div class="static">Amit Guru </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Report On</label>
                                        <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Examine By</label>
                                        <div class="static">Amit Guru</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Examine On</label>
                                        <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Certify By</label>
                                        <div class="static">Piyush Sahu</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Certify On</label>
                                        <div class="static">12-12-2032</div>
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
            </form>


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
