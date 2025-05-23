@extends('layout.main')
@section('title', 'Productos')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.products.index') }}">Atrás</a>
        </div>
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-6">
                                <label for="">Nombre</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Código</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="code"
                                        value="{{ old('code', $product->code) }}">
                                    @error('code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="">Descripción</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" style="height: 100px;">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Precio</label>
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" name="price"
                                        value="{{ old('price', $product->price) }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Imagen</label>
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Categoría</label>
                                <div class="form-floating">
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Marca</label>
                                <div class="form-floating">
                                    <select name="brand_id" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="status">Estado</label>
                                <div class="form-floating">
                                    <select name="status" id="status" class="form-select">
                                        <option value="1"
                                            {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                                            Activo
                                        </option>
                                        <option value="0"
                                            {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
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
                                    Actualizar Producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
