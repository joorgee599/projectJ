@extends('layout.main')
@section('title', 'Proveedor')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.providers.index') }}">Atrás</a>
        </div>

        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-user-tie"></i> Información del proveedor
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover text-latinco" style="width: 100%">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $provider->name }}</td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td>{{ $provider->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $provider->phone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $provider->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>
                                    <span class="badge {{ $provider->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $provider->status == 1 ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha de registro</th>
                                <td>{{ date('j F, Y - h:i A', strtotime($provider->created_at)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
