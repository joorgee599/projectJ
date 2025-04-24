@extends('layout.main')
@section('title', 'Marcas')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.brands.index') }}">Atrás<a>
        </div>
        <div class="col-12 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header text-dark h5">
                    <i class="fa-solid fa-circle-info"></i> Información Marcas
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover text-latinco" style="width: 100%"
                            id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Marca</th>
                                    <td>{{ $brand->name }} </td>
                                </tr>
                                <tr>
                                    <th>Descripción</th>
                                    <td>{{ $brand->description }} </td>
                                </tr>

                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        @if ($brand->status == 1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($brand->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
