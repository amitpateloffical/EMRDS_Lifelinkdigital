@extends('components.main')
@section('container')
    {{-- ======================================
                    DASHBOARD
    ======================================= --}}
    <div id="audit-trial">
        <div class="container-fluid">
            <div class="audit-trial-container">

                <div class="inner-block">
                    <div class="main-head">
                        <div class="default-name">{{ date('Y') }}
                            /Record-0000{{ $document->id }}</div>

                        <div class="btn-group">
                            <a href="{{url('pre-employment/auditpdf',$document->id)}}" target="__blank"><button type="button">Print</button></a>
                        </div>
                    </div>
                    <div class="info-list">
                       
                        <div class="list-item">
                            <div class="head">HR</div>
                            <div>:</div>
                            <div>Amit Guru</div>
                        </div>
                    </div>

                    <div class="activity-table">
                        <table class="table table-bordered" id='auditTable'>
                            <thead>
                                <tr>
                                    <th>Activity Type</th>
                                    <th>Performed on</th>
                                    <th>Performed by</th>
                                    <th>Performer Role</th>
                                    <th>Origin State</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audit as $audits)
                                   <tr>
                                    <td class=""><a href="{{url('pre-employment/auditinner',$audits->id)}}">{{ $audits->type }}</a>
                                </td>
                                        <td>{{ $audits->create }}</td>
                                        <td>{{ $audits->user_name }}</td>
                                        <td>{{ $audits->change_by }}</td>
                                        <td>{{ $audits->origin_state }}</td>
                                        
                                    </tr>
                               @endforeach
                              </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
