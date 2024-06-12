{{-- resources/views/clientes/index.blade.php --}}

@extends('layout.menu')

@section('codigocabeceraprincipal')
    {{-- Agrega aquí cualquier estilo adicional que necesites --}}
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 animate__animated animate__fadeInRight">Proveedores</h1>
    <div class="controls d-flex flex-column gap-4 flex-md-row align-items-md-center justify-content-md-between animate__animated animate__fadeInRight">
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary d-block">
            Registrar Proveedor
        </a>
        <div class="input-group mb-3 mb-md-0 w-auto">
            <input type="text" class="form-control" placeholder="RUC de Proveedor">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-3 animate__animated animate__fadeInRight">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>RUC</th>
                    <th>Razon Social</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->ruc }}</td>
                        <td>{{ $proveedor->razon_social }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->correo }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
