<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student_MainFunctions_Controller extends Controller
{
    public function principalEst(){
        return view('Usuario.Estudiante.paginaprincipalUser');
    }
 
}
