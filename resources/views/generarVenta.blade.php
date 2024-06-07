@extends('cabecera')

@section('codigocabecera')

@endsection

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="card-title mb-0">Generar Factura</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('factura.generar', $factura->id) }}"> 
                        @csrf
                        <div class="form-group row">
                            <label for="cliente" class="col-sm-3 col-form-label">Cliente</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cliente" placeholder="Nombre" value="{{ isset($cliente) ? $cliente->nombres . ' ' . $cliente->apellidos : '' }}" disabled>
                                @if(isset($cliente))
                                <input type="hidden" id="cliente_id" name="cliente_id" value="{{ $cliente->id }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SubTotal</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext">{{ $factura->monto_total }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext">{{ $factura->monto_total }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metodoPago" class="col-sm-3 col-form-label">Método de Pago</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="metodoPago" name="metodopago_id" required>
                                    <option value="">Seleccionar método de pago</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Tarjeta de Crédito</option>
                                    <option value="3">Yape</option>
                                    <option value="4">Plin</option>
                                    <option value="5">Transferencia Bancaria</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary mr-2">Generar Factura</button>
                                <a href="{{ route('ventas') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
