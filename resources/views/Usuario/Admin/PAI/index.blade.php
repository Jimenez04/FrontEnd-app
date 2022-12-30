@extends('plantilla')
@section('title', 'PAI')
@section('content')

    <div class="PrincipalAdecuacion">

        <div class="container_principal_Adecuacion">

            <div class="Contenedor_lista_Solicitud_Adecuacion">

                <div class="titulo_lista">
                    <h2>Solicitud PAI</h2>
                </div>
                <div class="Solicitud_lista">

                    <div class="divbtn_nueva_solicitud">

                        <a class="boton_new_adecuacion" href="
                        {{route('Admin.pai.new')}}
                        ">Nueva Solicitud</a>
                    </div>

                    <div class="divtabla">
                        <table class="tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Número de Solicitud</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Nombre Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $datos as  $item)
                                <tr style="cursor:pointer " onclick="window.location= '{{route('Admin.pai.show', $item['id']) }}' " >
                                        <td data-label="N° Solicitud"scope="row"> {{ $item['numero_Solicitud']}} </th>
                                        <td data-label="Estado">{{$item['estado']}}</td>
                                        <td data-label="Fecha">{{$item['curso__rezago']['nombre_Curso']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="divbotonVolver">

                        <a class="boton_regresar" id="Regresar" href="{{ route('Admin') }}">Volver</a>

                    </div>



                </div>


            </div>

        </div>
    </div>
@endsection
<script>
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
