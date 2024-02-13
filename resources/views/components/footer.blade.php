{{-- ======================================
            ADVANCED SEARCH MODAL
======================================= --}}
<div class="modal modal-lg fade" id="advanced-search">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Advanced Search</h4>
            </div>
            <form action="{{ url('advanceSearch') }}" method="get">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="advanced-table">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Operator</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="select-option" name="field[]">
                                            <option value="document_name">Document Name</option>
                                            <option value="short_description">Short Description</option>
                                            option value="short_description">Keywords</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="select-option" name="operator">
                                            <option value="contains">Contains</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="value[]" class="text-input">
                                    </td>
                                    <td>
                                        <button class="deleteBtn" onclick="deleteRow(this)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" onclick="addRow()">Add Row</button>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p> <a href="https://venturingdigitally.com/">Veturing Digitally</a></p>
                    <button type="submit">Search</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>





{{-- ======================================
              SCRIPT TAGS
======================================= --}}
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('user/js/index.js') }}"></script>
<script src="{{ asset('user/js/validate.js') }}"></script>
<script src="{{ asset('assets/js/countrystate.js') }}"></script>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>


<script>
    var header = {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        "Access-Control-Allow-Credentials": true,
    };

    function addRow() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(-1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        var select1 = document.createElement("select");
        select1.className = "select-option";
        select1.name = "field";
        var option1 = document.createElement("option");
        option1.text = "Document Name";
        var option2 = document.createElement("option");
        option2.text = "Short Description";
        select1.appendChild(option1);
        select1.appendChild(option2);
        cell1.appendChild(select1);

        var select2 = document.createElement("select");
        select2.className = "select-option";
        select2.name = "operator";
        var optionA = document.createElement("option");
        optionA.text = "Contains";
        select2.appendChild(optionA);
        cell2.appendChild(select2);

        var input = document.createElement("input");
        input.type = "text";
        input.name = "value[]";
        input.className = "text-input";
        cell3.appendChild(input);

        var deleteBtn = document.createElement("button");
        deleteBtn.className = "deleteBtn";
        deleteBtn.innerHTML = "Delete";
        deleteBtn.onclick = function() {
            deleteRow(this);
        };
        cell4.appendChild(deleteBtn);
    }

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }





    const commentSections = $('.comment');
    commentSections.each(function() {
        const inputField = $(this).find('.input-field');
        const timestamp = $(this).find('.timestamp');
        const button = $(this).find('.button');

        button.on('click', function() {
            timestamp.show();
            inputField.show();
            button.hide();
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.filter-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function(e) {
                const targetId = e.target.dataset.target;
                const targetElement = document.getElementById(targetId);

                if (e.target.checked) {
                    targetElement.style.display = 'block';
                } else {
                    targetElement.style.display = 'none';
                }
            });
        });
    });


    $(document).ready(function() {
        $('#tms-all-block').show();
        $('input[type=radio][name=dash-tabs]').change(function() {
            $('input[type=radio][name=dash-tabs]').change(function() {
                if (this.checked) {
                    var target = $(this).data('target');
                    $('.tms-block').hide();
                    $('#' + target).show();
                    $('.tab-btn').removeClass('active');
                    $(this).closest('.tab-btn').addClass('active');
                }
            });
        });
    });


    $(document).ready(function() {
        // $('#canDetailbtn').click(function(e) {

        //     function generateTableRow(serialNumber) {
        //         var html =
        //             '<tr>' +
        //             '<td><input type="text" value="' + serialNumber + '"></td>' +
        //             '<td><input type="text" ></td>' +
        //             '<td><input type="date" id="txtDate" ></td>' +
        //             '<td><select><option>Male</option><option>Female</option></select></td>' +
        //             '<td><select><option>QA</option><option>QC</option><option>RA</option></select></td>' +
        //             '</tr>';
        //         return html;
        //     }
        //     var tableBody = $('#can-detail tbody');
        //     var rowCount = tableBody.children('tr').length;
        //     var newRow = generateTableRow(rowCount + 1);
        //     tableBody.append(newRow);
        // });

        $('#preDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><input type="text" name="abnormal_finding[]"></td>'+
                    '<td><input type="text" name="abnormal_comment[]"></td>' +
                    '<td><select name="pre_imployement_physicalExam[]"><option>Select</option><option>Satifactory</option><option>Not Satifactory</option></select></td>' +
                    '<td><select name="Followup_action[]"><option>Select</option><option>Yes</option><option>No</option></select></td>' +
                    '<td><input type="text" name="Followup_Comment[]"></td>' +
                    '<td><input type="date" name="Followup_dueDate[]"></td>' +
                    '</tr>';
                return html;
            }
            var tableBody = $('#pre-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });

        $('#ohcDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><select><option>Select</option><option>Fit</option><option>Unfit</option></select></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +
                    '</tr>';
                return html;
            }
            var tableBody = $('#ohc-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });

        $('#nurDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="number"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="file"></td>' +
                    '</tr>';
                return html;
            }
            var tableBody = $('#nur-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });


        $('#DataDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +

                    '</tr>';
                return html;
            }
            var tableBody = $('#Data-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });


        $('#emp-venDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +

                    '</tr>';
                return html;
            }
            var tableBody = $('#emp-ven-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });

        $('#medDetailbtn').click(function(e) {

            function generateTableRow(serialNumber) {
                var html =
                    '<tr>' +
                    '<td><input type="text" value="' + serialNumber + '"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +
                    '<td><input type="text"></td>' +

                    '</tr>';
                return html;
            }
            var tableBody = $('#med-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });

        $('#empDetailbtn').click(function(e) {

            function generateTableRow() {
                var html =
                    '<tr>' +
                    '<td> <select><option>Select</option><option >Completed</option><option>Not Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="text" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><select><option>Completed</option><option>Not-Completed</option></select></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +
                    '<td><input type="date" id="txtDate" ></td>' +

                    '</tr>';
                return html;
            }
            var tableBody = $('#emp-detail tbody');
            var rowCount = tableBody.children('tr').length;
            var newRow = generateTableRow(rowCount + 1);
            tableBody.append(newRow);
        });

        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#txtDate').attr('min', minDate);
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
    document.querySelector("#next_review_date").addEventListener("click", function() {
        var effectveDate = document.querySelector("#effectve_date").value;
        var years = Number(document.querySelector("#review_period").value);
        var dueDateElement = document.querySelector("#next_review_date");

        if (!isNaN(years) && effectveDate.length) {
            effectveDate = effectveDate.split("-");
            effectveDate = new Date(effectveDate[0], effectveDate[1] - 1, effectveDate[2]);
            effectveDate.setFullYear(effectveDate.getFullYear() + years);
            dueDateElement.valueAsDate = null;
            dueDateElement.valueAsDate = effectveDate;
        }
    });
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    var options = {
        series: [44, 55, 13, 43, 22, ],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['PREMC', 'PMC', 'AHC', 'VE', 'ETE'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
            name: 'Fit',
            data: [76, 85, 101, 98, 87, 58, 63, 60, 66]
        }, {
            name: 'Unfit',
            data: [44, 55, 57, 56, 66, 105, 91, 114, 94]
        }, {
            name: 'Hold',
            data: [30, 40, 36, 26, 45, 48, 52, 53, 41]
        }],
        chart: {
            type: 'bar',
            height: 350,
            yaxis: {
                labels: {
                    style: {
                        fontSize: '20px' // Set the desired font size here
                    }
                }
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
            },
        },
        colors: ['#008000', '#FF0000', '#FFFF00'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-2"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
            type: 'donut',
        },
        labels: ['CXTE', 'EMCE', 'BWR', 'FAFAB', 'TMC'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart-3"), options);
    chart.render();
</script>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 37.7749,
                lng: -122.4194
            },
            zoom: 12
        });

        // You can add markers, polygons, and other map features here
    }
</script>

<script>
    var data = [
        ['in-an', 0],
        ['in-wb', 1],
        ['in-ld', 2],
        ['in-5390', 3],
        ['in-py', 4],
        ['in-3464', 5],
        ['in-mz', 6],
        ['in-as', 7],
        ['in-pb', 8],
        ['in-ga', 9],
        ['in-2984', 10],
        ['in-jk', 11],
        ['in-hr', 12],
        ['in-nl', 13],
        ['in-mn', 14],
        ['in-tr', 15],
        ['in-mp', 16],
        ['in-ct', 17],
        ['in-ar', 18],
        ['in-ml', 19],
        ['in-kl', 20],
        ['in-tn', 21],
        ['in-ap', 22],
        ['in-ka', 23],
        ['in-mh', 24],
        ['in-or', 25],
        ['in-dn', 26],
        ['in-dl', 27],
        ['in-hp', 28],
        ['in-rj', 29],
        ['in-up', 30],
        ['in-ut', 31],
        ['in-jh', 32],
        ['in-ch', 33],
        ['in-br', 34],
        ['in-sk', 35]
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: 'countries/in/custom/in-all-disputed'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series: [{
            "type": "map",
            "joinBy": ['name', 'name'], // <- mapping 'name' in data to 'name' in mapData
            "data": [{
                "name": "Status1-CurrentPeriod",
                "path": "M0,-695,0,-682C1,-682,2,-683,3,-683,15,-683,25,-672,25,-658,25,-645,15,-634,3,-634,2,-634,1,-634,1,-634L1,-622,108,-622,107,-694,0,-695z",
                "value": 6 // <-- here's a numerical value for this path
            }]

        }]
    });
</script>

<script>
    var options = {
        series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
        chart: {
            type: 'polarArea',
        },
        labels: ['PREMC', 'PMC', 'AHC', 'VE', 'ETE', 'HBPHC', 'AMR', 'CXTE', 'BWR'],
        stroke: {
            colors: ['#fff']
        },
        fill: {
            opacity: 0.8
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#chart-4"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [44, 55, 67, 83],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function(w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249
                        }
                    }
                }
            }
        },
        labels: ['Close Record', 'Fit', 'Total Record', 'Unfit '],
    };

    var chart = new ApexCharts(document.querySelector("#chart-logo"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [42, 47, 52, 58, 65],
        chart: {
            width: 380,
            type: 'polarArea'
        },
        labels: ['SIIPL', 'OPD', 'MCVA', 'TMC', 'FORM No-7'],
        fill: {
            opacity: 1
        },
        stroke: {
            width: 1,
            colors: undefined
        },
        yaxis: {
            show: false
        },
        legend: {
            position: 'bottom'
        },
        plotOptions: {
            polarArea: {
                rings: {
                    strokeWidth: 0
                },
                spokes: {
                    strokeWidth: 0
                },
            }
        },
        theme: {
            monochrome: {
                enabled: true,
                shadeTo: 'light',
                shadeIntensity: 0.6
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-logo-2"), options);
    chart.render();
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth', // Default view
            views: {
                month: { // Month view
                    type: 'dayGridMonth',
                    duration: {
                        months: 1
                    } // Number of months to show
                },
                week: { // Week view
                    type: 'timeGridWeek',
                    duration: {
                        weeks: 1
                    } // Number of weeks to show
                },
                day: { // Day view
                    type: 'timeGridDay',
                    duration: {
                        days: 1
                    } // Number of days to show
                }
            },
            eventContent: function(arg) {
                var eventTitle = arg.event.title;
                var personName = arg.event.extendedProps.personName;
                var content = document.createElement('div');
                content.classList.add('event-content');
                content.style.margin = '5px';
                content.style.padding = '5px';
               
                
                content.innerHTML = '<div class="event-title">' + eventTitle + '</div>' +
                    '<div class="person-name">' + personName + '</div>';
                return {
                    domNodes: [content]
                };
            },
            eventBackgroundColor: 'blue',
            events: [{
                    title: 'Pre-Employment Medical Check-Up',
                    start: '2023-10-04',
                    end: '2023-10-04',
                    color: 'green',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Rajesh'
                    }
                },
                {
                    title: 'Eye Test',
                    start: '2023-10-10',
                    end: '2023-10-05',
                    color: 'blue',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'John'
                    }
                },
                {
                    title: 'Annual Health Check-Up',
                    start: '2023-10-19',
                    end: '2023-10-06',
                    color: 'red',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Sanjana'
                    }
                },
                {
                    title: 'Chest X-ray',
                    start: '2023-10-31',
                    end: '2023-10-07',
                    color: 'purple',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Roshani'
                    }
                },
                {
                    title: 'Vaccination',
                    start: '2023-10-23',
                    end: '2023-10-08',
                    color: 'orange',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Mohan'
                    }
                },

                {
                    title: 'Trainee Medical Check-Up',
                    start: '2023-10-13',
                    end: '2023-10-08',
                    color: 'black',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Sanjay'
                    }
                },

                {
                    title: 'Hep-B Periodic Check-Up',
                    start: '2023-10-28',
                    end: '2023-10-08',
                    color: 'gray',
                    textColor: 'white',
                    extendedProps: {
                        personName: 'Mukesh'
                    }
                },
            ]
        });

        calendar.render();
    });
</script>


<script>
    function showPDF(pdfSrc) {
        const pdfEmbed = document.getElementById("pdfEmbed");
        const pdfContainer = document.getElementById("pdfContainer");

        pdfEmbed.src = pdfSrc;
        pdfContainer.style.display = "block";
    }

    window.addEventListener("load", function() {
        const pdfEmbed = document.getElementById("pdfEmbed");
        const pdfContainer = document.getElementById("pdfContainer");

        // PDF ko dikhao
        pdfEmbed.style.display = "block";
        pdfContainer.style.display = "block";
    });
</script>

{{-- ------------------chart js-------------------- --}}

<script>
    var options = {
        series: [{
                name: 'Vaccination',
                data: [40, 40, 40, 40, 35, 35, 35],
                color: '#00008B'
            }, {
                name: 'Eye Test',
                data: [50, 50, 50, 50, 40, 40, 40],
                color: '#a52a2a'
            },
            {
                name: 'Chest X-ray',
                data: [60, 60, 60, 60, 45, 45, 45],
                color: '#a9a9a9'
            },
            {
                name: 'Hep-B',
                data: [70, 70, 70, 70, 50, 50, 50],
                color: '#ffa500'
            },
            {
                name: 'Lipid Profile',
                data: [80, 80, 80, 55, 55, 55, 55],
                color: '#483d8b'
            },
            {
                name: 'Renal Profile',
                data: [90, 90, 90, 60, 60, 60],
                color: '#008000'
            },
            {
                name: 'Cardiac Profile',
                data: [100, 100, 100, 65, 65, 65, 65],
                color: '#121254'
            },

            {
                name: 'Blood Test',
                data: [105, 105, 105, 70, 70, 70, 70],
                color: '#811818'
            }
        ],
        chart: {
            type: 'bar',
            height: 350,

        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                endingShape: 'rounded',
                group: 'series',
            }

        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Amit', 'Saleen', 'Pankaj', 'Rahul', 'Vikash', 'Prakash',
                'Ranjeet'
            ],

        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    if (value === 1) {
                        return '01-Oct-2023'; // Format for the first value (assuming 1 represents October 1, 2023)
                    } else if (value === 15) {
                        return '15-Oct-2023'; // Format for the 15th value
                    } else if (value === 31) {
                        return '31-Oct-2023'; // Format for the 31st value
                    } else {
                        // Convert numerical values to dates and format them
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ];
                        const day = value % 31; // Get the day value (assuming a maximum of 31 days)
                        const monthIndex = Math.floor(value / 31) % 12; // Get the month index (0 to 11)
                        const year = 2023; // Assuming the year is 2023

                        return `${day < 10 ? '0' : ''}${day}-${months[monthIndex]}-${year}`;
                    }
                }
            },

        },

        fill: {
            opacity: 1,
            colors: ['#00008B', '#a52a2a', '#a9a9a9', '#ffa500', '#483d8b', '#008000',
                '#121254', '#811818'
            ] // Custom colors for the columns
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }


    };

    var chart = new ApexCharts(document.querySelector("#healthchart"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
                name: 'Vaccination',
                data: [35, 35, 35, 40, 48, 35, 35],
                color: '#00008B'
            }, {
                name: 'Eye Test',
                data: [40, 40, 40, 45, 58, 40, 40],
                color: '#a52a2a'
            },
            {
                name: 'Chest X-ray',
                data: [45, 45, 45, 50, 68, 45, 45],
                color: '#a9a9a9'
            },
            {
                name: 'Hep-B',
                data: [50, 55, 55, 55, 78, 50, 50],
                color: '#ffa500'
            },
            {
                name: 'Lipid Profile',
                data: [55, 55, 55, 60, 88, 55, 55],
                color: '#483d8b'
            },
            {
                name: 'Renal Profile',
                data: [60, 60, 60, 65, 98, 60, 60],
                color: '#008000'
            },
            {
                name: 'Cardiac Profile',
                data: [65, 65, 65, 70, 100, 65, 65],
                color: '#121254'
            },

            {
                name: 'Blood Test',
                data: [70, 70, 70, 75, 105, 70, 70],
                color: '#811818'
            }
        ],
        chart: {
            type: 'bar',
            height: 350,

        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                endingShape: 'rounded',
                group: 'series',
            }

        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Amit', 'Saleen', 'Satish', 'Ranjan', 'Vikash', 'Prakash',
                'Ranjeet'
            ],

        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    if (value === 1) {
                        return '01-Oct-2023'; // Format for the first value (assuming 1 represents October 1, 2023)
                    } else if (value === 15) {
                        return '15-Oct-2023'; // Format for the 15th value
                    } else if (value === 31) {
                        return '31-Oct-2023'; // Format for the 31st value
                    } else {
                        // Convert numerical values to dates and format them
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ];
                        const day = value % 31; // Get the day value (assuming a maximum of 31 days)
                        const monthIndex = Math.floor(value / 31) % 12; // Get the month index (0 to 11)
                        const year = 2023; // Assuming the year is 2023

                        return `${day < 10 ? '0' : ''}${day}-${months[monthIndex]}-${year}`;
                    }
                }
            },

        },

        fill: {
            opacity: 1,
            colors: ['#00008B', '#a52a2a', '#a9a9a9', '#ffa500', '#483d8b', '#008000',
                '#121254', '#811818'
            ] // Custom colors for the columns
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }


    };

    var chart = new ApexCharts(document.querySelector("#healthchart-1"), options);
    chart.render();
</script>


<script>
    var options = {
        series: [{
                name: 'Vaccination',
                data: [50, 60, 70, 30, 35, 35, ],
                color: '#00008B'
            }, {
                name: 'Eye Test',
                data: [55, 65, 75, 35, 40, 40, ],
                color: '#a52a2a'
            },
            {
                name: 'Chest X-ray',
                data: [60, 70, 80, 40, 45, 45, ],
                color: '#a9a9a9'
            },
            {
                name: 'Hep-B',
                data: [65, 75, 85, 50, 50, 50, ],
                color: '#ffa500'
            },
            {
                name: 'Lipid Profile',
                data: [70, 80, 90, 55, 55, 55, ],
                color: '#483d8b'
            },
            {
                name: 'Renal Profile',
                data: [75, 90, 95, 60, 60, 60, ],
                color: '#008000'
            },
            {
                name: 'Cardiac Profile',
                data: [80, 95, 100, 65, 65, 65, ],
                color: '#121254'
            },

            {
                name: 'Blood Test',
                data: [85, 100, 105, 70, 70, 70, ],
                color: '#811818'
            }
        ],
        chart: {
            type: 'bar',
            height: 350,

        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                endingShape: 'rounded',
                group: 'series',
            }

        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Mukesh', 'Pankaj', 'Rahul', 'Vikash', 'Prakash',
                'Ranjeet'
            ],

        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    if (value === 1) {
                        return '01-Oct-2023'; // Format for the first value (assuming 1 represents October 1, 2023)
                    } else if (value === 15) {
                        return '15-Oct-2023'; // Format for the 15th value
                    } else if (value === 31) {
                        return '31-Oct-2023'; // Format for the 31st value
                    } else {
                        // Convert numerical values to dates and format them
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ];
                        const day = value % 31; // Get the day value (assuming a maximum of 31 days)
                        const monthIndex = Math.floor(value / 31) % 12; // Get the month index (0 to 11)
                        const year = 2023; // Assuming the year is 2023

                        return `${day < 10 ? '0' : ''}${day}-${months[monthIndex]}-${year}`;
                    }
                }
            },

        },

        fill: {
            opacity: 1,
            colors: ['#00008B', '#a52a2a', '#a9a9a9', '#ffa500', '#483d8b', '#008000',
                '#121254', '#811818'
            ] // Custom colors for the columns
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }


    };

    var chart = new ApexCharts(document.querySelector("#healthchart-2"), options);
    chart.render();
</script>


<script>
    var options = {
        series: [{
            data: [44, 55, 41, 64]
        }],
        chart: {
            type: 'bar',
            height: 350,
        },
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            categories: ['Critical', 'High', 'Medium', 'Low', ],
        },
        colors: ['#22c3bb'],
    };

    var chart = new ApexCharts(document.querySelector("#incidentchart-1"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
            data: [20, 25, 30, 23, 22]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            categories: ['Near Miss', 'Harassment', 'Psychological', 'Illness', 'Injury'],
        },
        colors: ['#e6c300'],
    };

    var chart = new ApexCharts(document.querySelector("#incidentchart-2"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
            data: [15, 20, 10, 25]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            categories: ['No Treatment', 'First Aid', 'Medical Care', 'Lost Time'],
        },
        colors: ['#4e5965'],
    };

    var chart = new ApexCharts(document.querySelector("#incidentchart-3"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
            name: 'Unfit',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
            color: '#ff0000'
        }, {
            name: 'Fit',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
            color: '#009900'
        }, {
            name: 'At To Be Decided',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
            color: '#ffff00'
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        // yaxis: {
        //     title: {
        //         text: '$ (thousands)'
        //     }
        // },
        fill: {
            opacity: 1,
            colors: ['#ff0000', '#009900', '#ffff00']
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + "thousands"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#fitchart"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [41, 17, 15],
        labels: ['Unfit', 'Fit', 'Add To Be Decided'],
        chart: {
            width: 500,
            type: 'donut',
        },
        colors: ['#ff0000', '#009900', '#ffff00'],
        plotOptions: {
            pie: {
                startAngle: -90,
                endAngle: 270
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'gradient',
        },
        legend: {
            formatter: function(val, opts) {
                return val + " - " + opts.w.globals.series[opts.seriesIndex]
            },
            fontSize: '14px',
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#fitchart-1"), options);
    chart.render();
</script>


<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            ['Pune, Maharashtra', 54.8],
            ['Manjri, pune', 48.6],
            ['Jeedimetla, Hyderabad', 44.4],
            ['Karjat, Maharashtra', 23.9],
            ['Czech Republic', 14.5]
        ]);

        // Set Options
        const options = {
            title: 'World Wide Employee Distribution',
            is3D: true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('distributionchart'));
        chart.draw(data, options);

    }
</script>


{{-- <script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {
        'packages': ['map'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    });
    google.charts.setOnLoadCallback(drawMap);

    function drawMap() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Address');
        data.addColumn('string', 'Location');

        data.addRows([
            ['Lake Buena Vista, FL 32830, United States', 'Walt Disney World'],
            ['6000 Universal Boulevard, Orlando, FL 32819, United States', 'Universal Studios'],
            ['7007 Sea World Drive, Orlando, FL 32821, United States', 'Seaworld Orlando']
        ]);

        var options = {
            mapType: 'styledMap',
            zoomLevel: 12,
            showTooltip: true,
            showInfoWindow: true,
            useMapTypeControl: true,
            maps: {
                // Your custom mapTypeId holding custom map styles.
                styledMap: {
                    name: 'Styled Map', // This name will be displayed in the map type control.
                    styles: [{
                            featureType: 'poi.attraction',
                            stylers: [{
                                color: '#fce8b2'
                            }]
                        },
                        {
                            featureType: 'road.highway',
                            stylers: [{
                                hue: '#0277bd'
                            }, {
                                saturation: -50
                            }]
                        },
                        {
                            featureType: 'road.highway',
                            elementType: 'labels.icon',
                            stylers: [{
                                hue: '#000'
                            }, {
                                saturation: 100
                            }, {
                                lightness: 50
                            }]
                        },
                        {
                            featureType: 'landscape',
                            stylers: [{
                                hue: '#259b24'
                            }, {
                                saturation: 10
                            }, {
                                lightness: -22
                            }]
                        }
                    ]
                }
            }
        };

        var map = new google.visualization.Map(document.getElementById('map_div'));

        map.draw(data, options);
    }
</script> --}}

<script>
    var options = {
        series: [76, 67, 61, 90],
        chart: {
            height: 390,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                }
            }
        },
        colors: ['#008000', '#b30000', '#b3b300', '#4e5965'],
        labels: ['Pune, Maharashtra', 'Manjri, Pune', 'Czech Republic', 'Kajrat, Maharashtra'],
        legend: {
            show: true,
            floating: true,
            fontSize: '16px',
            position: 'left',
            // offsetX: 160,
            offsetY: 15,
            labels: {
                useSeriesColors: true,
            },
            markers: {
                size: 0
            },
            formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
            },
            itemMargin: {
                vertical: 3
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#branchchart"), options);
    chart.render();
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Total Spent', 11],
            ['Received', 7]
        ]);

        var options = {
            title: 'My Daily Activities',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('hospitalchart'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['line']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Day');
        data.addColumn('number', 'Fit');
        data.addColumn('number', 'Unfit');
        data.addColumn('number', 'At to be decided');

        data.addRows([
            [1, 37.8, 80.8, 41.8],
            [2, 30.9, 69.5, 32.4],
            [3, 25.4, 57, 25.7],
            [4, 11.7, 18.8, 10.5],
            [5, 11.9, 17.6, 10.4],
            [6, 8.8, 13.6, 7.7],
            [7, 7.6, 12.3, 9.6],
            [8, 12.3, 29.2, 10.6],
            [9, 16.9, 42.9, 14.8],
            [10, 12.8, 30.9, 11.6],
            [11, 5.3, 7.9, 4.7],
            [12, 6.6, 8.4, 5.2],
            [13, 4.8, 6.3, 3.6],
            [14, 4.2, 6.2, 3.4]
        ]);

        var options = {
            chart: {
                title: '',
                subtitle: ''
            },
            width: 700,
            height: 500,
            axes: {
                x: {
                    0: {
                        side: 'top'
                    }
                }
            },
            colors: ['#008000', '#ff0000', '#ffff00']
        };

        var chart = new google.charts.Line(document.getElementById('line_top_x'));

        chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script>
<script>
    const dataSet = [
        [' 0001', '056781', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0002', '056782', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sandhya Prajapati', '2002-Jul-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 04:25', 'Confirm'
        ],
        [' 0003', '056783', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nikhil Sharma', '1992-Aug-24', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '16-Oct-2023 04:30', 'Confirm'
        ],
        [' 0004', '056784', 'Pune, Maharashtra', ' 2023-Agu-12', 'Manish Malviya', '1996-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '16-Oct-2023 05:25', 'Confirm'
        ],
        [' 0005', '056785', 'Pune, Maharashtra', ' 2023-Agu-12', 'Radhika Visvakarma', '1994-jun-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '17-Oct-2023 03:00', 'Confirm'
        ],
        [' 0006', '056786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nilesh Birla', '2000-Apr-01', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '17-Oct-2023 04:45', 'Confirm'
        ],
        [' 0007', '056787', 'Pune, Maharashtra', ' 2023-Agu-12', 'Shivam Patel', '1997-Mar-30', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 02:15', 'Confirm'
        ],
        [' 0008', '056788', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pankaj Kumar', '1990-Jul-29', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 03:25', 'Confirm'
        ],
        [' 0009', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Anamika Gupta', '2000-Aug-02', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 04:25', 'Confirm'
        ],
        [' 0010', '056780', 'Pune, Maharashtra', ' 2023-Agu-12', 'Kajal Jain', '2003-Feb-14', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 05:25', 'Confirm'
        ],
        [' 0011', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Mishra', '2001-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0012', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Aastha Pandey', '2001-Aug-18', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0013', '0566786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Swati Rajpoot', '2001-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0014', '056684', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pavan Jain', '2000-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0015', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Veerendra Mishra', '1999-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0016', '056687', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sadhna Patel', '2002-Apr-19', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0017', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Khushi Visvakarma', '2004-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0018', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Keshav patel', '2000-Sep-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0019', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Julee Prajapati', '2000-Aug-13',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0020', '056289', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0021', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0022', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0023', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0024', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0025', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0026', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0027', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0028', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0029', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0030', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0031', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0032', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0033', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0034', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0035', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0036', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0037', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0038', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0039', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
        [' 0040', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Confirm'
        ],
    ];

    new DataTable('#example', {
        columns: [{
                title: 'Record'
            },
            {
                title: 'Parent ID'
            },
            {
                title: 'Site'
            },
            {
                title: 'Due Date'
            },
            {
                title: 'Employee Name'
            },
            {
                title: 'DOB'
            },
            {
                title: 'Medical Officer'
            },
            {
                title: 'Purpose'
            },
            {
                title: 'Date of Initiation'
            },
            {
                title: 'Status'
            },

        ],
        data: dataSet
    });
</script>

<script>
    const newdataSet = [
        [' 0001', '056781', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0002', '056782', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sandhya Prajapati', '2002-Jul-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 04:25', 'AHC Done'
        ],
        [' 0003', '056783', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nikhil Sharma', '1992-Aug-24', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '16-Oct-2023 04:30', 'AHC Done'
        ],
        [' 0004', '056784', 'Pune, Maharashtra', ' 2023-Agu-12', 'Manish Malviya', '1996-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '16-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0005', '056785', 'Pune, Maharashtra', ' 2023-Agu-12', 'Radhika Visvakarma', '1994-jun-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '17-Oct-2023 03:00', 'AHC Done'
        ],
        [' 0006', '056786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nilesh Birla', '2000-Apr-01', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '17-Oct-2023 04:45', 'AHC Done'
        ],
        [' 0007', '056787', 'Pune, Maharashtra', ' 2023-Agu-12', 'Shivam Patel', '1997-Mar-30', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 02:15', 'AHC Done'
        ],
        [' 0008', '056788', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pankaj Kumar', '1990-Jul-29', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 03:25', 'AHC Done'
        ],
        [' 0009', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Anamika Gupta', '2000-Aug-02', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 04:25', 'AHC Done'
        ],
        [' 0010', '056780', 'Pune, Maharashtra', ' 2023-Agu-12', 'Kajal Jain', '2003-Feb-14', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0011', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Mishra', '2001-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0012', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Aastha Pandey', '2001-Aug-18', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0013', '0566786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Swati Rajpoot', '2001-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0014', '056684', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pavan Jain', '2000-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0015', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Veerendra Mishra', '1999-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0016', '056687', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sadhna Patel', '2002-Apr-19', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0017', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Khushi Visvakarma', '2004-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0018', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Keshav patel', '2000-Sep-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0019', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Julee Prajapati', '2000-Aug-13',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0020', '056289', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0021', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0022', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0023', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0024', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0025', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0026', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0027', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0028', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0029', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0030', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0031', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0032', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0033', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0034', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0035', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0036', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0037', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0038', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0039', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
        [' 0040', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Done'
        ],
    ];
    new DataTable('#example1', {
        columns: [{
                title: 'Record 1'
            },
            {
                title: 'Parent ID'
            },
            {
                title: 'Site'
            },
            {
                title: 'Due Date'
            },
            {
                title: 'Employee Name'
            },
            {
                title: 'DOB'
            },
            {
                title: 'Medical Officer'
            },
            {
                title: 'Purpose'
            },
            {
                title: 'Date of Initiation'
            },
            {
                title: 'Status'
            },

        ],
        data: newdataSet
    });
</script>

<script>
    const pagidataSet = [
        [' 0001', '056781', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0002', '056782', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sandhya Prajapati', '2002-Jul-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 04:25', 'AHC Schedule'
        ],
        [' 0003', '056783', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nikhil Sharma', '1992-Aug-24', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '16-Oct-2023 04:30', 'AHC Schedule'
        ],
        [' 0004', '056784', 'Pune, Maharashtra', ' 2023-Agu-12', 'Manish Malviya', '1996-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '16-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0005', '056785', 'Pune, Maharashtra', ' 2023-Agu-12', 'Radhika Visvakarma', '1994-jun-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '17-Oct-2023 03:00', 'AHC Schedule'
        ],
        [' 0006', '056786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nilesh Birla', '2000-Apr-01', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '17-Oct-2023 04:45', 'AHC Schedule'
        ],
        [' 0007', '056787', 'Pune, Maharashtra', ' 2023-Agu-12', 'Shivam Patel', '1997-Mar-30', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 02:15', 'AHC Schedule'
        ],
        [' 0008', '056788', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pankaj Kumar', '1990-Jul-29', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 03:25', 'AHC Schedule'
        ],
        [' 0009', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Anamika Gupta', '2000-Aug-02', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 04:25', 'AHC Schedule'
        ],
        [' 0010', '056780', 'Pune, Maharashtra', ' 2023-Agu-12', 'Kajal Jain', '2003-Feb-14', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0011', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Mishra', '2001-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0012', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Aastha Pandey', '2001-Aug-18', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0013', '0566786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Swati Rajpoot', '2001-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0014', '056684', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pavan Jain', '2000-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0015', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Veerendra Mishra', '1999-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0016', '056687', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sadhna Patel', '2002-Apr-19', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0017', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Khushi Visvakarma', '2004-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0018', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Keshav patel', '2000-Sep-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0019', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Julee Prajapati', '2000-Aug-13',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0020', '056289', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0021', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0022', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0023', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0024', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0025', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0026', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0027', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0028', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0029', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0030', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0031', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0032', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0033', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0034', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0035', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0036', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0037', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0038', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0039', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
        [' 0040', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'AHC Schedule'
        ],
    ];

    new DataTable('#example2', {
        columns: [{
                title: 'Record'
            },
            {
                title: 'Parent ID'
            },
            {
                title: 'Site'
            },
            {
                title: 'Due Date'
            },
            {
                title: 'Employee Name'
            },
            {
                title: 'DOB'
            },
            {
                title: 'Medical Officer'
            },
            {
                title: 'Purpose'
            },
            {
                title: 'Date of Initiation'
            },
            {
                title: 'Status'
            },

        ],
        data: pagidataSet
    });
</script>

<script>
    const comdataSet = [
        [' 0001', '056781', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0002', '056782', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sandhya Prajapati', '2002-Jul-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 04:25', 'Completed'
        ],
        [' 0003', '056783', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nikhil Sharma', '1992-Aug-24', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '16-Oct-2023 04:30', 'Completed'
        ],
        [' 0004', '056784', 'Pune, Maharashtra', ' 2023-Agu-12', 'Manish Malviya', '1996-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '16-Oct-2023 05:25', 'Completed'
        ],
        [' 0005', '056785', 'Pune, Maharashtra', ' 2023-Agu-12', 'Radhika Visvakarma', '1994-jun-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '17-Oct-2023 03:00', 'Completed'
        ],
        [' 0006', '056786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Nilesh Birla', '2000-Apr-01', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '17-Oct-2023 04:45', 'Completed'
        ],
        [' 0007', '056787', 'Pune, Maharashtra', ' 2023-Agu-12', 'Shivam Patel', '1997-Mar-30', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 02:15', 'Completed'
        ],
        [' 0008', '056788', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pankaj Kumar', '1990-Jul-29', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '18-Oct-2023 03:25', 'Completed'
        ],
        [' 0009', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Anamika Gupta', '2000-Aug-02', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 04:25', 'Completed'
        ],
        [' 0010', '056780', 'Pune, Maharashtra', ' 2023-Agu-12', 'Kajal Jain', '2003-Feb-14', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '19-Oct-2023 05:25', 'Completed'
        ],
        [' 0011', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Mishra', '2001-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0012', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Aastha Pandey', '2001-Aug-18', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0013', '0566786', 'Pune, Maharashtra', ' 2023-Agu-12', 'Swati Rajpoot', '2001-May-12',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0014', '056684', 'Pune, Maharashtra', ' 2023-Agu-12', 'Pavan Jain', '2000-Jan-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0015', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Veerendra Mishra', '1999-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0016', '056687', 'Pune, Maharashtra', ' 2023-Agu-12', 'Sadhna Patel', '2002-Apr-19', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0017', '056685', 'Pune, Maharashtra', ' 2023-Agu-12', 'Khushi Visvakarma', '2004-Apr-4',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0018', '056689', 'Pune, Maharashtra', ' 2023-Agu-12', 'Keshav patel', '2000-Sep-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0019', '056681', 'Pune, Maharashtra', ' 2023-Agu-12', 'Julee Prajapati', '2000-Aug-13',
            'Madhulika Mishra', 'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0020', '056289', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0021', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0022', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0023', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0024', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0025', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0026', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0027', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0028', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0029', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0030', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0031', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0032', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0033', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0034', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0035', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0036', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0037', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0038', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0039', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
        [' 0040', '056789', 'Pune, Maharashtra', ' 2023-Agu-12', 'Amit Patel', '2000-Aug-12', 'Madhulika Mishra',
            'Pending Pre-Employment Medical Check Up', '15-Oct-2023 05:25', 'Completed'
        ],
    ];
    new DataTable('#example3', {
        columns: [{
                title: 'Record 1'
            },
            {
                title: 'Parent ID'
            },
            {
                title: 'Site'
            },
            {
                title: 'Due Date'
            },
            {
                title: 'Employee Name'
            },
            {
                title: 'DOB'
            },
            {
                title: 'Medical Officer'
            },
            {
                title: 'Purpose'
            },
            {
                title: 'Date of Initiation'
            },
            {
                title: 'Status'
            },

        ],
        data: comdataSet
    });
</script>



<script>
    < script type = "text/javascript"
    src = "https://www.gstatic.com/charts/loader.js" >
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Scheduled', 2],
            ['Not Scheduled', 2],
        ]);

        var options = {
            is3D: true,
            colors: ['#ffaf1a', '#008000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('pendingrecord'));
        chart.draw(data, options);
    }
</script>

@stack('scripts')

</body>

</html>
