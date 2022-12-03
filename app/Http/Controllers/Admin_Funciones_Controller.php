<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_Funciones_Controller extends Controller
{
    public function principalAdmi(){
        return view('Usuario.Admin.paginaprincipalAdmin');
    }
}
