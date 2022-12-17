<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Admin_Funciones_Controller extends Controller
{
    public function principalAdmi(){
        return view('Usuario.Admin.paginaprincipalAdmin');
    }

    public function ver_usuario($carnet){
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get( env('API_URL') . 'user/persona/estudiante/'.$carnet, [
            ]);
            $resultado = json_decode($response->getBody(), true);
            if($resultado['success']){
                $resultado = $resultado['data'];
                return dd($resultado);
                return view('Vistas_Solicitud_Adecuacion.verAdecuacion_user', compact('resultado'));
            }else{
                toastr()->error("El estudiante no existe");
                return redirect()->back();
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
     }

}
