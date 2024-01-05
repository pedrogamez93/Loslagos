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
        padding-left: 2rem !important;
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

<div class="lista-categorias mt-4 mb-4">
    <div id="categoriasToggle">
        <span id="backToggle" class="responsiveCategorias"></span>
    </div>
    <ul id="categorylist">
        <li><a href="/consejoregional/consejerososorno" title="Categoría:Osorno">Osorno</a></li>
        <li><a href="/consejoregional/consejerosllanquihue" title="Categoría:Llanquihue">Llanquihue</a></li>
        <li><a href="/consejoregional/consejeroschiloe" title="Categoría:Chiloé">Chiloé</a></li>
        <li><a href="/consejoregional/consejerospalena"title="Categoría:Palena">Palena</a></li>
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