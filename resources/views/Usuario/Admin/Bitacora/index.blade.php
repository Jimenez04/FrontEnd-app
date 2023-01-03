<?php 
use Carbon\Carbon;
?>
@extends('plantilla')
@section('title', 'Bitácora')
@section('content')

    <div class="PrincipalAdecuacion">

        <div class="container_principal_Adecuacion">

            <div class="Contenedor_lista_Solicitud_Adecuacion">

                <div class="titulo_lista">
                    <h2>Bitácora</h2>
                </div>
                <div class="Solicitud_lista">

                    <div class="divbtn_nueva_solicitud">

                        <a class="boton_new_adecuacion"  style="cursor: pointer; color:white" onclick="openModalBitacora(null,'{{$id}}')" >Nueva entrada</a>

                    </a>
                    </div>

                    <div class="divtabla">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($resultado as $item )
                            <div class="accordion-item border">
                              <h2 class="accordion-header" id="flush-heading{{$item['id']}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$item['id']}}" aria-expanded="false" aria-controls="flush-collapse{{$item['id']}}">
                                  {{$item['descripcion']}}
                                </button>
                              </h2>
                                <div id="flush-collapse{{$item['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$item['id']}}" data-bs-parent="#accordionFlushExample">

                                    <div class="accordion-body">
                                        <h5>Acciones realizadas</h5>
                                        {{$item['acciones_realizadas']}}
                                        <br>
                                    </div>
                                 </div>
                                <div id="flush-collapse{{$item['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$item['id']}}" data-bs-parent="#accordionFlushExample">

                                    <div class="accordion-body">
                                        <h5>Observaciones</h5>
                                        {{$item['observaciones']}}
                                    </div>
                                    <div class="accordion-body">
                                        <code>{{$item['fecha']}}</code>
                                            <br>
                                            <a class="btn btn-info" style="cursor: pointer;" onclick="openModalBitacora('{{$item['id']}}','{{$item['bitacora_Id']}}')">Editar</a>
                                    </div>
                                 </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="divbotonVolver">

                        <a class="boton_opciones btn_negativos widthbnt" id="Regresar" href="{{ route($ruta,$idretorno)}}">Volver</a>

                    </div>
                </div>
            </div>
        </div>
            <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
            <input type="hidden" name="" id="token" value="{{session('token')}}">
    </div>
    @include('Usuario.Admin.Bitacora.modals.createUpdate')
@endsection

