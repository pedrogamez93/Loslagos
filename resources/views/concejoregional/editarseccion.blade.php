{{-- Vista de edición para la sección --}}
<form action="{{ route('concejoregional.update', ['concejoId' => $concejo->id, 'seccionId' => $seccion->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- Campos del formulario para editar la sección --}}
    <input type="text" name="titulo" value="{{ $seccion->titulo }}">
    <textarea name="contenido">{{ $seccion->contenido }}</textarea>
    <button type="submit">Guardar Cambios</button>
</form>