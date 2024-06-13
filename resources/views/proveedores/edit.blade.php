@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('proveedores.index') }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i>
        </a>
        <span class="h5 me-auto mb-0">EDICION DE PROVEEDORES</span>
    </div>
</div>

<div class="container mb-4 animate__animated animate__fadeInUp" style="max-width: 800px;">
    <h2 class="text-center mb-3">Editar Proveedor</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="" method="POST" novalidate class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ingrese el RUC" value="{{ old('ruc', $proveedor->ruc) }}">
                            @error('ruc')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingrese la razón social" value="{{ old('razon_social', $proveedor->razon_social) }}">
                            @error('razon_social')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el teléfono" value="{{ old('telefono', $proveedor->telefono) }}">
                            @error('telefono')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese el correo electrónico" value="{{ old('correo', $proveedor->correo) }}">
                            @error('correo')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la dirección" value="{{ old('direccion', $proveedor->direccion) }}">
                    @error('direccion')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad" value="{{ old('ciudad', $proveedor->ciudad) }}">
                            @error('ciudad')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Ingrese la provincia" value="{{ old('provincia', $proveedor->provincia) }}">
                            @error('provincia')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Ingrese el código postal" value="{{ old('codigo_postal', $proveedor->codigo_postal) }}">
                            @error('codigo_postal')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group mt-3">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="" disabled selected>Seleccione el estado</option>
                                <option value="activo" {{ old('estado', $proveedor->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado', $proveedor->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('msn_error'))
    <script>
        let mensaje="{{ session('msn_error') }}";
        Swal.fire({
            icon:"error",
            html: `<span style="font-size: 16px;">${mensaje}</span>`,
        });
    </script>
@endif

@endsection
