@extends('cabecera')
@section('codigocabecera')
    <style>
        .btn-volver {
            position: absolute;
            bottom: 8%;
            left: 50%;
            transform: translateX(-50%);
        }

        .separador {
            overflow-y: auto;
        }

        .contenido-principal {
            overflow-y: scroll;
        }

        .sidebar {
            min-width: 255px;
            max-width: 255px;
            position: relative;
            overflow-y: auto; /* Añade un desplazamiento solo al contenido */
            min-height: 100%; /* Asegúrate de que el contenido ocupe todo el espacio disponible */
            z-index: 1;
        }
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        #sidebar-close {
            font-size: 35px;
            position: absolute;
            top: 0;
            right: 10px;
        }

        @media (min-width: 765px) {
            #sidebar-close {
                display: none;
            }

            #sidebar-open {
                display: none;
            }
        }

        @media (max-width: 765px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -255px;
                transition: left .5s;
            }

            .sidebar-open {
                left: 0;
            }

        }
    </style>
    @yield('codigocabeceraprincipal')
@endsection
    
@section('contenido')

    <div class="" style="min-height: 100%">
        <div class="separador d-flex bg-light" style="height: 100vh">
            <!-- Sidebar -->
            <div class="sidebar bg-primary bg-gradient" id="sidebar"> 
                <div id="sidebar-close" style="cursor: pointer">
                    <i class="ri-arrow-left-double-fill"></i>
                </div>
                <h1 class="h1 text-center mt-5" style="font-size: 35px">SURSAC</h1>
                <nav class="text-center px-4">
                    <ul class="list-unstyled w-100">
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">CLIENTES</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">PRODUCTOS</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">VENTAS</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">REPORTE</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">INVENTARIO</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn btn-info w-100 border border-secondary rounded" href="#">PROVEEDORES</a>
                        </li>
                    </ul>
                </nav>
                <a class="btn btn-info btn-volver" href="">Volver</a>
            </div>
            <div class="contenido-principal w-100">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div id="sidebar-open" style="cursor: pointer">
                            <i class="ri-menu-2-line display-6 text-white"></i>
                        </div>
                        <a class="navbar-brand" href="#">Sursac</a>
                    </div>
                  </nav>
                <div class="container">
                    @yield('contenidoprincipal')
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.querySelector("#sidebar");
        const sidebarOpenButton = document.querySelector("#sidebar-open");
        const sidebarCloseButton = document.querySelector("#sidebar-close");

        sidebarOpenButton.addEventListener('click', () => {
            sidebar.classList.add("sidebar-open");
        });

        sidebarCloseButton.addEventListener('click', () => {
            sidebar.classList.remove("sidebar-open");
        });
    </script>
    
@endsection