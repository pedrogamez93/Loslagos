<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
     
        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;
       

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
            $archivoPath = $request->file('foto')->store('funcionarios', 'public');
            $datosf['foto'] = $archivoPath;
        }



        $datosf['created_at'] = now();
        $datosf['updated_at'] = now();

   
        Funcionario::insert($datosf);
        return redirect('/funcionarios/create')->with('success', 'Funcionario guardado exitosamente');
    }

    public function buscar(Request $request)
{
    $divisiones = $this->divisiones; 
    $departamentos = $this->departamentos;

    $request->validate([
        'nombre' => 'nullable',
        
        'division'  => 'nullable',
        'departamento' => 'nullable'
    ]);

    $nombre = $request->input('nombre');

    

    $division = $request->input('division');
    $departamento = $request->input('departamento');

    $funcionarios = Funcionario::query();

    if ($nombre) {
        $funcionarios->where('nombre', 'LIKE', "%$nombre%");
    }

    

    if ($division) {
        $funcionarios->where('division', $division);
    }

    if ($departamento) {
        $funcionarios->where('departamento', $departamento);
    }

    $funcionarios = $funcionarios->get();

    return view('funcionarios.resultados', compact('funcionarios', 'divisiones', 'departamentos'));
}


public function edit($id)
{

    $divisiones = $this->divisiones; 
    $departamentos = $this->departamentos;
    $funcionarios = Funcionario::findOrFail($id);
    // Puedes necesitar cargar otras cosas según tus necesidades
    return view('funcionarios.edit', compact('funcionarios', 'divisiones', 'departamentos'));
}

 public function update(Request $request, $id)
{
    $funcionarios = Funcionario::findOrFail($id);

    // Valida y actualiza los campos según tu modelo
    $request->validate([
        'nombre' => 'nullable',
            
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
        // Agrega otras reglas de validación según tus necesidades
    ]);

  

    // Actualiza solo los campos que se proporcionan en la solicitud
    $funcionarios->update(array_filter($request->only([
        'nombre',
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
        'foto',
        'partido_politico',
        'Tfuncionario',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'sexo',
    ])));
    
    // Si se ha enviado un nuevo archivo, maneja la lógica para actualizar 'archivo_path'
    if ($request->hasFile('foto')) {
        if ($funcionarios->foto) {
            // Elimina la foto anterior si existe
            Storage::delete('public/' . $funcionarios->foto);
        }
        // Sube y guarda la nueva foto
        $foto = $request->file('foto')->store('funcionarios', 'public');
        $funcionarios->foto = $foto;
        $funcionarios->save(); // Guarda nuevamente para actualizar 'archivo_path'
    }

    return redirect()->route('funcionarios.verfuncionarios')->with('success', 'Funcionarios actualizado exitosamente');
}

         public function destroy($id)
    {
        $funcionarios = Funcionario::findOrFail($id);
        $funcionarios->delete();

        return redirect()->route('funcionarios.verfuncionarios')->with('success', 'Documento eliminado exitosamente');
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


    
}
