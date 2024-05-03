@extends('cabecera')

@section('codigocabecera')
    
@endsection

@section('contenido')
    <nav class="bg-info py-2 px-2 d-flex align-items-center gap-2 mb-5 animate__animated animate__fadeInDown">
        <a href="{{ route('productos.index') }}" class="btn btn-light">
            <i class="ri-arrow-left-line"></i>
        </a>
        <h1 class="mb-0">Editar Producto</h1>
    </nav>
    <div class="container animate__animated animate__fadeInUp">
        <div class="row">
            <div class="col-12 col-lg-8 mb-3">
                <h2 class="text-center">Editar Producto</h2>
                @session('error')
                    <div class="alert alert-warning mt-3" role="alert">
                        {{ $value }}
                    </div>
                @endsession
                <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{ old('nombre', $producto->nombre) }}">
                        </div>
                    </div>
                    @error('nombre')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese el stock" min="1" value="{{ old('stock', $producto->stock) }}">
                        </div>
                    </div>
                    @error('stock')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del producto"  value="{{ old('precio', $producto->precio) }}">
                        </div>
                    </div>
                    @error('precio')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="unidad" class="form-label">Medida</label>
                            <select id="unidad" class="form-select" name="medida" aria-label="select unidad">
                                <option selected disabled value="">Seleccion una medida</option>
                                <option value="pieza" {{ old('medida', $producto->medida) == 'pieza' ? 'selected' : ''}}>Pieza</option>
                                <option value="rollo" {{ old('medida', $producto->medida) == 'rollo' ? 'selected' : ''}}>Rollo</option>
                                <option value="galon" {{ old('medida', $producto->medida) == 'galon' ? 'selected' : ''}}>Galon</option>
                            </select>
                        </div>
                    </div>
                    @error('medida')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="unidad" class="form-label">Categoria</label>
                            <select id="unidad" class="form-select" name="categoria_id" aria-label="select unidad">
                                <option selected disabled value="">Seleccione una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('categoria_id')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="imagen" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="imagen" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar</button>
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