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
    color: #565656;
font-family: Inter;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.tab-button:hover {
  
    border: 1px solid #00548F;
    border-radius: 20px;
    color: #00548F;

font-family: Inter;
font-size: 16px;
font-style: normal;
font-weight: 700;
line-height: normal;
   
}


.tab-content {
    display: none;
    padding: 6px 12px;
    border: 1px solid #F59120;
   
    margin-bottom: 10px;
}

/* Estilo para la pestaña activa */
.tab-active {
    display: block;
}

.textdocs{
    color: #565656;

font-family: Inter;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: normal;
}

</style>

@endpush


<div id="banner" class="h-500 text-light d-flex colorB" style="background: #00548F ; height: 502px; display: flex; padding-left: 50px;">
    <div class="container" style="display: flex;
    text-align: left;
    flex-wrap: wrap;
    flex-direction: column;
    justify-content: center;">
        <h5>Home / Sala de prensa</h5>
        <h1 class="titulobannernoticia" >Consejo Regional </h1>
        <p>Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
    </div>
</div>


<div class="container my-5" >
    <h1>Tabla de Sesiones Consejo Regional de Los Lagos</h1>
    <div class="tabs mb-5">
        @foreach ($sesiones as $index => $sesion)
            <button class="tab-button" onclick="openSesion(event, 'sesion{{$index}}')">{{ $sesion->nombre }}</button>
        @endforeach
    </div>
    @foreach ($sesiones as $index => $sesion)
        <div id="sesion{{$index}}" class="tab-content" >
          
        
        <h3 >{{ $sesion->nombre}}</h3>
       <div class="datoscore" style="text-align:left !important;border-top: solid 1px #F59120 ;padding-top: 10px;">
                <p>Próxima Sesión:</p>
                <p>Hora: {{ $sesion->fecha_hora }} hrs.</p>
                <p>Lugar: {{ $sesion->lugar }}</p>
        </div>
        
        <div class="mt-3" style="    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    border-top: solid 1px #F59120 ;
    padding-top: 20px;
    padding-bottom: 20px;">
        @foreach ($sesion->documentos as $documento)
               <a href="{{ Storage::url($documento->url) }}" style="text-decoration:none;"  class="textdocs">

          Documento {{ $loop->iteration }}
                <img src="{{ asset('storage/img/iconodocpdf.png') }}">

               </a>
            @endforeach
        </div>
   
            
        </div>
    @endforeach
</div>




<script>

document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('.nav-head').style.setProperty('background-color', '#00548F');
        document.querySelector('.backgroundB').style.setProperty('background-color', '#00548F');

});

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

