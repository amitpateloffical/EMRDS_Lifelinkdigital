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
        <button class="pdf-button" onclick="showPDF('assets/pdf/annualHealth.pdf')">AHC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/annualMaintenance.pdf')">AMC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Bio-Medical Waste.pdf')">BMWC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Canteen.pdf')">CEMC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Chest X-Ray.pdf')">CHXTE</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Exit Medical.pdf')">EMEC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Eye test.pdf')">ETE</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/First Aid box.pdf')">FABC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Form No 7.pdf')">FORM-7</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Medical.pdf')">MCVA</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Hepatitis-B.pdf')">H-BPHC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/OPS.pdf')">OPD</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Periodic.pdf')">PMC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Pre-employment.pdf')">PEMC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Trainee.pdf')">TMC</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Vaccination.pdf')">VET</button>
        <button class="pdf-button" onclick="showPDF('assets/pdf/Vaccine.pdf')">VCC</button>
    </div>
    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/annualHealth.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/annualMaintenance.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Bio-Medical Waste.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Canteen.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Chest X-Ray.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Exit Medical.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Eye test.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Form No 7.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Medical.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Heptitis-B.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/OPS.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Periodic.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Pre-employment.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Trainee.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Vaccination.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>

    <div id="pdfContainer" style="display: none;">
        <embed id="pdfEmbed" src="{{ asset('assets/pdf/Vaccine.pdf') }}" width="100%" height="1000px"
            type="application/pdf">
    </div>
@endsection
