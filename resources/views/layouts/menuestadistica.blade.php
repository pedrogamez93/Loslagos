<div class="col-md-12">
<p class="infoR pb-4">Información de las Estadistícas</p>
<div class="container">
    <div class="row">
    <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <!-- Submenú -->
        <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">Población y Superficie</a>
        <div class="collapse  p-0" id="submenu">
        <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficie.index') }}">Población y Superficie</a></p>
                <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Osono') }}">Provincia de Osono</a></p>
                <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Llaquihue') }}">Provincia de Llaquihue</a></p>
                <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Chiloe') }}">Provincia de Chiloé</a></p>
                <p class="enlaceM"><a class="ml-3" href="{{ route('PoblacionSuperficieProvincia.show','Provincia de Palena') }}">Provincia de Palena</a></p>
        </div>
        <a class="enlaceM" href="{{ route('DinamicaEconomica.index') }}">Dinámica Económica</a>
        <a class="enlaceM" href="{{ route('RegionlagosExportacionSegunRamaActividad.index') }}">Exportación Según Rama Actividad</a>
        <a class="enlaceM" href="{{ route('RegionlagosExportacionSegunBloqueEconomico.index') }}">Exportación Según Bloque Económico</a>
        <a class="enlaceM" href="{{ route('DinamicaEconomica.index') }}">Actividad Económica</a>
        <a class="enlaceM" href="{{ route('RegionlagosFNDR.index') }}">FNDR 2009</a>
    </div> 
    </div>
</div>
</div>