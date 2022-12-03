@extends('plantilla')
@section('title', 'Archivos')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
            
                    <h3>Archivos</h3>
                    <div class="lista_archivos">
                        <div class="divbtn_agrega_archivo">
                            <a class="boton_agregar_archivo" href="agregar-archivos">Agregar Archivo</a>
                        </div>

                        <div class="divtabla">
                            <table class="tabla_archivos">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Expedido por</th>
                                        <th scope="col">Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td data-titulo="Nombre" scope="row">Dictamen</th>
                                        <td data-titulo="Expedido por">Gustavo López</td>
                                        <td data-titulo="Archivo">Dictamen.pdf</td>
                                    </tr>
                                    <tr>
                                        <td data-titulo="Nombre" scope="row">Dictamen</th>
                                        <td data-titulo="Expedido por">Gustavo López</td>
                                        <td data-titulo="Archivo">Dictamen.pdf</td>
                                    </tr>
                                    <tr>
                                        <td data-titulo="Nombre" scope="row">Dictamen</th>
                                        <td data-titulo="Expedido por">Gustavo López</td>
                                        <td data-titulo="Archivo">Dictamen.pdf</td>
                                    </tr>

                                    <tr>
                                        <td data-titulo="Nombre" scope="row">Dictamen</th>
                                        <td data-titulo="Expedido por">Gustavo López</td>
                                        <td data-titulo="Archivo">Dictamen.pdf</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="divbotones_">

                        <input class="boton_opciones" id="Cancelar" type="submit" value="Cancelar">
                        <input class="boton_opciones" id="Siguiente" type="submit" value="Siguiente">
                    </div>

                </div>


            </div>

        </div>


    </div>


@endsection
