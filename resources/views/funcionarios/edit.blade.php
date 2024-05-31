<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- DATEPICKER-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!-- Incluye los archivos JS de CKEditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<style>
    h1 , h2{
        color: #565656;
    }
    .principal{
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form{
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    font-style: italic;
    }
    .style-label mt-4, p.style-label mt-4{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    }
    .style-col-menu{
        background-color: #0c1e35;
    }
    button.btn.btn-link {
    color: #FFFFFF;
    text-decoration: none;
    font-family: unset;
    font-weight: 700;
    }
    li.style-li{
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu{
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 500;   
    }
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
    }
    p.ck-placeholder {
    height: 350px;
}



/* Estilo para el asterisco */
.required::before {
    content: '*';
    color: red;
    margin-right: 4px;
}
</style>
<div class="container-fluid body">
    <div class="row">
        <div class="col-md-2 style-col-menu">
            <div class="container menu">
            @include('layouts.menu')
            </div>
        </div>
        <div class="col-md-10">
        <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Formulario edicion de funcionario</h1>
                        @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1></h1> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form  action="{{ route('funcionarios.update', ['id' => $funcionario->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="style-label mt-4 required" for="titulo">Nombre:</label>
            <input class="form-control mt-2" type="text" name="nombre" placeholder="Nombre" value="{{ $funcionario->nombre }}">
                       
            <select class="form-select mt-4" aria-label="Default select example" name="actividad">
                <option selected>Actividad o Profesión</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <label for="region">Tipo de funcionario:</label>
                <select class="form-select mt-4" id="Tfuncionario" name="Tfuncionario" onchange="cargarProvincias()">
                    <option value="">Selecciona Tipo de funcionario</option>
                    <option value="Gobernador Regional">Gobernador Regional</option>
                    <option value="Senadores">Senadores</option>
                    <option value="Diputados">Diputados</option>
                    <option value="Gobernaciones">Gobernaciones</option>
                    <option value="Seremis">Seremis</option>
                    <option value="Minucipalidades">Minucipalidades</option>
                    <option value="Consejero Regional">Consejero Regional</option>
                    <option value="Servicios">Servicios</option>
                    <option value="Gobernador Regional 2">Gobernador Regional 2</option>

                </select>

            <select class="form-select mt-4" aria-label="Default select example" name="division" id="division">
            <option value="" disabled selected>Seleccione División</option>
            @foreach ($divisiones as $division)
                <option value="{{ $division }}">{{ $division }}</option>
                @endforeach
            </select>

            <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
            <option value="" disabled selected>Seleccione Departamento</option>
            </select>

            <label class="style-label mt-4 required" for="titulo">Cargo:</label>
            <input class="form-control mt-2" type="text" name="cargo" placeholder="cargo" >

            <label class="style-label mt-4 required" for="titulo">Direccion:</label>
            <input class="form-control mt-2" type="text" name="direccion" placeholder="direccion" value="{{ $funcionario->direccion }}">

            <label class="style-label mt-4 required" for="titulo">Telefono:</label>
            <input class="form-control mt-2" type="text" name="telefono" placeholder="telefono" value="{{ $funcionario->telefono }}">

            <label class="style-label mt-4 required" for="titulo">Email:</label>
            <input class="form-control mt-2" type="text" name="email" placeholder="Email" value="{{ $funcionario->email }}">

            <label class="style-label mt-4 required" for="titulo">Partido Politico:</label>
            <input class="form-control mt-2" type="text" name="partido_politico" placeholder="Partido Politico" value="{{ $funcionario->partido_politico }}">

            <label class="style-label mt-4 required" for="titulo">Biografia:</label>
            <textarea class="form-control mt-2" type="text" name="biografia" placeholder="{{ $funcionario->biografia }}" value="{{ $funcionario->biografia }}"></textarea>

            <label class="style-label mt-4 required" for="titulo">Funciones:</label>
            <textarea class="form-control mt-2" type="text" name="funciones" placeholder="{{ $funcionario->funciones }}"  value="{{ $funcionario->funciones }}"></textarea>


            <div class="form-group">
               <label for="fecha_nacimiento">Fecha de nacimiento</label>
               <input type="datetime-local" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ $funcionario->fecha_nacimiento }}">
             </div>

             <label class="style-label mt-4 required" for="lugar_nacimiento">Lugar de nacimiento</label>
            <input class="form-control mt-2" type="text" name="lugar_nacimiento" placeholder="Lugar de nacimiento" value="{{ $funcionario->lugar_nacimiento }}">

            <label for="region">Región:</label>
    <select class="form-select mt-4" id="region" name="region" onchange="cargarProvincias()">
        <option value="">Selecciona una región</option>
        <!-- Aquí puedes agregar opciones para cada región -->
    </select>

    <label for="provincia">Provincia:</label>
    <select class="form-select mt-4" id="provincia" name="provincia" onchange="cargarComunas()">
        <option value="">Selecciona una provincia</option>
        <!-- Las opciones de provincias se cargarán dinámicamente mediante JavaScript -->
    </select>

    <label for="comuna">Comuna:</label>
    <select  class="form-select mt-4" id="comuna" name="comuna">
        <option value="">Selecciona una comuna</option>
        <!-- Las opciones de comunas se cargarán dinámicamente mediante JavaScript -->
    </select>

    <label for="sexo">Sexo:</label>
    <select  class="form-select mt-4" id="sexo" name="sexo">
    <option value="Masculino" {{ $funcionario->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="Femenino" {{ $funcionario->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        <option value="Otros" {{ $funcionario->sexo == 'Otros' ? 'selected' : '' }}>Otros</option>
    </select>


    <!-- @if($funcionario->foto)
    <div class="mb-3 mt-4">
        <label class="style-label mt-4" for="current_image">Imagen Actual:</label>
        <img src="{{ route('mostrar.imagen', ['carpeta' => 'funcionario', 'imagen' => basename($funcionario->foto)]) }}" class="img-fluid imagen-con-brillo mx-5" alt="{{ $funcionario->titulo }}" id="currentImage" style="max-width: 200px; max-height: 200px;">
    </div>
@endif -->

<!-- Sección para previsualizar y reemplazar la nueva imagen -->
<!-- <div class="mb-3 mt-4">
    <label for="formFile" class="form-label">Suba aquí la foto correspondiente</label>
    <input class="form-control" type="file" name="foto" id="foto" onchange="previewAndReplaceImage(this)">
</div> -->


            <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // En tu script JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        var divisionSelect = document.getElementById('division');
        var departamentoSelect = document.getElementById('departamento');

        divisionSelect.addEventListener('change', function () {
            var selectedDivision = this.value;
            var departamentos = <?php echo json_encode($departamentos); ?>;

            // Limpiar opciones anteriores
            departamentoSelect.innerHTML = '<option value="" disabled selected>Seleccione Departamento</option>';

            // Agregar nuevas opciones
            if (departamentos[selectedDivision]) {
                departamentos[selectedDivision].forEach(function (departamento) {
                    var option = document.createElement('option');
                    option.value = departamento;
                    option.text = departamento;
                    departamentoSelect.add(option);
                });
                departamentoSelect.disabled = false; // Habilitar el segundo select
            } else {
                departamentoSelect.disabled = true; // Deshabilitar si no hay departamentos
            }
        });
    });
</script>
<script>
        // Datos proporcionados
        var regiones = [
            { "nombre": "Arica y Parinacota", "provincias": [
                { "nombre": "Arica", "comunas": ["Arica", "Camarones"] },
                { "nombre": "Parinacota", "comunas": ["Putre", "General Lagos"] }
            ] },
            { "nombre": "Tarapacá", "provincias": [
                { "nombre": "Iquique", "comunas": ["Iquique", "Alto Hospicio"] },
                { "nombre": "Tamarugal", "comunas": ["Pozo Almonte", "Camiña", "Colchane", "Huara", "Pica"] }
            ] }, { "nombre": "Antofagasta", "provincias": [
            { "nombre": "Antofagasta", "comunas": ["Antofagasta", "Mejillones", "Sierra Gorda", "Taltal"] },
            { "nombre": "El Loa", "comunas": ["Calama", "Ollagüe", "San Pedro de Atacama"] },
            { "nombre": "Tocopilla", "comunas": ["Tocopilla", "María Elena"] }
        ] },
        { "nombre": "Atacama", "provincias": [
            { "nombre": "Chañaral", "comunas": ["Chañaral", "Diego de Almagro"] },
            { "nombre": "Copiapó", "comunas": ["Copiapó", "Caldera", "Tierra Amarilla"] },
            { "nombre": "Huasco", "comunas": ["Vallenar", "Alto del Carmen", "Freirina", "Huasco"] }
        ] },
        { "nombre": "Coquimbo", "provincias": [
            { "nombre": "Elqui", "comunas": ["La Serena", "Coquimbo", "Andacollo", "La Higuera", "Paihuano", "Vicuña"] },
            { "nombre": "Limarí", "comunas": ["Ovalle", "Combarbalá", "Monte Patria", "Ovalle", "Punitaqui", "Río Hurtado"] }
        ] },
        { "nombre": "Valparaíso", "provincias": [
            { "nombre": "Valparaíso", "comunas": ["Valparaíso", "Casablanca", "Concón", "Juan Fernández", "Puchuncaví", "Quintero", "Valparaíso", "Viña del Mar"] },
            { "nombre": "Los Andes", "comunas": ["Los Andes", "Calle Larga", "Rinconada de Los Andes", "San Esteban"] },
            { "nombre": "Marga Marga", "comunas": ["Quilpué", "Limache", "Olmué", "Quilpué", "Villa Alemana"] },
            { "nombre": "Petorca", "comunas": ["La Ligua", "Cabildo", "La Ligua", "Papudo", "Petorca", "Zapallar"] },
            { "nombre": "Quillota", "comunas": ["Quillota", "Hijuelas", "La Calera", "La Cruz", "Nogales", "Quillota"] },
            { "nombre": "San Antonio", "comunas": ["San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo", "San Antonio", "Santo Domingo"] }
        ] },
        { "nombre": "San Felipe de Aconcagua", "provincias": [
            { "nombre": "San Felipe", "comunas": ["San Felipe", "Catemu", "Llaillay", "Panquehue", "Putaendo", "San Felipe", "Santa María"] }
        ] },
        { "nombre": "Libertador General Bernardo O'Higgins", "provincias": [
            { "nombre": "Rancagua", "comunas": ["Rancagua", "Codegua", "Coínco", "Coltauco", "Doñihue", "Graneros", "Las Cabras", "Machalí", "Malloa", "Olivar", "Peumo", "Pichidegua", "Quinta de Tilcoco", "Rancagua", "Requínoa", "Rengo", "San Francisco de Mostazal", "San Vicente de Tagua Tagua"] },
            { "nombre": "Cardenal Caro", "comunas": ["Pichilemu", "La Estrella", "Litueche", "Marchigüe", "Navidad", "Paredones", "Pichilemu"] },
            { "nombre": "Colchagua", "comunas": ["San Fernando", "Chépica", "Chimbarongo", "Lolol", "Nancagua", "Palmilla", "Peralillo", "Placilla", "Pumanque", "San Fernando", "Santa Cruz"] }
        ] },
        { "nombre": "Maule", "provincias": [
            { "nombre": "Talca", "comunas": ["Talca", "Constitución", "Curepto", "Empedrado", "Maule", "Pelarco", "Pencahue", "Río Claro", "San Clemente", "San Rafael", "Talca"] },
            { "nombre": "Cauquenes", "comunas": ["Cauquenes", "Chanco", "Pelluhue"] },
            { "nombre": "Curicó", "comunas": ["Curicó", "Hualañé", "Licantén", "Molina", "Rauco", "Romeral", "Sagrada Familia", "Teno", "Vichuquén"] },
            { "nombre": "Linares", "comunas": ["Linares", "Colbún", "Longaví", "Parral", "Retiro", "San Javier de Loncomilla", "Villa Alegre", "Yerbas Buenas"] }
        ] },{ "nombre": "Ñuble", "provincias": [
            { "nombre": "Chillán", "comunas": ["Chillán", "Bulnes", "Coihueco", "Ñiquén", "San Carlos", "San Fabián", "San Nicolás"] },
            { "nombre": "Diguillín", "comunas": ["Quirihue", "Cobquecura", "Coelemu", "Ninhue", "Portezuelo", "Quirihue", "Ránquil", "Treguaco"] },
            { "nombre": "Punilla", "comunas": ["San Carlos", "Coihueco", "Ñiquén", "San Fabián", "San Nicolás"] }
        ] },
        { "nombre": "Biobío", "provincias": [
            { "nombre": "Concepción", "comunas": ["Concepción", "Chiguayante", "Coronel", "Florida", "Hualpén", "Hualqui", "Lota", "Penco", "San Pedro de la Paz", "Santa Juana", "Talcahuano", "Tomé"] },
            { "nombre": "Arauco", "comunas": ["Lebu", "Arauco", "Cañete", "Contulmo", "Curanilahue", "Los Álamos", "Tirúa"] },
            { "nombre": "Biobío", "comunas": ["Los Ángeles", "Alto Biobío", "Antuco", "Cabrero", "Laja", "Los Ángeles", "Mulchén", "Nacimiento", "Negrete", "Quilaco", "Quilleco", "San Rosendo", "Santa Bárbara", "Tucapel", "Yumbel"] }
        ] },
        { "nombre": "Araucanía", "provincias": [
            { "nombre": "Cautín", "comunas": ["Temuco", "Carahue", "Cholchol", "Cunco", "Curarrehue", "Freire", "Galvarino", "Gorbea", "Lautaro", "Loncoche", "Melipeuco", "Nueva Imperial", "Padre Las Casas", "Perquenco", "Pitrufquén", "Pucón", "Saavedra", "Temuco", "Teodoro Schmidt", "Toltén", "Vilcún", "Villarrica"] },
            { "nombre": "Malleco", "comunas": ["Angol", "Collipulli", "Curacautín", "Ercilla", "Lonquimay", "Los Sauces", "Lumaco", "Purén", "Renaico", "Traiguén", "Victoria"] }
        ] },
        { "nombre": "Los Ríos", "provincias": [
            { "nombre": "Valdivia", "comunas": ["Valdivia", "Corral", "Lanco", "Los Lagos", "Máfil", "Mariquina", "Paillaco", "Panguipulli"] },
            { "nombre": "Ranco", "comunas": ["La Unión", "Futrono", "Lago Ranco", "Río Bueno"] }
        ] },
        { "nombre": "Los Lagos", "provincias": [
            { "nombre": "Puerto Montt", "comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "Frutillar", "Llanquihue", "Los Muermos", "Maullín", "Puerto Varas"] },
            { "nombre": "Chiloé", "comunas": ["Castro", "Ancud", "Chonchi", "Curaco de Vélez", "Dalcahue", "Puqueldón", "Queilén", "Quellón", "Quemchi", "Quinchao"] },
            { "nombre": "Llanquihue", "comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "Frutillar", "Llanquihue", "Los Muermos", "Maullín", "Puerto Montt", "Puerto Varas"] },
            { "nombre": "Osorno", "comunas": ["Osorno", "Puerto Octay", "Purranque", "Puyehue", "Río Negro", "San Pablo", "San Juan de la Costa"] },
            { "nombre": "Palena", "comunas": ["Chaitén", "Futaleufú", "Hualaihué", "Palena"] }
        ] },
            // ... (resto de las regiones)
        ];

        var provincias = [];
        var comunas = [];

        // Función para cargar las regiones en el primer select al cargar la página
        window.onload = function () {
            var regionSelect = document.getElementById("region");

            regiones.forEach(function (region) {
                var option = document.createElement("option");
                option.value = region.nombre;
                option.text = region.nombre;
                regionSelect.appendChild(option);
            });
        };

        // Función para cargar las provincias en el segundo select
        function cargarProvincias() {
            var regionSelect = document.getElementById("region");
            var provinciaSelect = document.getElementById("provincia");
            var comunaSelect = document.getElementById("comuna");

            // Obtener la región seleccionada
            var selectedRegion = regionSelect.value;

            // Limpiar los selects de provincias y comunas
            provinciaSelect.innerHTML = "<option value=''>Selecciona una provincia</option>";
            comunaSelect.innerHTML = "<option value=''>Selecciona una comuna</option>";

            // Buscar la región en los datos proporcionados
            var region = regiones.find(function (r) {
                return r.nombre === selectedRegion;
            });

            // Verificar que se haya encontrado la región
            if (region) {
                // Cargar las provincias correspondientes a la región seleccionada
                region.provincias.forEach(function (provincia) {
                    var option = document.createElement("option");
                    option.value = provincia.nombre;
                    option.text = provincia.nombre;
                    provinciaSelect.appendChild(option);
                });
            }
        }

        // Función para cargar las comunas en el tercer select
        function cargarComunas() {
            var provinciaSelect = document.getElementById("provincia");
            var comunaSelect = document.getElementById("comuna");

            // Obtener la provincia seleccionada
            var selectedProvincia = provinciaSelect.value;

            // Limpiar el select de comunas
            comunaSelect.innerHTML = "<option value=''>Selecciona una comuna</option>";

            // Buscar la provincia en los datos proporcionados
            var provincia = null;

            regiones.forEach(function (region) {
                var foundProvincia = region.provincias.find(function (p) {
                    return p.nombre === selectedProvincia;
                });

                if (foundProvincia) {
                    provincia = foundProvincia;
                }
            });

            // Verificar que se haya encontrado la provincia
            if (provincia) {
                // Cargar las comunas correspondientes a la provincia seleccionada
                provincia.comunas.forEach(function (comuna) {
                    var option = document.createElement("option");
                    option.value = comuna;
                    option.text = comuna;
                    comunaSelect.appendChild(option);
                });
            }
        }
    </script>

<script>
     function previewAndReplaceImage(input) {
        var currentImage = document.getElementById('currentImage');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            currentImage.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            currentImage.src = ''; // Puedes ajustar esto según tus necesidades
        }
    }
</script>