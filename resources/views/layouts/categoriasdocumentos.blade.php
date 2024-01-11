<style>
.lista-categoriasss ul#categorylists {
    display: block;
    padding-left: 0.5rem;
    list-style: none;
    margin: 0;
}

.lista-categoriasss ul#categorylists li {
    display: block !important;
    margin-bottom: 10px;
    float: none !important;
    width: 100% !important;
}

.lista-categoriasss ul#categorylists li a {
    background-color: #FFFFFF;
    border: 1px solid #FFFFFF;
    box-sizing: border-box;
    font-family: 'Inter';
    color: #565656;
    display: block;
    font-size: 16px;
    font-weight: 400;
    padding: 4px 12px;
    margin-top: 5px;
    text-decoration: none;
    white-space: normal; /* Para evitar el corte del texto */
    text-overflow: clip;
}

.lista-categoriasss ul#categorylists li a:hover {
    color: #565656;
    font-weight: 700;
}

.lista-categoriasss ul#categorylists li a.active {
    color: #565656;
    font-weight: 700;
   
}
</style>

<div class="lista-categoriasss mb-5">
    <div id="categoriasToggles">
        <span id="backToggles" class="responsiveCategoriass"></span>
    </div>   
        <ul id="categorylists">
            <li><a href="/gobiernoregional/comisionregbordecostero" title="Categoría:acerca">C.R.U.B.C</a></li>
            <li><a href="/gobiernoregional/controlesssi" title="Categoría:tags">Controles SSI</a></li>
            <li><a href="/gobiernoregional/documentosdegestion" title="Categoría:tags">Documentos Gestión</a></li>
            <li><a href="/gobiernoregional/estadosituacionfndr"title="Categoría:tags">Estado Situación FNDR</a></li>
            <li><a href="/gobiernoregional/informeejecucion" title="Categoría:tags">Informe Ejecución PROPIR</a></li>
            <li><a href="/gobiernoregional/informegastosley"  title="Categoría:tags">Informe Gastos Ley 21.516</a></li>
            <li><a href="/gobiernoregional/planregulador"  title="Categoría:tags">Plan Regulador Comunal</a></li>
            <li><a href="/gobiernoregional/presupuesto" title="Categoría:tags">Presupuesto</a></li>
            <li><a href="/gobiernoregional/receptoresfondos" title="Categoría:tags">Receptores Fondos Públicos Ley 19.862</a></li>
            <li><a href="/gobiernoregional/unidaddecontrol" title="Categoría:tags">Unidad de Control</a></li>
        </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenemos la URL actual
        var currentUrl = window.location.href;

        // Seleccionamos todos los enlaces dentro de #categorylist
        var links = document.querySelectorAll("#categorylists li a");

        // Iteramos sobre los enlaces
        links.forEach(function (link) {
            // Verificamos si la URL actual coincide con la href del enlace
            if (currentUrl.includes(link.getAttribute("href"))) {
                // Agregamos la clase activa
                link.classList.add("active");
            }
        });
    });
</script>