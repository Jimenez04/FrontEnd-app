<header class="cabecera_UCR">
    <div class=" contenedorHeaderUCR">
        <div class="logo-container">
            <a href="https://ucr.ac.cr/"  target="_blank">
                <img alt="Logo-UCR" height="80px" src="{{ URL::asset('img/firma-horizontal-una-linea-cmyk.png') }}">

            </a>
        </div>

        <div class="opciones_inicio" id="logueado_menu">
            @if (!session('login'))
                <nav class="contenedoropciones">
                    <li>
                        <a id="registro" href="/registrarse">Registrarse</a>
                    </li>

                    <li><a id="ayuda" href="#">Ayuda</a></li>
                </nav>
            @endif

            @if (session('login'))
                <nav class="contenedoropciones">
                    <li><a class="user_logueado" id="usuario">{{ session('name') }}</a>
                        <ul class="submenu_User">

                            <li><a href="/mi_perfil">Ver Perfil</a>

                            <li><a href="/change-password">Cambiar contraseña</a></li>
                        </ul>
                    </li>

                    <li><a class="user_logueado" href="{{ route('logout') }}">Salir
                            <i class="fa fa-sign-out"></i></a> </li>

                </nav>
        </div>
        @endif


    </div>





    <!--
        <div class="opciones_inicio" id="inicio_menu">
            @csrf
            <nav class="contenedoropciones">

                <li>
                    <a id="registro" href="/registrarse">Registrarse</a>
                </li>

                <li><a id="ayuda" href="#">Ayuda</a></li>
                
                <li><a href="{{ route('logout') }}">Salir</a>
                    <i class="fa-regular fa-arrow-right-from-bracket"></i>
                </li>
            </nav>
        </div>
         <div class="opciones_logueado" id="logueado_menu">
            <nav class="opciones_principal">
                <li> <a class="user">{{ auth()->user() }}</a>
                    <ul class="submenu_User">

                        <li><a href="/editar_perfil">Editar Perfil</a>

                        <li><a href="{{ route('logout') }}">Salir</a>
                            <i class="fa-regular fa-arrow-right-from-bracket"></i>
                        </li>
                    </ul>
                </li>
            </nav>
        </div>
    
    <div class="opciones_inicio" id="logueado_menu">
                <nav class="opciones_principal">
                    <li> <a class="user">{{ session('email') }}</a>
                        <ul class="submenu_User">

                            <li><a href="/editar_perfil">Editar Perfil</a>

                            <li><a href="{{ route('logout') }}">Salir</a>
                                <i class="fa-regular fa-arrow-right-from-bracket"></i>
                            </li>
                        </ul>
                    </li>
                </nav>
            </div>
    
    </div> -->

</header>
