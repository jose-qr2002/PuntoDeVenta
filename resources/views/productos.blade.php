{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5">PRODUCTOS</h1>
    <div class="controls d-flex flex-column gap-4 flex-md-row align-items-md-center justify-content-md-between">
        <a href="" class="btn btn-primary d-block">
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
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Llave Inglesa</td>
                    <td>30</td>
                    <td>3</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Taladro eléctrico</td>
                    <td>50</td>
                    <td>S/30</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Caja de herramientas</td>
                    <td>40</td>
                    <td>S/29</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Sierra eléctrica</td>
                    <td>30</td>
                    <td>S/79</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Cinta métrica</td>
                    <td>120</td>
                    <td>S/7</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Martillo de carpintero</td>
                    <td>100</td>
                    <td>S/12</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Llave ajustable</td>
                    <td>60</td>
                    <td>S/14</td>
                    <td>Pieza</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Cinta adhesiva de doble cara</td>
                    <td>50</td>
                    <td>S/5</td>
                    <td>Rollo</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Guantes de trabajo</td>
                    <td>75</td>
                    <td>S/10</td>
                    <td>Par</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Pintura blanca</td>
                    <td>20</td>
                    <td>S/25</td>
                    <td>Galón</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
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

