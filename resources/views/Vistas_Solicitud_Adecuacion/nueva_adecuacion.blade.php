@extends('plantilla')
@section('title', 'UCR Adecuacion')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
                    <form onSubmit="return false;" method="post" enctype="multipart/form-data" >
                        @csrf
                        <h3>Nueva Solicitud de Adecuación</h3>
                            <div id="form_contenedor">
                            
                            </div>
                        <div class="divbotones_">

                            <a class="boton_opciones" id="Cancelar" type="submit" value="Cancelar" href="{{ URL::previous() }}">Cancelar</a>
                            <a  hidden class="boton_opciones" id="btn_atras" onclick="atras(this)">Atras</a>
                            <a  class="boton_opciones" id="btn_Siguiente" onclick="siguiente(this)">Siguiente</a>
                            <input class="boton_opciones" hidden id="Siguiente" type="submit" value="Finalizar">
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
@include('modals.agregar_pariente')
@endsection
<script src="{{ asset('js/adecuacion.js') }}"></script>
