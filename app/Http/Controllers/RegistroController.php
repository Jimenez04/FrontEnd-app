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
            $request = $request->validated();
            // dd($request['nombre1']);
            if(trim($request['nombre2']) == "" || $request['nombre2'] == null){
                unset($request['nombre2']);
            }
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post( env('API_URL') . 'registrar', $request);
            $resultado = json_decode($response->getBody(), true);
            if(array_key_exists("errors", $resultado)){
                foreach ($resultado['errors'] as $item) {
                    foreach ($item as $error) {
                        toastr()->error($error);
                    }
                }
                return Redirect::back()->withErrors($resultado['errors'])->withInput();;
            }
            toastr()->success('Cuenta creada correctamente');
            if(session('login')){
                return redirect()->route('lista_usuarios');
            }
            return redirect()->route('login');
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $jsonBody = (string) $response->getBody();
           return redirect()->route('registrarse');
        
        }
    }
}
