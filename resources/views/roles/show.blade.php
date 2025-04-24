@extends('layout.main')
@section('title', 'Roles')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}">Atrás<a>
        </div>
        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-circle-info"></i> Información Roles
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover text-latinco" style="width: 100%"
                            id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Rol</th>
                                    <td>{{ $role->name }} </td>
                                </tr>
                                <h5>Permisos asignados:</h5>
                                @if($role->permissions->isEmpty())
                                    <p class="text-muted">Este rol no tiene permisos asignados.</p>
                                @else
                                    <ul class="list-group">
                                        @foreach($role->permissions as $permission)
                                            <li class="list-group-item">
                                                {{ $permission->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($role->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
