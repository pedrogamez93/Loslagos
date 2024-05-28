<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $rol = $user->rol; // Asume que el rol se almacena en el campo 'role'
        return view('dashboard', compact('rol'));
    }
}
