<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomResetPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function showResetForm(Request $request, string $token): View
    {
        $email = $request->get('email');

        return view('auth.reset-password')->with(['token' => $token, 'email' => $email]);
    }

    /**
     * Handle the password reset request.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Buscar el token en la tabla password_resets
        $passwordReset = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        // Si no se encuentra el token o ha expirado
        if (!$passwordReset) {
            return back()->withErrors(['email' => 'El token de restablecimiento de contraseña no es válido.']);
        }

        // Buscar al usuario por su correo electrónico
        $user = \App\Models\User::where('email', $request->email)->first();

        // Si no se encuentra el usuario
        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con esta dirección de correo electrónico.']);
        }

        // Actualizar la contraseña del usuario
        $user->password = Hash::make($request->password);
        $user->save();

        // Eliminar el token de restablecimiento de contraseña de la tabla
        DB::table('password_resets')->where('email', $request->email)->delete();

        return Redirect::route('login')->with('status', 'Tu contraseña ha sido restablecida.');
    }
}
