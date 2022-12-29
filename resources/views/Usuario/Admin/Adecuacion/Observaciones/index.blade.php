<?php 
use Carbon\Carbon;
?>
@extends('plantilla')
@section('title', 'Observaciones')
@section('content')

    <div class="PrincipalAdecuacion">

        <div class="container_principal_Adecuacion">

            <div class="Contenedor_lista_Solicitud_Adecuacion">

                <div class="titulo_lista">
                    <h2>Observaciones</h2>
                </div>
                <div class="Solicitud_lista">

                    <div class="divbtn_nueva_solicitud">

                        <a class="boton_new_adecuacion"  style="cursor: pointer; color:white" onclick="openModalObservacion(null,'{{$numSolicitud}}')" >Nueva entrada</a>

                    </a>
                    </div>

                    <div class="divtabla">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($resultado as $item )
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-heading{{$item['id']}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$item['id']}}" aria-expanded="false" aria-controls="flush-collapse{{$item['id']}}">
                                  {{$item['nombre']}}
                                </button>
                              </h2>
                              <div id="flush-collapse{{$item['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$item['id']}}" data-bs-parent="#accordionFlushExample">

                                <div class="accordion-body">
                                    <h5>Descripción</h5>
                                    {{$item['descripcion']}}
                                    <br>
                                </div>
                                <div class="accordion-body">
                                    <code>Credo el: {{Carbon::parse($item['created_at'])->format('d-m-Y');}}</code>
                                    <br>
                                    <code>Editado el: {{Carbon::parse($item['updated_at'])->format('d-m-Y');}}</code>
                                    <br>
                                        <br>
                                        <a class="btn btn-info" style="cursor: pointer;" onclick="openModalObservacion('{{$item['id']}}','{{$numSolicitud}}')">Editar</a>
                                </div>
                                
                             </div>
                        </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="divbotonVolver">

                        <a class="boton_regresar" id="Regresar" href="{{ route('verAdecuacion_admin',$id)}}">Volver</a>

                    </div>
                </div>
            </div>
        </div>
            <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
            <input type="hidden" name="" id="token" value="{{session('token')}}">
    </div>
    @include('Usuario.Admin.Adecuacion.Observaciones.modals.createUpdate')
@endsection

