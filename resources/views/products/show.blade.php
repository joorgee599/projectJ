@extends('layout.main')
@section('title', 'Productos')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.products.index') }}">Atrás<a>
        </div>
        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-circle-info"></i> Información productos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover text-latinco" style="width: 100%"
                            id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <td>{{ $product->name }} </td>
                                </tr>
                                <tr>
                                    <th>Descripcón</th>
                                    <td>{{ $product->description }} </td>
                                </tr>
                                <tr>
                                    <th>Precio</th>
                                    <td>{{ $product->price }} </td>
                                </tr>

                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        @if ($product->status == 1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($product->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
