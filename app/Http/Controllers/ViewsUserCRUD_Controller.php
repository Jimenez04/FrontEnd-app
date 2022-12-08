<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsUserCRUD_Controller extends Controller
{
    public function perfil_usuario()
    {

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
        //  dd($resultado);
        $resultado = $resultado['data'];
        // dd($resultado);

        return view('Usuario.Shareviews.ver_perfil', compact('resultado'));
    }


    public function editar_perfil()
    {
        return view('Usuario.Shareviews.editar_perfil');
    }
    public function listar_usuarios()
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
        $listado_usuarios = json_decode($response->getBody(), true);

        $listado_usuarios  = $listado_usuarios['data'];
   

        //  dd($listado_usuarios);

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
