<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BitacoraViewsController extends Controller
{
    public function index($id, $ruta, $idretorno = null )
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session('token'),
            ])->get(env('API_URL') . 'user/estudiante/solicitud/bitacora/' . $id);
            $resultado = json_decode($response->getBody(), true);
             if (array_key_exists("errors", $resultado)) {
                toastr()->error("La bitácora no existe");
                return redirect()->back();
             }
            if ($resultado['status']) {
                $resultado = $resultado['data'];
                return view('Usuario.Admin.Bitacora.index', compact(['resultado','id', 'ruta','idretorno']));
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
}
