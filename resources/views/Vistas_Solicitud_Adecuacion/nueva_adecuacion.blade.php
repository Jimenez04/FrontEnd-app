@extends('plantilla')
@section('title', 'UCR Adecuacion')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="progreso"></div>
                </div>
                <div class="Llenado_solicitud">
                    <form onSubmit="return false;" method="post" enctype="multipart/form-data" >
                        @csrf
                        <h3>Nueva Solicitud de Adecuación</h3>
                            <div id="form_contenedor">
                            
                            </div>
                        <div class="divbotones_">

                            <a class="boton_opciones btn_negativos" id="Cancelar" type="submit" value="Cancelar" href="{{ URL::previous() }}">Cancelar</a>
                            <a  hidden class="boton_opciones btn_negativos" id="btn_atras" onclick="atras(this)">Atras</a>
                            <a  class="boton_opciones btn_positivos" id="btn_Siguiente" onclick="siguiente(this)">Siguiente</a>
                            <a  hidden class="boton_opciones btn_positivos" id="Siguiente" onclick="finalizar(this)">Finalizar</a>
                        </div>
                    </form>

                </div>
               
            </div>
            
        </div>
        
    </div>
             <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
            <input type="hidden" name="" id="token" value="{{session('token')}}">
            <input type="hidden" name="" id="cedula" value="{{session('cedula')}}">
            <input type="hidden" name="" id="carnet" value="{{session('carnet')}}">
            <input type="hidden" name="" id="tipousuario" value="{{session('roleuser')}}">
    
@include('modals.agregar_pariente')
@include('modals.responsabilidadAdecuacion')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@endsection
<script src="{{ asset('js/adecuacion.js') }}"></script>
<script src="{{ asset('js/validacionesS_Adecuacion.js') }}"></script>
