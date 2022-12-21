<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class InicioSesionController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }


    //Muestra la vista del Login
    public function login($mensaje = null)
    {
        return view('Usuario.login', compact('mensaje'));
    }

    public function loginApi(LoginRequest $request)
    {
        try {
            $request->validated();

            $email = $request['email'];
            $password = $request['password'];

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post(env('API_URL') . 'login', [
                    'email' => $email,
                    'password_' => $password,
                ]);
            $resultado = json_decode($response->getBody(), true);

            if (array_key_exists("errors", $resultado)) {
                foreach ($resultado['errors'] as $item) {
                    foreach ($item as $error) {
                        toastr()->error($error);
                    }
                }
                return Redirect::back()->withErrors($resultado['errors'])->withInput();

            }

            if (array_key_exists("error", $resultado)) {
                toastr()->error('Email o contraseña invalidos');
               
                return Redirect::back()->withErrors($resultado['error'])->withInput();
            }
            if (!$resultado['status'] && array_key_exists("message", $resultado)) {
            
                    toastr()->error($resultado['message'], "Mensaje");
                
                return Redirect::back()->withErrors($resultado['message'])->withInput();
            }

            $resultado = json_decode($response->getBody(), true);
            session(['token' => $resultado['token']]);

            session(['login' => true]);

            return $this->mi_usuario();
        } catch (\Throwable $e) {

            return redirect()->route('login')->with('error', 'Verifique los campos')->onlyInput('email');
        }
    }
    public function mi_usuario()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'obtener-usuario');

            $resultado = json_decode($response->getBody(), true);

            //obtengo el rol del usuario logueado
            $userRole = $resultado['user']['role_id'];
            session(['roleuser' => $resultado['user']['role_id']]);
            session(['name' => $resultado['user']['email']]);
            session(['cedula' => $resultado['user']['persona']['cedula']]);
            toastr()->success($resultado['user']['persona']['nombre1'] . ' ' . $resultado['user']['persona']['apellido1'], 'Un placer que estes aquí,');
            if ($userRole == 1) {
                return redirect()->route('Admin');
            } elseif ($userRole == 2) {
                session(['carnet' => $resultado['user']['persona']['estudiante']['carnet']]);
                return redirect()->route('Student');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'usuario/salir');
            $resultado = json_decode($response->getBody(), true);
            session()->flush();
            toastr()->success('Cerraste sesión', 'Adiós');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            return back();
        }
    }
}