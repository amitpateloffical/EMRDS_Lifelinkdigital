<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>PatientData</title>
    <link rel="stylesheet" href="{{asset('assets/css/stylecss.css')}}" />

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
            <a href="">
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
                                    <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d"></i>
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
                    <div>
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
                    <div>
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
                        Pooja Mehta
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        05/05/1995
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
                        Sanjay Varma
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        06/10/1998
                        <div class="sidebar-icon">
                            <div>MALE</div>
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
                        Sneha Redy
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        06/10/1998
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
                        Ravi Sing
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        05/07/1999
                        <div class="sidebar-icon">
                            <div>MALE</div>
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
                        Arti Gupta
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        07/03/2001
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
                        Karishma Bhatia
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        10/11/1995
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
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
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
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
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
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
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
                        Ahmed Abeid
                        <div>OP: 13452</div>
                    </div>
                    <div>
                        28/02/2005
                        <div class="sidebar-icon">
                            <div>MALE</div>
                            <div>
                                <i class="fa-solid fa-chevron-right fa-xl" style="color: #1b1c1d"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    </div>
    <!-- ----------------2nd Page------------------->
    <div class="MainPage-patient">
        <div class="patientData">
            <div class="icon-patient-name">
                <div class="patient-icon">
                    <i class="fa-solid fa-r fa-2xl" style="color: #fff"></i>
                </div>
                <div>
                    <h4>Rahul Sharma</h4>
                    <div>Phone No: +254711445522</div>
                    <div>Phone No: +254711445522</div>
                    <div>DOB: 21/01/1995 (26 Years)</div>
                    <div>Gender: MALE</div>
                    <div>Location: Kawangware, Nairobi</div>
                </div>
            </div>
            <div>
                <div id="new-visit"> <button class="Btn-visit-form"> <a href="/newVisit" class="new-visit-btn">
                            New Visit </a></button> </div>
            </div>
        </div>

        <div class="visit-form">
            <div class="patient-visit">

                <div>
                    <H4>Visits</H4>
                </div>

                <div>
                    <input type="search-box" placeholder="search patient encounters">
                </div>


            </div>

            <div class="day-name">Tuesday, August 31</div>
            <div class="innerpage-consultation">
                <div class="inner-heading">
                    Consultation
                    <div>Headaches Fever</div>
                    </br>
                    <div>
                        Vitals
                        <ul>
                            <li>Oxygen Level 99%</li>
                            <li>Temperature 36°C</li>
                            <li>Blood Pressure 120/80 mmHg</li>
                            <li>Height 1.2m</li>
                            <li>Pulse 78 BPM</li>
                            <li>Weight 69 kg</li>
                        </ul>
                    </div>
                    <div>Notes
                        <p>Sweeting Profusely</p>
                    </div>
                    <div>Investigation Requset</div>
                    <div>Add......Data.
                        .........
                        .More Data...</div>


                </div>

            </div>

        </div>



    </div>
    </div>
</body>

</html>
