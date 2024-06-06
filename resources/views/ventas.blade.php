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
                    <a href="" class="btn btn-outline-secondary w-100">
                        Buscar por Fecha
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <a href="" class="btn btn-outline-secondary w-100">
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
                <th>Nro</th>
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
                    <button class="btn btn-warning">Ver Factura</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <!-- Pagination icons -->
    <div class="animate__animated animate__fadeInRight">
        <nav aria-label="Page navigation example" class="d-flex justify-content-end">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
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

