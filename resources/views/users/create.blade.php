<div class="col-md-2 style-col-menu">
            <div class="container menu">
                @include('layouts.menu')
            </div>
        </div>
<div class="container">
    <h1>{{ isset($user) ? 'Editar Usuario' : 'Crear Usuario' }}</h1>
    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ isset($user) ? $user->nombre : old('nombre') }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ isset($user) ? $user->apellido : old('apellido') }}" required>
        </div>
        <div class="form-group">
            <label for="rut">RUT</label>
            <input type="text" class="form-control" id="rut" name="rut" value="{{ isset($user) ? $user->rut : old('rut') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Clave</label>
            <input type="password" class="form-control" id="password" name="password" {{ isset($user) ? '' : 'required' }}>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
                <option value="admin" {{ (isset($user) && $user->rol == 'admin') ? 'selected' : '' }}>Admin</option>
                <option value="gestor" {{ (isset($user) && $user->rol == 'gestor') ? 'selected' : '' }}>Gestor</option>
                <option value="editor" {{ (isset($user) && $user->rol == 'editor') ? 'selected' : '' }}>Editor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>

