@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('proveedores.index') }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i>
        </a>
        <span class="h5 me-auto mb-0">REGISTRO DE PROVEEDORES</span>
    </div>
</div>

<div class="container animate__animated animate__fadeInUp">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Registrar Proveedor</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('proveedores.store') }}" method="POST" novalidate class="mb-3">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ingrese el RUC" value="{{ old('ruc') }}">
                            @error('ruc')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingrese la razón social" value="{{ old('razon_social') }}">
                            @error('razon_social')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el teléfono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese el correo electrónico" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la dirección" value="{{ old('direccion') }}">
                            @error('direccion')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad" value="{{ old('ciudad') }}">
                            @error('ciudad')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Ingrese la provincia" value="{{ old('provincia') }}">
                            @error('provincia')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Ingrese el código postal" value="{{ old('codigo_postal') }}">
                            @error('codigo_postal')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado" value="{{ old('estado') }}">
                            @error('estado')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
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
