<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPAI_request;
use App\Http\Requests\newPAI_Admin_request;
use App\Http\Requests\newPAI_request;
use App\Http\Requests\resumePAIrequest;
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
     public function index($carnet = null)
     {
         try {
            $ruta = $carnet != null ? 'user/admin/persona/estudiante/pai/'. $carnet : 'user/persona/estudiante/pai';

             $response = Http::withHeaders([
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'Authorization' => 'Bearer ' . session('token'),
             ])->get(env('API_URL') . $ruta);
                
             $resultado = json_decode($response->getBody(), true);
             $datos = $resultado['data'];
             return view('Usuario.Admin.PAI.index', compact(['datos','carnet']));
         } catch (\Throwable $th) {
              return Redirect::back();
         }
     }
     public function show_byAdmin($id, $carnet = null)
     {
         try {
             $response = Http::withHeaders([
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'Authorization' => 'Bearer ' . session('token'),
             ])->get(env('API_URL') . 'user/persona/estudiante/pai/' . $id);
 
             $resultado = json_decode($response->getBody(), true);
             $datos = $resultado['data'];

             $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/persona/admin/pai/banco/preguntas');

            $banco = json_decode($response->getBody(), true);
            
             return view('Usuario.Admin.PAI.show', compact(['datos','banco','carnet']));
         } catch (\Throwable $th) {
              return Redirect::back();
         }
     }

     public function viewcreate_byAdmin()
     {
         try {
            return view('Usuario.Admin.PAI.create');
         } catch (\Throwable $th) {
            dd($th->getMessage());
              return Redirect::back();
         }
     }
     
     public function resume_PAI($numSolicitud, $id, $carnet = null)
     {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('API_URL') . 'user/persona/admin/pai/banco/preguntas');

        $banco = json_decode($response->getBody(), true);
        // dd($banco);
         try {
            return view('Usuario.Admin.PAI.resume', compact(['banco','numSolicitud','id', 'carnet']));
         } catch (\Throwable $th) {
            dd($th->getMessage());
              return Redirect::back();
         }
     }
    
     public function resume_PAI_Store($numSolicitud,$id, $carnet = null, resumePAIrequest $request)
     {
         try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->post(env('API_URL') . 'user/persona/admin/pai/'.$numSolicitud.'/continuar', $request->validated());
            
            $respuesta = json_decode($response->getBody(), true);
            
            if(array_key_exists("errors", $respuesta)){
                foreach ($respuesta['errors'] as $item) {
                    foreach ($item as $error) {
                        toastr()->error($error);
                    }
                }
                return Redirect::back()->withErrors($respuesta['errors'])->withInput();;
            }
            if($respuesta['status']){
                toastr()->success($respuesta['message']);
                return  $carnet == 'null' ?  redirect()->route('Admin.pai.show',[$id, null]) :  redirect()->route('Admin.pai.show',[$id, $carnet]);
            }
            toastr()->error($respuesta['message']);
            return Redirect::back()->withInput();

         } catch (\Throwable $th) {
            dd($th->getMessage());
              return Redirect::back();
         }
     }

}
