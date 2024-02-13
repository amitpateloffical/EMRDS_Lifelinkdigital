<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>eMRDS - Software</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/nlsiabbt295w89cjmcocv6qjdg3k7ozef0q9meowv2nkwyd3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/virtual-select.min.css') }}">
    <script src="{{ asset('assets/js/virtual-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/rcms_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylecss.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylecss.css') }}">



    <script
src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script
src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script
src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js">
</script>
<link rel="stylesheet"
href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">



    {{-- boot  --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    {{-- maxcdn  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"> --}}
    {{-- jq  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/plotly.js/2.26.1/plotly.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
{{-- --------------------cdn----------script  --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</head>


<body>
    @php
        $role = Helpers::roleName();
    @endphp
    <header>
        <div class="header_rcms_top">
            <div class="container-fluid">
                <div class="container">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="header_rcms_middle">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="middle-head">
                        <div class="logo-container">
                            {{-- <div class="logo">
                                <img id="img-first" src="{{ asset('assets/image/dms.png') }}" alt="..." class="w-100 h-100">
                            </div> --}}
                                <div class="logo">
                                    <img src="{{ asset('assets/image/conexo.png') }}" alt="..."
                                        class="w-100 h-100">
                                </div>
                            </div>
                            <div class="icon-grid">
                            <div class="icon-drop"
                                style="border: 1px solid #0039bd;
                                    padding: 5px 5px;
                                    border-radius: 10px;
                                    background: #0039bd;
                                    color: white;">
                                    {{ $role }}
                                </div>
                                <div class="icon-drop">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-gear"></i>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="icon-block">
                                        <div><a id="/form-division">Quality Management System</a></div>
                                        <div><a data-bs-toggle="modal" data-bs-target="#import-export-modal">
                                                Import/Export Terms
                                            </a></div>
                                        <div><a href="#">MedDRA</a></div>
                                        <div><a href="#">Report Duplicate Translate Terms</a></div>
                                        <div><a href="#">Spellcheck Languages</a></div>
                                        <div><a href="#">Spellcheck Settings</a></div>
                                        <div><a href="#">Translate Terms</a></div>
                                        <div><a href="/designate-proxy">Designate Proxy</a></div>
                                    </div>
                                </div>
                                <div class="icon-drop">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                        @if (Auth::guard('admin'))
                                            {{ Auth::guard('admin')->user()->name }}
                                            {{-- @else
                                        Amit Guru --}}
                                        @endif
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="icon-block small-block">
                                        <div class="image">
                                            <img src="{{ asset('assets/image/user.webp') }}" alt="..."
                                                class="w-100 h-100">
                                        </div>
                                        <div data-bs-toggle="modal" data-bs-target="#setting-modal">Settings</div>
                                        <div data-bs-toggle="modal" data-bs-target="#about-modal">About</div>
                                        <div><a href="#">Help</a></div>
                                        <div><a href="/rcms/helpdesk-personnel">Helpdesk Personnel</a></div>
                                        <div><a href="{{ url('logout') }}">Log Out</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_rcms_bottom">
                <div class="container-fluid">
                    <div class="bottom-head">
                        <div class="left-block">
                            <div class="link-block">
                                <a href="/dashboard/list" data-bs-toggle="tooltip" title="Dekstop">
                                    <i class="fa-solid fa-house-user"></i>
                                </a>
                                <a href="/mainDashboard" data-bs-toggle="tooltip" title="Dashboard">
                                    <i class="fa-solid fa-gauge-high"></i>
                                </a>
                                <a href="/newDashboard" data-bs-toggle="tooltip" title="Reports">
                                    <i class="fa-solid fa-file-waveform"></i>
                                </a>
                                <a href="https://demo.smart-hospital.in/site/login" target="blank" data-bs-toggle="tooltip" title="Patient Registration">
                                    <i class="fa-solid fa-bed-pulse" style="color: #000000;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="right-block">
                            <div class="search-bar">
                                <form>
                                    <select name="search-type">
                                        <option value="record_id">Record ID</option>
                                        <option value="add_info">Additional Information</option>
                                        <option value="short_desc">Short Description</option>
                                        <option value="type">Type</option>
                                    </select>
                                    <input type="text" name="search" id="searchInput" placeholder="Search...">
                                    <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                                </form>
                            </div>
                            <div class="drop-block">
                                <div class="drop-btn"><i class="fa-solid fa-address-card"></i></div>
                                <div class="drop-items">
                                    <a href="#">
                                        <i class="fa-solid fa-square-plus"></i>
                                        &nbsp;New Entity
                                    </a>
                                    <a href="#">
                                        <i class="fa-solid fa-user-plus"></i>
                                        &nbsp;New Person
                                    </a>
                                    <a href="#">
                                        <i class="fa-solid fa-address-book"></i>
                                        &nbsp;Search Entity
                                    </a>
                                    <a href="#">
                                        <i class="fa-brands fa-searchengin"></i>
                                        &nbsp;Search Person
                                    </a>
                                </div>
                            </div>
                            <div class="create">
                                <a href="{{ url('form-division') }}"> <button class="button_theme1">Initiate eMRDS
                                        Process
                                    </button> </a>
                            </div>
                            <div class="create">
                                <a href="{{ url('allMedTest') }}"> <button class="button_theme1">Medical Tests Guide
                                    </button> </a>
                            </div>
                            <div class="create">
                                <a href="{{ url('oshaform') }}"> <button class="button_theme1">OSHA Forms
                                    </button> </a>
                            </div>
                            <div class="create">
                                <a href="{{ url('report') }}"> <button class="button_theme1">Reports
                                    </button> </a>
                            </div>
                            <div class="create">
                                <a href="{{ url('emrdsScopies') }}"> <button class="button_theme1">eMRDS SOPs
                                    </button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <div class="modal fade" id="setting-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">User's Settings</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="image">
                        <img src="{{ asset('user/images/login.jpg') }}" alt="..." class="w-100 h-100">
                    </div>
                    <div class="bar">
                        <strong>Name : </strong> Amit Guru
                    </div>
                    <div class="bar">
                        <strong>E-Mail : </strong> amit.guru@lifelinkdigital.com
                    </div>
                    <div class="bar">
                        <a href="#">Change Password</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="about-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">About</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="logo">
                        <img src="{{ asset('user/images/conexo.png') }}" alt="..." class="w-100 h-100">
                    </div>
                    <div class="bar">
                        <strong>Version : </strong> 10.0.0
                    </div>
                    <div class="bar">
                        <strong>Build # : </strong> 2
                    </div>
                    <div class="bar">
                        April 23, 2023
                    </div>
                    <div class="bar">
                        <strong>Licensed to : </strong> Life Link Digital
                    </div>
                    <div class="bar">
                        <strong>Environment : </strong> Master Demo Dev
                    </div>
                    <div class="bar">
                        <strong>Server : </strong> SCRRREVE3 (100.23.34.0)
                    </div>
                    <div class="copyright-bar">
                        <i class="fa-regular fa-copyright"></i>&nbsp;
                        Copyright 2023 Life Link Digital
                    </div>
                </div>

            </div>
        </div>
    </div>
