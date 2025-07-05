@extends('layout.main')
@section('title', 'Crear Cliente')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('admin.clients.index') }}" class="btn btn-primary btn-sm">Atrás</a>
        </div>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.clients.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="">Nombre *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Correo Electrónico *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Documento *</label>
                                <input type="text" name="document" class="form-control" value="{{ old('document') }}">
                                @error('document')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Teléfono</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="">Dirección</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">Crear Cliente</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
