<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPAI_request;
use App\Http\Requests\newPAI_Admin_request;
use App\Http\Requests\newPAI_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class solicitudPAIController extends Controller
{
    public function view_PAI_User()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/pai');

            $resultado = json_decode($response->getBody(), true);
            $datos = $resultado['data'];
            return view('Vistas_Solicitud_PAI.index', compact('datos'));
        } catch (\Throwable $th) {
            back();
        }
    }
    
    public function view_PAI_User_By_id($id)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/estudiante/pai/' . $id, []);
            $resultado = json_decode($response->getBody(), true);
            if ($resultado['status']) {
                $resultado = $resultado['data'];
                return view('Vistas_Solicitud_PAI.show', compact('resultado'));
            } else {
                toastr()->error("La solicitud no existe");
                return redirect()->back();
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function view_PAI_User_new()
    {
        try {
                return view('Vistas_Solicitud_PAI.create');
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
    public function store(newPAI_request $request)
    {
        try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ])->post( env('API_URL') . 'user/persona/estudiante/pai', ['cedula' => session('cedula'), 'solicitud' => $request->validated()]);
                $resultado = json_decode($response->getBody(), true);
                    if($resultado['status']){
                        toastr()->success($resultado['message'],"Éxito");
                        return redirect()->route('PAI_user');
                    }
                    if(array_key_exists('Ingrese una cédula',$resultado)){
                        toastr()->error("Ingrese una cédula");
                    }
                    if(array_key_exists('La cédula no esta registrada',$resultado)){
                        toastr()->error("La cédula no esta registrada");
                    }
                    if(array_key_exists('error',$resultado)){
                        toastr()->error("Las fechas para realizar solicitudes estan cerradas","Restricción de fecha");
                    }
                    if(array_key_exists('data',$resultado)){
                        toastr()->error($resultado['data']['message']);
                    }
                    return Redirect::back()->withInput();
        } catch (\Throwable $e) {
            toastr()->error("Error interno, intente más tarde.");
            return Redirect::back()->withInput();
        }
    }

    public function store_byAdmin(newPAI_Admin_request  $request)
    {
        try {
            $request->validated();
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ])->post( env('API_URL') . 'user/persona/estudiante/pai', ['cedula' => $request->cedula, 'solicitud' => $request->validated()]);
                $resultado = json_decode($response->getBody(), true);
                    if($resultado['status']){
                        toastr()->success($resultado['message'],"Éxito");
                        return redirect()->route('Admin.pai');
                    }
                    if(array_key_exists('Ingrese una cédula',$resultado)){
                        toastr()->error("Ingrese una cédula");
                    }
                    if(array_key_exists('La cédula no esta registrada',$resultado)){
                        toastr()->error("La cédula no esta registrada");
                    }
                    if(array_key_exists('error',$resultado)){
                        toastr()->error("Las fechas para realizar solicitudes estan cerradas","Restricción de fecha");
                    }
                    if(array_key_exists('data',$resultado)){
                        toastr()->error($resultado['data']['message']);
                    }
                    return Redirect::back()->withInput();
        } catch (\Throwable $e) {
            toastr()->error("Error interno, intente más tarde.");
            return Redirect::back()->withInput();
        }
    }
    //admin
     public function index()
     {
         try {
             $response = Http::withHeaders([
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'Authorization' => 'Bearer ' . session('token'),
             ])->get(env('API_URL') . 'user/persona/estudiante/pai');
 
             $resultado = json_decode($response->getBody(), true);
             $datos = $resultado['data'];
            //  dd($datos);
             return view('Usuario.Admin.PAI.index', compact('datos'));
         } catch (\Throwable $th) {
              return Redirect::back();
         }
     }
     public function show_byAdmin($id)
     {
         try {
             $response = Http::withHeaders([
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'Authorization' => 'Bearer ' . session('token'),
             ])->get(env('API_URL') . 'user/persona/estudiante/pai/' . $id);
 
             $resultado = json_decode($response->getBody(), true);
             $datos = $resultado['data'];
              dd($datos);
             return view('Usuario.Admin.PAI.show', compact('datos'));
         } catch (\Throwable $th) {
              return Redirect::back();
         }
     }
     public function create_byAdmin()
     {
         try {
            return view('Usuario.Admin.PAI.create');
         } catch (\Throwable $th) {
              return Redirect::back();
         }
     }
}
