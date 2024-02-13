@extends('components.main')
@section('container')
    <style>
        #buttonBar {
            display: flex;
            justify-content: space-around;
            background-color: #eeeeee;
            padding: 10px;
        }

        .pdf-button {
            color: white;
            background-color: blue;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 30px;
        }
    </style>


    <div id="buttonBar">
        <button class="pdf-button" onclick="showPDF('assets/pdf/osha-2.pdf')">
            <span>OSHA Forms For Recording</span>
        </button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/oshaform.pdf')">OSHA Forms 300</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/osha-1.pdf')">OSHA Forms 300 module-2</button>
    </div>
    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/osha-2.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/oshaform.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/osha-1.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>
@endsection
