<style>
    /*lista categorias*/
    .lista-categorias {
        width: 100%;
        box-sizing: border-box;
    }

    #categoriasToggle {
        display: none;
    }

    #categorylist {
        display: table;
        padding-left: 0.5rem !important;
    }

    #categorylist li:first-child {
        position: relative;
    }

    #categorylist li {
        margin-right: 30px;
        margin-top: 10px;
        float: left;
    }

    #categorylist li a {
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
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    #categorylist li a:hover{
        color: #00548F;
        border-radius: 100px;
        border: 1px solid #00548F;
        font-weight: 700;
        background-color: #FFFFFF;
    }

    #categorylist li a.active {
        color: #00548F;
        border-radius: 100px;
        border: 1px solid #00548F;
        font-weight: 700;
        background-color: #FFFFFF;
}

    #categoriasToggle {
        display: none;
    }    
</style>

<div class="lista-categorias">
    <div id="categoriasToggle">
        <span id="backToggle" class="responsiveCategorias">Categorías</span>
    </div>
    <ul id="categorylist">
        <li><a href="/gobiernoregional/acerca" title="Categoría:acerca">Acerca del Gobierno Regional </a></li>
        <li><a href="/gobiernoregional/leygobiernoregional" title="Categoría:tags">Ley</a></li>
        <li><a href="/gobiernoregional/organigrama" title="Categoría:tags">Organigrama</a></li>
        <li><a routerLink="/result/Bosque nativo"title="Categoría:tags">Documentos de Gestión</a></li>
        <li><a href="/gobiernoregional/dptogestionpersonas" title="Categoría:tags">Gestión y Desarrollo de Personas</a></li>
        <li><a href="/gobiernoregional/tramitesdigitales"  title="Categoría:tags">Trámites Digitales</a></li>
        <li><a href="/gobiernoregional/asambleaclimatica"  title="Categoría:tags">Asamblea Climatica</a></li>
        <li><a href="/gobiernoregional/politicasostenibilidadhidrica" title="Categoría:tags">Política Sostenibilidad Hidrica</a></li>
        <li><a href="/gobiernoregional/disenopoliticapersonasmayores" title="Categoría:tags">Política Personas Mayores</a></li>
        <li><a href="/gobiernoregional/planificacioninstitucional" title="Categoría:tags">Planificación Institucional</a></li>
        <li><a href="/gobiernoregional/concursopublico" title="Categoría:tags">Concurso Público</a></li>
        <li><a href="/gobiernoregional/comitecienciastecnologias" title="Categoría:tags">Comité Ciencia Tecno e innova</a></li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenemos la URL actual
        var currentUrl = window.location.href;

        // Seleccionamos todos los enlaces dentro de #categorylist
        var links = document.querySelectorAll("#categorylist li a");

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