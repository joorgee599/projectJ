@extends('layout.main')
@section('title', 'Marcas')
@section('content')
    @can('admin.brands.create')
        <div class="class-12 m-4">
            <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-warning">Crear Marca</a>
        </div>
    @endcan
    <div class="table-responsive">
        <table id="tableBrands" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $brand->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $brand->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>

                        <td>
                            @if ($permissions['edit'])
                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                            @endif
                            @if ($permissions['show'])
                                <a href="{{ route('admin.brands.show', $brand->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            @if ($permissions['destroy'])
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
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
    <script src="{{ asset('assets/js/brands/Tablebrand.js') }}"></script>
@endsection
