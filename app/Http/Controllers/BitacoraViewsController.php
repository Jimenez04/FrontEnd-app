<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitacoraViewsController extends Controller
{
    public function bitacora()
    {
        return view('Vistas_Bitacora.mainBitacora');
    }
}
