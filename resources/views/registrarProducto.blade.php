@extends('cabecera')

@section('codigocabecera')
    
@endsection

@section('contenido')
    <nav class="bg-info py-2 px-2 d-flex align-items-center gap-2 mb-5">
        <a href="" class="btn btn-light">
            <i class="ri-arrow-left-line"></i>
        </a>
        <h1 class="mb-0">Registrar Producto</h1>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mb-3">
                <h2 class="text-center">Registrar Producto</h2>
                <form>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" placeholder="Ingrese el stock" min="1">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" placeholder="Ingrese el precio del producto" min="1">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="unidad" class="form-label">Medida</label>
                            <select id="unidad" class="form-select" aria-label="select unidad">
                                <option selected disabled value="">Seleccion una medida</option>
                                <option value="1">Pieza</option>
                                <option value="2">Par</option>
                                <option value="3">Unidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="imagen" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="imagen" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-4">
                <div class="text-center">
                    <img src="{{ asset('img/1.jpeg') }}" alt="Imagen" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection