@extends('layout.main')
@section('title', 'Movimiento de Inventario')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.inventories.index') }}">Atrás</a>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-box"></i> Detalles del movimiento de inventario
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Producto</th>
                                    <th>Proveedor</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventory->details as $detail)
                                    <tr>
                                        <td>{{ $detail->product->name ?? '—' }}</td>
                                        <td>{{ $detail->provider->name ?? '—' }}</td>
                                        <td>
                                            <span class="badge {{ $detail->type === 'entrada' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($detail->type) }}
                                            </span>
                                        </td>
                                        <td>{{ $detail->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <table class="table">
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $inventory->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Documento</th>
                            <td>{{ $inventory->document ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Usuario que registró</th>
                            <td>{{ $inventory->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>
                                @if ($inventory->status == 1)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $inventory->created_at->format('j F, Y - h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
