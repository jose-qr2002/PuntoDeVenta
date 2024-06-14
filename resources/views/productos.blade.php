{{-- Extender del menu en las vistas generales --}}
@extends('layout.menu')

{{-- En caso de usar el menu usar la seccion codigocabeceraprincipal para los estilos--}}
@section('codigocabeceraprincipal')
    
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 animate__animated animate__fadeInRight">PRODUCTOS</h1>
    <div class="controls d-flex flex-column gap-4 flex-md-row align-items-md-center justify-content-md-between animate__animated animate__fadeInRight">
        <a href="{{ route('productos.create') }}" class="btn btn-primary d-block">
            AGREGAR PRODUCTO
        </a>
        <form action="{{ route('productos.index') }}" method="GET">
            <div class="input-group mb-3 mb-md-0 w-auto">
                <input type="text" name="parametro" class="form-control" placeholder="Codigo del Producto" value="{{ request()->input('parametro') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive animate__animated animate__fadeInRight">
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
                            <form onsubmit="window.confirmaEliminarProducto(event)" action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
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
    <div class="animate__animated animate__fadeInRight">
        {{ $productos->links() }}
    </div>

    @if(session('error'))
        <script>
            let mensaje="{{ session('error') }}";
            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif

    @if(session('success'))
        <script>
            let mensaje="{{ session('success') }}";

            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif

    <script>
        function confirmaEliminarProducto(event){
            event.preventDefault();
            let form=event.target;
            
            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar este producto?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
    
        }
    </script>
@endsection

