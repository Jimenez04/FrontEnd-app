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
            ])->get( env('API_URL') . 'user/persona/estudiante/adecuacion');
            
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
     //VISTA NECESIDAD
     public function viewNecesidad()
     {
         return view('Vistas_Solicitud_Adecuacion.necesidad_apoyo');
     }
     public function AddNecesidad()
     {
         return view('Vistas_Solicitud_Adecuacion.necesidad_apoyo');
     }
     //VISTA INSTITUCION
     public function viewInstitucion()
     {
         return view('Vistas_Solicitud_Adecuacion.institucion_procedencia');
     }
 
    
     public function viewBeca()
     {
         return view('Vistas_Solicitud_Adecuacion.beca');
     }
     public function viewGrupoFamiliar()
     {
         return view('Vistas_Solicitud_Adecuacion.grupo_familiar');
     }
     public function viewArchivos()
     {
         return view('Vistas_Solicitud_Adecuacion.archivos');
     }
     public function viewAddArchivos()
     {
         return view('Vistas_Solicitud_Adecuacion.nuevo_archivo');
     }
 }
 