<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IntroduccionRegionLagos;
use App\Models\AntecedentesRegion;
use App\Models\Autoridades;
use App\Models\Estadisticas;
use App\Models\DinamicaEconomica;
use App\Models\ExportacionSegunRamaActividad;
use App\Models\ExportacionSegunBloqueEconomico;
use App\Models\FNDR;
use App\Models\ActividadEconomica;
use App\Models\ActividadesEconomicaI;

use Carbon\Carbon;

class IntroduccionRegionLagosController extends Controller
{
    //
    public function index()
    {
        $articulo = IntroduccionRegionLagos::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = IntroduccionRegionLagos::find($id);
            return view('IntroduccionRegionLagos.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.create');
        }
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|max:2048',
        ]);
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        IntroduccionRegionLagos::create($data);
    
        return redirect(route('IntroduccionRegionLagos.index'))->with('success', 'Artículo creado con éxito');
    }
    public function show(IntroduccionRegionLagos $articulo)
    {
        
        return view('show', compact('articulo'));
    }


    public function edit($id)
    {
        $Introduccion = IntroduccionRegionLagos::find($id);
        return view('edit', compact('Introduccion'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|max:2048',
        ]);
    
        $articulo = IntroduccionRegionLagos::find($id);
    
        if ($articulo) {
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('images', 'public');
                $data['imagen'] = $imagenPath;
            }
            $articulo->update($data);
            return redirect()->route('IntroduccionRegionLagos.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('IntroduccionRegionLagos.index')->with('error', 'Artículo no encontrado');
        }
    } 
    // Fin Introduccion
    // Inicio Antecedentes
    public function indexAntecedentes()
    {
        $articulo = AntecedentesRegion::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $Antecedentes = AntecedentesRegion::find($id);
            return view('IntroduccionRegionLagos.AntecedentesRegion.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.AntecedentesRegion.create');
        }
    }
    public function createAntecedentes()
    {
        return view('IntroduccionRegionLagos.AntecedentesRegion.create');
    }
    public function storeAntecedentes(Request $request)
    {
        
        $data = $request->validate([
            'nombreseccion' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|max:2048',
        ]);

        
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        AntecedentesRegion::create($data);
    
        return redirect(route('AntecedentesRegionLagos.indexAntecedentes'))->with('success', 'Artículo creado con éxito');
    }
    public function showAntecedentes(AntecedentesRegion $Antecedentes)
    {
        
        return view('IntroduccionRegionLagos.show', compact('Antecedentes'));
    }
    public function editAntecedentes($id)
    {
        $Introduccion = AntecedentesRegion::find($id);
        return view('IntroduccionRegionLagos.AntecedentesRegion.edit', compact('Introduccion'));
    }
    public function destroyAntecedentes($id)
{
    $articulo = AntecedentesRegion::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('error', 'Artículo no encontrado');
    }
}
public function updateAntecedentes(Request $request, $id)
{
    $data = $request->validate([
        'nombreseccion' => 'required',
        'subtitulo' => 'required',
        'descripcion' => 'required',
        'imagen' => 'image|max:2048',
    ]);

    $articulo = AntecedentesRegion::find($id);

    if ($articulo) {
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
        $articulo->update($data);
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('error', 'Artículo no encontrado');
    }
} 
    // Fin Antecedentes
    // Inicio Cargo
    public function indexCargos()
    {
        $articulo = CargoRegionLagos::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $Antecedentes = CargoRegionLagos::find($id);
            return view('IntroduccionRegionLagos.CargosRegion.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.CargosRegion.create');
        }
    }
    public function storeCargos(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
         ]);
    
        CargoRegionLagos::create($data);
    
        return redirect(route('CargoRegionLagos.indexCargos'))->with('success', 'Artículo creado con éxito');
    }
    public function createCargos()
    {
        return view('IntroduccionRegionLagos.CargosRegion.create');
    }
    public function editCargos($id)
    {
        $Introduccion = CargoRegionLagos::find($id);
        return view('IntroduccionRegionLagos.CargosRegion.edit', compact('Introduccion'));
    }
    public function destroyCargos($id)
{
    $articulo = CargoRegionLagos::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('CargoRegionLagos.indexCargos')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('CargoRegionLagos.indexCargos')->with('error', 'Artículo no encontrado');
    }
}
public function updateCargos(Request $request, $id)
{
    $data = $request->validate([
        'nombre' => 'required',
    ]);

    $articulo = CargoRegionLagos::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('CargoRegionLagos.indexCargos')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('CargoRegionLagos.indexCargos')->with('error', 'Artículo no encontrado');
    }
} 
    // Fin Cargo
    // Fin Autoridades
    public function indexAutoridades()
    {
        $articulo = Autoridades::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            return view('IntroduccionRegionLagos.Autoridades.show', compact('articulo'));
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.Autoridades.create');
        }
    }
    public function createAutoridades()
    {
        return view('IntroduccionRegionLagos.Autoridades.create');
    }
    public function storeAutoridades(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'lugar_fecha_nacimiento' => 'required',
            'actividad_profesion' => 'required',
            'partido_politico' => 'required',
            'cargo' => 'required',
            'institucion' => 'required',
            'direccion' => 'required',
            'fono' => 'required',
            'fax' => 'required',
            'Email' => 'required',
            'region' => 'required',
            'provincia' => 'required',
            'comuna' => 'required',
            'web' => 'required',
            'biografia' => 'required',
            'foto' => 'image|max:2048',
        ]);
    
        // Procesar fechas
        $fecha = $request->input('lugar_fecha_nacimiento')
        ? Carbon::createFromFormat('d-m-Y', $request->input('lugar_fecha_nacimiento'))->toDateString()
        : null;


        $data['lugar_fecha_nacimiento'] = $fecha;

        if ($request->hasFile('foto')) {
            $imagenPath = $request->file('foto')->store('images', 'public');
            $data['foto'] = $imagenPath;
        }
    
        Autoridades::create($data);
    
        return redirect(route('AutoridadesRegionLagos.indexAutoridades'))->with('success', 'Artículo creado con éxito');
    }
    public function editAutoridades($id)
    {
        $articulo = Autoridades::find($id);
        return view('IntroduccionRegionLagos.Autoridades.edit', compact('articulo'));
    }
    public function destroyAutoridades ($id)
{
    $articulo = Autoridades::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('AutoridadesRegionLagos.indexAutoridades')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('AutoridadesRegionLagos.indexAutoridades')->with('error', 'Artículo no encontrado');
    }
}
public function updateAutoridades(Request $request, $id)
{
    $data = $request->validate([
        'nombre' => 'required',
            'lugar_fecha_nacimiento' => 'required',
            'actividad_profesion' => 'required',
            'partido_politico' => 'required',
            'cargo' => 'required',
            'institucion' => 'required',
            'direccion' => 'required',
            'fono' => 'required',
            'fax' => 'required',
            'Email' => 'required',
            'region' => 'required',
            'provincia' => 'required',
            'comuna' => 'required',
            'web' => 'required',
            'biografia' => 'required',
            'foto' => 'image|max:2048',
    ]);

    $articulo = Autoridades::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('AutoridadesRegionLagos.indexAutoridades')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('AutoridadesRegionLagos.indexAutoridades')->with('error', 'Artículo no encontrado');
    }
} 
    // Fin Autoridades
    // Inicio Estadistica
    public function indexEstadisticas()
    {
        $articulo = Estadisticas::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            return view('IntroduccionRegionLagos.Estadisticas.show', compact('articulo'));
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.Estadisticas.create');
        }
    }
    public function storeEstadisticas(Request $request)
    {
        $data = $request->validate([
            'provincia' => 'required',
            'superficie' => 'required',
            'comuna' => 'required',
            'p_urbana_hombre' => 'required',
            'p_urbana_mujeres' => 'required',
            'p_rural_hombre' => 'required',
            'p_rural_mujeres' => 'required',
        ]);
   
        Estadisticas::create($data);
   
        return redirect(route('EstadisticasRegionLagos.indexEstadisticas'))->with('success', 'Artículo creado con éxito');
    }
    public function createEstadisticas()
    {
        return view('IntroduccionRegionLagos.Estadisticas.create');
    }
    public function editEstadisticas($id)
    {
        $articulo = Estadisticas::find($id);
        return view('IntroduccionRegionLagos.Estadisticas.edit', compact('articulo'));
    }
    public function destroyEstadisticas ($id)
{
    $articulo = Estadisticas::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('EstadisticasRegionLagos.indexEstadisticas')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('EstadisticasRegionLagos.indexEstadisticas')->with('error', 'Artículo no encontrado');
    }
}
public function updateEstadisticas(Request $request, $id)
{
    $data = $request->validate([
        'provincia' => 'required',
        'superficie' => 'required',
        'comuna' => 'required',
        'p_urbana_hombre' => 'required',
        'p_urbana_mujeres' => 'required',
        'p_rural_hombre' => 'required',
        'p_rural_mujeres' => 'required',
    ]);

    $articulo = Estadisticas::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('EstadisticasRegionLagos.indexEstadisticas')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('EstadisticasRegionLagos.indexEstadisticas')->with('error', 'Artículo no encontrado');
    }
} 

    // Fin Estadistica

    // inicio dinamica economica

    public function indexRegionlagosDinamicaE()
    {
        $articulo = DinamicaEconomica::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $Antecedentes = DinamicaEconomica::find($id);
            return view('IntroduccionRegionLagos.DinamicaE.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.DinamicaE.create');
        }
    }
    public function storeRegionlagosDinamicaE(Request $request){
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion1' => 'required',
            'valor1' => 'required',
            'descripcion2' => 'required',
            'valor2' => 'required',
        ]);
    
        DinamicaEconomica::create($data);
    
        return redirect(route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica'))->with('success', 'Creado con éxito');
    }
    public function createRegionlagosDinamicaE()
    {
        return view('IntroduccionRegionLagos.DinamicaE.create');
    }
    public function editRegionlagosDinamicaE($id){
        $articulo  = DinamicaEconomica::find($id);
        return view('IntroduccionRegionLagos.DinamicaE.edit', compact('articulo'));
    }
    public function destroyRegionlagosDinamicaE($id)
    {
        $articulo = DinamicaEconomica::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica')->with('error', 'Artículo no encontrado');
        }
    }
    public function updateRegionlagosDinamicaE(Request $request, $id)
{
    $data = $request->validate([
        'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion1' => 'required',
            'valor1' => 'required',
            'descripcion2' => 'required',
            'valor2' => 'required',
    ]);

    $articulo = DinamicaEconomica::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica')->with('error', 'Artículo no encontrado');
    }
} 



    // fin de dinamica economica

      // inicio Exportacion Segun Rama Actividad

      public function indexExportacionSegunRamaActividad()
      {
          $articulo = ExportacionSegunRamaActividad::all();
          if ($articulo->isNotEmpty()) {
              // La consulta devolvió al menos un registro
              $primerArticulo = $articulo->first();
              $id = $primerArticulo->id;
              $articulo = ExportacionSegunRamaActividad::find($id);
              return view('IntroduccionRegionLagos.ExportacionSegunRamaActividad.edit', compact('articulo'));
              
          } else {
              // La consulta no devolvió ningún registro
              return view('IntroduccionRegionLagos.ExportacionSegunRamaActividad.create');
          }
      }
      public function storeExportacionSegunRamaActividad(Request $request){
          $data = $request->validate([
              'titulo' => 'required',
              'subtitulo' => 'required',
              'descripcion1' => 'required',
              'valor1' => 'required',
              'actividad1' => 'required',
              'valoractividad1' => 'required',
              'actividad2' => 'required',
              'valoractividad2' => 'required',
              'actividad3' => 'required',
              'valoractividad3' => 'required',
              'actividad4' => 'required',
              'valoractividad4' => 'required',
              'actividad5' => 'required',
              'valoractividad5' => 'required',
              'total' => 'required',
          ]);
      
          ExportacionSegunRamaActividad::create($data);
      
          return redirect(route('ExportacionSegunRamaActividad.index'))->with('success', 'Creado con éxito');
      }
      public function createExportacionSegunRamaActividad()
      {
          return view('IntroduccionRegionLagos.ExportacionSegunRamaActividad.create');
      }
      public function editExportacionSegunRamaActividad($id){
          $articulo  = ExportacionSegunRamaActividad::find($id);
          return view('IntroduccionRegionLagos.ExportacionSegunRamaActividad.edit', compact('articulo'));
      }
      public function destroyExportacionSegunRamaActividad($id)
      {
          $articulo = ExportacionSegunRamaActividad::find($id);
      
          if ($articulo) {
              $articulo->delete();
              return redirect()->route('ExportacionSegunRamaActividad.index')->with('success', 'Artículo eliminado con éxito');
          } else {
              return redirect()->route('ExportacionSegunRamaActividad.index')->with('error', 'Artículo no encontrado');
          }
      }
      public function updateExportacionSegunRamaActividad(Request $request, $id)
  {
      $data = $request->validate([
        'titulo' => 'required',
        'subtitulo' => 'required',
        'descripcion1' => 'required',
        'valor1' => 'required',
        'actividad1' => 'required',
        'valoractividad1' => 'required',
        'actividad2' => 'required',
        'valoractividad2' => 'required',
        'actividad3' => 'required',
        'valoractividad3' => 'required',
        'actividad4' => 'required',
        'valoractividad4' => 'required',
        'actividad5' => 'required',
        'valoractividad5' => 'required',
      ]);
  
      $articulo = ExportacionSegunRamaActividad::find($id);
  
      if ($articulo) {
          $articulo->update($data);
          return redirect()->route('ExportacionSegunRamaActividad.index')->with('success', 'Artículo actualizado con éxito');
      } else {
          return redirect()->route('ExportacionSegunRamaActividad.index')->with('error', 'Artículo no encontrado');
      }
  } 
  
  
  
      // fin de Exportacion Segun Rama Actividad

    //Inicio Exportacion Segun Bloque Economico 
    public function indexExportacionSegunBloqueEconomico()
    {
        $articulo = ExportacionSegunBloqueEconomico::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = ExportacionSegunBloqueEconomico::find($id);
            return view('IntroduccionRegionLagos.ExportacionSegunBloqueEconomico.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.ExportacionSegunBloqueEconomico.create');
        }
    }
    public function storeExportacionSegunBloqueEconomico(Request $request){
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion1' => 'required',
            'valor1' => 'required',
            'actividad1' => 'required',
            'valoractividad1' => 'required',
            'actividad2' => 'required',
            'valoractividad2' => 'required',
            'actividad3' => 'required',
            'valoractividad3' => 'required',
            'actividad4' => 'required',
            'valoractividad4' => 'required',
            'actividad5' => 'required',
            'valoractividad5' => 'required',
            'total' => 'required',
        ]);
    
        ExportacionSegunBloqueEconomico::create($data);
    
        return redirect(route('ExportacionSegunBloqueEconomico.index'))->with('success', 'Creado con éxito');
    }
    public function createExportacionSegunBloqueEconomico()
    {
        return view('IntroduccionRegionLagos.ExportacionSegunBloqueEconomico.create');
    }
    public function editExportacionSegunBloqueEconomico($id){
        $articulo  = ExportacionSegunBloqueEconomico::find($id);
        return view('IntroduccionRegionLagos.ExportacionSegunBloqueEconomico.edit', compact('articulo'));
    }
    public function destroyExportacionSegunBloqueEconomico($id)
    {
        $articulo = ExportacionSegunBloqueEconomico::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('ExportacionSegunBloqueEconomico.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('ExportacionSegunBloqueEconomico.index')->with('error', 'Artículo no encontrado');
        }
    }
    public function updateExportacionSegunBloqueEconomico(Request $request, $id)
{
    $data = $request->validate([
      'titulo' => 'required',
      'subtitulo' => 'required',
      'descripcion1' => 'required',
      'valor1' => 'required',
      'actividad1' => 'required',
      'valoractividad1' => 'required',
      'actividad2' => 'required',
      'valoractividad2' => 'required',
      'actividad3' => 'required',
      'valoractividad3' => 'required',
      'actividad4' => 'required',
      'valoractividad4' => 'required',
      'actividad5' => 'required',
      'valoractividad5' => 'required',
    ]);

    $articulo = ExportacionSegunBloqueEconomico::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('ExportacionSegunBloqueEconomico.index')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('ExportacionSegunBloqueEconomico.index')->with('error', 'Artículo no encontrado');
    }
} 
    //Fin Exportacion Segun Bloque Economico

//Inicio FNDR
public function indexFNDR()
{
    $articulo = FNDR::all();
    if ($articulo->isNotEmpty()) {
        // La consulta devolvió al menos un registro
        $primerArticulo = $articulo->first();
        $id = $primerArticulo->id;
        $articulo = FNDR::find($id);
        return view('IntroduccionRegionLagos.FNDR.edit', compact('articulo'));
        
    } else {
        // La consulta no devolvió ningún registro
        return view('IntroduccionRegionLagos.FNDR.create');
    }
}
public function storeFNDR(Request $request){
    $data = $request->validate([
        'titulo' => 'required',
        'subtitulo' => 'required',
        'actividad1' => 'required',
        'valoractividad1' => 'required',
        'actividad2' => 'required',
        'valoractividad2' => 'required',
        'actividad3' => 'required',
        'valoractividad3' => 'required',
        'actividad4' => 'required',
        'valoractividad4' => 'required',
        'actividad5' => 'required',
        'valoractividad5' => 'required',
        'total' => 'required',
    ]);

    FNDR::create($data);

    return redirect(route('FNDR.index'))->with('success', 'Creado con éxito');
}
public function createFNDR()
{
    return view('IntroduccionRegionLagos.FNDR.create');
}
public function editFNDR($id){
    $articulo  = ExportacionSegunBloqueEconomico::find($id);
    return view('IntroduccionRegionLagos.FNDR.edit', compact('articulo'));
}
public function destroyFNDR($id)
{
    $articulo = FNDR::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('FNDR.index')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('FNDR.index')->with('error', 'Artículo no encontrado');
    }
}
public function updateFNDR(Request $request, $id)
{
$data = $request->validate([
  'titulo' => 'required',
  'subtitulo' => 'required',
  'actividad1' => 'required',
  'valoractividad1' => 'required',
  'actividad2' => 'required',
  'valoractividad2' => 'required',
  'actividad3' => 'required',
  'valoractividad3' => 'required',
  'actividad4' => 'required',
  'valoractividad4' => 'required',
  'actividad5' => 'required',
  'valoractividad5' => 'required',
]);

$articulo = FNDR::find($id);

if ($articulo) {
    $articulo->update($data);
    return redirect()->route('FNDR.index')->with('success', 'Artículo actualizado con éxito');
} else {
    return redirect()->route('FNDR.index')->with('error', 'Artículo no encontrado');
}
} 
//Fin FNDR

//Inicio ActividadesEconomica

public function indexActividadesEconomica()
{
    $articulo = ActividadEconomica::all();
    if ($articulo->isNotEmpty()) {
        // La consulta devolvió al menos un registro
        $primerArticulo = $articulo->first();
        $id = $primerArticulo->id;
        //$articulo = ActividadEconomica::find($id);
        return view('IntroduccionRegionLagos.ActividadesEconomica.show', compact('articulo'));
    } else {
        // La consulta no devolvió ningún registro
        return view('IntroduccionRegionLagos.ActividadesEconomica.create');
    }
}
public function storeActividadesEconomica(Request $request){
    $data = $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
    ]);

    $actividadEconomica = ActividadEconomica::create($data);
    // Almacenamiento de campos adicionales en el modelo CampoAdicional
    // Ahora puedes acceder al ID del modelo recién creado
    $actividadEconomicaId = $actividadEconomica->id;
    $camposAdicionales = $request->input('nombreA', []);
    $hombres = $request->input('hombres', []);
    $mujeres = $request->input('mujeres', []);




    foreach ($camposAdicionales ?? [] as $key => $campo) {
        ActividadesEconomicaI::create(['ActividadesEconomicaI_id' => $actividadEconomicaId,'nombreA' => $campo,'hombres' => $hombres[$key],'mujeres' => $mujeres[$key]]); // Ajusta según tus necesidades
    }
    return redirect(route('ActividadEconomica.index'))->with('success', 'Creado con éxito');
}
public function createActividadesEconomica()
{
    return view('IntroduccionRegionLagos.ActividadesEconomica.create');
}
public function editActividadesEconomica($id){
    $articulo  = ActividadEconomica::findOrFail($id);

    $actividadesC = $articulo->ActividadesEconomicaI;
    return view('IntroduccionRegionLagos.ActividadesEconomica.edit', compact('articulo','actividadesC'));
}
public function destroyActividadesEconomica($id)
{
    $articulo = ActividadEconomica::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('ActividadEconomica.index')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('ActividadEconomica.index')->with('error', 'Artículo no encontrado');
    }
}
public function updateActividadesEconomica(Request $request, $id)
{
$data = $request->validate([
  'titulo' => 'required',
  'subtitulo' => 'required',
  'actividad1' => 'required',
  'valoractividad1' => 'required',
  'actividad2' => 'required',
  'valoractividad2' => 'required',
  'actividad3' => 'required',
  'valoractividad3' => 'required',
  'actividad4' => 'required',
  'valoractividad4' => 'required',
  'actividad5' => 'required',
  'valoractividad5' => 'required',
]);

$articulo = ActividadEconomica::find($id);

if ($articulo) {
    $articulo->update($data);
    return redirect()->route('ActividadEconomica.index')->with('success', 'Artículo actualizado con éxito');
} else {
    return redirect()->route('ActividadEconomica.index')->with('error', 'Artículo no encontrado');
}
} 

//Fin ActividadesEconomica


    // frond de region los lagos
    public function indexRegionlagosIntro()
    {
        $articulo = IntroduccionRegionLagos::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $introduccion  = IntroduccionRegionLagos::find($id);
            return view('regionlagos.introduccion', compact('introduccion'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.create');
        }
    }
    public function indexRegionlagosAntecedentesregion()
    {
        $articulo = AntecedentesRegion::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $introduccion  = AntecedentesRegion::find($id);
            return view('regionlagos.antecedentesregion', compact('introduccion'));
            
        } 
    }
    public function indexRegionlagosprovincias($titulo)
    {
        $provincia = AntecedentesRegion::where('nombreseccion', $titulo)->first();

        return view('regionlagos.provincia', compact('provincia')); 
    }
    public function indexRegionlagosGobernador($titulo)
    {
        $articulo = Autoridades::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $introduccion  = Autoridades::find($id);
            $sen = Autoridades::where('cargo', 'Senador')->get();
            $dip = Autoridades::where('cargo', 'Diputados')->get();
            $ser = Autoridades::where('cargo', 'Seremis')->get();
            $serv = Autoridades::where('cargo', 'Servicios')->get();
            $muni = Autoridades::where('cargo', 'Municipales')->get();
            return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
            
        } 
    }
    public function indexRegionlagosAutoridades($titulo)
    {
        $introduccion = Autoridades::where('cargo', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();
        
        return view('regionlagos.autoridades', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosBuscarAutoridadesSenador($titulo)
    {
        $introduccion = Autoridades::where('nombre', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();

        return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosBuscarAutoridadesDiputados($titulo)
    {
        $introduccion = Autoridades::where('nombre', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();

        return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosBuscarAutoridadesSeremis($titulo)
    {
        $introduccion = Autoridades::where('nombre', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();

        return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosBuscarAutoridadesServicios($titulo)
    {
        $introduccion = Autoridades::where('nombre', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();

        return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosBuscarAutoridadesMunicipalidades($titulo)
    {
        $introduccion = Autoridades::where('nombre', $titulo)->first();
        $sen = Autoridades::where('cargo', 'Senador')->get();
        $dip = Autoridades::where('cargo', 'Diputados')->get();
        $ser = Autoridades::where('cargo', 'Seremis')->get();
        $serv = Autoridades::where('cargo', 'Servicios')->get();
        $muni = Autoridades::where('cargo', 'Municipales')->get();

        return view('regionlagos.intendente', compact('introduccion','sen','dip','ser','serv','muni'));
    }
    public function indexRegionlagosPoblacionSuperficie()
    {
        $introduccion = Estadisticas::all();
        // Obtén la suma de la columna 'superficie'
        $totalSuperficie = Estadisticas::sum('superficie');
        $p_urbana_hombre = Estadisticas::sum('p_urbana_hombre');
        $p_urbana_mujeres = Estadisticas::sum('p_urbana_mujeres');
        $p_rural_hombre = Estadisticas::sum('p_rural_hombre');
        $p_rural_mujeres = Estadisticas::sum('p_rural_mujeres');
        $total =$p_urbana_hombre + $p_urbana_mujeres + $p_rural_hombre + $p_rural_mujeres;

        // Haz lo que necesites con $totalSuperficie
        return view('regionlagos.PoblacionSuperficie', compact('introduccion','totalSuperficie','p_urbana_hombre','p_urbana_mujeres','p_rural_mujeres','p_rural_hombre','total'));
        
    }
    public function indexRegionlagosPoblacionSuperficieProvincia($titulo)
    {
        $introduccion = Estadisticas::where('provincia', $titulo)->get();
        $acumulador=0;
        foreach($introduccion as $p){
            $acumulador += $p->superficie;
        }
            
        
        // Haz lo que necesites con $totalSuperficie
        return view('regionlagos.PoblacionSuperficieProvincia', compact('introduccion','acumulador','titulo'));
        
    }

//FNDR
    public function indexRegionlagosDinamicaEconomica()    
    {
        $introduccion = DinamicaEconomica::all();
        return view('regionlagos.dinamicaeconomica', compact('introduccion'));
    }
    public function indexRegionlagosExportacionSegunRamaActividad()    
    {
        $SegunRamaActividad = ExportacionSegunRamaActividad::all();
        $primerArticulo = $SegunRamaActividad->first();
        return view('regionlagos.ExportacionSegunRamaActividad', compact('primerArticulo'));
    }
    public function indexRegionlagosExportacionSegunBloqueEconomico()    
    {
        $SegunBloqueEconomico = ExportacionSegunBloqueEconomico::all();
        $primerArticulo = $SegunBloqueEconomico->first();
        return view('regionlagos.ExportacionSegunBloqueEconomico', compact('primerArticulo'));
    }
    public function indexRegionlagosFNDR()    
    {
        $FNDR = FNDR::all();
        $primerArticulo = $FNDR->first();
        return view('regionlagos.FNDR', compact('primerArticulo'));
    }
    
    
    
}
