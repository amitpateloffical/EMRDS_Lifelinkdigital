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
                    <strong>Division: Pune, Maharashtra / Project: Periodic medical check-up</strong>

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
                <button class="cctablinks" onclick="openCity(event, 'CCForm2')">Pending HOD Review</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Nursing Staff Data Entry</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm4')">Medical Officer Examination</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm5')">Employee Medical Checkup</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm6')">Medical Officer Assement</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm7')">Apporval</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm8')">Report Acknowledgment</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm9')">Activity Logs</button>
            </div>
            <form action="{{ route('periodicMedical.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="date" id="txtDate" name="due_date">
                                        @error('due_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="short-desc">Assignee<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="assign_to">
                                            <option value="">Select Person</option>
                                             @foreach ($users as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }} </option>
                                            @endforeach 
                                        </select>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-input">
                                        <label for="div_code">Department</label>
                                        <select name="div_code">
                                            <option value="0">-- Select --</option>
                                            <option value="Dept1">Dept1</option>
                                            <option value="Dept2">Dept2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="nature-change">Field Type</label>
                                        <input type="text" name="field_type">
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
                                Request Acknowledgement
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="current-practice">
                                            Acknowledgement Message
                                        </label>
                                        <input type="text" name="acknowladgement_message">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="proposed_change">
                                            Acknowledgement Comments
                                        </label>
                                        <textarea name="acknowladgement_comment" id="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="reason_change">
                                            Attachment
                                        </label>
                                        <input type="file" name="attachment" id="">
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
                    </div>

                    <div id="CCForm3" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="qa_head">BMI</label>
                                        <input type="text" name="BMI">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="qa_comments">Eye Test Report</label>
                                        <input type="text" name="eye_test_report">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="related_records">Department Comment</label>
                                        <textarea name="department_comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="related_records">Department Attachment</label>
                                        <input type="file" name="department_attachment">
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
                                Medical Officer Examination
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="group_review">Checkup Date</label>
                                        <input type="datetime" name="checkup_date">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="doc-detail">
                                            Medical Officer Observations<button type="button" name="ann"
                                                id="DocDetailbtn">+</button>
                                        </label>
                                        <table class="table-bordered table" id="doc-detail">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
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
                                        <label for="Microbiology">Pending Task Closure/Completion Comment</label>
                                        <textarea name="other_comment" name="pending_task"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="Microbiology-Person">Medical Attachments</label>
                                        <input type="file" name="medical_attachment" id="">
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
                            <div class="sub-head">
                                Employee Medical Checkup
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="group_review">Check-in Date </label>
                                        <input type="date" id="txtDate" name="check_in_date">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production">Check-in Report</label>
                                        <input type="text" name="Check_in_report">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="Production-Person">Employee Checkup Comments</label>
                                        <textarea name="Employee_checkup_Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Quality-Approver">Employee Checkup Attachment</label>
                                        <input type="file" name="Employee_Checkup_Attachment">
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
                            <div class="sub-head">
                                Medical Officer Assement
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="risk-identification">Fitness Status</label>
                                        <select id="select-state" placeholder="Select..." name="Fitness_Status">
                                            <option value="">-- Select --</option>
                                            <option value="1">Status1 </option>
                                            <option value="2">Status2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="severity">BP Record </label>
                                        <input type="text" name="BP_Record ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Occurance">Blood Report</label>
                                        <input type="text" name="Blood_Report">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Detection">Certification</label>
                                        <input type="text" name="Certification">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="RPN">Approved by</label>
                                        <select name="Approved_by">
                                            <option value="0">-- Select --</option>
                                            <option value="perason 1">Person 1</option>
                                            <option value="perason 2">Person 2</option>
                                            <option value="perason3">Person 3</option>
                                            <option value="perason 4">Person 4</option>
                                            <option value="perason 5">Person 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="risk-evaluation">Task Closure/Completion Comment</label>
                                        <textarea name="other_comment" name="Task_Closure_comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="migration-action">Assesment Attachment</label>
                                        <input type="file" name="Assesment_Attachment">
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
                                Apporval
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk-identification">Email Notification</label>
                                        <input type="text" name="Email_Notification">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Occurance">Apporval Attachment</label>
                                        <input type="file" name="Apporval_Attachment">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="severity">Apporval Comments</label>
                                        <textarea name="other_comment" name="Apporval_Comments"></textarea>
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
                                Report Acknowledgment
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="risk-identification">Acnowledgment Comments</label>
                                        <textarea name="other_comment" name="Acnowledgment_Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="severity">Date Retention </label>
                                        <input type="date" id="txtDate" name="Date_Retention">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Occurance">Transfer to New Employee ID</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Detection">Previous Medical Record Data</label>
                                        <input type="text" name="Transfer_to ">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk-evaluation">Medical Report Attachment</label>
                                        <input type="file" name="Medical_Report_Attachment">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="RPN">Report Comments</label>
                                        <textarea name="Report_Comments"></textarea>
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

                    <div id="CCForm9" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="sub-head">
                                Activity Logs
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Employee Entry By</label>
                                        <div class="static">Piyush Sahu</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Employee Entry On</label>
                                        <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Request AcknowledgementBy</label>
                                        <div class="static">Piyush Sahu</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Request Acknowledgement On</label>
                                        <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Health Data Input By</label>
                                        <div class="static">Piyush Sahu</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Health Data Input On</label>
                                        <div class="static">12-12-2032</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Medical Checkup By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Medical Checkup 0n</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Data Retrieval By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Data Retrieval On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Employee Check In By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Employee Check In On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Health Assessment By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Health Assessment On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Remarks Recording By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Remarks Recording On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Certification By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Certification On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Appoval Complete By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Appoval Complete On</label>
                                        <div class="static">12/02/2023</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Acknowledged By</label>
                                        <div class="static">Ajay kumar</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Acknowledged On</label>
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
