@extends('layout.main')
@section('title', 'Cliente')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.clients.index') }}">Atrás</a>
        </div>

        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card shadow-sm">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-user"></i> Información del cliente
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $client->name }}</td>
                            </tr>
                            <tr>
                                <th>Documento</th>
                                <td>{{ $client->document }}</td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td>{{ $client->user->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $client->phone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $client->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>
                                    <span class="badge {{ $client->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $client->status == 1 ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha de registro</th>
                                <td>{{ $client->created_at->format('d M, Y - h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
