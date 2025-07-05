@extends('layout.main')
@section('title', 'Clientes')

@section('content')
    @can('admin.clients.create')
        <div class="col-12 m-4">
            <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-primary">Crear Cliente</a>
        </div>
    @endcan

    <div class="table-responsive">
        <table id="tableClients" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->user->email ?? '-' }}</td>
                        <td>{{ $client->document }}</td>
                        <td>{{ $client->phone ?? '-' }}</td>
                        <td>{{ $client->address ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $client->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $client->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            @can('admin.clients.edit')
                                <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endcan
                            @if ($permissions['show'])
                                <a href="{{ route('admin.clients.show', $client->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            @can('admin.clients.destroy')
                                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="d-inline">
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

    {{-- Puedes incluir JS si lo necesitas para datatables u otras interacciones --}}
    <script src="{{ asset('assets/js/clients/TableClient.js') }}"></script>
@endsection
