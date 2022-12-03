<?php

namespace App\Http\Controllers;

use App\Http\Requests\registro;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RegistroController extends Controller
{
   // ------------------------REGISTRO--------------------------------
    //carga la vista de registro
    public function registro()
    {
        return view('Usuario.registro');
    }
    //post de registro
    public function registroApi(registro $request)
    {
        try {
            $request->validated();

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post( env('API_URL') . 'registrar', [
                    'email' =>  $request['email'],
                    'password_' =>  $request['password_'],
                    'c_password' =>  $request['c_password'],
                    'cedula' =>  $request['cedula'],
                    'nombre1' =>  $request['nombre1'],
                    'nombre2' =>  $request['nombre2'],
                    'apellido1' =>  $request['apellido1'],
                    'apellido2' =>  $request['apellido2'],
                    'sexo_id' =>  $request['sexo_id'],
                    'fecha_Nacimiento' =>  $request['fecha_Nacimiento'],
                    'carnet' =>  $request['carnet'],
            ]);
            $resultado = json_decode($response->getBody(), true);
            if(array_key_exists("errors", $resultado)){
                return Redirect::back()->withErrors($resultado['errors'])->withInput();;
            }
            return redirect()->route('login');
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $jsonBody = (string) $response->getBody();
           return redirect()->route('registrarse');
        
        }
    }
}
