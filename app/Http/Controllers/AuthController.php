<?php

// AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    
    public function inicio_sesion()
    {
        return view('Inicio\inicio_sesion');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Verificar si el usuario ha sido bloqueado recientemente
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->failed_login_attempts >= 3 && $user->last_login_attempt_at && Carbon::parse($user->last_login_attempt_at)->diffInMinutes(Carbon::now()) < 1) {
            return redirect()->route('Inicio_De_Sesion')->withErrors(['error' => 'Cuenta bloqueada temporalmente. Intente nuevamente más tarde.']);
        }
    
        // Validar las credenciales del usuario
        if (Auth::attempt($credentials)) {
            // Restablecer el contador de intentos fallidos
            $user->update(['failed_login_attempts' => 0, 'last_login_attempt_at' => null]);
    
            // Obtener el tipo de usuario que ha iniciado sesión
            $userType = auth()->user()->id_tipo_usuario;
            
            // Redirigir según el tipo de usuario
            if ($userType == 1) {
                return redirect()->route('Panel_De_Usuario');
            } elseif ($userType == 2) {
                return redirect()->route('Panel_De_Usuario_Coordinador');
            }
        }
    
        // Incrementar el contador de intentos fallidos y actualizar el momento del último intento
        if ($user) {
            $user->increment('failed_login_attempts');
            $user->update(['last_login_attempt_at' => now()]);
        }
    
        // Si las credenciales son incorrectas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        return redirect()->route('Inicio_De_Sesion')->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        Auth::logout(); // Cerrar la sesión actual
        return redirect()->route('Inicio_De_Sesion'); // Redirigir al formulario de inicio de sesión
    }


}
