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
                            /Record-00001{{ $document->id }}</div>

                        <div class="btn-group">
                            <button onclick="window.print();return false;" type="button">Print</button>
                        </div>
                    </div>
                    <div class="info-list">
                        <div class="list-item">
                            <div class="head">{{ $document->status }}</div>
                            <div>:</div>
                            <div>Opened</div>
                        </div>
                        <div class="list-item">
                            <div class="head">Originator</div>
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
                                    <th>Resulting State</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audit as $audits)
                                    <tr>
                                        <td class="">{{ $audits->activity_type }}
                                        </td>
                                        <td>{{ $audits->created_at }}</td>
                                        <td>{{ $audits->user_name }}</td>
                                        <td>{{ $audits->user_role }}</td>
                                        <td>{{ $audits->origin_state }}</td>
                                        <td>{{ $document->status }}</td>
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
