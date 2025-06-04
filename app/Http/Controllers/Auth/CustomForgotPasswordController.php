<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\ResetPasswordLink; // Importa el Mailable

class CustomForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password-custom'); // Asegúrate de que este sea el nombre correcto de tu vista
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        // Eliminar tokens de restablecimiento de contraseña existentes para este correo electrónico
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Generar un nuevo token
        $token = Str::random(60);

        // Guardar el token en la base de datos
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Enviar el correo electrónico con el enlace de restablecimiento
        $resetLink = route('password.reset.custom.form', ['token' => $token, 'email' => $user->email]);

        Mail::to($user->email)->send(new ResetPasswordLink($resetLink));

        return back()->with('status', 'Se ha enviado un enlace de restablecimiento de contraseña a tu correo electrónico.');
    }
}
