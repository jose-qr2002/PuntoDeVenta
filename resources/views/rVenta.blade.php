@extends('cabecera')

@section('codigocabecera')
<style>
    .cuadro-sugerencias {
        position: absolute;
        width: 100%;
        background-color: rgb(236, 223, 223);
    }

    .item-sugerencia {
        cursor: pointer;
        padding: 9px;
    }

    .item-sugerencia:hover {
        background-color: rgb(63, 146, 241);
        color: white;
    }
</style>

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

        <div class="row mt-5 ">
            <div class="col-12 col-lg-6 mb-3">
                <div>
                    <label class="fw-bold" for="cliente">Cliente:</label>
                    <span>{{ $factura->cliente->nombres. ' ' . $factura->cliente->apellidos }}</span>
                </div>
                <div>
                    <label class="fw-bold" for="cliente">Dni:</label>
                    <span>{{ $factura->cliente->dni }}</span>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="">
                    <form action="{{ route('detalles.store', $factura->id) }}" method="POST">
                        @csrf
                        <label class="fw-semibold" for="producto">Añadir Producto</label>
                        <div class="row">
                            <div class="col-12 col-lg-8 mb-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="producto" placeholder="Ingrese el CODIGO del producto">
                                    <input type="hidden" name="producto_id" id="idProducto" value="">
                                    <input type="hidden" name="factura_id" id="factura_id" value="{{ $factura->id }}">
                                    <div class="cuadro-sugerencias">
                                    </div>
                                    @error('idProducto')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <button type="submit" class="btn btn-success w-100">Añadir</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-secondary">Resetear</button>
                <button class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary">Generar</button>
            </div>
        </div>
        @php
            $contador = 1;
        @endphp
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table mt-3 table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio Unitario</th>
                                <th>Unidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factura->detalles as $detalle)
                                <tr>
                                    <td>{{ $contador }}</td>
                                    <td>{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>S/{{ $detalle->precion_unitario }}</td>
                                    <td>{{ $detalle->producto->medida }}</td>
                                    <td>S/{{ $detalle->precion_unitario * $detalle->cantidad }}</td>
                                    <td><button class="btn btn-danger">Descartar</button></td>
                                </tr>
                                @php
                                    $contador++;
                                @endphp
                            @endforeach
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2" class="font-weight-bold">Monto Total:</td>
                                <td class="font-weight-bold">S/{{ $factura->monto_total }}</td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                    <div id="testing">
                        boton testeador
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const cuadroSugerencias = document.querySelector('.cuadro-sugerencias');
        const busquedaProductos = document.getElementById('producto');
        const productos = [
            @foreach ($productos as $producto)
                {
                    id: '{{$producto->id}}',
                    codigo: '{{$producto->codigo}}',
                    nombre: '{{$producto->nombre}}',
                },
            @endforeach
        ];

        let productosBuscados = [];

        busquedaProductos.addEventListener('input', buscarProductos);

        function buscarProductos(e) {
            const busqueda = e.target.value;
            if (busqueda.length > 3) {
                productosBuscados = productos.filter(producto => {
                    return producto.codigo.includes(busqueda);
                })
            } else {
                productosBuscados = [];
            }
            mostrarProductos();
            cuadroSugerencias.style.display = 'block';
        }

        function mostrarProductos() {
            while(cuadroSugerencias.firstChild) {
                cuadroSugerencias.removeChild(cuadroSugerencias.firstChild);
            }

            if (productosBuscados.length > 0) {
                productosBuscados.forEach(producto => {
                    const productoHTML = document.createElement('DIV');
                    productoHTML.classList.add('item-sugerencia');
                    productoHTML.textContent = producto.nombre;
                    // Llenando de datos al HTML
                    productoHTML.dataset.productoId = producto.id;
                    productoHTML.dataset.productoCodigo = producto.codigo;
                    productoHTML.dataset.productoNombre = producto.nombre;
                    productoHTML.onclick = seleccionarProducto;
                    // Añadir al DOM
                    cuadroSugerencias.appendChild(productoHTML);
    
                });
            }
        }

        // Mostrar y desaparecer sugerencias
        document.addEventListener('click', function(e) {
            const clickSugerencias = cuadroSugerencias.contains(e.target);
            const clickBusquedaProductos = busquedaProductos.contains(e.target)

            if(clickSugerencias || clickBusquedaProductos) {
                cuadroSugerencias.style.display = 'block';
            } else {
                cuadroSugerencias.style.display = 'none';
            }
        });

        function seleccionarProducto(e) {
            const idProductoInput = document.getElementById('idProducto');
            const idProductoSeleccionado = e.target.dataset.productoId;
            const nombreProductoSeleccionado = e.target.dataset.productoNombre;
            idProductoInput.value = idProductoSeleccionado;
            productosBuscados = [];
            busquedaProductos.value = nombreProductoSeleccionado;
            mostrarProductos();
        }
    </script>
    @if (session('msn_error'))
        <script>
            let mensaje="{{ session('msn_error') }}";
            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif
    @if (session('msn_success'))
        <script>
            let mensaje="{{ session('msn_success') }}";
            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif
@endsection
