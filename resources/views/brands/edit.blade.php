@extends('layout.main')
@section('title', 'Marcas')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.brands.index') }}">Atrás</a>
        </div>
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.brands.update', $brand) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-6">
                                <label for="">Nombre</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $brand->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="">Descripción</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" style="height: 100px;">{{ old('description', $brand->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="status">Estado</label>
                                <div class="form-floating">
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" {{ old('status', $brand->status) == 1 ? 'selected' : '' }}>
                                            Activo
                                        </option>
                                        <option value="0" {{ old('status', $brand->status) == 0 ? 'selected' : '' }}>
                                            Inactivo
                                        </option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Actualizar Marca
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
