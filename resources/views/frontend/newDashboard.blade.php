<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMRDS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/stylecss.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="body-tag">
    <div class="sidenav">
        <div class="patient">
            <button type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                +Add New Patient
            </button>
        </div>

        <hr />

        <div class="search-flex">
            <div>
                <input class="search-box" type="text" placeholder="Search Patient" />
            </div>
            <div>
                <i class="fa-solid fa-magnifying-glass" style="color: gray"></i>
            </div>
        </div>
        <hr />

        <div id="sidebar-item">
            <a href="/patientData">
                <div class="side-icon-name">
                    <div class="name-icon">
                        <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                    </div>
                    <div class="nav-data-name">
                        <div>
                            Rahul Sharma
                            <div>OP: 13452</div>
                        </div>
                        <div>
                            28/02/1998
                            <div class="sidebar-icon">
                                <div>MALE</div>
                                <div>
                                    <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: 20px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <hr />

            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Priya Patel
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 17px;">
                        06/11/1982
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Anjali Desai
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 11px;">
                        01/12/1981
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Rajesh Kumar
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        01/01/1990
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: 15px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Pooja Mehta
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 12px;">
                        05/05/1995
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: -5px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Sanjay Varma
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 5px;">
                        06/10/1998
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: 11px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Sneha Redy
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 17px;">
                        06/10/1998
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: -9px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Ravi Sing
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 28px;">
                        05/07/1999
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: 8px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Arti Gupta
                        <div>OP: 13452</div>
                    </div>
                    <div style="    margin-left: 29px;">
                        07/03/2001
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: -12px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Karishma Bhatia
                        <div>OP: 13452</div>
                    </div>
                    <div style="margin-left: -5px;">
                        10/11/1995
                        <div class="sidebar-icon">
                            <div>FEMALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d; margin-left: -12px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div style="margin-left: 17px">
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d;     margin-left: 0px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div style="margin-left: 20px;">
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d;     margin-left: -4px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div style="margin-left: 20px;">
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d;     margin-left: -4px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="side-icon-name">
                <div class="name-icon">
                    <i class="fa-solid fa-a fa-A" style="color: #fff"></i>
                </div>
                <div class="nav-data-name">
                    <div>
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div style="margin-left: 20px;">
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d     margin-left: -4px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    </div>
    <!-- --------------------NEW VISIT-------------------------- -->
    <div class="visit-appointment">
        <div class="main-div-pending">
            <div class="main-btn">
                <a href="">
                    <a href="/newVisit">
                    <div>
                        <button type="button" class="btn btn-primary">New Visit</button>
                    </div>
                </a>
                </a>
            </div>

            <div class="pending-patients">
                <div class="patients-record">Pending Patients</div>
                <div class="panding-data">
                    <div>Name</div>
                    <div>Notes</div>
                </div>
                <div class="pending-container">
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Karishma Bhatia<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Aarti Gupta<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="second-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Ravi Sing<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="three-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Sneha Redy<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="four-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Sanjay Varma<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="five-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Pooja Mehta<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="six-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Rajesh Kumar<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="seven-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Anjali Desai<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="eight-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Priya Patel<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="nine-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Rahul Sharma<i class="fa-solid fa-chevron-right" style="color: #1b1c1d;"
                                id="ten-icon"></i>
                        </button>
                    </div>

                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Mukesh<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="eleven-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Manish<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="eleven-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------NEW APPOINTMENT------------- -->
        <div class="main-div-appointment">
            <div class="main-btn">
                <div style="margin-left: 45px;">
                    <a href="employee">
                        <button type="button" class="btn btn-primary">
                            New Appointment
                        </button>
                    </a>
                </div>
            </div>

            <div class="pending-patients" style="margin-left: 26px;">
                <div class="patients-record">Appointment</div>
                <div>Monday, October 20</div>
                <div class="panding-data">
                    <div>Name</div>
                    <div>Reason</div>
                </div>
                <div class="pending-container">
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Karishma Bhatia<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Aarti Gupta<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="second-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Ravi Sing<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="three-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Sneha Redy<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="four-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Sanjay Varma<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="five-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Pooja Mehta<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="six-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Rajesh Kumar<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="seven-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Anjali Desai<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="eight-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Priya Patel<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="nine-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Rahul Sharma<i class="fa-solid fa-chevron-right" style="color: #1b1c1d"
                                id="ten-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Mukesh<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="eleven-icon"></i>
                        </button>
                    </div>
                    <div class="padding-btn-form">
                        <button class="pending-btn">
                            Manish<i class="fa-solid fa-chevron-right" style="color: #1b1c1d" id="eleven-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="modal-element">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Patient</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="">
                        <br />
                        <div class="name-container">
                            <div class="fname-element">
                                <label for="fname">Reporting Manager<span style="color: red">*</span>
                                </label>
                                <select name="Reporting_Manger" id="fname">
                                    <option value="select">--Select--</option>
                                    <option>Amit Guru</option>
                                    <option>Madhulikha Mishra</option>
                                    <option>Amit Patel</option>
                                </select>
                            </div>
                            <div class="age-element">
                                <label for="age">Age: </label>
                                <input type="text" name="lname" id="age" />
                            </div>
                        </div>

                        <div class="gender-container">
                            <div class="gender-element">
                                <label for="gender">Gender<span style="color: red">*</span>
                                </label>
                                <select name="gender" id="gender">
                                    <option value="select">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="Prefer not to say">Prefer not to say</option>
                                </select>
                            </div>
                            <div class="birth-element">
                                <label for="birth">Date Of Birth (DD/MM/YY)<span style="color: red">*</span>
                                </label>
                                <input type="date" name="bdate" id="bdate" />
                            </div>
                        </div>

                        <div class="phone_email_container">
                            <div class="phnumber-element">
                                <label for="phnumber">Contact Number<span style="color: red">*</span></label>
                                <input type="text" name="Phone" id="Phone" />
                            </div>
                            <div class="email-element">
                                <label for="email">Employee Name<span style="color: red">*</span></label>
                                <input type="email" name="email" id="email" />
                            </div>
                        </div>

                        <br />
                        <div class="address_container_1">
                            <div class="address-element-1">
                                <label for="adderssline_1">Employee Email<span style="color: red">*</span></label>
                                <input type="text" name="adress_1" id="adress_1" />
                            </div>
                            <div class="civil-element">
                                <label for="civil">Civil Status<span style="color: red">*</span>
                                </label>
                                <select name="gender" id="civil">
                                    <option value="select">--Select--</option>
                                    <option value="male">Married</option>
                                    <option value="female">Un-Married</option>
                                </select>
                            </div>
                        </div>

                        <div class="address_container_2">
                            <div class="department-element">
                                <label for="department">Department Name</label>
                                <select name="gender" id="department">
                                    <option value="select">--Select--</option>
                                    <option>Quality Assurance</option>
                                    <option>Production</option>
                                </select>
                            </div>
                            <div class="city-element">
                                <label for="city">City<span style="color: red">*</span>
                                </label>
                                <select name="city" id="city">
                                    <option value="select">--Select--</option>
                                    <option>HR</option>
                                    <option>Medical Officere</option>
                                    <option>Nurshing Staff</option>
                                    <option>OHC HEAD</option>
                                    <option>Manger-QA</option>
                                    <option>Product Manager</option>
                                    <option>Officer QA</option>
                                </select>
                            </div>
                        </div>

                        <br />

                        <div class="attached">
                            <div class="attached-element">
                                <label for="NHFNumber">Attached CV</label>
                                <input type="file" name="NHFNumber" id="NHFNumber" />
                            </div>
                            <div class="certifications-element">
                                <label for="OPNumber">Certifications/Qualifications</label>
                                <input type="file" name="OPNumber" id="OPNumber" />
                            </div>
                        </div>

                        <div class="close_btn">
                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Next
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Exit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
