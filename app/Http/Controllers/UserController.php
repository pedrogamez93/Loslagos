<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function __construct()
{
    $this->middleware(['auth', 'checkrole:admin']);
}


    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Asignar un valor por defecto a 'rut' si no está presente en la solicitud
        $request->merge(['rut' => $request->input('rut', '1234567890')]);

        Log::info('Datos recibidos para crear usuario', $request->all());

        try {
            Log::info('Intentando validar los datos...');
            $validatedData = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);
            Log::info('Datos validados para crear usuario', $validatedData);

            Log::info('Datos preparados para crear usuario', [
                'name' => $request->email,
                'nombre' => $request->input('nombre', null),
                'apellido' => $request->input('apellido', null),
                'rut' => $request->input('rut', '1234567890'),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => $request->input('rol', null),
            ]);

            $user = User::create([
                'name' => $request->email,
                'nombre' => $request->input('nombre', null),
                'apellido' => $request->input('apellido', null),
                'rut' => $request->input('rut', '1234567890'),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => $request->input('rol', null),
            ]);

            Log::info('Usuario creado exitosamente', ['user' => $user]);

            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
        } catch (ValidationException $e) {
            Log::error('Error de validación', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error al crear usuario', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:users,rut,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'rol' => 'required|in:admin,gestor,editor',
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'rut' => $request->rut,
            'email' => $request->email,
            'rol' => $request->rol,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
