<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Solicitud_Adecuacion_Views_Controller extends Controller
{
    //VISTA DE ADECUAICONES
    public function viewAdecuacion()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/adecuacion');

            $resultado = json_decode($response->getBody(), true);
            $datos = $resultado['data'];
            return view('Vistas_Solicitud_Adecuacion.Solicitud_Adecuacion', compact('datos'));
        } catch (\Throwable $th) {
            back();
        }
    }
    //VISTA NUEVA ADECUACION
    public function viewNuevaAdecuacion()
    {
        return view('Vistas_Solicitud_Adecuacion.nueva_adecuacion');
    }

    public function viewAdecuacionEspecifica_user($id)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/adecuacion/' . $id, []);
            $resultado = json_decode($response->getBody(), true);
            if ($resultado['status']) {
                $resultado = $resultado['data'];
                //  return dd($resultado);
                return view('Vistas_Solicitud_Adecuacion.verAdecuacion_user', compact('resultado'));
            } else {
                toastr()->error("La solicitud no existe");
                return redirect()->back();
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function viewAdecuacionEspecifica_admin($id)
    {
        return dd('hey');
        return view('Vistas_Solicitud_Adecuacion.nueva_adecuacion');
    }


    ////////////////////////////////////////////
}
