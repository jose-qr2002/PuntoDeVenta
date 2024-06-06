@extends('cabecera')

@section('codigocabecera')
    
@endsection

@section('contenido')

<div class="titulo-barra bg-info text-white p-3 mb-3 animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('ventas') }}" class="btn btn-light me-2">
            <i class="ri-arrow-left-line"></i> 
        </a>
        <span class="h5 me-auto mb-0">Atender Venta</span>
    </div>
</div>

<div class="container animate__animated animate__fadeInUp mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>ATENDER VENTA</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('buscar.cliente') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="dniCliente">DNI del cliente</label>
                            <input type="text" class="form-control" id="dniCliente" name="dniCliente" placeholder="DNI del cliente" required>
                            @error('dniCliente')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Buscar</button>
                    </form>
                    
                    @if(isset($cliente))
                        <div class="mt-4">
                            <h5>Datos del Cliente</h5>
                            <ul class="list-group">
                                <li class="list-group-item">DNI: {{ $cliente->dni }}</li>
                                <li class="list-group-item">Nombre: {{ $cliente->nombres }}</li>
                                <li class="list-group-item">Apellido: {{ $cliente->apellidos }}</li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <form action="{{ route('factura.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                <button type="submit" class="btn btn-primary col-lg-6">
                                    Confirmar Atención
                                </button>
                            @error('cliente_id')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            </form>
                        </div>
                    @endif

                </div>
            </div>
            @if(session('msn_error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('msn_error') }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
