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
        box-sizing: border-box;
        font-family: 'Inter';
        background: #fff;
        border-radius: 8px;
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
        border: none;
    }

    #categorylist li a:hover{
    color: #00548F;
    border-radius: 100px;
    border: 1px solid #00548F;
    font-weight: 700;
    background: #fff;
    }

    #categorylist li a.active {
    color: #00548F;
    border-radius: 100px;
    border: 1px solid #00548F;
    font-weight: 700;
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
        <li><a href="/regionlagos/introduccion" title="Introducción" class="a1">Introducción</a></li>
        <li><a href="{{ route('antecedentesregion.index') }}" title="Información de la Región"  class="a2">Información de la Región</a></li>
        <li><a href="{{ route('RegionlagosAutoridades.show', 'Gobernador Regional') }}" title="Autoridades" class="a3">Autoridades</a></li>
        <li><a href="{{ route('PoblacionSuperficie.index') }}" title="Estadísticas" class="a4">Estadísticas</a></li>
        <li><a href="{{ route('Inversiones.index') }}" title="Inversiones" class="a5">Inversiones</a></li>
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