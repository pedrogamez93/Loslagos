@extends('layouts.app')

@section('content')


@push('styles')
    <style>
    .sesiones-menu {
        list-style-type: none;
        padding: 0;
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
    }

    .sesiones-menu li {
        padding: 10px;
        margin-right: 10px;
        background-color: #f0f0f0;
        cursor: pointer;
    }

    .sesiones-menu li:hover {
        background-color: #ddd;
    }

    /* Añade aquí más estilos si lo necesitas */
    .container {
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

.tabs {
    overflow: hidden;
    background-color: #f1f1f1;
    display: flex;
    justify-content: space-around;
    margin-bottom: 10px;
}

.tab-button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: background-color 0.3s;
    border-radius: 5px 5px 0 0;
}

.tab-button:hover {
    background-color: #ddd;
}

.tab-content {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    margin-bottom: 10px;
}

/* Estilo para la pestaña activa */
.tab-active {
    display: block;
}

.datoscore{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: flex-start;
}

</style>

@endpush


<div id="banner" class="h-500 text-light d-flex align-items-center colorB" style="background: #00548F ; height: 502px; display: flex; padding-left: 50px;">
    <div class="container">
        <h5>Home / Sala de prensa</h5>
        <h1 class="titulobannernoticia" style="">Consejo Regional </h1>
        <p>Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
    </div>
</div>


<div class="container my-5">
    <h1>Tabla de Sesiones Consejo Regional de Los Lagos</h1>
    <div class="tabs">
        @foreach ($sesiones as $index => $sesion)
            <button class="tab-button" onclick="openSesion(event, 'sesion{{$index}}')">{{ $sesion->nombre }}</button>
        @endforeach
    </div>
    @foreach ($sesiones as $index => $sesion)
        <div id="sesion{{$index}}" class="tab-content">
          
        
        <h3>TABLA CORE</h3>
       <div class="datoscore">
                <p>Próxima Sesión:</p>
                <p>Hora: {{ $sesion->fecha_hora }} hrs.</p>
                <p>Lugar: {{ $sesion->lugar }}</p>
        </div>
            @foreach ($sesion->documentos as $documento)
                <p><a href="{{ Storage::url($documento->url) }}">{{ $documento->nombre }}</a></p>
            @endforeach
            
        </div>
    @endforeach
</div>




<script>
    document.querySelectorAll('.sesiones-menu li').forEach(item => {
        item.addEventListener('click', function() {
            const sesionId = this.getAttribute('data-sesion-id');
            document.querySelectorAll('.sesion-documentos').forEach(div => {
                div.style.display = 'none'; // Oculta todos los documentos
            });
            document.getElementById('sesion-documentos-' + sesionId).style.display = 'block'; // Muestra los documentos de la sesión seleccionada
        });
    });

    function openSesion(evt, sesionName) {
    var i, tabcontent, tabbuttons;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" tab-active", "");
    }
    document.getElementById(sesionName).style.display = "block";
    evt.currentTarget.className += " tab-active";
}

// Opcional: activar la primera pestaña por defecto
if(document.getElementsByClassName("tab-button").length > 0){
    document.getElementsByClassName("tab-button")[0].click();
}



</script>

@endsection

