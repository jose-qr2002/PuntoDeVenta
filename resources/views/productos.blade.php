{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5">PRODUCTOS</h1>
    @session('success')
        <div class="alert alert-success text-center fw-bold mx-auto px-4" style="width: max-content;" role="alert">
            {{ $value }}
        </div>
    @endsession
    @session('error')
        <div class="alert alert-danger text-center fw-bold" role="alert">
            {{ $value }}
        </div>
    @endsession
    <div class="controls d-flex flex-column gap-4 flex-md-row align-items-md-center justify-content-md-between">
        <a href="{{ route('productos.create') }}" class="btn btn-primary d-block">
            AGREGAR PRODUCTO
        </a>
        <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">
            <input type="text" class="form-control" placeholder="Buscar Producto">
            <button class="btn btn-outline-secondary w-100" type="button">Buscar</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mt-3 table-striped table-bordered text-center" style="min-width: 700px">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>S/{{ $producto->precio }}</td>
                        <td>{{ $producto->medida }}</td>
                        <td>
                            <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6">No se encuentran productos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Pagination icons -->
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

