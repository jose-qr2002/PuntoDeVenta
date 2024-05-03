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
                <label for="cliente">Cliente</label>
                <input type="text" class="form-control" id="cliente" placeholder="DNI del cliente">
            </div>
            <div class="col-12 col-lg-6">
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
                    <table class="table mt-3 table-striped table-bordered text-center">
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
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2" class="font-weight-bold">Total:</td>
                                <td class="font-weight-bold">$300</td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
