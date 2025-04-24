@extends('layout.main')
@section('title', 'Categorias')
@section('content')
    @can('admin.categories.create')
        <div class="class-12 m-4">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-warning">Crear Catgoria</a>
        </div>
    @endcan
    <div class="table-responsive">
        <table id="tableCategories" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Catgoria</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $category->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $category->status == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>

                        <td>
                            @if ($permissions['edit'])
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                            @endif
                            @if ($permissions['show'])
                                <a href="{{ route('admin.categories.show', $category->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                            @if ($permissions['destroy'])
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
    <script src="{{ asset('assets/js/categories/TableCategory.js') }}"></script>
@endsection
