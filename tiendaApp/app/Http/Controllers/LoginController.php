<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
 
        $credentials = $request->only('User', 'Password');
        $user = Login::where('User', $credentials['User'])->where('Password', $credentials['Password'])->first();
   
        if ($user) {
             Session::put('verificado', true);
            // La autenticación fue exitosa
            return redirect()->intended('/admin'); // Redirigir al panel de administración
        } else {
            // La autenticación falló
            return back()->withErrors(['message' => 'Credenciales incorrectas']);
        }
    }
       public function logout()
    {
        Session::forget('verificado');
        return redirect('/login'); // Redirigir a la página de login
    }
}
