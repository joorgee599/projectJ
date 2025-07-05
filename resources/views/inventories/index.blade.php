@extends('layout.main')
@section('title', 'Inventario')

@section('content')
    @can('admin.inventories.create')
        <div class="class-12 m-4">
            <a href="{{ route('admin.inventories.create') }}" class="btn btn-sm btn-warning">Registrar Movimiento</a>
        </div>
    @endcan

    <div class="table-responsive">
        <table id="tableInventories" class="table table-bordered table-hover">
            <thead>
                <tr>
                    {{-- <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Tipo</th>
                    <th>Cantidad</th> --}}
                    <th>Descripción</th>
                    <th>Documento</th>
                    <th>Registrado por</th>
                    {{-- <th>Estado</th> --}}
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $item)
                    <tr>
                        {{-- <td>{{ $item->product->name }}</td>
                        <td>{{ $item->provider->name ?? 'N/A' }}</td>
                        <td><span class="badge bg-{{ $item->type == 'entrada' ? 'success' : 'danger' }}">{{ ucfirst($item->type) }}</span></td>
                        <td>{{ $item->quantity }}</td> --}}
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->document ?? '-' }}</td>
                        <td>{{ $item->user->name }}</td>
                        {{-- <td>
                            <span class="badge rounded-pill {{ $item->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td> --}}
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            {{-- @if ($permissions['edit'] )
                                <a href="{{ route('admin.inventories.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endif --}}
                             @if ($permissions['show'])
                                <a href="{{ route('admin.inventories.show', $item->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            {{-- @if ($permissions['destroy'])
                                <form action="{{ route('admin.inventories.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                </form>
                            @endif --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('assets/js/inventories/TableInventory.js') }}"></script>
@endsection
