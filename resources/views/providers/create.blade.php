@extends('layout.main')
@section('title', 'Crear Proveedor')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('admin.providers.index') }}" class="btn btn-primary btn-sm">Atrás</a>
        </div>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.providers.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="">Nombre *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Nombre de Contacto</label>
                                <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name') }}">
                                @error('contact_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Email *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">Teléfono *</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="">Dirección</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="">Descripción</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                           

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">Crear Proveedor</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
