@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('clientes.index') }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i> 
        </a>
        <span class="h5 me-auto mb-0">ACTUALIZACION DE CLIENTES</span>
    </div>
</div>


<div class="container animate__animated animate__fadeInUp">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Editar Cliente</h2>

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" novalidate class="mb-3">
                @csrf
                @method('PUT')
                <div class="row mt-4">
                    <div class="col">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI" value="{{ old('dni', $cliente->dni) }}">
                    </div>
                </div>
                @error('dni')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-3">
                    <div class="col">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese los nombres" value="{{ old('nombres', $cliente->nombres) }}">
                    </div>
                </div>
                @error('nombres')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-3">
                    <div class="col">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese los apellidos" value="{{ old('apellidos', $cliente->apellidos) }}">
                    </div>
                </div>
                @error('apellidos')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-3">
                    <div class="col">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese el correo electrónico" value="{{ old('correo', $cliente->correo) }}">
                    </div>
                </div>
                @error('correo')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-3">
                    <div class="col">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" placeholder="Ingrese el numero de celular" value="{{ old('celular', $cliente->celular) }}">
                    </div>
                </div>
                @error('celular')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-3">
                    <div class="col">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la dirección" value="{{ old('direccion', $cliente->direccion) }}">
                    </div>
                </div>
                @error('direccion')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mt-4">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"> 
            <div class="text-center">
                <img src="{{ asset('img/3.png') }}" alt="Imagen" class="img-fluid">
            </div>
        </div>
    </div>
</div>

@if (session('error'))
    <script>
        let mensaje="{{ session('error') }}";
        Swal.fire({
            icon:"error",
            html: `<span style="font-size: 16px;">${mensaje}</span>`,
        });
    </script>
@endif

@endsection
