@extends('layout.main')

@section('content')
@can('admin.roles.create')
    

    <div class="class-12 m-4">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-warning">Crear Roles</a>
    </div>
    @endcan
    <div class="table-responsive">
        <table id="tableRoles" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Roles</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->name }}</td>
                        <td>{{ $rol->created_at }}</td>
                        <td>
                            @if ($permissions['edit'])
                                
                            
                            <a href="{{ route('admin.roles.edit',$rol->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            @endif

                            @if ($permissions['show'])
                                <a href="{{ route('admin.roles.show', $rol->id) }}"
                                    class="btn btn-sm btn-success">Ver</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#tableRoles").DataTable({
                responsive: true,
                order: [
                    [0, "DESC"],
                ],
                language: {
                    decimal: "",
                    emptyTable: "No hay información",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                    infoEmpty: "Mostrando 0 to 0 of 0 Roles",
                    infoFiltered: "(Filtrado de _MAX_ total Roles)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ Roles",
                    loadingRecords: "Cargando...",
                    processing: "Procesando...",
                    search: "Buscar:",
                    zeroRecords: "Sin resultados encontrados",
                    paginate: {
                        first: "Primero",
                        last: "Ultimo",
                        next: "Siguiente",
                        previous: "Anterior",
                    },
                },
            });
        });
    </script>
@endsection
