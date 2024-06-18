<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;
use Illuminate\Support\FacadesLog;
use Illuminate\Support\Facades\Log;
class FuncionarioController extends Controller
{

    private $divisiones;
    private $departamentos;

    public function __construct()
    {
        $this->divisiones = [
            'Administración y Finanzas',
            'Presupuesto e Inversión Regional',
            'Planificación y Desarrollo Regional',
            'División Planificación y Desarrollo Regional',
            'Consejo Regional',
            'Intendencia',
            'Gabinete Intendente Regional',
            'División de Fomento e Industria',
            'División de Desarrollo Social y Humano',
            'División de Infraestructura y Transporte',
            'Administrador Regional',
            'Gobernador Regional'
            // ... otras divisiones ...
            ];

            $this->departamentos = [
        'Administración y Finanzas' => [
            "Departamento Finanzas y Presupuesto",
            "Departamento de Gestión y Desarrollo de Personas",
            "Servicios Generales y Correspondencia",
            "Unidad de Informática",
            "Unidad de Adquisiciones",
            "Oficina de Partes y Servicios Generales",
            "Oficina de Partes",
            "Intendencia",
            "Unidad de Prensa",
            "Unidad de Archivos",
            "Unidad de Tecnologías de Información",
            "Unidad de Control de Gestión y Desarrollo"
            // ... otros departamentos ...
        ],
        'Presupuesto e Inversión Regional' => [
            "Departamento de Inversiones",
            "Unidad Jurídica",
            "Departamento de Inversión Complementaria",
            "Unidad de Programación y Control Presupuestario",
            "División Presupuesto e Inversión Regional"
            // ... otros departamentos ...
        ],
        'División Planificación y Desarrollo Regional' => [
            'Departamento Municipios y Forta. Gob.',
            'Unidad Borde Costero',
            'Unidad Provincial de Chiloé',
            'Unidad Provincial de Osorno',
            'Unidad Provincial de Palena',
            'Unidad de Asuntos Internacionales',
            'Unidad de Fomento e Innovación',
            'Unidad Provincial Chiloé',
            'Unidad Provincial Osorno',
            'Unidad Provincial Palena',
            'Plan Patagonia Verde',
            'Unidad Gestion Municipal y Prog. Subdere',
            'División Planificación y Desarrollo Regional',
            'Programa Des. y Fort. de Politica de Prod. Limpia',
            'Departamento de Ordenamiento Territorial',
            'Departamento Estudios y Ordenamiento Territorial',
            'Plan Patagonia Verde-Sectorialistas',
            'Unidad Fortalecimiento y Desarrollo Regional',
            'Depto. Gestion de la Planificacion Estrategica',
            'Depto. Planificacion Estrategica y Politicas Publi',
            'Unidad de Pre Inversion'

        ],
        'Consejo Regional' => [
            
            'Secretaría del Consejo Regional'
        ],

         'Intendencia' => [
        
        ],

        'Gabinete Intendente Regional' => [
       
        ],

        'División de Fomento e Industria' => [
         
            'División de Fomento e Industria'
        ],

         'División de Desarrollo Social y Humano' => [
       
           'División de Desarrollo Social y Humano',
           'Departamento Social' ],

        'División de Infraestructura y Transporte' => [
             'División de Infraestructura y Transporte'
        ],

        'Administrador Regional' => [
         
         'Departamento Jurídico',
         'Unidad de Auditoría',
         'Secretaría Ejecutiva del Consejo Regional' ],

        'Gobernador Regional' => [
          ]

    
];
    }



    public function index() 
    {
     
        // Obtener divisiones y departamentos únicos de los funcionarios
    $divisiones = Funcionario::distinct()->pluck('division');
    $departamentos = Funcionario::distinct()->pluck('departamento');

       // $divisiones = $this->divisiones; 
       // $departamentos = $this->departamentos;
       
    // También puedes agruparlos si es necesario
    // $divisiones = Funcionario::groupBy('division')->pluck('division');
    // $departamentos = Funcionario::groupBy('departamento')->pluck('departamento');

    // Obtener todos los funcionarios
    $funcionarios = Funcionario::all();
    return view('funcionarios.index', compact('funcionarios', 'divisiones', 'departamentos'));
   
}


public function indexTabla()
{
    // Obtener todos los funcionarios ordenados por fecha de creación y paginados
    $funcionarios = Funcionario::orderBy('created_at', 'asc')->paginate(20);

    // Retornar la vista con los funcionarios paginados
    return view('funcionarios.tablafuncionarios', compact('funcionarios'));
}



    public function create()
    {

        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;

        return view('funcionarios.create', compact('divisiones', 'departamentos'));
    }

    public function store(Request $request)
    {

      
        $request->validate([
            'nombre' => 'nullable',
            'apellido' => 'required',
            'actividad' => 'nullable',
            'division' => 'nullable',
            'departamento' => 'nullable',
            'cargo' => 'nullable',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'e-mail' => 'nullable',
            'region' => 'nullable',
            'provincia' => 'nullable',
            'comuna' => 'nullable',
            'partido_politico' => 'nullable',
            'Tfuncionario' => 'nullable',
            'fecha_nacimiento' => 'nullable',
            'lugar_nacimiento' => 'nullable',
            'sexo' => 'nullable'
           
        ]);

       
        $datosf = $request->except('_token');

         // Manejo del archivo
         if ($request->hasFile('foto')) {
            $archivoPath = $request->file('foto')->store('public/funcionarios');
            $datosf['foto'] = $archivoPath;
        }
        


        $datosf['created_at'] = now();
        $datosf['updated_at'] = now();

   
        Funcionario::insert($datosf);
        return redirect('/funcionarios/create')->with('success', 'Funcionario guardado exitosamente');
    }

    public function buscar(Request $request)
    {
        // Verificar que las variables divisiones y departamentos están definidas
        $divisiones = $this->divisiones ?? [];
        $departamentos = $this->departamentos ?? [];
    
        // Agregar registros de depuración
        Log::info('Datos recibidos del formulario:', $request->all());
    
        try {
            // Validación de los datos
            $request->validate([
                'nombre' => 'nullable|string',
                'apellido' => 'nullable|string',
                'sexo'  => 'nullable|string',
                'division'  => 'nullable|string',
                'departamento' => 'nullable|string'
            ]);
    
            Log::info('Validación completada');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Errores de validación:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    
        // Obtener los valores de los campos del formulario
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $division = $request->input('division');
        $sexo = $request->input('sexo');
        $departamento = $request->input('departamento');
    
        // Agregar registros de depuración para cada campo
        Log::info('Valor de nombre:', ['nombre' => $nombre]);
        Log::info('Valor de apellido:', ['apellido' => $apellido]);
        Log::info('Valor de division:', ['division' => $division]);
        Log::info('Valor de sexo:', ['sexo' => $sexo]);
        Log::info('Valor de departamento:', ['departamento' => $departamento]);
    
        // Construir la consulta
        $funcionarios = Funcionario::query();
    
        if ($nombre) {
            $funcionarios->where('nombre', 'LIKE', "%$nombre%");
            Log::info('Filtro aplicado: nombre');
        }
    
        if ($apellido) {
            $funcionarios->where('apellido', 'LIKE', "%$apellido%");
            Log::info('Filtro aplicado: apellido');
        }
    
        if ($division) {
            $funcionarios->where('division', $division);
            Log::info('Filtro aplicado: division');
        }
    
        if ($departamento) {
            $funcionarios->where('departamento', $departamento);
            Log::info('Filtro aplicado: departamento');
        }
    
        if ($sexo) {
            $funcionarios->where('sexo', $sexo);
            Log::info('Filtro aplicado: sexo');
        }
    
        // Obtener los resultados
        $funcionarios = $funcionarios->get();
    
        // Verificar si se encontraron resultados
        if ($funcionarios->isEmpty()) {
            Log::info('No se encontraron resultados.');
        } else {
            Log::info('Resultados de la búsqueda:', $funcionarios->toArray());
        }
    
        // Devolver la vista con los datos
        return view('funcionarios.resultados', compact('funcionarios', 'divisiones', 'departamentos'));
    }
    
    
    

public function edit2(Request $request)
{
    $id = $request->input('id');
    // Registro inicial para verificar que la función se está llamando
    logger()->info('Entrando a la función edit', ['id' => $id]);

    try {
        // Verificar si las divisiones y departamentos están definidas
        if (!isset($this->divisiones) || !isset($this->departamentos)) {
            throw new \Exception("Divisiones o departamentos no están definidos.");
        }

        // Obtener divisiones y departamentos
        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;

        // Registro para verificar divisiones y departamentos
        logger()->info('Divisiones y departamentos obtenidos', [
            'divisiones' => $divisiones,
            'departamentos' => $departamentos,
        ]);

        // Buscar el funcionario por el ID proporcionado
        $funcionario = Funcionario::findOrFail($id);

        // Registro para verificar que el funcionario fue encontrado
        logger()->info('Funcionario encontrado', ['funcionario' => $funcionario]);

        // Pasar los datos a la vista
        return view('funcionarios.edit', compact('funcionario', 'divisiones', 'departamentos'));
    } catch (\Exception $e) {
        // Registrar el error y redirigir con un mensaje de error
        logger()->error('Error al editar funcionario', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Ocurrió un error al cargar la información del funcionario: ' . $e->getMessage());
    }
}


public function edit($id)
{
  
    // Registro inicial para verificar que la función se está llamando
    logger()->info('Entrando a la función edit', ['id' => $id]);

    try {
        // Verificar si las divisiones y departamentos están definidas
        if (!isset($this->divisiones) || !isset($this->departamentos)) {
            throw new \Exception("Divisiones o departamentos no están definidos.");
        }

        // Obtener divisiones y departamentos
        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;

        // Registro para verificar divisiones y departamentos
        logger()->info('Divisiones y departamentos obtenidos', [
            'divisiones' => $divisiones,
            'departamentos' => $departamentos,
        ]);

        // Buscar el funcionario por el ID proporcionado
        $funcionario = Funcionario::findOrFail($id);

        // Registro para verificar que el funcionario fue encontrado
        logger()->info('Funcionario encontrado', ['funcionario' => $funcionario]);

        // Pasar los datos a la vista
        return view('funcionarios.edit', compact('funcionario', 'divisiones', 'departamentos'));
    } catch (\Exception $e) {
        // Registrar el error y redirigir con un mensaje de error
        logger()->error('Error al editar funcionario', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Ocurrió un error al cargar la información del funcionario: ' . $e->getMessage());
    }
}


public function update(Request $request, $id)
{
    logger()->info('Entrando a la función update', ['id' => $id]);

    // Encontrar el funcionario por ID
    $funcionarios = Funcionario::findOrFail($id);

    // Validación de los campos
    $request->validate([
        'nombre' => 'nullable',
        'apellido' => 'nullable',
        'actividad' => 'nullable',
        'division' => 'nullable',
        'departamento' => 'nullable',
        'cargo' => 'nullable',
        'direccion' => 'nullable',
        'telefono' => 'nullable',
        'e-mail' => 'nullable',
        'region' => 'nullable',
        'provincia' => 'nullable',
        'comuna' => 'nullable',
        'partido_politico' => 'nullable',
        'Tfuncionario' => 'nullable',
        'fecha_nacimiento' => 'nullable',
        'lugar_nacimiento' => 'nullable',
        'sexo' => 'nullable',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validación para la foto
    ]);

    logger()->info('Validación completada');

    // Actualizar los campos proporcionados
    $funcionarios->update(array_filter($request->only([
        'nombre',
        'apellido',
        'actividad',
        'division',
        'departamento',
        'cargo',
        'direccion',
        'telefono',
        'e-mail',
        'region',
        'provincia',
        'comuna',
        'partido_politico',
        'Tfuncionario',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'sexo'
    ])));

    logger()->info('Datos actualizados', ['funcionario' => $funcionarios]);

    // Si se ha subido una nueva foto, manejar la actualización
    if ($request->hasFile('foto')) {
        logger()->info('Foto subida');
        // Eliminar la foto anterior si existe
        if ($funcionarios->foto) {
            Storage::delete('public/' . $funcionarios->foto);
        }
        // Subir y guardar la nueva foto
        $foto = $request->file('foto')->store('funcionarios', 'public');
        $funcionarios->foto = $foto;
        $funcionarios->save(); // Guardar nuevamente para actualizar 'foto'
    }

    logger()->info('Actualización completa');

    return redirect()->route('funcionarios.verfuncionarios')->with('success', 'Funcionario actualizado exitosamente');
}



    public function mostrarImagen($carpeta, $imagen)
    {
        $rutaCompleta = storage_path("app/public/{$carpeta}/{$imagen}");
    
        if (file_exists($rutaCompleta)) {
            return response()->file($rutaCompleta);
        } else {
            abort(404); // O redirige a una página de error según tus necesidades
        }
    }



        public function show(int $id)
    {

        $divisiones = $this->divisiones; 
    $departamentos = $this->departamentos;
        $funcionario = Funcionario::findOrFail($id);

        return view('funcionarios.show',  compact('funcionario', 'divisiones', 'departamentos'));
       
    }

    public function obtenerUbicaciones()
    {
        $jsonPath = storage_path('app/json/localidades.json');

        if (File::exists($jsonPath)) {
            $ubicaciones = File::get($jsonPath);

            return response()->json($ubicaciones);
        }

        return response()->json(['error' => 'Archivo no encontrado'], 404);
    }


    public function getcargarMasiva()
    {

      

        return view('funcionarios.cargamasiva');
    }


    public function cargamasiva(Request $request)
{
    try {
        // Validar que se haya enviado un archivo CSV
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        // Obtener el archivo CSV cargado
        $archivo = $request->file('csv_file');

        // Leer el contenido del archivo CSV
        $reader = Reader::createFromPath($archivo->getPathname(), 'r');
        $reader->setHeaderOffset(0); // Saltar la primera fila (cabeceras)

        // Recorrer cada fila del archivo CSV
        foreach ($reader as $fila) {
            // Convertir los valores de la fila a UTF-8
            $fila = array_map(function($value) {
                return mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1');
            }, $fila);

            // Verificar y asignar valores predeterminados
            $nombre = $fila['nombre'] ?? 'No especificado';
            $apellido = $fila['apellido'] ?? 'No especificado';
            $actividad = $fila['actividad'] ?? 'No especificado';
            $division = $fila['division'] ?? 'No especificado';
            $departamento = $fila['departamento'] ?? 'No especificado';
            $cargo = $fila['cargo'] ?? 'No especificado';
            $direccion = $fila['direccion'] ?? 'No especificado';
            $telefono = $fila['telefono'] ?? '0000';
            $email = $fila['e-mail'] ?? 'No especificado';
            $region = $fila['region'] ?? 'No especificado';
            $provincia = $fila['provincia'] ?? 'No especificado';
            $comuna = $fila['comuna'] ?? 'No especificado';
            $foto = $fila['foto'] ?? 'No especificado';
            $partido_politico = $fila['partido_politico'] ?? 'No especificado';
            $biografia = $fila['biografia'] ?? 'No especificado';
            $funciones = $fila['funciones'] ?? 'No especificado';
            $Tfuncionario = $fila['Tfuncionario'] ?? 'No especificado';
            $fecha_nacimiento = $fila['fecha_nacimiento'] ?? null;
            $lugar_nacimiento = $fila['lugar_nacimiento'] ?? 'No especificado';
            $sexo = $fila['sexo'] ?? 'No especificado';
            $foto_url = $fila['foto_url'] ?? 'foto';

            // Insertar en la base de datos
            Funcionario::create([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'actividad' => $actividad,
                'division' => $division,
                'departamento' => $departamento,
                'cargo' => $cargo,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'region' => $region,
                'provincia' => $provincia,
                'comuna' => $comuna,
                'foto' => $foto,
                'partido_politico' => $partido_politico,
                'biografia' => $biografia,
                'funciones' => $funciones,
                'Tfuncionario' => $Tfuncionario,
                'fecha_nacimiento' => $fecha_nacimiento,
                'lugar_nacimiento' => $lugar_nacimiento,
                'sexo' => $sexo,
                'foto_url' => $foto_url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'Los funcionarios han sido registrados exitosamente.');
    } catch (\Exception $e) {
        // Manejar el error y mostrar un mensaje de error
        Log::error('Error al procesar el archivo CSV: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error al procesar el archivo CSV: ' . $e->getMessage());
    }
}

    
    
}
