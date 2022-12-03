@extends('plantilla')
@section('title', 'Solicitud Adecuacion')
@section('content')

    <div class="PrincipalAdecuacion">

        <div class="container_principal_Adecuacion">

            <div class="Contenedor_lista_Solicitud_Adecuacion">

                <div class="titulo_lista">
                    <h2>Solicitudes de Adecuación</h2>
                    <!--Solicitud de adecuacion-->
                </div>
                <div class="Solicitud_lista">

                    <div class="divbtn_nueva_solicitud">

                        <a class="boton_new_adecuacion" href="/nueva-adecuacion">Nueva Solicitud</a>
                    </div>

                    <div class="divtabla">
                        <table class="tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Número de Solicitud</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td data-label="N° Solicitud"scope="row">AS123HSJA789ASKA2910ASC</th>
                                    <td data-label="Estado">Aprobada</td>
                                    <td data-label="Fecha">12/10/2020</td>
                                </tr>
                                <tr>
                                    <td data-label="N° Solicitud"scope="row">AS123HSJA789ASKA2910ASC</th>
                                    <td data-label="Estado">Aprobada</td>
                                    <td data-label="Fecha">12/10/2020</td>
                                </tr>
                                <tr>
                                    <td data-label="N° Solicitud"scope="row">AS123HSJA789ASKA2910ASC</th>
                                    <td data-label="Estado">Aprobada</td>
                                    <td data-label="Fecha">12/10/2020</td>
                                </tr>
                                <tr>
                                    <td data-label="N° Solicitud"scope="row">AS123HSJA789ASKA2910ASC</th>
                                    <td data-label="Estado">Aprobada</td>
                                    <td data-label="Fecha">12/10/2020</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                    <div class="divbotonVolver">

                        <a class="boton_regresar" id="Regresar" href="/principal-est">Volver</a>

                    </div>



                </div>


            </div>

        </div>
    </div>
@endsection
