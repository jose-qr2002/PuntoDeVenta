@extends('cabecera')

@section('codigocabecera')
@endsection

@section('contenido')
    <div class="container">
        <h1 class="text-center mt-5">GENERAR NUEVA VENTA</h1>

        <div class="row mt-5">
            <div class="col">
                <label for="cliente">Cliente</label>
                <input type="text" class="form-control" id="cliente" placeholder="DNI del cliente">
            </div>
            <div class="col">
                <label for="producto">Producto</label>
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

        <div class="row mt-5">
            <div class="col">
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
            </div>
        </div>

        
        <div class="row">
            <div class="col">
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
        </div>
    </div>
@endsection
