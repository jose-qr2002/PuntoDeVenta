@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('clientes.index') }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i> 
        </a>
        <span class="h5 me-auto">REGISTRO DE CLIENTES</span>
    </div>
</div>


<div class="container animate__animated animate__fadeInUp">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Registrar Clientes</h2>

            <form>
                <div class="row mt-4">
                    <div class="col">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" placeholder="Ingrese el DNI">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Ingrese el apellido">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" placeholder="Ingrese el correo electrónico">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"> 
            <div class="text-center mt-5">
                <img src="{{ asset('img/3.png') }}" alt="Imagen" class="img-fluid">
            </div>
        </div>
    </div>
</div>

@endsection
