{{-- resources/views/clientes/index.blade.php --}}

@extends('layout.menu')

@section('codigocabeceraprincipal')
    {{-- Agrega aquí cualquier estilo adicional que necesites --}}
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 animate__animated animate__fadeInRight">TODOS LOS CLIENTES</h1>
    <div class="controls d-flex flex-column flex-md-row justify-content-between align-items-center animate__animated animate__fadeInRight">
        <div class="input-group mb-3 mb-md-0 w-auto">
            <input type="text" class="form-control" placeholder="DNI del Cliente">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
        <a href="{{ route('clientes.create') }}" class="mt-3 mt-md-0">
            <button class="btn btn-primary">Registrar Cliente</button>
        </a>
    </div>

    <div class="table-responsive mt-3 animate__animated animate__fadeInRight">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->dni }}</td>
                        <td>{{ $cliente->nombres }}</td>
                        <td>{{ $cliente->apellidos }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-secondary">Editar</a>
                            <form onsubmit="window.confirmaEliminarCliente(event)" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="animate__animated animate__fadeInRight">
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
        function confirmaEliminarCliente(event){
            event.preventDefault();
            let form=event.target;
            
            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar este cliente?",
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
