@extends('layout.main')

@section('content')
@can('admin.users.create')
    

    <div class="class-12 m-4">
        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-warning">Crear usuario</a>
    </div>
    @endcan
    <div class="table-responsive">
        <table id="tablaUsuarios" class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if ($permissions['edit'])
                                
                            
                            <a href="" class="btn btn-sm btn-warning">Editar</a>
                            @endif
                            @if ($permissions['destroy'])
                                
                            
                            <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#tablaUsuarios").DataTable({
                responsive: true,
                order: [
                    [0, "DESC"],
                ],
                language: {
                    decimal: "",
                    emptyTable: "No hay información",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ Usuario",
                    infoEmpty: "Mostrando 0 to 0 of 0 Usuario",
                    infoFiltered: "(Filtrado de _MAX_ total Usuario)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ Usuario",
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
