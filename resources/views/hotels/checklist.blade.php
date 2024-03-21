@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('hotel.checklist.update') }}" method="post" class="mt-4">
        <div class="row justify-content-center">
        @csrf
        @method('PUT') <!-- Use PUT method for update -->

        @foreach($hotels as $hotel)
            <div class="col-md-3" style="margin-top: 25px">
            <div class="card">
                <div class="card-header">
                    @if($hotel->location === 'Airport')
                        <i class="bi bi-airplane"></i>
                    @elseif($hotel->location === 'City')
                        <i class="bi bi-house"></i>
                    @endif
                    {{ $hotel->display_name }}
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="single_bed">Single</span>
                        <input type="number" name="hotels[{{ $hotel->id }}][single_bed]" value="{{ $hotel->single_bed }}" class="form-control" aria-label="Single Bed" aria-describedby="inputGroup-sizing-default">

                        <span class="input-group-text" id="double_bed">Double</span>
                        <input type="number" name="hotels[{{ $hotel->id }}][double_bed]" value="{{ $hotel->double_bed }}" class="form-control" aria-label="Double Bed" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
                    </div>
                </div>
            </div>
            </div>
        @endforeach

        <div class="col-md-3" style="margin-top: 25px">
            <div class="card">
                <div class="card-header">Management</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button id="copy_available_beds" class="btn btn-success btn-sm">Copy Available Beds</button>
                        <button id="copy_delta_available_beds" class="btn btn-warning btn-sm">Copy Delta Format</button>
                        </br>                      

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-list-ol"></i></span>
                            <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $totalBeds }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-airplane"></i></span>
                            <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $totalBedsAirport }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-building"></i></span>
                            <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $totalBedsCity }}">
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </form>
</div>

<script>
    document.getElementById("copy_available_beds").addEventListener("click", function() {
        var currentDate = new Date();
        var formattedDate = currentDate.getFullYear() + '/' + (currentDate.getMonth() + 1) + '/' + currentDate.getDate();
        var textToCopy = `Hola, *{{ $userName }}* en turno. Les proporcionamos el update de disponibilidad para el dia de ${formattedDate}.

Zona Aeropuerto
*{{ $totalBedsAirport }}* Habitaciones Disponibles 

Zona Centro
*{{ $totalBedsCity }}* Habitaciones Disponibles

Total de Habitaciones: *{{ $totalBeds }}*
Grupo APS.`;

        // Create a textarea element to hold the text temporarily
        var textArea = document.createElement("textarea");
        textArea.value = textToCopy;

        // Append the textarea to the document
        document.body.appendChild(textArea);

        // Select the text
        textArea.select();
        textArea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand("copy");

        // Remove the textarea from the document
        document.body.removeChild(textArea);

        // Alert the user
        alert("Text copied to clipboard!");
    });

    document.getElementById("copy_delta_available_beds").addEventListener("click", function() {
        var textToCopy = `Excelente turno,
*{{ $userName }}* en turno y atento a sus operaciones.

Disponibilidad de hoteles: HLM - MEX
TOTAL *{{ $totalBeds }}* HABITACIONES

{{ implode("\n", $hotelDetails) }}

Disponibilidad sujeta a cambios.`;

        // Create a textarea element to hold the text temporarily
        var textArea = document.createElement("textarea");
        textArea.value = textToCopy;

        // Append the textarea to the document
        document.body.appendChild(textArea);

        // Select the text
        textArea.select();
        textArea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand("copy");

        // Remove the textarea from the document
        document.body.removeChild(textArea);

        // Alert the user
        alert("Text copied to clipboard!");
    });
</script>

@endsection
