<!-- resources/views/documentos/resultados.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div class="contenido colorB" style="margin-top: -7vh; background-color: white; border-top-left-radius: 80px;">
    <div class="row py-5 px-5" style="padding-right: 10rem!important; padding-left: 10rem!important;">
        <div id="divformulario" class="col-md-8 col-lg-9" style="padding: 4%;">
            <h4 class="tituloform">Resultados de Búsqueda</h4>
            <div id="resultados">
                @include('documentos.partials.resultados', ['documentos' => $documentos])
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
});

function fetch_data(page)
{
    $.ajax({
        url: "/documentos/buscar?page=" + page,
        success: function(data)
        {
            $('#resultados').html(data);
        }
    });
}
</script>
@endsection
