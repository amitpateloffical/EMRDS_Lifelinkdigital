{{--  @php
$role = Auth::guard('admin')->user()->id;

@endphp  --}}

@php
    $name = Auth::guard('admin')->user()->id;
    $role = DB::table('roles')
        ->where('id', $name)
        ->value('name');
@endphp
@extends('components.main')
@section('container')
    <style>
        #calendarTitle {
            display: none !important;
        }

        .highcharts-point.highcharts-null-point.highcharts-color-0.highcharts-name-maharashtra.highcharts-key-maharashtra {
            fill: #70bc7b !important;
        }

        .highcharts-point.highcharts-null-point.highcharts-color-0.highcharts-name-telangana.highcharts-key-telangana {
            fill: #fab32d !important;
        }

        .highcharts-title,
        .highcharts-credits {
            display: none !important;
        }

        #chart-list .map-container {
            position: relative;
        }

        #chart-list .map-labels {
            position: absolute;
            right: 0;
            top: 50%;
        }

        #chart-list .map-labels div {
            position: relative;
            padding-left: 20px;
        }

        #chart-list .map-labels div::after {
            position: absolute;
            left: 0;
            top: 50%;
            content: "";
            transform: translate(0, -50%);
            width: 10px;
            height: 10px;
        }

        #chart-list .map-labels div:nth-child(1)::after {
            background: #70bc7b !important;
        }

        #chart-list .map-labels div:nth-child(2)::after {
            background: #fab32d !important;
        }

        #chart-list-2 .fc-view-harness.fc-view-harness-active {
            height: 549.222px !important;
        }

        #chart-list-2 .fc-scrollgrid-sync-table {
            height: 517px !important;
        }

        #dashboard .chart-grid-new {
            padding: 0 1%;
            background: #fbfbfb;
            padding-bottom: 20px;
        }

        #dashboard .chart-grid-new-2 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        #dashboard .chart-grid-new-3 {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
        }

        #dashboard .chart-grid-new>div {
            border: 1px solid #ffffff;
            box-shadow: 1px 2px 3px 4px #eeeeee;
            background: white;
            padding: 0px;
        }

        /* =========================================employee-doctor-section=============================== */
        #employee-doctor-section {
            padding-top: 20px
        }

        #employee-doctor-section .card-employee {
            box-sizing: content-box;
            border: 2px solid rebeccapurple;
        }

        #employee-doctor-section .emp-name-list {
            padding: 20px;
            font-weight: 600;
        }

        #employee-doctor-section .list-img img {
            width: 50px;
            height: 50px;
            border-radius: 50%
        }

        #employee-doctor-section .card-list {
            box-sizing: border-box;
            border: 2px solid black;
            width: 70%;
            height: 70px;
            margin-left: 20px;
            padding-left: 15px;
            display: flex;
            gap: 105px;
            align-items: center;

        }

        #employee-doctor-section .list-data {
            display: flex;
            gap: 20px;
        }

        #employee-doctor-section .card-info {
            display: flex;
            align-items: center;
        }

        #employee-doctor-section .mid-box {
            display: flex;
            align-items: center;
        }

        #employee-doctor-section {}

        #employee-doctor-section {}

        #employee-doctor-section {}

        #employee-doctor-section {}

        #tooltip {
            position: relative;
            display: inline-block;
        }

        #tooltip #tooltiptext {
            visibility: hidden;
            width: 190%;
            background-color: rgb(120, 120, 120);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 28px 0px;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
        }

        #tooltip:hover #tooltiptext {
            visibility: visible;
        }
    </style>

    <div id="dashboard">
        <div class="container-fluid">
            <div class="dashboard-container">

                <div id="chart-list" class="row">
                    <div class="col-lg-12" id="chart-flow" style="margin-left: 0">
                        <h5>Overview</h5>
                        <div id="chart-list" class="hero_sec d-flex justify-content-center align-items-center row"
                            style=" padding-bottom: 17px">
                            <div class="container p-0">
                                <div class="row" style="width: 81%">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card bg-white rounded-4 p-2 mb-lg-0 mb-3"
                                            data-tor="inview:bg(primary) , hover:bg(danger)">
                                            <a href="/pagination">
                                                <div class="hstack gap-3">
                                                    <div class="p-2">
                                                        {{-- <h3 class="fs-6 text-black-50 lh-1">63</h3> --}}
                                                        <strong class="fs-5 lh-1" style="font-weight: 100">Pending
                                                            Records</strong>
                                                        <p class="fs-5 lh-1" style="padding-top: 20px; text-align: center">
                                                            15
                                                        </p>
                                                    </div>
                                                    <div class="p-2 ms-auto rounded-circle bg-primary badge"
                                                        style="width: 29%;">

                                                        <i class="fa-solid fa-hourglass-start fa-2xl color-white fs-5"
                                                            style="padding: 28px 0px;"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card bg-white rounded-4 p-2 mb-lg-0 mb-3">
                                            <a href="/pagination2">
                                                <div class="hstack gap-3">
                                                    <div class="p-2">
                                                        {{-- <h3 class="fs-6 text-black-50 lh-1">240</h3> --}}
                                                        <strong id="tooltip" class="fs-5 lh-1" style="font-weight: 100">PEMC Done
                                                            <span id="tooltiptext">Pre-Employment Medical Check-Up</span>
                                                        </strong>
                                                        <p class="fs-5 lh-1" style="padding-top: 20px; text-align: center">
                                                            20
                                                        </p>
                                                    </div>
                                                    <div class="p-2 ms-auto rounded-circle bg-success badge "
                                                        style="width: 29%">
                                                        <i class="fa-solid fa-check fa-2xl color-white fs-5 d-inline-block w-16"
                                                            style="padding: 28px 0px;"></i>
                                                        {{-- <i class="fa-solid fa-syringe color-white fs-5"></i> --}}

                                                        {{-- <i class="fa-solid fa-earth-asia color-white fs-5"></i> --}}
                                                    </div>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card bg-white rounded-4 p-2 mb-lg-0 mb-3" style="height: 83%">
                                            <a href="/pagination3">
                                                <div class="hstack gap-3">
                                                    <div class="p-2">
                                                        {{-- <h3 class="fs-6 text-black-50 lh-1">460</h3> --}}
                                                        <strong class="fs-5 lh-1" style="font-weight: 100">Records Assign To Me</strong>
                                                        <p class="fs-5 lh-1" style="padding-top: 20px; text-align: center">
                                                            25
                                                        </p>
                                                    </div>
                                                    <div class="p-2 ms-auto rounded-circle bg-info badge "
                                                        style="width: 34%;
                                                        margin-top: -20px;">
                                                        <i class="fa-regular fa-clipboard fa-2xl  color-white fs-5"
                                                            style="padding: 28px 0px;"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card bg-white rounded-4 p-2 mb-lg-0 mb-3" style="height: 83%">
                                            <a href="/pagination4">
                                                <div class="hstack gap-3">
                                                    <div class="p-2">
                                                        {{-- <h3 class="fs-6 text-black-50 lh-1"></h3> --}}
                                                        <strong class="fs-5 lh-1"
                                                            style="font-weight: 100; vertical-align: middle;">All Complete
                                                            Records</strong>
                                                        <p class="fs-5  lh-1" style="padding-top: 20px; text-align: center">
                                                            30
                                                        </p>
                                                    </div>
                                                    <div class="p-2 ms-auto rounded-circle bg-warning badge "
                                                        style="width: 34%;
                                                        margin-top: -20px;">
                                                        <i class="fa-regular fa-thumbs-up fa-2xl color-white fs-5"
                                                            style="padding: 28px 0px;"></i>
                                                        {{-- <i class="fa-solid fa-cart-shopping color-white fs-5"></i> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6"
                                        style=" margin-top: -137px;
                                    margin-left: 100%;">
                                        <div class="card bg-white rounded-4 p-2 mb-lg-0 mb-3">
                                            <a href="#">
                                                <div class="hstack gap-3">
                                                    <div class="p-2">
                                                        {{-- <h3 class="fs-6 text-black-50 lh-1"></h3> --}}
                                                        <strong class="fs-5 lh-1"
                                                            style="font-weight: 100">Notification</strong>
                                                        <p class="fs-5  lh-1" style="padding-top: 20px; text-align: center">
                                                            1
                                                        </p>
                                                    </div>
                                                    <div class="p-2 ms-auto rounded-circle bg-danger badge "
                                                        style="width: 29%">
                                                        <i class="fa-regular fa-bell fa-2xl color-white fs-5"
                                                            style="padding: 28px 0px"></i>
                                                        {{-- <i class="fa-solid fa-cart-shopping color-white fs-5"></i> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- ==============================employee&consultant================================== --}}


                <div id="chart-list" class="row">
                    <div id="chart-flow" class="col-lg-4">
                        <h5>Pre-Employment Medical Check-Up</h5>
                        <div id="chart-2"></div>
                    </div>
                    <div id="chart-flow" class="col-lg-4" style="width: 28%;">
                        <h5>Department Wise Dependency</h5>
                        <div id="chart-3" style="padding-top: 38px"></div>
                    </div>
                    <div id="chart-flow" class="col-lg-4">
                        <h5>Medical Officer Load Distribution</h5>
                        <div id="chart" style="padding-top: 38px"></div>
                    </div>
                </div>

                <div id="chart-list" class="row">
                    <div class="col-lg-6" id="chart-flow">
                        <h5>Health Status</h5>
                        <div id="line_top_x"></div>
                    </div>
                    <div class="col-lg-6" id="chart-flow" style="width: 46%">
                        <h5>Branches Report</h5>
                        <div id="branchchart"></div>
                    </div>
                </div>

                <div id="chart-list" class="row" style="gap: 36px;">
                    <div id="chart-flow" class="col-lg-5" style="margin-top: 20px">
                        <h5 class="text-center">Geographical Analysis</h5>
                        <div class="map-container">
                            <div id="container"></div>
                            <div class="map-labels">
                                <div>Maharashtra</div>
                                <!-- <div>Manjri, Pune</div> -->
                                <div>Hyderabad</div>
                                <!-- <div>BCG Manufacturing Unit, Karjat, Maharashtra</div> -->
                                <!-- <div>Czech Republic</div> -->
                            </div>
                        </div>
                    </div>
                    <div id="chart-list-2" class="col-lg-5" style="margin-top: 20px">
                        <div id='calendar'></div>
                    </div>
                </div>

                <div id="chart-list" class="row">
                    <div class="col-lg-3" id="chart-flow" style="width: 33%">
                        <h5>Pre-Employment Medical Check-Up Schedule For Manjri Site</h5>
                        <div id="healthchart"></div>
                    </div>
                    <div class="col-lg-3" id="chart-flow" style="width: 33%">
                        <h5>Pre-Employment Medical Check-Up Schedule Hadapsar</h5>
                        <div id="healthchart-1"></div>
                    </div>
                    <div class="col-lg-3" id="chart-flow" style="width: 29%">
                        <h5>Pre-Employment Medical Check-Up Schedule For Karjat Site</h5>
                        <div id="healthchart-2"></div>
                    </div>
                </div>

                <div id="chart-list" class="row">
                    <div class="col-lg-6" id="chart-flow" style="width: 50%">
                        <h5>Employee Health Report</h5>
                        <div id="fitchart"></div>
                    </div>
                    <div class="col-lg-6" id="chart-flow" style="width: 46%">
                        <h5>Employee Distribution</h5>
                        <div id="distributionchart" style="width:100%; max-width:600px; height:300px;"></div>
                    </div>
                </div>

                <div id="chart-list" class="row">
                    <div class="col-lg-4" id="chart-flow" style="width: 32%">
                        <h5>INCIDENTS BY SEVERITY</h5>
                        <div id="incidentchart-1"></div>
                    </div>
                    <div class="col-lg-4" id="chart-flow" style="width: 32%">
                        <h5>INCIDENTS RESULTS BY TYPE</h5>
                        <div id="incidentchart-2"></div>
                    </div>
                    <div class="col-lg-4" id="chart-flow" style="width: 31%">
                        <h5>INCIDENTS BY INJURY CONSEQUENCE</h5>
                        <div id="incidentchart-3"></div>
                    </div>
                </div>



                <div class="chart-grid-new row">
                    <div style="margin-top: 20px" class="col-lg-8">
                        <div id="plot-chart"></div>
                    </div>
                    <div style="margin-top: 20px" class="col-lg-4">
                        <h5
                            style="text-align: center;
                        margin-top: 30px;
                        font-weight: 100;">
                            Pending Records</h5>
                        <div id="pendingrecord" style="width:100%; max-width:600px; height:300px;"></div>
                    </div>
                </div>


                <div class="chart-grid-new chart-grid-new-3 row">
                    <div>
                        <div id="plot-chart-2"></div>
                    </div>
                    <div>
                        <div id="plot-chart-5"></div>
                    </div>
                </div>

                <div class="chart-grid-new chart-grid-new-2 row">
                    <div>
                        <div id="plot-chart-6"></div>
                    </div>
                    <div>
                        <div id="plot-chart-3"></div>
                    </div>
                    <div style="margin-left: -8px;">
                        <div id="plot-chart-4"></div>
                    </div>
                </div>

                <div id="chart-list" class="row">
                    <div id="chart-flow" class="col-lg-4">
                        <h5 class="text-center"> {{ $role }} Overdue Analysis</h5>
                        <div id="chart-4"></div>
                    </div>
                    <div id="chart-flow" class="col-lg-4">
                        <h5 class="text-center">
                            {{ $role }} Fit/Unfit Analysis

                        </h5>
                        <div id="chart-logo"></div>
                    </div>
                    <div id="chart-flow" class="col-lg-3" style="width: 28%;">
                        <h5 class="text-center"> {{ $role }} Record Description(Department Wise)</h5>
                        <div id="chart-logo-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var trace1 = {
            x: [2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022,
                2023
            ],
            y: [219, 146, 112, 127, 124, 180, 236, 207, 236, 263, 350, 430, 474, 526, 488, 537, 500, 439],
            name: 'Fit',
            marker: {
                color: 'rgb(55, 83, 109)'
            },
            type: 'bar'
        };

        var trace2 = {
            x: [2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022,
                2023
            ],
            y: [16, 13, 10, 11, 28, 37, 43, 55, 56, 88, 105, 156, 270, 299, 340, 403, 549, 499],
            name: 'Unfit',
            marker: {
                color: 'rgb(26, 118, 255)'
            },
            type: 'bar'
        };

        var plotData = [trace1, trace2];

        var plotLayout = {
            title: '{{ $role }} Unit Analysis',
            xaxis: {
                tickfont: {
                    size: 14,
                    color: 'rgb(107, 107, 107)'
                }
            },
            yaxis: {
                title: ' ',
                titlefont: {
                    size: 16,
                    color: 'rgb(107, 107, 107)'
                },
                tickfont: {
                    size: 14,
                    color: 'rgb(107, 107, 107)'
                }
            },
            legend: {
                x: 0,
                y: 1.0,
                bgcolor: 'rgba(255, 255, 255, 0)',
                bordercolor: 'rgba(255, 255, 255, 0)'
            },
            barmode: 'group',
            bargap: 0.15,
            bargroupgap: 0.1
        };

        Plotly.newPlot('plot-chart', plotData, plotLayout);
    </script>

    <script>
        d3.csv('https://raw.githubusercontent.com/plotly/datasets/master/api_docs/mt_bruno_elevation.csv', function(err,
            rows) {
            function unpack(rows, key) {
                return rows.map(function(row) {
                    return row[key];
                });
            }

            var z_data = []
            for (i = 0; i < 7; i++) {
                z_data.push(unpack(rows, i));
            }

            var data = [{
                z: z_data,
                type: 'surface'
            }];

            var layout = {
                title: 'Medical Officer Load',
                autosize: false,
                width: 500,
                height: 500,
                margin: {
                    l: 65,
                    r: 50,
                    b: 65,
                    t: 90,
                }
            };
            Plotly.newPlot('plot-chart-2', data, layout);
        });
    </script>

    <script>
        z1 = [
            [8.83, 8.89, 8.81, 8.87, 8.9, 8.87],
            [8.89, 8.94, 8.85, 8.94, 8.96, 8.92],
            [8.84, 8.9, 8.82, 8.92, 8.93, 8.91],
            [8.79, 8.85, 8.79, 8.9, 8.94, 8.92],
            [8.79, 8.88, 8.81, 8.9, 8.95, 8.92],
            [8.8, 8.82, 8.78, 8.91, 8.94, 8.92],
            [8.75, 8.78, 8.77, 8.91, 8.95, 8.92],
            [8.8, 8.8, 8.77, 8.91, 8.95, 8.94],
            [8.74, 8.81, 8.76, 8.93, 8.98, 8.99],
            [8.89, 8.99, 8.92, 9.1, 9.13, 9.11],
            [8.97, 8.97, 8.91, 9.09, 9.11, 9.11],
            [9.04, 9.08, 9.05, 9.25, 9.28, 9.27],
            [9, 9.01, 9, 9.2, 9.23, 9.2],
            [8.99, 8.99, 8.98, 9.18, 9.2, 9.19],
            [8.93, 8.97, 8.97, 9.18, 9.2, 9.18]
        ];
        z2 = [];
        for (var i = 0; i < z1.length; i++) {
            z2_row = [];
            for (var j = 0; j < z1[i].length; j++) {
                z2_row.push(z1[i][j] + 1);
            }
            z2.push(z2_row);
        }
        z3 = []
        for (var i = 0; i < z1.length; i++) {
            z3_row = [];
            for (var j = 0; j < z1[i].length; j++) {
                z3_row.push(z1[i][j] - 1);
            }
            z3.push(z3_row);
        }
        var data_z1 = {
            z: z1,
            type: 'surface'
        };
        var data_z2 = {
            z: z2,
            showscale: false,
            opacity: 0.9,
            type: 'surface'
        };
        var data_z3 = {
            z: z3,
            showscale: false,
            opacity: 0.9,
            type: 'surface'
        };
        var layout = {
            title: 'Site by Distribution',
        };
        Plotly.newPlot('plot-chart-3', [data_z1, data_z2, data_z3], layout);
    </script>

    <script>
        d3.csv('https://raw.githubusercontent.com/plotly/datasets/master/api_docs/mt_bruno_elevation.csv', function(err,
            rows) {
            function unpack(rows, key) {
                return rows.map(function(row) {
                    return row[key];
                });
            }
            var z_data = []
            for (i = 0; i < 24; i++) {
                z_data.push(unpack(rows, i));
            }

            var data = [{
                z: z_data,
                type: 'surface',
                contours: {
                    z: {
                        show: true,
                        usecolormap: true,
                        highlightcolor: "#42f462",
                        project: {
                            z: true
                        }
                    }
                }
            }];

            var layout = {
                title: 'Annual Health Check-up Distribution',
                scene: {
                    camera: {
                        eye: {
                            x: 1.87,
                            y: 0.88,
                            z: -0.64
                        }
                    }
                },
                autosize: false,
                width: 500,
                height: 500,
                margin: {
                    l: 65,
                    r: 50,
                    b: 65,
                    t: 90,
                }
            };
            Plotly.newPlot('plot-chart-4', data, layout);
        });
    </script>

    <script>
        d3.csv('https://raw.githubusercontent.com/plotly/datasets/master/volcano_db.csv', function(err, rows) {
            function unpack(rows, key) {
                return rows.map(function(row) {
                    return row[key];
                });
            }
            var plotTrace51 = {
                x: unpack(rows, 'Status'),
                y: unpack(rows, 'Type'),
                z: unpack(rows, 'Elev'),
                marker: {
                    size: 2,
                    color: unpack(rows, 'Elev'),
                    colorscale: 'Reds',
                    line: {
                        color: 'transparent'
                    }
                },
                mode: 'markers',
                type: 'scatter3d',
                text: unpack(rows, 'Country'),
                hoverinfo: 'x+y+z+text',
                showlegend: false
            };
            var x = unpack(rows, 'Elev');
            var plotTrace52 = {
                x: unpack(rows, 'Elev'),
                type: 'histogram',
                hoverinfo: 'x+y',
                showlegend: false,
                xaxis: 'x2',
                yaxis: 'y2',
                marker: {
                    color: 'rgb(26, 118, 255)'
                }
            };
            var plotTrace53 = {
                geo: 'geo3',
                type: 'scattergeo',
                locationmode: 'world',
                lon: unpack(rows, 'Longitude'),
                lat: unpack(rows, 'Latitude'),
                hoverinfo: 'text',
                text: unpack(rows, 'Elev'),
                mode: 'markers',
                showlegend: false,
                marker: {
                    size: 4,
                    color: unpack(rows, 'Elev'),
                    colorscale: 'Reds',
                    opacity: 0.8,
                    symbol: 'circle',
                    line: {
                        width: 1
                    }
                }
            };
            var plotData5 = [plotTrace51, plotTrace52, plotTrace53];
            var plotLayout5 = {
                paper_bgcolor: 'white',
                bargap: 0.25,
                plot_bgcolor: 'white',
                title: 'Status Distribution',
                font: {
                    color: 'black'
                },
                colorbar: true,
                annotations: [{
                    x: 0,
                    y: 0,
                    xref: 'paper',
                    yref: 'paper',
                    text: ' ',
                    showarrow: false
                }],
                geo3: {
                    domain: {
                        x: [0, 0.45],
                        y: [0.02, 0.98]
                    },
                    scope: 'world',
                    projection: {
                        type: 'orthographic'
                    },
                    showland: true,
                    showocean: true,
                    showlakes: true,
                    landcolor: 'rgb(55, 83, 109)',
                    lakecolor: 'rgb(127,205,255)',
                    oceancolor: 'rgb(6,66,115)',
                    subunitcolor: 'rgb(217,217,217)',
                    countrycolor: 'rgb(217,217,217)',
                    countrywidth: 0.5,
                    subunitwidth: 0.5,
                    bgcolor: 'white'
                },
                scene: {
                    domain: {
                        x: [0.55, 1],
                        y: [0, 0.6]
                    },
                    xaxis: {
                        title: 'Status',
                        showticklabels: false,
                        showgrid: true,
                        gridcolor: 'black'
                    },
                    yaxis: {
                        title: 'Type',
                        showticklabels: false,
                        showgrid: true,
                        gridcolor: 'black'
                    },
                    zaxis: {
                        title: 'Elev',
                        showgrid: true,
                        gridcolor: 'black'
                    }
                },
                yaxis2: {
                    anchor: 'x2',
                    domain: [0.7, 1],
                    showgrid: false
                },
                xaxis2: {
                    tickangle: 45,
                    anchor: 'y2',
                    ticksuffix: 'm',
                    domain: [0.6, 1]
                },
            };
            Plotly.newPlot("plot-chart-5", plotData5, plotLayout5, {
                showLink: false
            });
        });
    </script>

    <script>
        var xData = ['Carmelo<br>Anthony', 'Dwyane<br>Wade',
            'Deron<br>Williams', 'Brook<br>Lopez',
            'Damian<br>Lillard', 'David<br>West',
            'Blake<br>Griffin', 'David<br>Lee',
            'Demar<br>Derozan'
        ];

        function getrandom(num, mul) {
            var value = [];
            for (i = 0; i <= num; i++) {
                var rand = Math.random() * mul;
                value.push(rand);
            }
            return value;
        }

        var yData = [
            getrandom(30, 10),
            getrandom(30, 20),
            getrandom(30, 25),
            getrandom(30, 40),
            getrandom(30, 45),
            getrandom(30, 30),
            getrandom(30, 20),
            getrandom(30, 15),
            getrandom(30, 43),
        ];
        var colors = ['rgba(93, 164, 214, 0.5)', 'rgba(255, 144, 14, 0.5)', 'rgba(44, 160, 101, 0.5)',
            'rgba(255, 65, 54, 0.5)', 'rgba(207, 114, 255, 0.5)', 'rgba(127, 96, 0, 0.5)', 'rgba(255, 140, 184, 0.5)',
            'rgba(79, 90, 117, 0.5)', 'rgba(222, 223, 0, 0.5)'
        ];
        var plotData6 = [];
        for (var i = 0; i < xData.length; i++) {
            var result = {
                type: 'box',
                y: yData[i],
                name: xData[i],
                boxpoints: 'all',
                jitter: 0.5,
                whiskerwidth: 0.2,
                fillcolor: 'cls',
                marker: {
                    size: 2
                },
                line: {
                    width: 1
                }
            };
            plotData6.push(result);
        };
        plotLayout6 = {
            title: 'Points Scored by the Top 9 Medical Officer in 2023',
            yaxis: {
                autorange: true,
                showgrid: true,
                zeroline: true,
                dtick: 5,
                gridcolor: 'rgb(255, 255, 255)',
                gridwidth: 1,
                zerolinecolor: 'rgb(255, 255, 255)',
                zerolinewidth: 2
            },
            margin: {
                l: 40,
                r: 30,
                b: 80,
                t: 100
            },
            paper_bgcolor: 'white',
            plot_bgcolor: 'white',
            showlegend: false
        };
        Plotly.newPlot('plot-chart-6', plotData6, plotLayout6);
    </script>
@endsection
