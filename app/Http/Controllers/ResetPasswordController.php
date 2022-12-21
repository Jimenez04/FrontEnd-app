<?php

namespace App\Http\Controllers;

use App\Http\Requests\miclave_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ResetPasswordController extends Controller
{
    //--------------------------------Olvido Contraseña---------------------------------------
    public function olvidocontrasena() //vista del formulario

    {
        return view('Usuario.Shareviews.olvidocontrasena');
    }
    //sirve
    public function Recuperar_passwordApi(miclave_request $request) //post donde introduce la informacion del usuario para mandarle la contraseña temporal

    {
        try {
            $request->validated();

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post(env('API_URL') . 'usuario/olvide-mi-contrasena', [
                    'email' => $request['email'],
                    'carnet' => $request['carnet'],
                    'cedula' => $request['cedula'],
                ]);
            //se  obtiene la informacion de la peticion
            $resultado = json_decode($response->getBody(), true);
            if ($resultado['status'] == false) {
                return Redirect::back()->withErrors(['mensaje' => $resultado['message']])->withInput();
            }
            toastr()->success('Revisa tu correo', 'Éxito');
            return redirect()->route('login')->with('Revisa tu correo');
        } catch (\Exception $e) {
            // return redirect()->route('login')->with('status', 'Los datos no son correctos' , $e->getMessage());
            return response()->json(['error' => $e->getMessage()]);
            toastr()->error('Error interno');

        }
    }

    //--------------------------------Cambia Contraseña--------------------------------------- 
    public function NuevaPasswordApi(Request $request) //post

    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->post(env('API_URL') . 'user/cambiar-contrasena', [
                    'email' => session('name'),
                    'new_password_' => $request['new_password_'],
                    'new_c_password_' => $request['new_c_password_'],
                    'old_password_' => $request['old_password_']
                ]);

            $resultado = json_decode($response->getBody(), true);
            if (array_key_exists("errors", $resultado)) {
                foreach ($resultado['errors'] as $item) {
                    foreach ($item as $error) {
                        toastr()->error($error);
                    }
                }
                return Redirect::back()->withErrors($resultado['errors'])->withInput();

            } else if ($resultado['status'] == false) {
                return Redirect::back()->withErrors(['error' => $resultado['error']])->withInput();
            }
            toastr()->success('Contraseña cambiada correctamente', 'Éxito');
            if (session('roleuser') == 1) {
                return redirect()->route('Admin');
            } elseif (session('roleuser') == 2) {
                return redirect()->route('Student');
            }
        } catch (\Exception $e) {
            if (session('roleuser') == 1) {
                return redirect()->route('Admin');
            } elseif (session('roleuser') == 2) {
                return redirect()->route('Student');
            }
        }
    }


    public function NuevaPassword() //vista

    {
        return view('Usuario.Shareviews.nuevacontrasena');
    }
}