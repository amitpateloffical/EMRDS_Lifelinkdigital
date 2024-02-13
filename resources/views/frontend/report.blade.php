@extends('components.main')
@section('container')
    <style>
        #buttonBar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            background-color: #eeeeee;
            padding: 10px;
        }

        .pdf-button {
            color: white;
            background-color: blue;
            border: none;
            padding: 5px 15px;
            border-radius: 30px;
            cursor: pointer;
        }
    </style>


    <div id="buttonBar">
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalchart.pdf')">
            <span>Medical Chart</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalHistory.pdf')">
            <span>Medical History</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalInvoice.pdf')">
            <span>Medical Invoice</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalmonitoring.pdf')">
            <span>Medical Monitoring</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalprogress.pdf')">
            <span>Medical Progress</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalreferral.pdf')">
            <span>Medical Referral</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/clinicreserch.pdf')">
            <span>Clinical Research</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicallist.pdf')">
            <span>Medical List</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicallog.pdf')">
            <span>Medical Log</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/medicalschedule.pdf')">
            <span>Medical Schedule</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/patientdischarge.pdf')">
            <span>Patient Discharge</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/patientsign.pdf')">
            <span>Patient Sign</span>
        </button>
    </div>
    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalchart.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalHistory.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalInvoice.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalmonitoring.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalprogress.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalreferral.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/assets/pdf/clinicreserch.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicallist.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicallog.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/medicalschedule.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/patientdischarge.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/patientsign.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>
@endsection
