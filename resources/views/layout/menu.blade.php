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
            min-height: 100vh; /* Asegúrate de que el contenido ocupe todo el espacio disponible */
            max-height: 100vh;
            z-index: 1;
            background-color: #0290D2;
        }

        .sidebar__enlace {
            background-color: #01688D;
            border: none!important;
            outline: none;
        }

        .sidebar__enlace:hover {
            background-color: #023041;
        }

        .sidebar__titulo {
            color: #043f55;
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

        @media (max-height: 540px) {
            .btn-volver {
                position: static;
                transform: translateX(0);
            }
        }

    </style>
    @yield('codigocabeceraprincipal')
@endsection
    
@section('contenido')

    <div class="" style="min-height: 100%">
        <div class="separador d-flex bg-light" style="height: 100vh">
            <!-- Sidebar -->
            <div class="sidebar shadow animate__animated animate__fadeInLeft" id="sidebar"> 
                <div id="sidebar-close" style="cursor: pointer">
                    <i class="ri-arrow-left-double-fill"></i>
                </div>
                <a href="{{ route('dashboard') }}" style="text-decoration: none;">
                    <h1 class="sidebar__titulo h1 text-center mt-5 fw-normal" style="font-size: 35px">SUR<span class="fw-bold">SAC</span></h1>
                </a>
                <nav class="text-center px-4 mb-4">
                    <ul class="list-unstyled w-100 mb-5">
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="{{ route('clientes.index') }}">CLIENTES</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="{{ route('productos.index') }}">PRODUCTOS</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="{{ route('ventas') }}">VENTAS</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="#">COMPRAS</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="#">INVENTARIO</a>
                        </li>
                        <li class="">
                            <a class="mt-3 btn w-100 border border-secondary rounded sidebar__enlace text-white" href="#">PROVEEDORES</a>
                        </li>
                    </ul>
                    <a class="btn sidebar__enlace btn-volver text-white" href="">Volver</a>
                </nav>
            </div>
            <div class="contenido-principal w-100">
                <nav class="navbar navbar-dark bg-dark animate__animated animate__fadeInDown">
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