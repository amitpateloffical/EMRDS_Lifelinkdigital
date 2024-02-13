@extends('components.main')
@section('container')
    <style>
        header .header_rcms_bottom {
            display: none;
        }
    </style>
    <div id="rcms_form-head">
        <div class="container-fluid" style="display:flex;">
            <div class="inner-block">
                <div class="head"></div>
                <div class="slogan">
                    <strong>Division: Pune, Maharashtra / Project: Employee</strong>
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
                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Activity Logs</button>
                <div class="d-flex" style="float:right; margin-left:91%; margin-top:-47px;">
                    <button class="button_theme1"> <a href="{{ url('healthCard') }}" class="text-blue" target="__blank">
                            Health
                            Card</a> </button>

                </div>
            </div>
            <form action="{{route('employ.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tab content -->
                <div id="step-form">

                    <div id="CCForm1" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="short-desc">Reporting Manager<span class="text-danger">*</span></label>
                                        <select id="select-state" placeholder="Select..." name="reporting_manager">
                                            <option value="">Select Person</option>
                                           @foreach($users as $key => $value)
                                           <option {{old('reporting_manager') ? 'selected' : ''}} value="{{$value->id}}" >{{$value->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">DOB<span class="text-danger">*</span></label>
                                        <input type="date" id="dob" name="dob" value="{{old('dob')}}" oninput="calculateAge()">
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Age</label>
                                        <input type="text" id="age" name="age" value="{{old('age')}}" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Employee Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Employee Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Contact Number<span class="text-danger">*</span></label>
                                        <input type="number" name="mobile" value="{{old('mobile')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Gender<span class="text-danger">*</span></label>
                                        <select name="gender">
                                            <option value="0">-- Select --</option>
                                            <option {{old('gender') ? 'selected' : ''}} value="Male" >Male</option>
                                            <option {{old('gender') ? 'selected' : ''}} value="Female">Female</option>
                                            <option {{old('gender') ? 'selected' : ''}} value="Prefer Not to Say">Prefer Not to Say</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Civil Status</label>
                                        <select name="civil_status">
                                            <option value="0">-- Select --</option>
                                            <option {{old('civil_status') ? 'selected' : ''}} value="Married" >Married</option>
                                            <option {{old('civil_status') ? 'selected' : ''}} value="Un-Married">Un-Married</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Department Name</label>
                                        <select name="department">
                                            <option value="0">-- Select --</option>
                                            @php
                                                $department = DB::table('departments')->get();
                                            @endphp
                                            @foreach($department as $key => $value)
                                            <option {{old('department') ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Job Title<span class="text-danger">*</span></label>

                                         <select name="role_id">
                                            <option value="0">-- Select --</option>
                                            @php
                                                $role = DB::table('roles')->where('id','!=',1)->get();
                                            @endphp
                                            @foreach($role as $key => $value)
                                            <option {{old('role_id') ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Attached CV</label>
                                        <input type="file" name="cv" value="{{old('cv')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="risk_level">Certifications/Qualifications</label>
                                        <input type="file" name="certificate" multiple value="{{old('certificate')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('dashboard') }}">
                                        Exit </a> </button>

                            </div>
                        </div>
                    </div>

                    <div id="CCForm2" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Zone</label>
                                        <select name="zone">
                                            <option value="0">-- Select --</option>
                                            <option value="North-Amarica">North-Amarica</option>
                                            <option value="South-Amarica">South-Amarica</option>
                                            <option value="Asia">Asia</option>
                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Country</label>
                                        <select name="country" class="countries" id="countryId">
                                            <option value="">Select Country</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">State</label>
                                        <select name="state" class="states" id="stateId">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">City</label>
                                        <select name="city" class="cities" id="cityId">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Site Name<span class="text-danger">*</span></label>
                                        <select name="site">
                                            <option value="0">-- Select --</option>
                                            <option value="Pune, Maharashtra">Pune, Maharashtra</option>
                                            <option value="Manjri, Pune">Manjri, Pune</option>
                                            <option value="Jeedimetla, Hyderabad">Jeedimetla, Hyderabad</option>
                                            <option value="BCG Manufacturing Unit, Karjat, Maharashtra">BCG Manufacturing
                                                Unit, Karjat, Maharashtra</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Building</label>
                                        <select name="building">
                                            <option value="0">-- Select --</option>
                                            <option value="manufacturing">Manufacturing</option>
                                            <option value="Quality">Quility</option>
                                            <option value="R&D">R & D</option>
                                            <option value="BlockA">Block A</option>
                                            <option value="BlockB">Block B</option>
                                            <option value="BlockC">Block C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Floor</label>
                                        <select name="floor">
                                            <option value="0">-- Select --</option>
                                            <option value="Floor 1">Floor 1</option>
                                            <option value="Floor 2">Floor 2</option>
                                            <option value="Floor 3">Floor 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Room</label>
                                        <select name="room">
                                            <option value="0">-- Select --</option>
                                            <option value="0001">0001</option>
                                            <option value="0002">0002</option>
                                            <option value="0003">0003</option>
                                            <option value="0004">0004</option>
                                            <option value="0005">00035</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Employee Blood Group</label>
                                        <select name="blood_group">
                                            <option value="0">-- Select --</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                             <option value="O+">O+</option>
                                            <option value="AB+">AB+</option>
                                             <option value="AB-">AB-</option> 
                                             <option value="A-">A-</option>
                                             <option value="B-">B-</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="div_code">Employee Health certifacate generated?</label>
                                        <select name="healthCard">
                                            <option value="0">-- Select --</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="risk_level">Picture</label>
                                        <input type="file" name="picture">
                                    </div>
                                </div>
                                <style>
                                    .table-body {
                                        width: 100%;
                                        overflow-x: scroll;
                                        text-align: center;
                                        margin-left: -4px;
                                    }
                                </style>

                                <div class="table-body">
                                    <div class="col-12">
                                        <div class="group-input">
                                            <label for="doc-detail">
                                                Employee Information
                                                {{-- <button type="button" name="ann"
                                                    id="empDetailbtn">+</button> --}}
                                            </label>
                                            <table class="table-bordered table" id="emp-detail">
                                                <thead style="vertical-align: middle">
                                                    <tr>
                                                        <th>Pre-Employment Medical Check-Up Status</th>
                                                        <th>Pre-Employment Medical Check-Up Completion On Date
                                                        </th>
                                                        <th>Pre-Employment Medical Check-Up Next Due Date</th>
                                                        <th>Periodic Medical Check-Up Status</th>
                                                        <th>Periodic Medical Check-Up Completion On Date</th>
                                                        <th>Periodic Medical Check-Up Next Due Date</th>
                                                        <th>Annual Health Check-Up Status</th>
                                                        <th>Annual Health Check-Up Completion On Date</th>
                                                        <th>Annula Health Check-Up Next Due Date</th>
                                                        <th>Vaccination Status</th>
                                                        <th>Vaccination Type</th>
                                                        <th>Vaccination Completion On Date</th>
                                                        <th>Vaccination Next Due Date</th>
                                                        <th>Eye Test Status</th>
                                                        <th>Eye Test Completion On Date</th>
                                                        <th>Eye Test Next Due Date</th>
                                                        <th>Chest X-ray Status</th>
                                                        <th>Chest X-ray Completion On Date</th>
                                                        <th>Chest X-ray Next Due Date</th>
                                                        <th>Exit Medical Check-Up Status</th>
                                                        <th>Exit Medical Check-Up Completion On Date</th>
                                                        <th>Exit Medical Check-Up Next Due Date</th>
                                                        <th>Hep - B Periodic Health Check-Up Status</th>
                                                        <th>Hep - B Periodic Health Check-Up Completion On Date</th>
                                                        <th>Hep - B Periodic Health Check-Up Next Due Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <tr>
                                                        <td>
                                                            <select name="PEMC_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="PEMC">Completed</option>
                                                                <option value="PEMC">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="pemc_date"></td>
                                                        <td><input type="date" id="txtDate" name="pemc_due_date"></td>
                                                        <td>
                                                            <select name="pmc_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="pmc">Completed</option>
                                                                <option value="pmc">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="pemc_date"></td>
                                                        <td><input type="date" id="txtDate" name="pemc_due_date"></td>

                                                        <td>
                                                            <select name="anhc_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="anhc">Completed</option>
                                                                <option value="anhc">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="pemc_date"></td>
                                                        <td><input type="date" id="txtDate" name="pemc_due_date"></td>

                                                        <td>
                                                            <select name="vaccination_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="anhc">Completed</option>
                                                                <option value="anhc">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text"></td>

                                                        <td><input type="date" id="txtDate" name="vaccination_date"></td>
                                                        <td><input type="date" id="txtDate" name="vaccination_due_date"></td>

                                                        <td>
                                                            <select name="ete_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="ete">Completed</option>
                                                                <option value="ete">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="ete_date"></td>
                                                        <td><input type="date" id="txtDate" name="ete_due_date"></td>

                                                        <td>
                                                            <select name="chxt_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="chxt">Completed</option>
                                                                <option value="chxt">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="ete_date"></td>
                                                        <td><input type="date" id="txtDate" name="ete_due_date"></td>

                                                        <td>
                                                            <select name="chxt_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="chxt">Completed</option>
                                                                <option value="chxt">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="ete_date"></td>
                                                        <td><input type="date" id="txtDate" name="ete_due_date"></td>

                                                        <td>
                                                            <select name="hbh_dtails">
                                                                <option value="select">Select</option>
                                                                <option value="hbh">Completed</option>
                                                                <option value="hbh">Not Completed</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" id="txtDate" name="ete_date"></td>
                                                        <td><input type="date" id="txtDate" name="ete_due_date"></td>
                                                    </tr>
                                                    <div id="empdetaildiv"></div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                           
                               
                               
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="comments">Comments</label>
                                        <textarea name="comments"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a class="text-white" href="{{ url('dashboard') }}">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <div id="CCForm3" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="sub-head">
                                Activity Logs
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Activate By</label>
                                        <div class="static">-</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submitted">Activate On</label>
                                        <div class="static">-</div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="button-block">
                                <button type="submit" value="save" name="submit" class="saveButton">Save</button>
                                <button type="button" class="backButton" onclick="previousStep()">Back</button>
                                <button type="button"> <a class="text-white" href="{{ url('dashboard') }}">
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

<script>
    function calculateAge() {
        // Get the input date of birth
        const dobInput = document.getElementById('dob').value;
        
        // Convert the input date to a Date object
        const dob = new Date(dobInput);
        
        // Calculate the current date
        const today = new Date();
        
        // Calculate the difference in years
        const age = today.getFullYear() - dob.getFullYear();
        
        // Check if the birthday hasn't occurred this year yet
        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
            age--;
        }
        
        // Display the age in the age input field
        document.getElementById('age').value = age;
    }
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
