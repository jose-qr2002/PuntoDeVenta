@extends('cabecera')

@section('codigocabecera')
    
@endsection

@section('contenido')
    <nav class="bg-info py-2 px-2 d-flex align-items-center gap-2 mb-5 animate__animated animate__fadeInDown">
        <a href="{{ route('productos.index') }}" class="btn btn-light">
            <i class="ri-arrow-left-line"></i>
        </a>
        <h1 class="mb-0">Registrar Producto</h1>
    </nav>
    <div class="container animate__animated animate__fadeInUp">
        <div class="row">
            <div class="col-12 col-lg-8 mb-3">
                <h2 class="text-center">Registrar Producto</h2>
                <form action="{{ route('productos.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="row mt-3">
                        <div class="col">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el codigo" value="{{ old('codigo') }}">
                        </div>
                    </div>
                    @error('codigo')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{ old('nombre') }}">
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
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese el stock" value="{{ old('stock') }}">
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
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del producto" value="{{ old('precio') }}">
                        </div>
                    </div>
                    @error('precio')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col">
                            <label for="medida" class="form-label">Medida</label>
                            <select id="medida" name="medida" class="form-select" aria-label="select unidad">
                                <option selected disabled value="">Seleccion una medida</option>
                                <option value="pieza" {{ old('medida') == 'pieza' ? 'selected' : '' }}>Pieza</option>
                                <option value="rollo" {{ old('medida') == 'rollo' ? 'selected' : '' }}>Rollo</option>
                                <option value="galon" {{ old('medida') == 'galon' ? 'selected' : '' }}>Galon</option>
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
                            <label for="categoria_id" class="form-label">Categoria</label>
                            <select id="categoria_id" name="categoria_id" class="form-select" aria-label="select unidad"> 
                                <option selected disabled value="">Seleccion una categoria</option>
                                <option value="1" {{ old('categoria_id') == '1' ? 'selected' : '' }}>Herramientas</option>
                                <option value="2" {{ old('categoria_id') == '2' ? 'selected' : '' }}>Materiales de Construccion</option>
                            </select>
                        </div>
                    </div>
                    @error('categoria_id')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
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
    
    @if (session('error'))
    <script>
        let mensaje="{{ session('error') }}";
        Swal.fire({
            icon:"error",
            html: `<span style="font-size: 16px;">${mensaje}</span>`,
        });
    </script>
    @endif
@endsection
