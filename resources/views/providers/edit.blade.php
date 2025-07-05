@extends('layout.main')
@section('title', 'Editar Proveedor')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.providers.index') }}">Atrás</a>
        </div>

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-6">
                                <label for="">Nombre</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $provider->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Correo</label>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $provider->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Teléfono</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone', $provider->phone) }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Dirección</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address', $provider->address) }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="status">Estado</label>
                                <div class="form-floating">
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" {{ old('status', $provider->status) == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ old('status', $provider->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Actualizar Proveedor
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
