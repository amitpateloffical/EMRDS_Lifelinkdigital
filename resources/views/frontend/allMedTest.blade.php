@extends('components.main')
@section('container')
    
    <div class="pdf-container">
        <iframe src="{{ asset("assets/pdf/allmedical.pdf") }}" width="100%" height="1000px"></iframe>
    </div>

@endsection
