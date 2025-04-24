@extends('layout.main')
@section('title', 'Productos')
@section('content')
    @can('admin.products.create')
        <div class="class-12 m-4">
            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-warning">Crear Producto</a>
        </div>
    @endcan
    <div class="table-responsive">
        <table id="tableProducts" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>

                        <td class="text-center">
                            <span class="badge rounded-pill {{ $product->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $product->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            @if ($permissions['edit'])
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                            @endif
                            @if ($permissions['show'])
                                <a href="{{ route('admin.products.show', $product->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            @if ($permissions['destroy'])
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-table border-0 btn-sm "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" type="submit">
                                        <i class="fas fa-trash" style="pointer-events: none">Eliminar</i>
                                    </button>

                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script  src="{{ asset('assets/js/products/TableProduct.js')}}"></script>
@endsection
