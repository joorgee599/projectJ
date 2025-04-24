@extends('layout.main')
@section('title', 'Usuarios')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}">Atrás<a>
        </div>
        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-circle-info"></i> Información usuarios
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover text-latinco" style="width: 100%"
                            id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <td>{{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <th>Descripcón</th>
                                    <td>{{ $user->email }} </td>
                                </tr>

                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        @if ($user->status == 1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($user->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
