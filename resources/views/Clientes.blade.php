{{-- Extender del menú en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menú, usar la sección codigocabeceraprincipal para los estilos --}}
@section('codigocabeceraprincipal')
    
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5">TODOS LOS CLIENTES</h1>
    <div class="controls d-flex flex-column flex-md-row justify-content-between align-items-center">
    <div class="input-group mb-3 mb-md-0 w-auto">
        <input type="text" class="form-control" placeholder="DNI del Cliente">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Buscar</button>
        </div>
    </div>
    <a href="{{ route('registrar.cliente') }}" class="mt-3 mt-md-0">
        <button class="btn btn-primary">Registrar Cliente</button>
    </a>
</div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td>12345678{{$i}}</td>
                        <td>Juan{{$i}}</td>
                        <td>Pérez{{$i}}</td>
                        <td>juan.perez{{$i}}@example.com</td>
                        <td>
                            <button class="btn btn-secondary">Editar</button>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div>
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
@endsection
