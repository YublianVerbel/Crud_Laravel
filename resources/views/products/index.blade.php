<style>
    /* Contenedor principal */
    div {
        max-width: 900px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Título */
    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    /* Mensaje de éxito */
    .alert-success {
        background-color: #e8fdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    /* Botón agregar */
    .btn-success {
        margin-bottom: 15px;
    }

    /* Tabla */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th {
        background-color: #f4f6f8;
        color: #34495e;
        padding: 12px;
    }

    .table td {
        padding: 12px;
        vertical-align: middle;
    }

    /* Hover fila */
    .table tbody tr:hover {
        background-color: #f9fafb;
    }

    /* Botones */
    .btn {
        font-size: 14px;
        padding: 6px 10px;
    }

    /* Contenedor del botón agregar */
    .btn-success {
        float: right;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        border: none;
        color: #ffffff;
        padding: 10px 18px;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(34, 197, 94, 0.3);
        transition: all 0.25s ease;
    }

    /* Hover botón agregar */
    .btn-success:hover {
        background: linear-gradient(135deg, #16a34a, #15803d);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(34, 197, 94, 0.4);
    }

    /* Botón editar */
    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border: none;
        color: #ffffff;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: scale(1.05);
    }

    /* Botón eliminar */
    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        color: #ffffff;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: scale(1.05);
    }



    /* Formulario de acciones */
    form {
        display: inline-flex;
        gap: 8px;
        align-items: center;
    }

    /* Centrar texto de la tabla */
    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    /* Mantener botones centrados */
    form {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    /* Paginación */

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 25px;
        gap: 6px;
        list-style: none;
        padding-left: 0;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
        text-decoration: none;
        color: #374151;
        font-size: 14px;
        transition: all 0.2s ease;
        background-color: #ffffff;
    }

    .pagination li a:hover {
        background-color: #f3f4f6;
        transform: translateY(-1px);
    }

    .pagination .active span {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #ffffff;
        border: none;
        font-weight: bold;
    }

    .pagination .disabled span {
        color: #9ca3af;
        background-color: #f9fafb;
    }
</style>


<div>

    <h1>Lista de Pedidos</h1>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-success">Agregar nuevo producto</a>

    <form action="{{ route('products.destroyAll') }}" method="POST"
        onsubmit="return confirm('Seguro que deseas eliminar todos los productos?');" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="margin-left:10px;">Eliminar todos</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>$ {{ $product->price }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

    <!-- paginacion -->
    <div>
        @if ($products->hasPages())
        <ul class="pagination">

            @if ($products->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
            @else
            <li>
                <a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
            @endif


            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            @if ($page == $products->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
            @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach


            @if ($products->hasMorePages())
            <li>
                <a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
            @else
            <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
        @endif
    </div>
</div>
