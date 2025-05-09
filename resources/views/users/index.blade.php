@extends('layout.main')
@section('title', 'Usuarios')
@section('content')
    @can('admin.users.create')
        <div class="class-12 m-4">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-warning">Crear usuario</a>
        </div>
    @endcan
    <div class="table-responsive">
        <table id="tablaUsers" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo Electrónico</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $user->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $user->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            @if ($permissions['edit'])
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endif
                            @if ($permissions['show'])
                            <a href="{{ route('admin.users.show', $user->id) }}"
                                class="btn btn-sm btn-success">Ver</a>
                        @endif
                            @if ($permissions['destroy'])
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
    <script src="{{ asset('assets/js/users/TableUser.js') }}" defer></script>
@endsection
