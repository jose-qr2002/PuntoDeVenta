@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')

<div class="titulo-barra titulo-barra-mas-claro bg-info text-dark p-3 mb-3 animate__animated animate__fadeInDown">
            <div class="d-flex justify-content-start align-items-center">
                <a href="{{ route('ventas') }}" class="btn btn-light me-2">
                    <i class="ri-arrow-left-line"></i>
                </a>
                REGISTRAR VENTA
            </div>
        </div>


    <div class="container animate__animated animate__fadeInUp">
    
       

        <h1 class="text-center mt-5">GENERAR NUEVA VENTA</h1>

        <div class="row mt-5">
            <div class="col-12 col-lg-6">
                <div>
                    <label class="fw-bold" for="cliente">Cliente:</label>
                    <span>{{ $factura->cliente->nombres. ' ' . $factura->cliente->apellidos }}</span>
                </div>
                <div>
                    <label class="fw-bold" for="cliente">Dni:</label>
                    <span>{{ $factura->cliente->dni }}</span>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <label class="fw-semibold" for="producto">Añadir Producto</label>
                <input type="text" class="form-control" id="producto" placeholder="Ingrese el código del producto">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-secondary">Resetear</button>
                <button class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary">Generar</button>
            </div>
        </div>
        @php
            $contador = 1;
        @endphp
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table mt-3 table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio Unitario</th>
                                <th>Unidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factura->detalles as $detalle)
                                <tr>
                                    <td>{{ $contador }}</td>
                                    <td>{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>S/{{ $detalle->precion_unitario }}</td>
                                    <td>{{ $detalle->producto->medida }}</td>
                                    <td>S/{{ $detalle->precion_unitario * $detalle->cantidad }}</td>
                                    <td><button class="btn btn-danger">Descartar</button></td>
                                </tr>
                                @php
                                    $contador++;
                                @endphp
                            @endforeach
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2" class="font-weight-bold">Monto Total:</td>
                                <td class="font-weight-bold">S/{{ $factura->monto_total }}</td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
