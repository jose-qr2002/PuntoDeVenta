{{-- resources/views/clientes/index.blade.php --}}

@extends('layout.menu')

@section('codigocabeceraprincipal')
    {{-- Agrega aquí cualquier estilo adicional que necesites --}}
@endsection

@section('contenidoprincipal')
    <h1 class="text-center mt-5 animate__animated animate__fadeInRight">Proveedores</h1>
    <div class="controls d-flex flex-column gap-4 flex-md-row align-items-md-center justify-content-md-between animate__animated animate__fadeInRight">
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary d-block">
            Registrar Proveedor
        </a>
        <form action="{{ route('proveedores.index') }}" method="GET">
            <div class="input-group mb-3 mb-md-0 w-auto">
                <input type="text" name="parametro" class="form-control" placeholder="Ruc del Proveedor" value="{{ request()->input('parametro') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive mt-3 animate__animated animate__fadeInRight">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>RUC</th>
                    <th>Razon Social</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->ruc }}</td>
                        <td>{{ $proveedor->razon_social }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->correo }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('proveedores.edit', $proveedor->id) }}">Editar</a>
                            <form onsubmit="window.confirmaEliminarCliente(event)" action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline-block;">
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
        {{ $proveedores->links() }}
    </div>
@if(session('msn_success'))
        <script>
            let mensaje="{{ session('msn_success') }}";

            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
@endif


@if(session('msn_error'))
        <script>
            let mensaje="{{ session('msn_error') }}";
            Swal.fire({
                icon:"error",
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
