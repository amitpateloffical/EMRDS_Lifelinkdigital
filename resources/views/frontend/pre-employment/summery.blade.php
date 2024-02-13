<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Life Link Digital  - Software</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .w-10 {
        width: 10%;
    }

    .w-20 {
        width: 20%;
    }

    .w-25 {
        width: 25%;
    }

    .w-30 {
        width: 30%;
    }

    .w-40 {
        width: 40%;
    }

    .w-50 {
        width: 50%;
    }

    .w-60 {
        width: 60%;
    }

    .w-70 {
        width: 70%;
    }

    .w-80 {
        width: 80%;
    }

    .w-90 {
        width: 90%;
    }

    .w-100 {
        width: 100%;
    }

    .h-100 {
        height: 100%;
    }

    header table,
    header th,
    header td,
    footer table,
    footer th,
    footer td,
    .border-table table,
    .border-table th,
    .border-table td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    table {
        width: 100%;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    footer .head,
    header .head {
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
    }

    @page {
        size: A4;
        margin-top: 160px;
        margin-bottom: 60px;
    }

    header {
        position: fixed;
        top: -140px;
        left: 0;
        width: 100%;
        display: block;
    }

    footer {
        width: 100%;
        position: fixed;
        display: block;
        bottom: -40px;
        left: 0;
        font-size: 0.9rem;
    }

    footer td {
        text-align: center;
    }

    .inner-block {
        padding: 10px;
    }

    .inner-block tr {
        font-size: 0.8rem;
    }

    .inner-block .block {
        margin-bottom: 30px;
    }

    .inner-block .block-head {
        font-weight: bold;
        font-size: 1.1rem;
        padding-bottom: 5px;
        border-bottom: 2px solid #4274da;
        margin-bottom: 10px;
        color: #4274da;
    }

    .inner-block th,
    .inner-block td {
        vertical-align: baseline;
    }

    .table_bg {
        background: #4274da57;
    }
</style>

<body>

    <header>
        <table>
            <tr>
                <td class="w-70 head">
                    Pre Employment Medical Checkup Report
                </td>
                <td class="w-30">
                    <div class="logo">
                        <img src="https://dms.lifelinkdigital.com/user/images/logo1.png" alt="" class="w-100">
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="w-30">
                    <strong>Pre Employment Medical Checkup No.</strong>
                </td>
                <td class="w-40">
                    PEMC/2023/{{ str_pad($data->record, 4, '0', STR_PAD_LEFT) }}
                </td>

            </tr>
        </table>
    </header>

    <div class="inner-block">
        <div class="content-table">
            <div class="block">
                <div class="block-head">
                    General Information
                </div>
                <table>
                    <tr>  Pro Employment Medical checkup added by HR
                        <th class="w-20">Initiator</th>
                        <td class="w-30">Amit Guru</td>
                        <th class="w-20">Date Initiation</th>
                        <td class="w-30">{{ $data->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="w-20">Due Date</th>
                        <td class="w-30">@if($data->due_date){{ $data->due_date }} @else Not Applicable @endif</td>
                        <th class="w-20">Canditate Name</th>
                        <td class="w-30">@if($emp->name){{ $data->name }} @else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">Short Description</th>
                        <td class="w-80" colspan="3">
                            @if($data->short_description){{ $data->short_description }}@else Not Applicable @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="w-20">Purpose</th>
                        <td class="w-30">@if($data->purpose){{ $data->purpose }}@else Not Applicable @endif</td>
                        <th class="w-20">HR Comments</th>
                        <td class="w-30">@if($data->HR_comments){{$data->HR_comments}}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">External attachment</th>
                        <td class="w-80" colspan="3">@if($data->external_attachment){{$data->external_attachment}}@else Not Applicable @endif</td>
                    </tr>
                </table>
            </div>
            <div class="block">
                <div class="block-head">
                    Candidate Information
                </div>
                <div class="border-table">
                    <table>
                        <tr class="table_bg">
                            <th class="w-25">Candidate Name</th>
                            <th class="w-25">Candidate DOB</th>
                            <th class="w-25">Candidate's Gender</th>
                            <th class="w-25">Candidate's Department</th>
                            <th class="w-25">Email</th>
                        </tr>

                        <tr>
                            <td class="w-25">@if($emp->name){{ $emp->name }}@else Not Applicable @endif</td>
                            <td class="w-25">@if($emp->dob){{ $emp->dob }}@else Not Applicable @endif</td>
                            <td class="w-25">@if($emp->gender){{ $emp->gender }}@else Not Applicable @endif</td>
                            <td class="w-25">@if($emp->department){{ $emp->department }}@else Not Applicable @endif</td>
                            <td class="w-25">@if($emp->email){{ $emp->email }}@else Not Applicable @endif</td>
                        </tr>


                    </table>
                </div>
                <table>
                    <tr>
                        <th class="w-20">Comments</th>
                        <td>
                            <div><strong>{{ $data->created_at }} added by {{ $data->originator }}</strong></div>
                            <div>
                                @if($data->comments){{ $data->comments }}@else Not Applicable @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-20">Medical Officer Name</th>
                        <td>
                            <div><strong>{{ $data->created_at }} added by {{ $data->originator }}</strong></div>
                            <div>
                                @if($medical->name){{ $medical->name }}@else Not Applicable @endif
                            </div>
                        </td>
                    </tr>

                    <div class="block">
                        <div class="block-head">
                           Medical Information
                        </div>
                        <div class="border-table">
                            <table>
                                <tr class="table_bg">
                                    <th>Blood Pressure</th>
                                    <th>Height</th>
                                    <th>Temperature</th>
                                    <th>Pulse</th>
                                    <th>Oxygen Level</th>
                                    <th>Weight</th>
                                </tr>
                                <tr>
                                    <td>@if($data->blood_pressure){{$data->blood_pressure}}@else Not Applicable @endif</td>
                                    <td>@if($data->height){{$data->height}} @else Not Applicable @endif</td>
                                    <td>@if($data->temperature){{$data->temperature}} @else Not Applicable @endif</td>
                                    <td>@if($data->pulse){{$data->pulse}} @else Not Applicable @endif</td>
                                    <td>@if($data->oxygen_level){{$data->oxygen_level}} @else Not Applicable @endif</td>
                                    <td>@if($data->height){{$data->height}} @else Not Applicable @endif</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </table>
            </div>






            <div class="block">
                <div class="block-head">
                   Nurshing Staff Info.
                </div>
                <div class="border-table">
                    <table>
                        <tr class="table_bg">
                            <th>Nurshing Staff Name</th>
                            <th>Nurshing Staff History</th>
                            <th>Nurshing Staff BMI</th>
                            <th>Nurshing Staff Vision Test</th>
                            <th>Nurshing Staff Blood Report</th>

                        </tr>
                        <tr>
                            <td>@if($nursh){{$nursh->name}}@else Not Applicable @endif</td>
                            <td>@if($data->medical_history){{$data->medical_history}} @else Not Applicable @endif</td>
                            <td>@if($data->bmi){{$data->bmi}} @else Not Applicable @endif</td>
                            <td>@if($data->vision_test){{$data->vision_test}} @else Not Applicable @endif</td>
                            <td>@if($data->blood_reports){{$data->blood_reports}} @else Not Applicable @endif</td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="block">
                <div class="block-head">
                    Pre Employment Information
                </div>
                <div class="border-table">
                    <table>
                        <tr class="table_bg">
                            <th>Pre Employment Physical Exam</th>
                            <th>Abnormal</th>
                            <th>Abnormal Comment</th>
                            <th>Follew Up</th>
                            <th>Follew Up Comment</th>
                            <th>Follew Up Due</th>

                        </tr>


                        <tr>
                            <td>@if($data->pre_imployement_physicalExam){{ $data->pre_imployement_physicalExam }}@else NotApplicable @endif</td>
                            <td>@if($data->abnormal_finding){{ $data->abnormal_finding }}@else NotApplicable @endif</td>
                            <td>@if($data->abnormal_finding_Comments){{ $data->abnormal_finding_Comments }}@else NotApplicable @endif</td>
                            <td>@if($data->Followup_action){{ $data->Followup_action }}@else NotApplicable @endif</td>
                            <td>@if($data->Followup_Comments){{ $data->Followup_Comments }}@else NotApplicable @endif</td>
                            <td>@if($data->Followup_dueDate){{ $data->Followup_dueDate }}@else NotApplicable @endif</td>
                        </tr>

                    </table>
                </div>
                <table>


                </table>

                <table>

                    <tr>
                        <th class="w-20">HOD Approval Status</th>
                        <td class="w-80">@if($data->HOD_approval_status){{ $data->HOD_approval_status }}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">HOD Name</th>
                        <td class="w-80">@if($data->HOD_name){{ $data->HOD_name }}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">HOD Comments</th>
                        <td class="w-80">@if($data->HOD_comments){{ $data->HOD_comments }}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">HR Comments</th>
                        <td class="w-80">@if($data->HR_comments){{ $data->HR_comments }} @else Not Applicable @endif</td>
                    </tr>
                </table>
                <table>

                    <tr>
                        <th class="w-20">Report Title</th>
                        <td class="w-80">@if($data->report_title){{ $data->report_title }} @else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">Closer Comments</th>
                        <td class="w-80">@if($data->report_title){{ $data->report_title }}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">HOD Comments</th>
                        <td class="w-80">@if($data->HOD_comments){{ $data->HOD_comments }}@else Not Applicable @endif</td>
                    </tr>
                    <tr>
                        <th class="w-20">HR Comments</th>
                        <td class="w-80">@if($data->HR_Final_comments){{ $data->HR_Final_comments }}@else Not Applicable @endif</td>
                    </tr>
                </table>
            </div>
            <div class="block">
                <div class="block-head">
                    Activity Log
                </div>
                <table>
                    <tr>
                        <th class="w-20">Pre-Employment Medical
                            Check Up Completed
                            </th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 2)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Pre-Employment Medical
                            Check Up Completed
                             On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Updated  By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 3)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Updated  On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Medical Check Up Completed By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 4)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                         <th class="w-20">Updated By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 5)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Satisfactory By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 6)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Fit for Employment By</th>

                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 7)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Send for OHC Head Approval
                            By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 8)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">Fit for Employment
                            By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 9)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="w-20">HR Review Completed
                            By</th>
                        @php
                        $submit = DB::table('stage_histories')
                            ->where('type', 'Pre Employment Checkup')
                            ->where('doc_id', $data->id)
                            ->where('stage_id', 10)
                            ->get();
                        @endphp
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->user_name }}</td>
                        @endforeach

                        <th class="w-20">Activity Perfomed On</th>
                        @foreach ($submit as $temp)
                        <td class="w-30">{{ $temp->created_at }}</td>
                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <footer>
        <table>
            <tr>
                <td class="w-30">
                    <strong>Printed On :</strong> {{ date('d-M-Y') }}
                </td>
                <td class="w-40">
                    <strong>Printed By :</strong> {{ Auth::guard('admin')->user()->name }}
                </td>
                <td class="w-30">
                    <strong>Page :</strong> 1 of 1
                </td>
            </tr>
        </table>
    </footer>

</body>

</html>
