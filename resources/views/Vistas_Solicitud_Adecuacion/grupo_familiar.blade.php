@extends('plantilla')
@section('title', 'Grupo-familiar')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
            
                    <h3>Grupo Familiar</h3>
                    <div class="lista_familiares">
                        <div class="divbtn_agrega_familiar">
                            <a class="boton_agregar_familiar" href="/">Agregar Familiar</a>
                        </div>

                        <div class="divtabla">
                            <table class="tabla_grupo_familiar">
                                <thead>
                                    <tr>
                                        <th scope="col">Tipo de pariente</th>
                                        <th scope="col">Discapacidad</th>
                                        <th scope="col">Cedula</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td data-titulo="Tipo de Pariente" scope="row">Hermana</th>
                                        <td data-titulo="Discapacidad">le falta un tornillo</td>
                                        <td data-titulo="Cedula">123456789</td>
                                    </tr>
                                    <tr>
                                        <td data-titulo="Tipo de Pariente" scope="row">Hermana</th>
                                        <td data-titulo="Discapacidad">le falta un tornillo</td>
                                        <td data-titulo="Cedula">123456789</td>
                                    </tr>
                                    <tr>
                                        <td data-titulo="Tipo de Pariente" scope="row">Hermana</th>
                                        <td data-titulo="Discapacidad">le falta un tornillo</td>
                                        <td data-titulo="Cedula">123456789</td>
                                    </tr>

                                    <tr>
                                        <td data-titulo="Tipo de Pariente" scope="row">Hermana</th>
                                        <td data-titulo="Discapacidad">le falta un tornillo</td>
                                        <td data-titulo="Cedula">123456789</td>
                                    </tr>
                                    <tr>
                                        <td data-titulo="Tipo de Pariente" scope="row">Hermana</th>
                                        <td data-titulo="Discapacidad">le falta un tornillo</td>
                                        <td data-titulo="Cedula">123456789</td>
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
