@extends('layout.main')
@section('title', 'Proveedores')

@section('content')
    @can('admin.providers.create')
        <div class="col-12 m-4">
            <a href="{{ route('admin.providers.create') }}" class="btn btn-sm btn-primary">Crear Proveedor</a>
        </div>
    @endcan

    <div class="table-responsive">
        <table id="tableProviders" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $prov)
                    <tr>
                        <td>{{ $prov->name }}</td>
                        <td>{{ $prov->contact_name ?? '-' }}</td>
                        <td>{{ $prov->email ?? '-' }}</td>
                        <td>{{ $prov->phone ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $prov->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $prov->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            @can('admin.providers.edit')
                                <a href="{{ route('admin.providers.edit', $prov->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endcan
                            @if ($permissions['show'])
                                <a href="{{ route('admin.providers.show', $prov->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            @can('admin.providers.destroy')
                                <form action="{{ route('admin.providers.destroy', $prov->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('assets/js/providers/TableProvider.js') }}"></script>
@endsection
