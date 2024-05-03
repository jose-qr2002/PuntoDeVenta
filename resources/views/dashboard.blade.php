{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    <style>
        li > p{
            margin-bottom: 0
        }
    </style>
@endsection

@section('contenidoprincipal')
    <h1 class="mt-2 mb-4 animate__animated animate__fadeInRight">
        Dashboard
    </h1>
    <div class="row g-3 animate__animated animate__fadeInRight">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card bg-warning bg-gradient bg-opacity-75 text-white">
                <div class="card-header text-center font-bold fw-semibold">
                    Total Productos
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title fs-2">95</h5>
                        <div class="fs-2">
                            <i class="ri-box-3-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card bg-success bg-gradient bg-opacity-75 text-white">
                <div class="card-header text-center font-bold fw-semibold">
                    Total Ventas
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title fs-2">340</h5>
                        <div class="fs-2">
                            <i class="ri-wallet-3-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card bg-danger bg-gradient bg-opacity-75 text-white">
                <div class="card-header text-center font-bold fw-semibold">
                    Total Compras
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title fs-2">50</h5>
                        <div class="fs-2">
                            <i class="ri-refund-2-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card bg-info bg-gradient bg-opacity-75 text-white">
                <div class="card-header text-center font-bold fw-semibold">
                    Total Proveedores
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title fs-2">10</h5>
                        <div class="fs-2">
                            <i class="ri-truck-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- PseudoTablas --}}
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header bg-dark text-white bg-opacity-75 text-center fw-bold">
                  Productos mas vendidos
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">1. Llave Inglesa</p>
                        <p class="text-success fw-semibold">S/3</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">2. Taladro Electrico</p>
                        <p class="text-success fw-semibold">S/30</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">3. Cinta Metrica</p>
                        <p class="text-success fw-semibold">S/7</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">4. Sierra Electrica</p>
                        <p class="text-success fw-semibold">S/79</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">5. Llave ajustable</p>
                        <p class="text-success fw-semibold">S/14</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">6. Pintura Blanca</p>
                        <p class="text-success fw-semibold">S/25</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header bg-secondary bg-opacity-75 text-center text-white fw-bold">
                  Ventas Recientes
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">28-03-2024</p>
                        <p class="text-success fw-semibold">S/102</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">28-03-2024</p>
                        <p class="text-success fw-semibold">S/255</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">28-03-2024</p>
                        <p class="text-success fw-semibold">S/95</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">27-03-2024</p>
                        <p class="text-success fw-semibold">S/40</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">27-03-2024</p>
                        <p class="text-success fw-semibold">S/30</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="fw-semibold">26-03-2024</p>
                        <p class="text-success fw-semibold">S/60</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

