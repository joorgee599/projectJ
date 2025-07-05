@extends('layout.main')
@section('title', 'Editar Cliente')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.clients.index') }}">Atrás</a>
        </div>

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-6">
                                <label for="">Nombre *</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $client->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">Correo Electrónico *</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $client->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">Documento *</label>
                                <input type="text" class="form-control" name="document"
                                    value="{{ old('document', $client->document) }}">
                                @error('document')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ old('phone', $client->phone) }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ old('address', $client->address) }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">Estado</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', $client->status) == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('status', $client->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Actualizar Cliente
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
