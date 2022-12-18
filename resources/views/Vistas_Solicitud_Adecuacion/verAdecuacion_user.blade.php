@extends('plantilla')
@section('title', 'Ver Adecuacion')
@section('content')

    <div class="Principal_Informacion_Adecuacion">

        <div class="container_Informacion_Adecuacion">

            <div class="Informacion_solicitud">

                <h3>Información Solicitud de Adecuación</h3>
                <div class="container_informacion_solicitud" id="container_informacion_solictud">
                    <div class="informacion_adecuacion">
                        <p>Número de solicitud: {{ $resultado['numero_solicitud'] }}</p>
                        <p>Razon de solicitud:  {{ $resultado['razon_Solicitud'] }}</p>
                        <p>Estado de solicitud: {{ $resultado['estado'] }}</p>
                    </div>

                    <div class="detalle_solicitud">
                        <label>Archivos</label>
                        @foreach ($resultado['archivos'] as $archivos)
                        <li>
                            <a>{{ $archivos['url'] }}</a>
                          </li>
                        @endforeach
                    </div>

                </div>


                <div class="divbotones_">

                    <a class="boton_opciones" type="button" value="Atrás"
                        href="{{ URL::previous() }}">Regresar</a>
            
                </div>


            </div>

        </div>

    </div>
