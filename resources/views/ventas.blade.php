{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    <style>
        
    </style>
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 mb-5">VENTAS</h1>
    <div class="row">
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
                    <a href="{{ route('registrar.venta') }}" class="btn btn-primary offset-lg-6 col-lg-6">
                        Generar Nueva Venta
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive shadow mt-3 mb-3">
        <table class="table table-striped table-bordered text-center mb-0" style="min-width: 700px">
            <thead class="table-dark">
                <tr>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Tipo de Ticket</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-03-28</td>
                    <td>Efectivo</td>
                    <td>S/150.00</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-03-27</td>
                    <td>Tarjeta de crédito</td>
                    <td>S/230.50</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2024-03-26</td>
                    <td>Efectivo</td>
                    <td>S/99.95</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>2024-03-25</td>
                    <td>Tarjeta de débito</td>
                    <td>S/75.60</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>2024-03-24</td>
                    <td>Efectivo</td>
                    <td>S/75.60</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>2024-03-23</td>
                    <td>Tarjeta de crédito</td>
                    <td>S/320.75</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>2024-03-22</td>
                    <td>Efectivo</td>
                    <td>S/200.00</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>2024-03-21</td>
                    <td>Tarjeta de crédito</td>
                    <td>S/175.30</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>2024-03-20</td>
                    <td>Efectivo</td>
                    <td>S/150.80</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>2024-03-19</td>
                    <td>Tarjeta de débito</td>
                    <td>S/210.45</td>
                    <td>
                        <button class="btn btn-warning">Ver Factura</button>
                        <button class="btn btn-danger">Imprimir Factura</button>
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

