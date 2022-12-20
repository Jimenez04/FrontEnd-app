<?php

namespace App\Http\Controllers;

use App\Http\Requests\editUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewsUserCRUD_Controller extends Controller
{
    public function perfil_usuario()
    {
        try {
            $client = new \GuzzleHttp\Client();


            $response = $client->get(
                env('API_URL') . 'user/persona/estudiante/',
                [
                    //manda el token de login en el header
                    'headers' => [
                        'Authorization' => 'Bearer ' . session('token'),
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
    
                    ],
                ]
            );
            $resultado = json_decode($response->getBody(), true);
            $resultado = $resultado['data'];
            return view('Usuario.Shareviews.ver_perfil', compact('resultado'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }


    public function editar_perfil()
    {
        $client = new \GuzzleHttp\Client();


        $response = $client->get(
            env('API_URL') . 'user/persona/estudiante/',
            [
                
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'

                ],
            ]
        );
        $resultado = json_decode($response->getBody(), true);
        $resultado = $resultado['data'];
        return view('Usuario.Shareviews.editar_perfil', compact('resultado'));
    }

    
    
    public function patch_editar_perfil(editUserRequest $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . session('token'),
        ])->patch( env('API_URL') . 'persona/editar', $request->validated());
        $resultado = json_decode($response->getBody(), true);
            if($resultado['status']){
                toastr()->success($resultado['message'],"Éxito");
                return redirect()->route('perfil_usuario');
            }
            if(array_key_exists('error',$resultado)){
                toastr()->error($resultado['error']);
            }
            toastr()->success($resultado['message']);
        return;
    }
    

    public function listar_usuarios()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->get(
            env('API_URL') . 'admin/persona/estudiante',
            [
                //manda el token de login en el header

                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'

                ],
            ]
            );
        $listado_usuarios = json_decode($response->getBody(), true);

        $listado_usuarios  = $listado_usuarios['data'];

        // dd($listado_usuarios);

        //    return view('Usuario.Admin.lista_usuarios')->with('listado_usuarios', $listado_usuarios);
        return view('Usuario.Admin.lista_usuarios', ['listado_usuarios' => collect($listado_usuarios)->paginate(6)]);
    }


    public function lista_usuarios_registrados()
    {

        $client = new \GuzzleHttp\Client();


        $response = $client->get(
            env('API_URL') . 'persona',
            [
                //manda el token de login en el header

                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'

                ],
            ]
        );
        $resultado = json_decode($response->getBody(), true);

        //dd($resultado);

        return view('Usuario.Admin.lista_usuarios', compact('resultado'));
    }
}
