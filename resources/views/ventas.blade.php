{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    <style>
        
    </style>
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 mb-5 animate__animated animate__fadeInRight">VENTAS</h1>
    <div class="row animate__animated animate__fadeInRight">
        <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <div class="row">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <a href="" class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#fechaModal">
                        Buscar por Fecha
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <a href="" class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#clienteModal">
                        Buscar por cliente
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="container">
                <div class="row">
                    <a href="{{ route('factura.create') }}" class="btn btn-primary offset-lg-6 col-lg-6">
                        Atender Venta
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive shadow mt-3 mb-3 animate__animated animate__fadeInRight">
    <table class="table table-striped table-bordered text-center mb-0" style="min-width: 700px">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Estado de pago</th>
                <th>Metodo de Pago</th>
                <th>Monto Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->id }}</td>
                <td>{{ $factura->cliente->nombres }}</td>
                <td>{{ $factura->fecha }}</td>
                <td>{{ $factura->estado }}</td>
                <td>{{ $factura->metodoPago->metodo }}</td>
                <td>{{ $factura->monto_total }}</td>
                <td>
                    <!-- Agrega tus botones aquí -->
                    <a href="{{ route('detalles.index', $factura->id) }}" class="btn btn-warning">Ver Factura</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <!-- Pagination icons -->
    <div class="animate__animated animate__fadeInRight">
        {{ $facturas->links() }}
    </div>
  
    <!-- Modal Fecha -->
    <div class="modal fade" id="fechaModal" tabindex="-1" aria-labelledby="fechaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="fechaModalLabel">BUSCAR POR FECHA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ventas') }}" method="GET">
                        <input type="hidden" name="metodoBusqueda" value="fecha">
                        <input type="date" name="parametro" class="form-control mb-2">
                        <div class="row">
                            <div class="col-12 col-sm-4 offset-sm-4">
                                <button type="submit" class="btn btn-primary w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cliente -->
    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="clienteModalLabel">BUSCAR POR CLIENTE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ventas') }}" method="GET">
                        <input type="hidden" name="metodoBusqueda" value="cliente">
                        <input type="text" name="parametro" class="form-control mb-2" placeholder="DNI del Cliente">
                        <div class="row">
                            <div class="col-12 col-sm-4 offset-sm-4">
                                <button type="submit" class="btn btn-primary w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@if(session('msn_success'))

<script>

  let mensaje="{{ session('msn_success') }}";

  Swal.fire({

    icon:"success",

    html: `<span style="font-size: 16px;">${mensaje}</span>`,

  });

</script>

@endif
@endsection

