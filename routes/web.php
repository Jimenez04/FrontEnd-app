<?php

use App\Http\Controllers\Admin_Funciones_Controller;
use App\Http\Controllers\InicioSesionController;
use App\Http\Controllers\Student_MainFunctions_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacoraViewsController;
use App\Http\Controllers\Persona_CRUD_Controller;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ViewsUserCRUD_Controller;
use App\Http\Controllers\Solicitud_Adecuacion_Views_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//--------------------------------Login---------------------------------------
Route::get('/',[InicioSesionController::class,'index'])->name('index')->middleware('verificarsesionLogin');

Route::get('/login{mensaje?}',[InicioSesionController::class,'login'])->name('login')->middleware('verificarsesionLogin');
// Route::get('/mi_usuario/verificacion',[InicioSesionController::class,'mi_usuario'])->name('mi_usuario');

Route::post('/loginApi', [InicioSesionController::class,'loginApi'])->name('sesion.validacion')->middleware('verificarsesionLogin');;
Route::get('/logoutApi', [InicioSesionController::class,'logout'])->name('logout')->middleware('verificartoken');

//--------------------------------Registro---------------------------------------

Route::get('/registrarse',[RegistroController::class,'registro'])->name('registrarse')->middleware('verificarsesionLogin');;
Route::post('/registroApi', [RegistroController::class,'registroApi'])->name('registro')->middleware('verificarsesionLogin');

//--------------------------------Olvido Contraseña---------------------------------------
Route::get('/recuperar',[ResetPasswordController::class,'olvidocontrasena'])->middleware('verificarsesionLogin');//muestra la vista
Route::post('/forget-password',[ResetPasswordController::class,'Recuperar_passwordApi'])->name('forgot-password')->middleware('verificarsesionLogin');//manda correo con contra alternativa
Route::get('/change-password',[ResetPasswordController::class,'NuevaPassword'])->name('change-password')->middleware('verificartoken');// vista cambia la contra
Route::post('/new-password',[ResetPasswordController::class,'NuevaPasswordApi'])->name('new-password')->middleware('verificartoken') ;

//Probar si funciona hasta acá //todo bien
//--------------------------------Pantallas Principales---------------------------------------

Route::get('/principal-est',[Student_MainFunctions_Controller::class,'principalEst'])->name('Student')->middleware('verificartoken');
Route::get('/home',[InicioSesionController::class,'mi_usuario'])->name('Home')->middleware('verificartoken');

Route::get('/principal_admi',[Admin_Funciones_Controller::class,'principalAdmi'])->name('Admin')->middleware('verificartoken');;
//todo bien
//--------------------------------CRUD PERSONA ---------------------------------------

//--------------------------------TRABAJO ---------------------------------------  
Route::get('/trabajo',[Persona_CRUD_Controller::class,'viewTrabajo'])->name('Trabajo');
Route::get('/obtener_trabajo',[Persona_CRUD_Controller::class,'getTrabajo'])->name('get_Trabajo');
Route::post('/agrega_trabajo',[Persona_CRUD_Controller::class,'AgregaTrabajo'])->name('Nuevo_Trabajo');

//vistas CRUD del usuario
//--------------------------------VISTAS COMPARTIDAS---------------------------------------
Route::get('/mi_perfil',[ViewsUserCRUD_Controller::class,'perfil_usuario'])->middleware('verificartoken'); //funciona
Route::get('/mi_perfil2',[ViewsUserCRUD_Controller::class,'muestraejemplo']);
Route::get('/editar_perfil',[ViewsUserCRUD_Controller::class,'editar_perfil']);
Route::get('/lista',[ViewsUserCRUD_Controller::class,'listar_usuarios']);



//--------------------------------SOLICITUD ADECUACIÓN---------------------------------------
Route::get('/solicitud-adecuacion',[Solicitud_Adecuacion_Views_Controller::class,'viewAdecuacion'])->name('Adecuacion')->middleware('verificartoken');
Route::get('/nueva-adecuacion',[Solicitud_Adecuacion_Views_Controller::class,'viewNuevaAdecuacion'])->name('Nueva_Adecuacion')->middleware('verificartoken');

//--------------------------------NECESIDAD Y APOYO ---------------------------------------
Route::get('/necesidad-apoyo',[Solicitud_Adecuacion_Views_Controller::class,'viewNecesidad'])->name('Necesidad');
Route::post('/add_necesidad-apoyo',[Solicitud_Adecuacion_Views_Controller::class,'AddNecesidad'])->name('Add_Necesidad');

//--------------------------------INSTITUCIÓN ---------------------------------------
Route::get('/institucion',[Solicitud_Adecuacion_Views_Controller::class,'viewInstitucion'])->name('Institucion');
Route::post('/add_institucion',[Solicitud_Adecuacion_Views_Controller::class,'AddInstitucion'])->name('Agrega_Institucion');



//--------------------------------BECA ---------------------------------------
Route::get('/beca',[Solicitud_Adecuacion_Views_Controller::class,'viewBeca'])->name('Beca');

//--------------------------------GRUPO FAMILIAR ---------------------------------------
Route::get('/grupo-familiar',[Solicitud_Adecuacion_Views_Controller::class,'viewGrupoFamiliar'])->name('GrupoFamiliar');

//--------------------------------ARCHIVOS ---------------------------------------
Route::get('/archivos',[Solicitud_Adecuacion_Views_Controller::class,'viewArchivos'])->name('Archivos');
Route::get('/agregar-archivos',[Solicitud_Adecuacion_Views_Controller::class,'viewAddArchivos'])->name('Nuevo_Archivo');

//--------------------------------FIN SOLICITUDE DE ADECUACIÓN ---------------------------------------

//--------------------------------Vistas Bitacora---------------------------------------
Route::get('/bitacora',[BitacoraViewsController::class,'bitacora']);