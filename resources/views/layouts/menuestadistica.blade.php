<div class="col-md-12">
<p class="infoR pb-4">Información de las Estadistícas</p>
<div class="container">
    <div class="row">
    <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item border-0">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Población y Superficie
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body p-0">
            <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficie.index') }}">Población y Superficie</a></p>
            <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Osono') }}">Provincia de Osono</a></p>
            <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Llaquihue') }}">Provincia de Llaquihue</a></p>
            <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Chiloe') }}">Provincia de Chiloé</a></p>
            <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Palena') }}">Provincia de Palena</a></p>
      </div>
    </div>
  </div>
  <div class="accordion-item border-0 ">
    <h2 class="accordion-header enlaceM">
      <a  href="{{ route('DinamicaEconomica.index') }}" class="p-0 pt-3 pb-3">
        Dinámica Económica
        </a>
    </h2>
  </div>
  <div class="accordion-item border-0">
    <h2 class="accordion-header enlaceM">
        <a class="enlaceM p-0 pt-3 pb-3" href="{{ route('RegionlagosExportacionSegunRamaActividad.index') }}">Exportación Según Rama Actividad</a>
    </h2>
  </div>
  <div class="accordion-item border-0">
    <h2 class="accordion-header enlaceM">
        <a class="enlaceM p-0 pt-3 pb-3" href="{{ route('RegionlagosExportacionSegunBloqueEconomico.index') }}">Exportación Según Bloque Económico</a>
    </h2>
  </div>
  <div class="accordion-item border-0">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Actividad Económica
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body p-0">
            @foreach($actividadE as $actividad)
                <p class="enlaceM"><a class="ml-3" href="{{ route('RegionlagosBuscarActividadEconomica.show', $actividad->nombre) }}">{{ $actividad->nombre }}</a></p>
            @endforeach
      </div>
    </div>
  </div>
  <div class="accordion-item border-0">
    <h2 class="accordion-header enlaceM ">
    <a class="enlaceM" href="{{ route('RegionlagosFNDR.index') }}">FNDR 2009</a>
    </h2>
  </div>
</div>
        <!-- Submenú -->
    </div> 
    </div>
</div>
</div>