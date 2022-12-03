<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Persona_CRUD_Controller extends Controller
{
    public function viewTrabajo()
    {
        return view('Vistas_Solicitud_Adecuacion.trabajo');
    }
    //AGREGA TRABAJO
    public function AgregaTrabajo(Request $request)
    {
        

    }

    public function ObtenerTrabajoUser()
    {
       
    }
}
