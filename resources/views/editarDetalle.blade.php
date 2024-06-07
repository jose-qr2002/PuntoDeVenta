@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('detalles.index', $facturaDetalle->factura_id) }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i> 
        </a>
        <span class="h5 me-auto mb-0">Edicion de Detalle</span>
    </div>
</div>


<div class="container animate__animated animate__fadeInUp" style="max-width: 576px;">
    <h2 class="text-center">Editar Detalle</h2>
    <h5>Datos de la factura:</h5>
    <div class="d-flex justify-content-between">
        <div>
            <label for="" class="inline-block fw-bold">Cliente:</label>
            <span>{{ $facturaDetalle->factura->cliente->nombres }} {{ $facturaDetalle->factura->cliente->apellidos }}</span>
        </div>
        <div>
            <label for="" class="inline-block fw-bold">Fecha:</label>
            <span>{{ $facturaDetalle->factura->fecha }}</span>
        </div>
    </div>
    <h5 class="mt-3">Producto Elegido:</h5>
    <div class="d-flex justify-content-between">
        <div>
            <label for="" class="inline-block fw-bold">Nombre:</label>
            <span>{{ $facturaDetalle->producto->nombre }}</span>
        </div>
        <div>
            <label for="" class="inline-block fw-bold">Disponible:</label>
            <span>{{ $facturaDetalle->producto->stock }} {{$facturaDetalle->producto->medida}}s</span>
        </div>
    </div>
    <form action="{{ route('detalles.update', $facturaDetalle->id) }}" method="POST" novalidate class="mb-3">
        @csrf
        @method('PUT')
        <div class="row mt-4">
            <div class="col">
                <label for="precion_unitario">Precio Unitario</label>
                <input type="number" name="precion_unitario" id="precion_unitario" class="form-control" placeholder="Ingrese el precio deseado" value="{{ old('precion_unitario', $facturaDetalle->precion_unitario) }}">
            </div>
        </div>
        @error('precion_unitario')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <div class="row mt-4">
            <div class="col">
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la cantidad deseada" value="{{ old('cantidad', $facturaDetalle->cantidad) }}">
            </div>
        </div>
        @error('cantidad')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-primary">Actualizar Detalle</button>
            </div>
        </div>
    </form>
</div>

@endsection
