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
        padding-left: 5rem !important;
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
        background: none repeat scroll 0 0 #E5E8ED;;
        border: 1px solid #E5E8ED;
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
    }

    #categorylist li a:hover{
        background-color: #64C69F;
        color: #FFFFFF;
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
        <li><a routerLink="/result/Carretera Austral" title="Categoría:tags">Política Sostenibilidad Hidrica</a></li>
        <li><a routerLink="/result/La Serena" title="Categoría:tags">Política Personas Mayores</a></li>
        <li><a routerLink="/result/Animales" title="Categoría:tags">Planificación Institucional</a></li>
        <li><a routerLink="/result/Ballenas" title="Categoría:tags">Concurso Público</a></li>
        <li><a routerLink="/result/Ballenas" title="Categoría:tags">Comité Ciencia Tecno e innova</a></li>
    </ul>
</div>