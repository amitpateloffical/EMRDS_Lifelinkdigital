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
                    <strong>Division: Pune, Maharashtra / Project: Vaccination of employees</strong>
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
                <button class="cctablinks" onclick="openCity(event, 'CCForm2')">Vaccination</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Vaccination and Acknowledgment</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Record Keeping</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm5')">Adjustment</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm6')">Adjustment Review</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm7')">Activity Logs</button>
            </div>
            <form action="{{route('vaccine.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tab content -->
                <div id="step-form">

                    <div id="CCForm1" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="group-input">
                                        <label for="rls">Record Number</label>
                                        {{--  <div class="static">{{$recordNumber}}</div>  --}}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="group-input">
                                        <label for="Initiator">Initiator</label>
                                        <div class="static">{{ Auth::guard('admin')->name }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="group-input">
                                        <label for="date_initiation">Date of Initiation</label>
                                        <div class="static">{{ date('d-M-Y') }}</div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="group-input">
                                        <label for="due-date">Date of Initiation<span class="text-danger">*</span></label>
                                        <input type="date" id="txtDate" name="due_date">
                                        @error('due_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
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
                                        <input type="date" id="txtDate" name="ue_date">


                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="short-desc">Assignee<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">Select Person</option>
                                             @foreach($users as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach 

                                        </select>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Vaccine Type</label>
                                        <input type="text" name="vaccine_type">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-input">
                                        <label for="div_code">Employee/Vendor Details</label>
                                        {{-- <select name="div_code">
                                        <option value="0">-- Select --</option>
                                        <option value="P1">P1</option>
                                        <option value="P2">P2</option>
                                        <option value="P3">P3</option>
                                        <option value="P4A">P4A</option>
                                        <option value="P4B">P4B</option>
                                        <option value="P5">P5</option>
                                        <option value="P6">P6</option>
                                        <option value="P7">P7</option>
                                        <option value="RLS">RLS</option>
                                        <option value="CRS">CRS</option>
                                    </select> --}}
                                        <input type="text" name="employee_details">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="nature-change">Name</label>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="others">Contact</label>
                                        <input type="number" name="contact">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Employee Id</label>
                                        <input type="text" name="email_id">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Vendor Id</label>
                                        <input type="text" name="vendor_id">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Comments</label>
                                        <textarea name="comments" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="support-doc">Responsible Person</label>
                                        <select id="select-state" placeholder="Select..." name="responsible_person">
                                            <option value="">Select Person</option>
                                            @foreach($user as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach
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
                            <div class="sub-head">
                                Vaccination
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <div class="group-input">
                                    <label for="doc-detail">
                                        Document Details<button type="button" name="ann" id="DocDetailbtn">+</button>
                                    </label>
                                    <table class="table-bordered table" id="doc-detail">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Current Document No.</th>
                                                <th>Current Version No.</th>
                                                <th>New Document No.</th>
                                                <th>New Version No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="serial_number[]"></td>
                                                <td><input type="text" name="current_doc_number[]"></td>
                                                <td><input type="text" name="current_version[]"></td>
                                                <td><input type="text" name="new_doc_number[]"></td>
                                                <td><input type="text" name="new_version[]"></td>
                                            </tr>
                                            <div id="docdetaildiv"></div>
                                        </tbody>
                                    </table>
                                </div> --}}
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Vaccination Comments
                                        </label>
                                        <textarea name="Vaccination_comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Date of Vaccination
                                        </label>
                                        <input type="date" id="txtDate">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Type of vaccine
                                        </label>
                                        <select id="select-state" placeholder="Select..." name="type_of_vaccine">
                                            <option value="">Select</option>
                                           
                                            <option value="Hepatitis A"> Hepatitis A</option>
                                            <option value="Flu (shot only)"> Flu (shot only)</option>
                                            <option value="Polio (shot only)                                            "> Polio (shot only)
                                            </option>
                                            <option value="Rabies"> Rabies</option>
                                            <option value="Recombinant"> Recombinant</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="other_comment">
                                            Other Vaccine
                                        </label>
                                        <textarea name="other_notification"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="supervisor_comment">
                                            Notification Status
                                        </label>
                                        <select id="select-state" placeholder="Select..." name="notification_status">
                                            <option value="">Select </option>
                                           <option value="Sent">Sent</option>
                                           <option value="Un-Sent">Un-Sent</option>
                                           
                                        </select>
                                    </div>
                                    <div class="group-input">
                                        <label for="supervisor_comment">
                                            Attachment
                                        </label>
                                        <input type="file" name="attachment">
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
                                        <label for="type_change">Employee Vaccination and Acknowledgment Comments</label>
                                        <textarea name="acknowdegment_comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="qa_head">Manufacturer</label>
                                        <input type="text" name="Manufacturer">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="qa_comments">Batch Number</label>
                                        <input type="text" name="batch">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="related_records">Expiry Date</label>
                                        <input type="date" id="txtDate" name="expire_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="related_records">Acknowledgment Status</label>
                                        <select id="select-state" placeholder="Select..." name="acknowdegment_status">
                                            <option value="">Select Person</option>
                                            @foreach($user as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="related_records">Description</label>
                                        <textarea name="Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="related_records">Acknowledgment Attachment</label>
                                        <input type="file" name="acknowdegment_attachment">
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
                                Record Keeping
                            </div>
                            <div class="group-input">
                                <label for="qa-eval-comments">Reminder Status</label>
                                <select id="select-state" placeholder="Select..." name="reminder_status">
                                    <option value="">Select </option>
                                    <option value="Sent">Sent</option>
                                    <option value="Un-Sent">Un-Sent</option>
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="qa-eval-attach">Next Due Date</label>
                                <input type="date" id="txtDate" name="next_due_date">
                            </div>

                            <div class="group-input">
                                <label for="nature-change">Record keeping Comment</label>
                                <textarea name="other_comment"></textarea>
                            </div>
                            <div class="group-input">
                                <label for="train-comments">Record Attachment</label>
                                <input type="file" name="record_attachment">
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
                            <div class="sub-head">
                                Adjustment
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="group_review">Date of Adjustment</label>
                                        <input type="date" id="txtDate" name="date_of_adjustment">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production">Type of Adjustment</label>
                                        <input type="text" name="type_of_adjustment">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production-Person">Blood Seroconversion</label>
                                        <input type="text" name="Blood_Seroconversion">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Quality-Approver">Date of Titers</label>
                                        <input type="date" id="txtDate" name="Re_titer_Values">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Quality-Approver-Person">Re-titer Values</label>
                                        <input type="text" value="date_of_retiter">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Microbiology">Date of re-titer</label>
                                        <input type="date" id="txtDate" name="date_of_retiter">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Microbiology-Person">Adjustment Comments</label>
                                        <textarea name="Adjustment_Comments"></textarea>
                                        {{-- <select multiple name="cft_reviewer[]" placeholder="Select CFT Reviewers"
                                        data-search="false" data-silent-initial-value-set="true" id="cft_reviewer">
                                        <option value="1">Amit Guru</option>
                                        <option value="2">Shaleen Mishra</option>
                                        <option value="3">Anshul Patel</option>
                                        <option value="4">Amit Patel</option>
                                        <option value="5">Piyush Sahu</option>
                                        <option value="6">Vikas Prajapati</option>
                                        <option value="7">Gopal Sen</option>
                                        <option value="8">Anshul Jain</option>
                                    </select> --}}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="bd_domestic">Adjustment Attachment</label>
                                        <input type="file" name="Adjustment_Attachment">
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
                                        <label for="comments">Completion Status</label>
                                        <input type="text" name="Completion_Status">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="comments">Absent Employee Name</label>
                                        <input type="text" name="Absent_Employee_Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="comments">Absent Employee Email</label>
                                        <input type="text" name="Absent_Employee_Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="comments">Escalation Comments</label>
                                        <textarea name="Escalation_Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="comments">Report Attachment</label>
                                        <input type="file" name="Report_Attachment">
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
                            <div class="sub-head">
                                Electronic Signatures
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Submitted By</label>
                                         <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Submitted On</label>
                                         <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Cancelled By</label>
                                         <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Cancelled On</label>
                                         <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">More Information Required By</label>
                                         <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">More Information Required On</label>
                                         <div class="static">-</div>
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
                {{--  </div>  --}}
            </form>
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
@endsection
