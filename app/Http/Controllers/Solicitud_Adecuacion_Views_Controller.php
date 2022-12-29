<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class Solicitud_Adecuacion_Views_Controller extends Controller
{
    //VISTA DE ADECUAICONES
    public function index()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/adecuacion');

            $resultado = json_decode($response->getBody(), true);
            $datos = $resultado['data'];
            return view('Usuario.Admin.Adecuacion.index', compact('datos'));
        } catch (\Throwable $th) {
             return Redirect::back();
        }
    }
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
            return Redirect::back();
        }
    }
    //VISTA NUEVA ADECUACION
    public function viewNuevaAdecuacion()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('API_URL') . 'obtener-usuario');

        $resultado = json_decode($response->getBody(), true);

        $resultado = $resultado['user'];

        return view('Vistas_Solicitud_Adecuacion.nueva_adecuacion', compact('resultado'));
    }

    //VISTA NUEVA ADECUACION Admin
    public function viewNuevaAdecuacion_admin()
    {
        return view('Usuario.Admin.Adecuacion.create');
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
                //dd($resultado);
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
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/adecuacion/' . $id, []);
            $resultado = json_decode($response->getBody(), true);
            if ($resultado['status']) {
                $resultado = $resultado['data'];
                return view('Usuario.Admin.Adecuacion.show', compact('resultado'));
            } else {
                toastr()->error("La solicitud no existe");
                return redirect()->back();
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function view_recomendaciones($numSolicitud, $id)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/admin/persona/estudiante/adecuacion/'. $numSolicitud . '/recomendacion/');
            $resultado = json_decode($response->getBody(), true);
            //  dd($resultado); 

             if (array_key_exists("errors", $resultado)) {
                toastr()->error("La solicitud no existe");
                return redirect()->back();
             }
            if ($resultado['success']) {
                $resultado = $resultado['data'];
                return view('Usuario.Admin.Adecuacion.Recomendaciones.index', compact(['resultado','numSolicitud','id']));
            }
            toastr()->error("La solicitud no existe");
            return redirect()->back();
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
    public function view_observaciones($numSolicitud, $id)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/admin/persona/estudiante/adecuacion/'. $numSolicitud . '/observacion/');
            $resultado = json_decode($response->getBody(), true);
            // dd($resultado); 
            if (array_key_exists("errors", $resultado)) {
                toastr()->error("La solicitud no existe");
                return redirect()->back();
             }
            if ($resultado['success']) {
                $resultado = $resultado['data'];
                return view('Usuario.Admin.Adecuacion.Observaciones.index', compact(['resultado','numSolicitud','id']));
            }
            toastr()->error("La solicitud no existe");
            return redirect()->back();
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    ////////////////////////////////////////////
}
