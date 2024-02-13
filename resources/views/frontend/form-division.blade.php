@extends('components.main')
@section('container')
    <style>
        header {
            display: none;
        }
    </style>
    {{-- ======================================
            DASHBOARD
    ======================================= --}}
    <div id="division-config-modal" style="background-image: url('{{ asset('assets/image/cover.jpg') }}')">
        <div class="division-container">
            <div class="content-container" style="box-shadow: 1px 2px 4px 4px #ffffff;">
                <form action="#" method="post">
                    <div class="division-tabs">
                        <div class="left-block">
                            <div class="head">
                                Site
                            </div>
                            <div class="site-buttons">
                                <div class="divisionlinks active" onclick="openDivision(event, 'ehs-north')">Pune, Maharashtra</div>
                                <div class="divisionlinks" onclick="openDivision(event, 'global')">Manjri, Pune</div>
                                <div class="divisionlinks" onclick="openDivision(event, 'hr-headquarter')">Jeedimetla, Hyderabad</div>
                                <div class="divisionlinks" onclick="openDivision(event, 'it-emea')">BCG Manufacturing Unit, Karjat, Maharashtra</div>
                                <div class="divisionlinks" onclick="openDivision(event, 'qms-apac')">Czech Republic</div>
                            </div>
                        </div>
                        <div class="right-block">
                            <div class="head">
                                eMRDS
                            </div>
                            <div id="ehs-north" class="divisioncontent">
                                <a href="employee">Employee</a>
                                <a href="pre-employment">Pre-Employment Medical Checkup Assignment</a>
                                <a href="periodic-medical">Periodic Medical Check-Up</a>
                                <a href="annual-health">Annual Health Check-Up</a>
                                <a href="#">Vaccination Of Employees</a>
                                <a href="eye-test">Eye Test Of Employees</a>
                                <a href="chest-x-ray">Chest X-ray Test Of Employees</a>
                                <a href="exit-medical">Exit Medical Check-Up Of Employees</a>
                                <a href="biomedical-waste">Biomedical Waste Record</a>
                                <a href="first-aid-box">First Aid & First Aid Boxes</a>
                                <a href="opd-case-register">OPD Case Register</a>
                                <a href="vaccine-consumption">Vaccine Consumption Record</a>
                                <a href="medical-checkup-visitors">Medical Check-Up Of Visitors / Auditors</a>
                                <a href="canteen-employees">SIIPL Canteen Employee's Medical Check-Up</a>
                                <a href="trainee-medical">Trainee Medical Check-Up</a>
                                <a href="hipBperiodic">Hep-B Periodic Health Check-Up</a>
                                <a href="form-7">Form No-7</a>
                                <a href="annual-maintenance">Annual Maintenance Record</a>
                                <a href="provision-addtion">Provision For Addition Of Any New Workflow</a>
                            </div>
                            <div id="global" class="divisioncontent" style="display: none;">
                                <a href="employee">Employee</a>
                                <a href="pre-employment">Pre-Employment Medical Check-Up</a>
                                <a href="periodic-medical">Periodic Medical Check-Up</a>
                                <a href="annual-health">Annual Health Check-Up</a>
                                <a href="#">Vaccination Of Employees</a>
                                <a href="eye-test">Eye Test Of Employees</a>
                                <a href="chest-x-ray">Chest X-ray Test Of Employees</a>
                                <a href="exit-medical">Exit Medical Check-Up Of Employees</a>
                                <a href="biomedical-waste">Biomedical Waste Record</a>
                                <a href="first-aid-box">First Aid & First Aid Boxes</a>
                                <a href="opd-case-register">OPD Case Register</a>
                                <a href="vaccine-consumption">Vaccine Consumption Record</a>
                                <a href="medical-checkup-visitors">Medical Check-Up Of Visitors / Auditors</a>
                                <a href="canteen-employees">SIIPL Canteen Employee's Medical Check-Up</a>
                                <a href="trainee-medical">Trainee Medical Check-Up</a>
                                <a href="hipBperiodic">Hep-B Periodic Health Check-Up</a>
                                <a href="form-7">Form No-7</a>
                                <a href="annual-maintenance">Annual Maintenance Record</a>
                                <a href="provision-addtion">Provision For Addition Of Any New Workflow</a>
                            </div>
                            <div id="hr-headquarter" class="divisioncontent" style="display: none;">
                                <a href="employee">Employee</a>
                                <a href="pre-employment">Pre-Employment Medical Check-Up</a>
                                <a href="periodic-medical">Periodic Medical Check-Up</a>
                                <a href="annual-health">Annual Health Check-Up</a>
                                <a href="#">Vaccination Of Employees</a>
                                <a href="eye-test">Eye Test Of Employees</a>
                                <a href="chest-x-ray">Chest X-ray Test Of Employees</a>
                                <a href="exit-medical">Exit Medical Check-Up Of Employees</a>
                                <a href="biomedical-waste">Biomedical Waste Record</a>
                                <a href="first-aid-box">First Aid & First Aid Boxes</a>
                                <a href="opd-case-register">OPD Case Register</a>
                                <a href="vaccine-consumption">Vaccine Consumption Record</a>
                                <a href="medical-checkup-visitors">Medical Check-Up Of Visitors / Auditors</a>
                                <a href="canteen-employees">SIIPL Canteen Employee's Medical Check-Up</a>
                                <a href="trainee-medical">Trainee Medical Check-Up</a>
                                <a href="hipBperiodic">Hep-B Periodic Health Check-Up</a>
                                <a href="form-7">Form No-7</a>
                                <a href="annual-maintenance">Annual Maintenance Record</a>
                                <a href="provision-addtion">Provision For Addition Of Any New Workflow</a>
                            </div>
                            <div id="it-emea" class="divisioncontent" style="display: none;">
                                <a href="employee">Employee</a>
                                <a href="pre-employment">Pre-Employment Medical Check-Up</a>
                                <a href="periodic-medical">Periodic Medical Check-Up</a>
                                <a href="annual-health">Annual Health Check-Up</a>
                                <a href="#">Vaccination Of Employees</a>
                                <a href="eye-test">Eye Test Of Employees</a>
                                <a href="chest-x-ray">Chest X-ray Test Of Employees</a>
                                <a href="exit-medical">Exit Medical Check-Up Of Employees</a>
                                <a href="biomedical-waste">Biomedical Waste Record</a>
                                <a href="first-aid-box">First Aid & First Aid Boxes</a>
                                <a href="opd-case-register">OPD Case Register</a>
                                <a href="vaccine-consumption">Vaccine Consumption Record</a>
                                <a href="medical-checkup-visitors">Medical Check-Up Of Visitors / Auditors</a>
                                <a href="canteen-employees">SIIPL Canteen Employee's Medical Check-Up</a>
                                <a href="trainee-medical">Trainee Medical Check-Up</a>
                                <a href="hipBperiodic">Hep-B Periodic Health Check-Up</a>
                                <a href="form-7">Form No-7</a>
                                <a href="annual-maintenance">Annual Maintenance Record</a>
                                <a href="provision-addtion">Provision For Addition Of Any New Workflow</a>
                            </div>
                            <div id="qms-apac" class="divisioncontent" style="display: none;">
                                <a href="employee">Employee</a>
                                <a href="#">Pre-Employment Medical Check-Up</a>
                                <a href="periodic-medical">Periodic Medical Check-Up</a>
                                <a href="annual-health">Annual Health Check-Up</a>
                                <a href="#">Vaccination Of Employees</a>
                                <a href="eye-test">Eye Test Of Employees</a>
                                <a href="chest-x-ray">Chest X-ray Test Of Employees</a>
                                <a href="exit-medical">Exit Medical Check-Up Of Employees</a>
                                <a href="biomedical-waste">Biomedical Waste Record</a>
                                <a href="first-aid-box">First Aid & First Aid Boxes</a>
                                <a href="opd-case-register">OPD Case Register</a>
                                <a href="vaccine-consumption">Vaccine Consumption Record</a>
                                <a href="medical-checkup-visitors">Medical Check-Up Of Visitors / Auditors</a>
                                <a href="canteen-employees">SIIPL Canteen Employee's Medical Check-Up</a>
                                <a href="trainee-medical">Trainee Medical Check-Up</a>
                                <a href="hipBperiodic">Hep-B Periodic Health Check-Up</a>
                                <a href="form-7">Form No-7</a>
                                <a href="annual-maintenance">Annual Maintenance Record</a>
                                <a href="provision-addtion">Provision For Addition Of Any New Workflow</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDivision(event, divisionName) {
            var divisionContents = document.querySelectorAll(".divisioncontent");
            for (var i = 0; i < divisionContents.length; i++) {
                divisionContents[i].style.display = "none";
            }
            var divisionLinks = document.querySelectorAll(".divisionlinks");
            for (var i = 0; i < divisionLinks.length; i++) {
                divisionLinks[i].classList.remove("active");
            }
            document.getElementById(divisionName).style.display = "block";
            event.currentTarget.classList.add("active");
        }
    </script>
@endsection
