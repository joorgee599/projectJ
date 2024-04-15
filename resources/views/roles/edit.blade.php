@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm bg-logistic" href="{{ route('admin.roles.index') }}">Atrás</a>
        </div>
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST" id="formRoles">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="">Nombre</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $role->name) }}">

                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <h2>Permisos</h2>

                            @foreach ($permissions as $permission)
                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="{{ $permission->id }}"
                                    id="{{ $permission->name }}" name="permissions[{{$permission->id}}]"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label for="form-check-label">{{ $permission->description }}</label>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm bg-logistic">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
