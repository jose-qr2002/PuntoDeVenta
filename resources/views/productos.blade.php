{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5">PRODUCTOS</h1>
    <div class="controls d-flex justify-content-between">
        <a href="">
            <button class="btn btn-primary">AGREGAR PRODUCTO</button>
        </a>
        <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Buscar Producto">
            <div class="input-group-append ms-2">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mt-3 table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>Llave Inglesa</td>
                        <td>30</td>
                        <td>3</td>
                        <td>unidades</td>
                        <td>
                            <button class="btn btn-secondary">Editar</button>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endfor
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

